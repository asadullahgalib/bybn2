@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Contactor</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Contactor</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container fullbody">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          Contactor Details Info
          <a class="btn btn-success float-right btn-sm" href="{{route('web-site.contactor.view')}}"><i class="fa fa-list"></i> Contactor List</a>
         </h3>
      </div>

      <div class="card-body">
        <table class="table table-bordered table-hover">
          <tbody>
            <tr>
              <td>Name</td>
              <td>{{$detail->name}}</td>
            </tr>
            <tr>
              <td>Mobile No</td>
              <td>{{$detail->mobile}}</td>
            </tr>
            <tr>
              <td>Email</td>
              <td>{{$detail->email}}</td>
            </tr>
            <tr>
              <td>Subject</td>
              <td>{{$detail->subject}}</td>
            </tr>
            <tr>
              <td>Message</td>
              <td>{{$detail->msg}}</td>
            </tr>
          </tbody>
        </table>
      </div><!-- /.card-body -->

    </div>
  </div>
</div>

@endsection