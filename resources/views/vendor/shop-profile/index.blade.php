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
            <h3><i class="far fa-user"></i> shop profile</h3>
            <div class="wsus__dashboard_profile">
              <div class="wsus__dash_pro_area">
                <form action="{{ route('vendor.shop-profile.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label style="margin-bottom: 5px;">Preview</label><br>
                        <img src="{{ asset($profile->banner) }}" alt="" width="200px" style="margin-bottom: 5px;">
                    </div>

                    <div class="form-group">
                        <label style="margin-bottom: 5px;">Banner</label>
                        <input type="file" class="form-control" name="banner" style="margin-bottom: 5px;">
                    </div>

                    <div class="form-group">
                        <label style="margin-bottom: 5px;">Shop Name</label>
                        <input type="text" class="form-control" name="shop_name" value="{{ $profile->shop_name }}" style="margin-bottom: 5px;">
                    </div>

                    <div class="form-group">
                        <label style="margin-bottom: 5px;">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{ $profile->phone }}" style="margin-bottom: 5px;">
                    </div>

                    <div class="form-group">
                        <label style="margin-bottom: 5px;">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $profile->email }}" style="margin-bottom: 5px;">
                    </div>

                    <div class="form-group">
                        <label style="margin-bottom: 5px;">Address</label>
                        <textarea name="address" class="form-control" style="margin-bottom: 5px;">{{ $profile->address }}</textarea>
                    </div>

                    <div class="form-group">
                        <label style="margin-bottom: 5px;">Description</label>
                        <textarea name="description" class="form-control" style="margin-bottom: 5px;">{{ $profile->description }}</textarea>
                    </div>

                    <div class="form-group">
                        <label style="margin-bottom: 5px;">Facebook</label>
                        <input type="text" class="form-control" name="fb_link" value="{{ $profile->fb_link }}" style="margin-bottom: 5px;">
                    </div>

                    <div class="form-group">
                        <label style="margin-bottom: 5px;">Twitter</label>
                        <input type="text" class="form-control" name="tw_link" value="{{ $profile->tw_link }}" style="margin-bottom: 5px;">
                    </div>
                    
                    <div class="form-group">
                        <label style="margin-bottom: 5px;">Instagram</label>
                        <input type="text" class="form-control" name="ig_link" value="{{ $profile->ig_link }}" style="margin-bottom: 5px;">
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