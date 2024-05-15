<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use App\Models\Product;

use App\Traits\ImageUploadTrait;

use App\Datatables\ProductDataTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(ProductDataTable $dataTable)
    {
        return $dataTable->render('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // GET ALL SUB CATEGORY
    public function getSubCategories(Request $request){
        $subCategories = SubCategory::where('category_id', $request->id)->get();
        return $subCategories;
    }

    // GET ALL CHILD CATEGORY
    public function getChildCategories(Request $request){
        $childCategories = ChildCategory::where('sub_category_id', $request->id)->get();
        return $childCategories;
    }
}