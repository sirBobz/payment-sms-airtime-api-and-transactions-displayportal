<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\DataTables\OrganizationFloatTopUpDataTable;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\BalanceAlert;
use App\Models\BalanceNotification;


class AccountBillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OrganizationFloatTopUpDataTable $dataTable)
    {
        $data = BalanceNotification::where('org_id', auth()->user()->org_id)->first();

        return $dataTable->render('V1.account.index', compact('data'));
    }

    /**
     * Store a newly created Balalce alert in storage.
     *
     * @param  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BalanceAlert $request)
    {
        //check if emails
        $emailArray = explode(',', $request->emails);
        foreach ($emailArray as $email) {
            // Validate e-mail
            if (filter_var(trim($email), FILTER_VALIDATE_EMAIL)) {
                continue;
            } else {
                return redirect()->back()->with('error', 'Not all the given e-mails are valid.');
            }
        }

        BalanceNotification::updateOrCreate(
            ['org_id' => auth()->user()->org_id],
            [
                'status' => $request->status,
                'threshold' => $request->threshold,
                'emails' => $request->emails,
                'sent_status' => 1
            ]
        );
        Alert::success('Success', 'Operation successful.');
        return redirect()->back();
    }

    /**
     * Remove Alert from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BalanceNotification::where('org_id', auth()->user()->org_id)
            ->where('id', $id)
            ->delete();
        Alert::success('Success', 'Operation successful.');
        return redirect()->back();
    }

}
