<?php

namespace App\Http\Controllers\V1;

use App\DataTables\SmsDataTable;
use App\Http\Controllers\Controller;
use App\Traits\GlobalTrait;
use Illuminate\Http\Request;
use Response, Exception;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\CsvImportRequest;
use Excel;
use Alert;
use App\Jobs\NotifyUserOfCompletedImport;
use Illuminate\Support\Carbon;
use App\Imports\SmsImport;

class SmsController extends Controller
{
    use GlobalTrait;

    /**
     * Display a listing of the resource.
     *
     * @param SmsDataTable $dataTable
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(SmsDataTable $dataTable, Request $request)
    {
        $senderIds = $this->getServiceAccounts('sms');

        return $dataTable->with([
            'telco_name' => $request->telco_name,
            'reference_name' => $request->reference_name,
            'from' => $request->from,
            'to' => $request->to,
            'status' => $request->status,
        ])->render('V1.sms.index', compact('senderIds'));
    }

    public function bulkSms()
    {

        $senderIds = $this->getServiceAccounts('sms');

        return view('V1.sms.sendsms', compact('senderIds'));
    }


    public function downloadFile()
    {
        $file = public_path() . "/downloads/sms.csv";
        $headers = array('Content-Type : text/csv');
        return Response::download($file, 'smsSampeFile.csv', $headers);
    }

    public function fileUpload(CsvImportRequest $request)
    {
        $dateTime = $request->send_date . " " . $request->send_time;

        $request->merge([
            'send_time' => Carbon::createFromFormat('Y-m-d H:i', $dateTime)->format('Y-m-d H:i:s')
        ]);

        try {

            (new SmsImport(
                (object) $request->only(['message', 'send_time', 'reference_name', 'sender_id']),
                auth()->user()
            ))->queue(request()->file('import_file'))->chain([
                new NotifyUserOfCompletedImport(request()->user()),
            ]);

            Alert::success('Success', 'Operation successful');
        } catch (Exception $e) {
            Log::error($e);

            Alert::error('Error', $e->getMessage());
        }

        return redirect()->back();
    }
}
