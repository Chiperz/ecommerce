@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Brand</h1>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <h4>Update Brand</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Preview</label><br>
                        <img src="{{ asset($brand->logo) }}" alt="" width="200px">
                    </div>

                    <div class="form-group">
                        <label>Logo</label>
                        <input type="file" class="form-control" name="logo" >
                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $brand->name }}">
                    </div>

                    <div class="form-group">
                        <label for="inputState">is Featured</label>
                        <select id="inputState" class="form-control" name="is_featured">
                            <option value="">-- Select --</option>  
                            <option value="1" {{ $brand->is_featured == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ $brand->is_featured == 0 ? 'selected' : '' }}>No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="inputState">Status</label>
                        <select id="inputState" class="form-control" name="status">
                          <option value="1" {{ $brand->status == 1 ? 'selected' : '' }}>Active</option>
                          <option value="0" {{ $brand->status == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection