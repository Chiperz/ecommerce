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
            <h3><i class="far fa-images"></i> Product Image Gallery</h3>
            <div style="text-align: left; margin-bottom:10px">
                <a href="{{ route('vendor.product.index') }}" class="btn btn-warning"><i class="fas fa-arrow-left"></i>&nbsp;Back</a>
            </div>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">

                {{-- {{ $dataTable->table() }} --}}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Product {{ $product->name }}</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('vendor.product-image-gallery.store') }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Image <code>(Multiple Image Supported!)</code></label>
                                        <input type="file" class="form-control mt-2" name="image[]" multiple>
                                        <input type="hidden" name="product" value="{{ $product->id }}">
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-2">Upload</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="row mt-2">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Image</h4>
                            </div>
                            <div class="card-body">
                            {{ $dataTable->table() }}
                            </div>
                        </div>
                    </div>
                </div>

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
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
      $(document).ready(function(){
        $('body').on('click', '.change-status', function(){
          let isChecked = $(this).is(':checked');
          let id = $(this).data('id');
          
          $.ajax({
            url: "{{ route('admin.product.change-status') }}",
            method: 'PUT',
            data: {
              status: isChecked,
              id: id
            },
            success: function(data){
              toastr.success(data.message);
            },
            error: function(xhr, status, error){
              console.log(error);
            }
          })
        })
      })
    </script>
@endpush