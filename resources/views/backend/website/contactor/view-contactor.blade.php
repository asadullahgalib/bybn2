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
        <h3 class="card-title"> Contactor List</h3>
      </div>

      <div class="card-body">
        <div class="table table-responsive">
          <table id="example1" class="table table-bordered table-hover table-sm">
            <thead>
              <tr>
                <th width="6%">SL</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Subject</th>
                <th width="13%">Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach($allData as $key => $value)
                <tr class="text-center">
                  <td>{{$key+1}}</td>
                  <td>{{$value->name}}</td>
                  <td>{{$value->mobile}}</td>
                  <td>{{$value->email}}</td>
                  <td>{{$value->subject}}</td>
                  <td>
                    <a title="Details" class="btn btn-sm btn-primary" href="{{route('web-site.contactor.details',$value->id)}}"><i class="fa fa-eye"></i></a> 
                    <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('web-site.contactor.delete')}}" data-token="{{csrf_token()}}" data-id="{{$value->id}}"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
               @endforeach
            </tbody>
          </table>
        </div>
      </div><!-- /.card-body -->

    </div>
  </div>
</div>

@endsection