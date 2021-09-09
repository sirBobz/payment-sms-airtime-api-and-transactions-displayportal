<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AccountCreation;
use App\Models\Organization;
use App\Models\OrganizationDetail;
use App\Models\OrganizationFloat;
use App\Notifications\WelcomeNotication;
use App\Models\User;
use DB;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Notification;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected string $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Handle a registration request for the application.
     *
     * @param AccountCreation $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function register(AccountCreation $request)
    {
        DB::beginTransaction();

        try {
            event(new Registered($user = $this->create($request)));

            $user->generateTwoFactorCode();

            Notification::send($user, new WelcomeNotication($user));

            session()->flash('message', 'Successfully registered - check your email to verify account.');

             DB::commit();

            return $this->registered($request, $user)
                ?: redirect($this->redirectPath());

        } catch (Exception $e) {

            DB::rollback();
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param $request
     * @return User
     */
    protected function create($request): User
    {
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'org_id' => $this->createOrganization($request),
            'password' => Hash::make($request->password),
            'ip_address' => $request->getClientIp(),
        ]);

    }

    /**
     * Create a new organization
     *
     * @param $request
     * @return int id
     */
    protected function createOrganization($request): int
    {

        $org = new Organization();
        $org->name = $request->organization;
        $org->save();

        $details = new OrganizationDetail();
        $details->org_id = $org->id;
        $details->top_up_code = strtoupper(substr(sha1(time()), 0, 5)) . $org->id;
        $details->save();

        $account = new OrganizationFloat();
        $account->org_id = $org->id;
        $account->available_balance = 0;
        $account->current_balance = 0;
        $account->save();

        return $org->id;

    }
}
