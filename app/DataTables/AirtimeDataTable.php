<?php

namespace App\DataTables;

use App\Models\AirtimeTransaction, DB;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Traits\GlobalTrait;

class AirtimeDataTable extends DataTable
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
            ->addColumn('result_desc', function ($query) {
                if ($query->result_code == 200) {
                    return '<p style="color:#4C9D44;">Successful</p>';
                } else if ($query->result_code == 100) {
                    return '<p style="color:blue;">Processing...</p>';
                }
                return '<p style="color:red;">Failed</p>';
            })
            ->addColumn('status', function ($query) {
                if ($query->status == 404) {
                    return '<p style="color:red;">Not found</p>';
                }
                if ($query->status == 200) {
                    return '<p style="color:#4C9D44;">Sent</p>';
                }
                if($query->status == 10){
                    return '<p style="color:blue;">Completed</p>';
                }
                if($query->status == 29){
                    return '<p style="color:green;">Scheduled</p>';
                }
                return '<p style="color:purple;">' . $this->getStatusCodeName($query->status) . '</p>';
            })
            ->filterColumn('telco_name', function ($query, $keyword) {
                $query->whereRaw("telcos.name like ?", ["%{$keyword}%"]);
            })
            ->filterColumn('reference', function ($query, $keyword) {
                $query->whereRaw("airtime_transactions.reference_name like ?", ["%{$keyword}%"]);
            })
            ->filterColumn('cost', function ($query, $keyword) {
                $query->whereRaw("airtime_transactions.airtime like ?", ["%{$keyword}%"]);
            })
            ->filterColumn('time', function ($query, $keyword) {
                $query->whereRaw("airtime_transactions.updated_at like ?", ["%{$keyword}%"]);
            })
            ->orderColumn('time', function ($query) {
                $query->orderBy('time', 'desc');
            })
            ->rawColumns(['result_desc', 'status']);
    }
    /**
     * Get query source of dataTable.
     *
     * @param \App\Airtime $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {

        $table['table'] = 'airtime_transactions';
        $requestData = [
            'telco_name' => $this->telco_name,
            'reference_name' => $this->reference_name,
            'from' => $this->from,
            'to' => $this->to,
            'status' => $this->status
        ];

        return $this->appyFilters($this->getAirtimeData(), $requestData, $table);
    }

    public function getAirtimeData()
    {

        return AirtimeTransaction::leftJoin('telcos', 'airtime_transactions.telco_id', '=', 'telcos.id')
            ->select('airtime_transactions.updated_at as time', 'airtime_transactions.status', 'airtime_transactions.request_id', 'airtime_transactions.phone_number', 'airtime_transactions.amount', 'airtime_transactions.airtime AS cost', 'airtime_transactions.result_code', 'airtime_transactions.result_desc', 'telcos.name as telco_name',
            DB::raw('IF(airtime_transactions.reference_name IS NULL, DATE_FORMAT(airtime_transactions.updated_at,"%Y-%m-%d"), airtime_transactions.reference_name) as reference'),)
            ->where('org_id', auth()->user()->org_id);
    }
    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('airtime-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
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
            "time",
            "status",
            "reference",
            "telco_name",
            "phone_number",
            "cost",
            "amount",
            "result_code",
            "result_desc",
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
        return 'airtime_transactions_' . date('YmdHis');
    }
}
