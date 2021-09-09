<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use \Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\TwoFactorCode;
use App\Http\Requests;
use Mail, Exception, DB, Session, Auth;
use Carbon\Carbon;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected int $maxAttempts = 3; // Default is 5

    protected int $decayMinutes = 5; // Default is 1

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected string $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Log out User from other devices
     * Get User IP address and update
     * Generate a OTP code
     * Send notification
     *
     * @param Request $request
     * @param $user
     * @return void
     */
    protected function authenticated(Request $request, $user)
    {
        Auth::logoutOtherDevices(request('password'));

        if (is_null($user->email_verified_at)) {
            auth()->logout();
            return redirect()->route('login')
                ->withMessage('Please check your email to verify your account.');
        }

        if ($request->getClientIp() != $user->ip_address) {

            $user->update(['ip_address' => $request->getClientIp()]);
            $user->generateTwoFactorCode();
            $user->notify(new TwoFactorCode());
        }
    }

    public function verifyAccountEmail($email)
    {

        $user = User::where('email', '=', $email)->first();

        if ($user) {

            if (is_null($user->email_verified_at)) {
                $user->update([
                    'email_verified_at' => date("Y-m-d h:i:s"),
                    'two_factor_code' => NULL,
                    'two_factor_expires_at' => NULL
                ]);

                session()->flash('message', 'Successfully verified - please login');
            } else {

                session()->flash('message', 'Already verified - please login');
            }
        }

        return redirect('login');
    }



    public function verify($email)
    {

        $user = User::where('email', '=', $email)->first();

        if ($user) {

            if (is_null($user->email_verified_at)) {
                $user->update(['email_verified_at' => Carbon::now()]);

                $token = app(\Illuminate\Auth\Passwords\PasswordBroker::class)->createToken($user);

                return view('auth.passwords.reset', ['user' => $user, 'token' => $token, 'email' => $user->email]);
            }
        }
        return redirect('login');
    }
}
