<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\ApiCredential, Notification;
use Illuminate\Support\Str, Mail;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use App\Models\Service;
use App\Notifications\ApiKeyChanged;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\ConfirmationWebhook;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $callBackData = ConfirmationWebhook::with('service')->where('org_id', auth()->user()->org_id)->get();

        $services = Service::all();

        return view('V1.api.index', compact('callBackData', 'services'));
    }

    /**
     * Store or update a created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCredentials(Request $request)
    {
        $consumer_key = auth()->user()->org_id . str_replace("-", "", Str::uuid()->toString());

        $cred = ApiCredential::updateOrCreate(
            ['org_id' => auth()->user()->org_id],
            [
                'consumer_secret' => Str::random(20) . auth()->user()->org_id . Str::random(5),
                'consumer_key' => Hash::make($consumer_key),
            ]
        );

        foreach (User::where('org_id', auth()->user()->org_id)->get() as $user) {

            Notification::send($user, new ApiKeyChanged($user));
        }

        return Redirect()->back()->with(['consumer_key' => $consumer_key, 'consumer_secret' => $cred->consumer_secret]);
    }
}
