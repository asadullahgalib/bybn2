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
        <h3 class="card-title"> Contact Us Details Information
        <a class="btn btn-success float-right btn-sm custom_btn" href="{{route('web-site.contact.view')}}"><i class="fa fa-list"></i> Contact Us List</a>
        </h3>
      </div>

      <div class="card-body">

          <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tbody>
                <tr>
                  <td>Institute Logo</td>
                  <td><img src="{{asset('public/upload/contact_images/'.$details->image)}}" width="100px"></td>
                </tr>
                <tr>
                  <td>Institute Name</td>
                  <td>{{$details->name_bn}}</td>
                </tr>
                <tr>
                  <td>Phone</td>
                  <td>{{$details->phone}}</td>
                </tr>
                <tr>
                  <td>Address</td>
                  <td>{{$details->address_en}}</td>
                </tr>
                <tr>
                  <td>Ext</td>
                  <td>{{$details->ext}}</td>
                </tr>
                <tr>
                  <td>Post Office in Bangla</td>
                  <td>{{$details->post_office_en}}</td>
                </tr>
                <tr>
                  <td>Post Office in English</td>
                  <td>{{$details->post_office_bn}}</td>
                </tr>
                <tr>
                  <td>Upazila in Bangla</td>
                  <td>{{$details->upazila_en}}</td>
                </tr>
                <tr>
                  <td>Upazila in English</td>
                  <td>{{$details->upazila_bn}}</td>
                </tr>
                <tr>
                  <td>District in Bangla</td>
                  <td>{{$details->district_en}}</td>
                </tr>
                <tr>
                  <td>District in English</td>
                  <td>{{$details->district_bn}}</td>
                </tr>
                <tr>
                  <td>Facebook</td>
                  <td>{{$details->facebook}}</td>
                </tr>
                <tr>
                  <td>Youtube</td>
                  <td>{{$details->youtube}}</td>
                </tr>
                <tr>
                  <td>Authorized in English</td>
                  <td>{{$details->authorized}}</td>
                </tr>
                <tr>
                  <td>Authorized in Bangla</td>
                  <td>{{$details->authorized_bn}}</td>
                </tr>
                <tr>
                  <td>Authorized Signature</td>
                  <td><img src="{{(!empty($details->signature))?url('public/upload/signature_images/'.$details->signature):url('public/upload/no_image.png')}}" style="width: 100px;height: 80px;border:1px solid #000;"></td>
                </tr>
            </tbody>
          </table>
               
        </div><!-- /.card-body -->

    </div>
  </div>
</div>

@endsection