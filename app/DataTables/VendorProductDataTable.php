<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class VendorProductDataTable extends DataTable
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
                $detailBtn = "<a href='".route('vendor.product.show', $query->id)."' class='btn btn-info'><i class='fa fa-info'></i></a>";
                $editBtn = "<a href='".route('vendor.product.edit', $query->id)."' class='btn btn-warning' style='margin-left:4px;'><i class='fa fa-edit'></i></a>";
                $deleteBtn = "<a href='".route('vendor.product.destroy', $query->id)."' class='btn btn-danger delete-item' style='margin-left:4px;'><i class='fa fa-trash'></i></a>";
                $moreBtn = '<div class="dropdown dropleft d-inline">
                    <button class="btn btn-primary dropdown-toggle ml-1" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-cog"></i>
                    </button>
                    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 29px, 0px); top: 0px; left: 0px; will-change: transform;">
                        <a class="dropdown-item has-icon" href="'.route('admin.product-image-gallery.index', ['product' => $query->id]).'"><i class="far fa-heart"></i> Image Gallery</a>
                        <a class="dropdown-item has-icon" href="'.route('admin.product-variant.index', ['product' => $query->id]).'"><i class="far fa-file"></i> Variants</a>
                    </div>
                    </div>';

                return $detailBtn.$editBtn.$deleteBtn.$moreBtn;
            })
            ->addColumn('image', function($query){
                return "<img src='".asset($query->thumb_image)."' width='70px'></img>";
            })
            ->addColumn('type', function($query){
                switch ($query->product_type) {
                    case 'new_arrival':
                        return "<i class='badge bg-success'>New Arrival</i>";
                        break;
                    
                    case 'featured':
                        return "<i class='badge bg-warning'>Featured</i>";
                        break;

                    case 'top_product':
                        return "<i class='badge bg-info'>Top Product</i>";
                        break;

                    case 'best_product':
                        return "<i class='badge bg-danger'>Best Product</i>";
                        break;

                    default:
                    return "<i class='badge bg-dark'>None</i>";
                        break;
                }
            })
            ->addColumn('status', function($query){
                if($query->status == 1){
                    $button = '<div class="form-check form-switch">
                                <input class="form-check-input change-status" checked type="checkbox" data-id="'.$query->id.'" id="flexSwitchCheckDefault" style="height:20px;width:50px;">
                                </div>';
                }else{
                    $button = '<div class="form-check form-switch">
                            <input class="form-check-input change-status" type="checkbox" data-id="'.$query->id.'" id="flexSwitchCheckDefault" style="height:20px;width:50px;">
                            </div>';
                }
                return $button;
            })
            ->rawColumns(['image', 'type', 'status', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('vendorproduct-table')
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
            Column::make('id'),
            Column::make('image')
                ->width(150),
            Column::make('name'),
            Column::make('price'),
            Column::make('type')->width(150),
            Column::make('status'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(250)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'VendorProduct_' . date('YmdHis');
    }
}
