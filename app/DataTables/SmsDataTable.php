<?php

namespace App\DataTables;

use App\Models\SmsTransaction;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Traits\GlobalTrait, DB;

class SmsDataTable extends DataTable
{
    use GlobalTrait;
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('status', function ($query) {
                if ($query->status == 404) {
                    return '<p style="color:red;">Not found</p>';
                }
                if ($query->status == 200) {
                    return '<p style="color:#4C9D44;">Sent</p>';
                }
                if ($query->status == 10) {
                    return '<p style="color:blue;">Completed</p>';
                }
                if ($query->status == 29) {
                    return '<p style="color:green;">Scheduled</p>';
                }
                return '<p style="color:purple;">' . $this->getStatusCodeName($query->status) . '</p>';
            })
            ->filterColumn('telco_name', function ($query, $keyword) {
                $query->whereRaw("telcos.name like ?", ["%{$keyword}%"]);
            })
            ->filterColumn('cost', function ($query, $keyword) {
                $query->whereRaw("sms_transactions.amount like ?", ["%{$keyword}%"]);
            })
            ->orderColumn('created_at', function ($query) {
                $query->orderBy('created_at', 'desc');
            })
            ->addColumn('result_desc', function ($query) {
                if ($query->result_code == 400) {
                    return '<p style="color:red;">Fail</p>';
                }
                if ($query->result_code == 200) {
                    return '<p style="color:green;">Success</p>';
                }
                return '<p style="color:purple;">' . $this->getStatusCodeName($query->result_code) . '</p>';
            })
            ->rawColumns(['status', 'result_desc']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Sms $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $table['table'] = 'sms_transactions';
        $requestData = [
            'telco_name' => $this->telco_name,
            'reference_name' => $this->reference_name,
            'from' => $this->from,
            'to' => $this->to,
            'status' => $this->status
        ];

        return $this->appyFilters($this->getSmsData(), $requestData, $table);
    }

    private function getSmsData()
    {

        return SmsTransaction::select('sms_transactions.updated_at AS  created_at', 'sms_transactions.status', 'sms_transactions.request_id', 'sms_transactions.sender_id', 'sms_transactions.phone_number', 'telcos.name as telco_name', 'sms_transactions.message', 'sms_transactions.amount as cost', 'sms_transactions.result_code', 'sms_transactions.result_desc', DB::raw('IF(sms_transactions.reference_name IS NULL, DATE_FORMAT(sms_transactions.updated_at,"%Y-%m-%d"), sms_transactions.reference_name) as reference_name'))
            ->leftJoin('telcos', 'sms_transactions.telco_id', '=', 'telcos.id')
            ->where('sms_transactions.org_id', auth()->user()->org_id);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('sms-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->buttons(
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            "created_at",
            "result_code",
            "result_desc",
            "phone_number",
            "message",
            "cost",
            "reference_name",
            "sender_id",
            "telco_name",
            'status',
            "request_id"
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Sms_' . date('YmdHis');
    }
}
