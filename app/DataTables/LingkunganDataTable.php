<?php

namespace App\DataTables;

use App\Models\Lingkungan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class LingkunganDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))->addColumn('action', function ($item) {
            return view('components.b-one-action', ['url' => route('lingkungan.edit', $item->id)]);
        })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Lingkungan $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('lingkungan-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->responsive(true)
            ->dom('Bfrtip')
            ->info(false)
            ->orderBy(0, 'asc')
            ->buttons([
                Button::make('')
                    ->text('Tambah Data <i class="ms-1 bi bi-clipboard"></i>')
                    ->className('btn btn-sm bg-primary border-0')
                    ->action('function() { window.location = "' . route('lingkungan.create') . '"; }'),
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('nama'),
            Column::make('alamat'),
            Column::computed('action')->exportable(false)->printable(false)->width(100)->addClass('text-center')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Lingkungan_' . date('YmdHis');
    }
}
