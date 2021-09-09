<?php

namespace App\Http\Controllers\V1;

use App\DataTables\AirtimeDataTable;
use App\Http\Controllers\Controller;
use App\Models\AirtimeTransaction;
use Illuminate\Http\Request;

class AirtimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param AirtimeDataTable $dataTable
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(AirtimeDataTable $dataTable, Request $request)
    {
        return $dataTable->with([
            'telco_name' => $request->telco_name,
            'reference_name' => $request->reference_name,
            'from' => $request->from,
            'to' => $request->to,
            'status' => $request->status,
        ])
            ->render('V1.airtime.index');
    }
}
