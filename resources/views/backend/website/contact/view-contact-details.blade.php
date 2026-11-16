@extends('backend.layouts.master')
@section('content')
<!-- <div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Contact Us</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Contact Us</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div> -->
<div class="col-md-12" style="padding-top: 40px;">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title"> Contact Details List
        <a class="btn btn-success float-right btn-sm custom_btn" href="{{route('web-site.contact.details.add')}}"><i class="fa fa-plus-circle"></i>Add Contact Details Us</a>
     </h3>
    </div>

    <div class="card-body">

        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Branch</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Office Day</th>
                <th>Office Time</th>
                <th>WhatsApp</th>
                <th width="12%">Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach($allData as $key => $value)
                <tr class="text-center">
                  <td> {{$value->branch}}</td>
                  <td> {{$value->address}}</td>
                  <td> {{$value->mobile}}</td>
                  <td> {{$value->email}}</td>
                  <td> {{$value->office_day}}</td>
                  <td> {{$value->office_time}}</td>
                  <td> {{$value->whatsapp}}</td>
                  <td>
                    <a title="Edit" class="btn btn-sm btn-primary" href="{{route('web-site.contact.details.edit',$value->id)}}"><i class="fa fa-edit"></i></a> 

                    <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('web-site.contact.details.delete')}}" data-token="{{csrf_token()}}" data-id="{{$value->id}}"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
               @endforeach
            </tbody>
          </table>
        </div>
      
       
      </div><!-- /.card-body -->
    </div>
    <!-- /.card -->

  </div>
</div>

@endsection