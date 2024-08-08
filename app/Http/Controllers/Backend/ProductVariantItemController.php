<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\ProductVariantItemDataTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductVariantItemController extends Controller
{
    public function index(ProductVariantItemDataTable $dataTable){
        return $dataTable->render('admin.product.product-variant-item.index');
    }
}
