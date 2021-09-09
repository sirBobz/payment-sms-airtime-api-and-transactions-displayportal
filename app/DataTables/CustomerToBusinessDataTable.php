<?php

namespace App\DataTables;

use App\Models\MpesaC2bTransaction;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Traits\GlobalTrait;

class CustomerToBusinessDataTable extends DataTable
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
            if($query->status == 10){
                return '<p style="color:blue;">Completed</p>';
            }
            if($query->status == 29){
                return '<p style="color:green;">Scheduled</p>';
            }
            return '<p style="color:purple;">' . $this->getStatusCodeName($query->status) . '</p>';
        })
         ->filterColumn('account_balance', function($query, $keyword) {
                        $query->whereRaw("mpesa_c2b_transactions.org_account_balance like ?", ["%{$keyword}%"]);
                    })
            ->rawColumns(['status']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\CustomerToBusiness $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $table['table'] = 'mpesa_c2b_transactions';
        $requestData = [
                        'from' => $this->from,
                        'to' => $this->to,
                        'status' => $this->status
                       ];

        return $this->appyFilters($this->getC2bData(), $requestData, $table);

    }

    private function getC2bData(){

        return MpesaC2bTransaction::select('mpesa_c2b_transactions.id', 'mpesa_c2b_transactions.status', 'mpesa_c2b_transactions.billing_status', 'mpesa_c2b_transactions.created_at','mpesa_c2b_transactions.request_id','mpesa_c2b_transactions.phone_number', 'mpesa_c2b_transactions.short_code','mpesa_c2b_transactions.amount','mpesa_c2b_transactions.result_code', 'mpesa_c2b_transactions.customer_name', 'mpesa_c2b_transactions.third_party_trans_id', 'mpesa_c2b_transactions.org_account_balance AS account_balance', 'mpesa_c2b_transactions.bill_ref_number', 'mpesa_c2b_transactions.org_id', 'mpesa_c2b_transactions.result_desc')
        ->where('mpesa_c2b_transactions.org_id', auth()->user()->org_id);

    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('customertobusiness-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(0)
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
            "status",
            "result_code",
            "result_desc",
            "phone_number",
            "amount",
            "account_balance",
            "short_code",
            "customer_name",
            "third_party_trans_id",
            "bill_ref_number",
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
        return 'CustomerToBusiness_' . date('YmdHis');
    }
}
