<?php

namespace App\DataTables;

use App\Models\Ibadah;
use App\Models\IbadahSyukur;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class IbadahDataTable extends DataTable
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
                return view('components.b-one-action', ['url' => route('ibadah-syukur.edit', $item->id)]);
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(IbadahSyukur $model): QueryBuilder
    {
        return $model->with(['user', 'pendeta'])->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('ibadah-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->responsive(true)
            ->dom('Bfrtip')
            ->info(false)
            ->orderBy(6, 'asc')
            ->buttons([]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
{
    return [
        Column::make('id'),
        Column::make('user.nama', 'user.nama')->title('Pemilik Acara')->width(200)->addClass('my-auto'),
        Column::make('tanggal')->title('Tanggal')->width(150),
        Column::make('waktu')->title('Waktu')->width(150)->format(function($value) {
            return \Carbon\Carbon::parse($value)->format('H:i');
            }),
        Column::make('user.alamat', 'user.alamat')->title('Alamat')->width(200)->addClass('my-auto'),
        Column::make('pendeta.nama', 'pendeta.nama')->title('Nama Pendeta')->width(200)->addClass('my-auto'),
        Column::make('status', 'status')->width(200)->addClass('my-auto'),
        Column::computed('action')->exportable(false)->printable(false)->width(100)->addClass('text-center')
    ];
}


    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Ibadah-Syukur_' . date('YmdHis');
    }
}
