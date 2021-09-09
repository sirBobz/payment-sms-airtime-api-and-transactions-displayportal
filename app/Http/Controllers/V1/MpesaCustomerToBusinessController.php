<?php

namespace App\Http\Controllers\V1;

use App\DataTables\CustomerToBusinessDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Traits\GlobalTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class MpesaCustomerToBusinessController extends Controller
{
    use GlobalTrait;

    /**
     * Display a listing of the resource.
     *
     * @param CustomerToBusinessDataTable $dataTable
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(CustomerToBusinessDataTable $dataTable, Request $request)
    {
        $shortcodes = Cache::remember('mpesa_c2b_shortcodes_'. Auth::user()->org_id, 60*15, function () {
            return Account::where('service_id', $this->getServiceId('mpesa_c2b'))
            ->where('org_id', Auth::user()->org_id)->get();
        });

        $validationUrls = DB::table('validation_webhooks')
                        ->select('validation_webhooks.validation_url','accounts.account','validation_webhooks.updated_at','accounts.service_id','organizations.id')
                        ->leftJoin('accounts','validation_webhooks.account_id','=','accounts.id')
                        ->leftJoin('organizations','accounts.org_id','=','organizations.id')
                        ->where('accounts.service_id', $this->getServiceId('mpesa_c2b'))
                        ->where('organizations.id', Auth::user()->org_id)
                        ->get();


        return $dataTable->with([
            'from' => $request->from,
            'to' => $request->to,
            'status' => $request->status,
        ])->render('V1.mpesa.C2B.index', compact('shortcodes', 'validationUrls'));
    }
}
