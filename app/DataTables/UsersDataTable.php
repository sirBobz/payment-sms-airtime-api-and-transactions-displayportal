<?php

namespace App\DataTables;

use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
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
            ->addColumn('action', function ($query) {
                return '&nbsp;&nbsp;&nbsp;<button type="button" name="edit" id="' . $query->id . '" class="delete btn btn-danger btn-xs"><i class="fa fa-trash"></i></button>';
            })
            ->filterColumn('login_ip_address', function ($query, $keyword) {
                $query->whereRaw("users.ip_address like ?", ["%{$keyword}%"]);
            })
            ->filterColumn('email_verified_on', function ($query, $keyword) {
                $query->whereRaw("users.email_verified_at like ?", ["%{$keyword}%"]);
            })

            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return User::select('users.id', 'users.email', 'users.name', 'users.phone_number', 'users.ip_address as login_ip_address', 'users.email_verified_at as email_verified_on', 'users.updated_at')
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
            ->setTableId('users-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(6)
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
            Column::make('name'),
            Column::make('email'),
            Column::make('phone_number'),
            Column::make('login_ip_address'),
            Column::make('email_verified_on'),
            Column::make('updated_at'),
            Column::make('action'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Users_' . date('YmdHis');
    }
}
