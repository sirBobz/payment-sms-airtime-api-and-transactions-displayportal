<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\ConfirmationWebhook, Alert;
use Illuminate\Http\Request;

class WebhookController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ConfirmationWebhook::updateOrCreate(
            ['org_id' => auth()->user()->org_id, 'service_id' => $request->service_id],
            ['url' => $request->url]
        );

        Alert::success('Success', 'Webhook updated successfully');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConfirmationWebhook  $confirmationWebhook
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request){

        ConfirmationWebhook::find($request->id)->forcedelete();

         Alert::success('Success', 'Webhook deleted successfully');

         return redirect()->back();
       }
}
