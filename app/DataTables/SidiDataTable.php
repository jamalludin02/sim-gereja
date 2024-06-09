<?php

namespace App\DataTables;

use App\Models\Sidi;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SidiDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('user.lingkungan.nama', function ($item) {
                return $item->user->lingkungan->nama ?? '-';
            })
            ->editColumn('status', function ($item) {
                return view('components.status-span', ['status' => $item->status]);
            })
            ->addColumn('action', function ($item) {
                return view('components.b-one-action', ['url' => route('sidi.edit', $item->id)]);
            })
            ->setRowId('id');
    }


    /**
     * Get the query source of dataTable.
     */
    public function query(Sidi $model): QueryBuilder
    {
        return $model->with(['user' =>  function ($q) {
            return $q->with('lingkungan');
        }])->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('sidi-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->responsive(true)
            ->dom('Bfrtip')
            ->info(false)
            ->orderBy(4, 'asc')
            ->buttons([]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('user.nama', 'id_user')->title('Nama'),
            Column::make('user.alamat', 'id_user')->title('Alamat'),
            Column::make('user.lingkungan.nama', 'id_user')->title('Lingkungan')->addClass('text-center'),
            Column::make('status')->width(100),
            Column::computed('action')->exportable(false)->printable(false)->width(100)->addClass('text-center')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Sidi_' . date('YmdHis');
    }
}
