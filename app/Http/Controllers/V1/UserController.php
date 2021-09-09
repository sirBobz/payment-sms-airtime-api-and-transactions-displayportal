<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Notifications\ActivateNewUser;
use App\DataTables\UsersDataTable;
use App\Models\User, DB, Mail, Exception, Notification;
use App\Traits\GlobalTrait;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    use GlobalTrait;


    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('V1.users.index');
    }

    public function store(StoreUsersRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = User::create( $this->formatPayload($request));

            Notification::send($user, new ActivateNewUser($user));

            DB::commit();

            Alert::success('message', 'User created successfully');


        } catch (Exception $e) {

            DB::rollback();
        }

       return redirect()->back();
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->id == auth()->user()->id)
        {
            Alert::error('Error', 'You can not delete self.');
        }
        else
        {
            $user->forceDelete();
            Alert::success('Success', 'Operation successful.');
        }

    }

}
