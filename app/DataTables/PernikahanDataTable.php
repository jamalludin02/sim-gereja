<?php

namespace App\DataTables;

use App\Models\Pernikahan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

use function Laravel\Prompts\select;

class PernikahanDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('userLaki.nama', function ($item) {
                return $item->userLaki->nama;
            })
            ->editColumn('userPerempuan.nama', function ($item) {
                return $item->userPerempuan->nama;
            })
            ->editColumn('status', function ($item) {
                return view('components.status-span', ['status' => $item->status]);
            })
            ->addColumn('action', function ($item) {
                return view('components.b-one-action', ['url' => route('pernikahan.edit', $item->id)]);
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Pernikahan $model): QueryBuilder
    {
        return $model->with(['userLaki', 'userPerempuan'])->newQuery();
        // return $model->with(['userLaki' => function ($q) {
        //     return $q->select('nama')->get();
        // }, 'userPerempuan' => function ($q) {
        //     return $q->select('nama')->get();
        // }])->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pernikahan-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->responsive(true)
            ->dom('Bfrtip')
            ->info(false)
            ->orderBy(5, 'asc')
            ->buttons([]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('userLaki.nama', 'userLaki.nama')->title('Nama Laki')->width(200)->addClass('my-auto'),
            Column::make('userPerempuan.nama', 'userPerempuan.nama')->title('Nama Perempuan')->width(200)->addClass('my-auto'),
            Column::make('tanggal')->title('Tgl Pernikahan')->width(150),
            Column::make('waktu')->title('Waktu Pernikahan')->width(150),
            Column::make('status')->width(100),
            Column::computed('action')->exportable(false)->printable(false)->width(100)->addClass('text-center')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Pernikahan_' . date('YmdHis');
    }
}
