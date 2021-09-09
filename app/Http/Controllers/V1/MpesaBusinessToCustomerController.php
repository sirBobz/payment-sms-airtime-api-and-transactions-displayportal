<?php

namespace App\Http\Controllers\V1;

use App\DataTables\BusinessToCustomerDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Account;
use App\Traits\GlobalTrait;
use Cache, Auth;

class MpesaBusinessToCustomerController extends Controller
{
    use GlobalTrait;

    /**
     * Display a listing of the resource.
     *
     * @param BusinessToCustomerDataTable $dataTable
     * @param Request $request
     * @return Response
     */
    public function index(BusinessToCustomerDataTable $dataTable, Request $request)
    {

        $shortcodes = Cache::remember('mpesa_b2c_shortcodes_' . Auth::user()->org_id, 60 * 15, function () {
            return Account::where('service_id', $this->getServiceId('mpesa_b2c'))
                ->where('org_id', Auth::user()->org_id)->get();
        });

        return $dataTable->with([
            'reference_name' => $request->reference_name,
            'from' => $request->from,
            'to' => $request->to,
            'status' => $request->status,
        ])->render('V1.mpesa.B2C.index', compact('shortcodes'));
    }

}
