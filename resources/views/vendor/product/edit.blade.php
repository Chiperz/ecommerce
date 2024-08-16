@extends('vendor.layouts.master')

@section('content')
  <!--=============================
    DASHBOARD START
  ==============================-->
  <section id="wsus__dashboard">
    <div class="container-fluid">
      @include('vendor.layouts.sidebar')

      <div class="row">
        <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
          <div class="dashboard_content mt-2 mt-md-0">
            <h3><i class="far fa-user"></i> Create Products</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">

                <form action="{{ route('vendor.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label style="margin-bottom: 5px;">Preview</label>
                        <br>
                        <img src="{{ asset($product->thumb_image) }}" style="width:200px;margin-bottom: 5px;" alt="">
                    </div>

                    <div class="form-group">
                        <label style="margin-bottom: 5px;">Image</label>
                        <input type="file" class="form-control" name="image" style="margin-bottom: 5px;">
                    </div>

                    <div class="form-group">
                        <label style="margin-bottom: 5px;">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $product->name }}" style="margin-bottom: 5px;">
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputState" style="margin-bottom: 5px;">Category</label>
                                <select id="inputState" class="form-control main-category" name="category" style="margin-bottom: 5px;">
                                  <option value="">-- Select Category --</option>
                                  @foreach ($categories as $category)
                                      <option {{ $category->id == $product->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                  @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputState" style="margin-bottom: 5px;">Sub Category</label>
                                <select id="inputState" class="form-control sub-category" name="sub_category" style="margin-bottom: 5px;">
                                    <option value="">-- Select Sub Category --</option>
                                    @foreach ($subCategories as $subCategory)
                                        <option {{ $subCategory->id == $product->sub_category_id ? 'selected' : '' }} value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputState" style="margin-bottom: 5px;">Child Category</label>
                                <select id="inputState" class="form-control child-category" name="child_category" style="margin-bottom: 5px;">
                                    <option value="">-- Select Child Category --</option>
                                    @foreach ($childCategories as $childCategory)
                                        <option {{ $childCategory->id == $product->child_category_id ? 'selected' : '' }} value="{{ $childCategory->id }}">{{ $childCategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="inputState" style="margin-bottom: 5px;">Brand</label>
                      <select id="inputState" class="form-control" name="brand" style="margin-bottom: 5px;">
                        <option value="">-- Select Brand --</option>
                        @foreach ($brands as $brand)
                          <option {{ $brand->id == $product->brand_id ? 'selected' : '' }} value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label style="margin-bottom: 5px;">SKU</label>
                      <input type="text" class="form-control" name="sku" value="{{ $product->sku }}" style="margin-bottom: 5px;">
                    </div>

                    <div class="form-group">
                      <label style="margin-bottom: 5px;">Price</label>
                      <input type="text" class="form-control" name="price" value="{{ $product->price }}" style="margin-bottom: 5px;">
                    </div>

                    <div class="form-group">
                      <label style="margin-bottom: 5px;">Offer Price</label>
                      <input type="text" class="form-control" name="offer_price" value="{{ $product->offer_price }}" style="margin-bottom: 5px;">
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label style="margin-bottom: 5px;">Offer Start Date</label>
                          <input type="text" class="form-control datepicker" name="offer_start_date" value="{{ $product->offer_start_date }}" style="margin-bottom: 5px;">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label style="margin-bottom: 5px;">Offer End Date</label>
                          <input type="text" class="form-control datepicker" name="offer_end_date" value="{{ $product->offer_end_date }}" style="margin-bottom: 5px;">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                    <label style="margin-bottom: 5px;">Stock Qty</label>
                      <input type="number" min="0" class="form-control" name="qty" value="{{ $product->qty }}" style="margin-bottom: 5px;">
                    </div>

                    <div class="form-group">
                      <label style="margin-bottom: 5px;">Video Link</label>
                      <input type="text" class="form-control" name="video_link" value="{{ $product->video_link }}" style="margin-bottom: 5px;">
                    </div>

                    <div class="form-group">
                      <label style="margin-bottom: 5px;">Short Description</label>
                      <textarea name="short_description" class="form-control" style="margin-bottom: 5px;">{{ $product->short_description }}</textarea>
                    </div>

                    <div class="form-group">
                      <label style="margin-bottom: 5px;">Long Description</label>
                      <textarea name="long_description" class="form-control" style="margin-bottom: 5px;">{{ $product->long_description }}</textarea>
                    </div>

                    <div class="form-group">
                      <label for="inputState" style="margin-bottom: 5px;">Product Type</label>
                      <select id="inputState" class="form-control" name="product_type" style="margin-bottom: 5px;">
                        <option value="0">-- Select Product Type --</option>
                        <option {{ $product->product_type == 'new_arrival' ? 'selected' : '' }} value="new_arrival">New Arrival</option>
                        <option {{ $product->product_type == 'featured' ? 'selected' : '' }} value="featured">Featured</option>
                        <option {{ $product->product_type == 'top_product' ? 'selected' : '' }} value="top_product">Top Product</option>
                        <option {{ $product->product_type == 'best_product' ? 'selected' : '' }} value="best_product">Best Product</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label style="margin-bottom: 5px;">Seo Title</label>
                      <input type="text" class="form-control" name="seo_title" value="{{ $product->seo_title }}" style="margin-bottom: 5px;">
                    </div>

                    <div class="form-group">
                      <label style="margin-bottom: 5px;">Seo Description</label>
                      <textarea name="seo_description" class="form-control" style="margin-bottom: 5px;">{{ $product->seo_description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="inputState" style="margin-bottom: 5px;">Status</label>
                        <select id="inputState" class="form-control" name="status" style="margin-bottom: 5px;">
                          <option {{ $product->status == 1 ? 'selected' : '' }} value="1">Active</option>
                          <option {{ $product->status == 0 ? 'selected' : '' }} value="0">Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--=============================
    DASHBOARD START
  ==============================-->
@endsection

@push('scripts')
  <script>
    // GET SUB CATEGORIES
    $(document).ready(function(){
      $('body').on('change', '.main-category', function(e){
        $('.child-category').html('<option>-- Select Sub Category --</option>');
        let id = $(this).val();
        $.ajax({
          method: 'GET',
          url: '{{ route("vendor.product.get-subcategories") }}',
          data: {
            id: id
          },
          success: function(data){
            $('.sub-category').html('<option>-- Select Sub Category --</option>');
            $.each(data, function(i, item){
              $('.sub-category').append(`<option value='${item.id}'>${item.name}</option>`);
            })
          },
          error: function(xhr, status, error){
            console.log(error);
          }
        })
      })
    })

    // GET CHILD CATEGORIES
    $(document).ready(function(){
      $('body').on('change', '.sub-category', function(e){
        let id = $(this).val();
        $.ajax({
          method: 'GET',
          url: '{{ route("vendor.product.get-childcategories") }}',
          data: {
            id: id
          },
          success: function(data){
            $('.child-category').html('<option>-- Select Child Category --</option>');
            $.each(data, function(i, item){
              $('.child-category').append(`<option value='${item.id}'>${item.name}</option>`);
            })
          },
          error: function(xhr, status, error){
            console.log(error);
          }
        })
      })
    })
  </script>
@endpush