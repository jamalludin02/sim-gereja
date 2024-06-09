<?php

namespace App\DataTables;

use App\Models\Bapti;
use App\Models\BaptisAnak;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class BaptisDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('status', function ($item) {
                return view('components.status-span', ['status' => $item->status]);
            })
            ->addColumn('action', function ($item) {
                return view('components.b-one-action', ['url' => route('baptis-anak.edit', $item->id)]);
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(BaptisAnak $model): QueryBuilder
    {
        return $model->with('user')->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('baptis-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->responsive(true)
            ->dom('Bfrtip')
            ->info(false)
            ->orderBy(7, 'asc')
            ->buttons([]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('user.id', 'id_user')->title('Id Orang Tua')->width(150)->addClass('my-auto'),
            Column::make('user.nama', 'id_user')->title('Nama Orang Tua')->width(250)->addClass('my-auto'),
            Column::make('nama_anak')->width(200)->addClass('my-auto'),
            Column::make('tgl_lahir')->width(150)->addClass('my-auto'),
            Column::make('tgl_pelaksanaan')->width(150),
            Column::make('waktu_pelaksanaan')->width(150),
            Column::make('status')->width(100),
            Column::computed('action')->exportable(false)->printable(false)->width(100)->addClass('text-center')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Baptis_' . date('YmdHis');
    }
}
