@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Contact Us</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Contact Us</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container fullbody">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3>Add Contact
          <a class="btn btn-success float-right btn-sm custom_btn" href="{{route('site-setting.contents.contact.view')}}"><i class="fa fa-list"></i> Contact List</a>
        </h3>
      </div>

      <div class="card-body">
        <form method="post" action="{{route('site-setting.contents.contact.store')}}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="address">Address</label>
              <input type="text" name="address" class="form-control">
            </div>
            <div class="form-group col-md-4">
              <label for="mobile_no">Mobile</label>
              <input type="text" name="mobile_no" class="form-control">
            </div>
            <div class="form-group col-md-4">
              <label for="email">Email</label>
              <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group col-md-4">
              <label for="facebook">Facebook</label>
              <input type="text" name="facebook" class="form-control">
            </div>
            <div class="form-group col-md-4">
              <label for="twitter">Twitter</label>
              <input type="text" name="twitter" class="form-control">
            </div>
            <div class="form-group col-md-4">
              <label for="instagram">Instagram</label>
              <input type="text" name="instagram" class="form-control">
            </div>
            <div class="form-group col-md-4">
              <label for="linkedin">Linkedin</label>
              <input type="text" name="linkedin" class="form-control">
            </div>
            <div class="form-group col-md-6" style="padding-top: 30px;">
              <input type="submit" value="Submit" class="btn btn-primary">
            </div>
          </div>
        </form>
      </div><!-- /.card-body -->

    </div>
  </div>
</div>

@endsection