<?php

namespace App\DataTables;

use App\Models\MpesaB2cTransaction;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Traits\GlobalTrait;

class BusinessToCustomerDataTable extends DataTable
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
            ->orderColumn('created_at', function ($query) {
                     $query->orderBy('created_at', 'desc');
                 })
                 ->rawColumns(['status']);


    }
    /**
     * Get query source of dataTable.
     *
     * @param \App\BusinessToCustomer $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {

        $table['table'] = 'mpesa_b2c_transactions';
        $requestData = [
                        'reference_name' => $this->reference_name,
                        'from' => $this->from,
                        'to' => $this->to,
                        'status' => $this->status
                       ];

        return $this->appyFilters($this->getB2cData(), $requestData, $table);

    }

    public function getB2cData(){

        return MpesaB2cTransaction::select('mpesa_b2c_transactions.id', 'mpesa_b2c_transactions.customer_name', 'mpesa_b2c_transactions.third_party_trans_id', 'mpesa_b2c_transactions.originator_conversation_id', 'mpesa_b2c_transactions.status', 'mpesa_b2c_transactions.billing_status', 'mpesa_b2c_transactions.org_account_balance', 'mpesa_b2c_transactions.created_at','mpesa_b2c_transactions.request_id','mpesa_b2c_transactions.phone_number', 'mpesa_b2c_transactions.short_code','mpesa_b2c_transactions.amount','mpesa_b2c_transactions.result_code', 'mpesa_b2c_transactions.result_desc',
           'mpesa_b2c_transactions.org_id')
        ->where('mpesa_b2c_transactions.org_id', auth()->user()->org_id);

    }
    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('businesstocustomer-table')
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
            'status',
            "result_code",
            "result_desc",
            "phone_number",
            "amount",
            "customer_name",
            "short_code",
            "org_account_balance",
            "third_party_trans_id",
            "originator_conversation_id",
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
        return 'BusinessToCustomer_' . date('YmdHis');
    }
}
