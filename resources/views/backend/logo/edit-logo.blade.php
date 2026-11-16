@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Logo</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Logo</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container fullbody">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3>Edit Logo
          <a class="btn btn-success float-right btn-sm custom_btn" href="{{route('site-setting.contents.logo.view')}}"><i class="fa fa-list"></i> Logo List</a>
        </h3>
      </div>

      <div class="card-body">
        <form method="post" action="{{route('site-setting.contents.logo.update',$editData->id)}}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="image">Image <span style="color: red;">(Size:301px X 107px)</span></label>
              <input type="file" name="image" class="form-control" id="image">
            </div>
            <div class="form-group col-md-2">
              <img id="showImage" src="{{(!empty($editData->image))?url('public/upload/logo_images/'.$editData->image):url('public/upload/no_image.png')}}" style="width: 150px;height: 160px;border:1px solid #000;">
            </div>
            <div class="form-group col-md-6" style="padding-top: 30px;">
              <input type="submit" value="Update" class="btn btn-primary">
            </div>
          </div>
        </form>
      </div><!-- /.card-body -->

    </div>
  </div>
</div>

@endsection