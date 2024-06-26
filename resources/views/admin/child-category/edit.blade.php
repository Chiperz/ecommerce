@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Child Category</h1>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <h4>Edit Child Category</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.child-category.update', $childCategory->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                      <label for="inputState">Category</label>
                      <select id="inputState" class="form-control main-category" name="category">
                        <option>--Select Category--</option>
                        @foreach ($categories as $category)
                          <option value="{{ $category->id }}" {{ $childCategory->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="inputState">Sub Category</label>
                      <select id="inputState" class="form-control sub-category" name="sub_category">
                        <option>--Select Sub Category--</option>
                        @foreach($subCategories as $subCategory)
                          <option value="{{ $subCategory->id }}" {{ $childCategory->sub_category_id == $subCategory->id ? 'selected' : '' }}>{{ $subCategory->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $childCategory->name }}">
                    </div>

                    <div class="form-group">
                        <label for="inputState">Status</label>
                        <select id="inputState" class="form-control" name="status">
                          <option value="1" {{ $childCategory->status == 1 ? 'selected' : ''}}>Active</option>
                            <option value="0" {{ $childCategory->status == 0 ? 'selected' : ''}}>Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection

@push('scripts')
  <script>
    $(document).ready(function(){
      $('body').on('change', '.main-category', function(e){
        let id = $(this).val();
        $.ajax({
          method: 'GET',
          url: '{{ route("admin.get-subcategories") }}',
          data: {
            id: id
          },
          success: function(data){
            $('.sub-category').html('<option>--Select Sub Category--</option>');
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
  </script>
@endpush