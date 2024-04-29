@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Sub Category</h1>
    </div>

    <div class="section-body">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <h4>Edit Sub Category</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.sub-category.update', $subCategory->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                      <label for="inputState">Category</label>
                      <select id="inputState" class="form-control" name="category">
                        <option>--Select Category--</option>
                        @foreach ($categories as $category)
                          <option value="{{ $category->id }}" {{ $subCategory->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                        @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $subCategory->name }}">
                    </div>

                    <div class="form-group">
                        <label for="inputState">Status</label>
                        <select id="inputState" class="form-control" name="status">
                            <option value="1" {{ $subCategory->status == 1 ? 'selected' : ''}}>Active</option>
                            <option value="0" {{ $subCategory->status == 0 ? 'selected' : ''}}>Inactive</option>
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