<?php

namespace App\DataTables;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SliderDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function($query){
                $detailBtn = "<a href='".route('admin.slider.show', $query->id)."' class='btn btn-info'><i class='fa fa-info'></i></a>";
                $editBtn = "<a href='".route('admin.slider.edit', $query->id)."' class='btn btn-warning ml-2'><i class='fa fa-edit'></i></a>";
                $deleteBtn = "<a href='".route('admin.slider.destroy', $query->id)."' class='btn btn-danger ml-2 delete-item'><i class='fa fa-trash'></i></a>";

                return $detailBtn.$editBtn.$deleteBtn;
            })
            ->addColumn('banner', function($query){
                return "<img src='".asset($query->banner)."' width='200px'></img>";
            })
            ->addColumn('status', function($query){
                $active = "<i class='badge badge-success'>Active</i>";
                $inactive = "<i class='badge badge-danger'>Inactive</i>";

                return $query->status == 1 ? $active : $inactive;
            })
            ->rawColumns(['banner', 'status','action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Slider $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('slider-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')
                ->width(100),
            Column::make('banner')
                ->width(200),
            Column::make('title'),
            Column::make('serial'),
            Column::make('status'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(200)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Slider_' . date('YmdHis');
    }
}
