<?php

namespace App\DataTables;

use App\Models\Pengumuman;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PengumumanDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('judul', function ($item) {
                $judul = strip_tags($item->judul);
                $short = substr($judul, 0, 100);
                return $short .'...';
            })
            ->editColumn('isi', function ($item) {
                $isi = strip_tags($item->isi);
                $short = substr($isi, 0, 100);
                return $short . '...';
            })
            ->editColumn('created_at', function ($item) {
                return $item->created_at->diffForHumans();
            })
            ->addColumn('action', function ($item) {
                return view('components.b-one-action', ['url' => route('pengumuman.edit', $item->id)]);
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Pengumuman $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pengumuman-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->responsive(true)
            ->dom('Bfrtip')
            ->info(false)
            ->orderBy(0, 'desc')
            ->buttons([
                Button::make('')
                    ->text('Tambah Data <i class="ms-1 bi bi-clipboard"></i>')
                    ->className('btn btn-sm bg-primary border-0')
                    ->action('function() { window.location = "' . route('pengumuman.create') . '"; }'),
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('judul')->addClass('fw-semibold'),
            Column::make('isi'),
            Column::make('created_at')->title('Waktu')->width(100),
            Column::computed('action')->exportable(false)->printable(false)->width(100)->addClass('text-center')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Pengumuman_' . date('YmdHis');
    }
}
