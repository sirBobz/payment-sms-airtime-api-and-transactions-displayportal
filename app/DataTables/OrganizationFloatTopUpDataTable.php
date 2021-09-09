<?php

namespace App\DataTables;

use App\Models\OrganizationFloatTopUp;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrganizationFloatTopUpDataTable extends DataTable
{
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
            ->filterColumn('date', function($query, $keyword) {
                            $query->whereRaw("organization_float_top_ups.created_at like ?", ["%{$keyword}%"]);
             })
            ->filterColumn('details', function($query, $keyword) {
                            $query->whereRaw("organization_float_top_ups.reference_id like ?", ["%{$keyword}%"]);
             });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\OrganizationFloatTopUp $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return  OrganizationFloatTopUp::select("amount", "created_at as date", "reference_id as details")
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
                    ->setTableId('organizationfloattopup-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(2)
                    ->buttons(
                        Button::make('export'),
                        Button::make('print')
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
            'amount',
            'details',
            'date'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'account_statement_' . date('YmdHis');
    }
}
