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
        <h3>Contact List
          @if($countContact<1)
          <a class="btn btn-success float-right btn-sm custom_btn" href="{{route('site-setting.contents.contact.add')}}"><i class="fa fa-plus-circle"></i> Add Contact</a>
          @endif
        </h3>
      </div>

      <div class="card-body">
        <table id="example1" class="table table-bordered table-hover table-responsive">
          <thead>
            <tr>
              <th>SL.</th>
              <th>Address</th>
              <th>Mobile No</th>
              <th>Email</th>
              <th>Facebook</th>
              <th>Twitter</th>
              <th>Instagram</th>
              <th>Linkedin</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($allData as $key => $contact)
            <tr class="text-center">
              <td>{{$key+1}}</td>
              <td>{{$contact->address}}</td>
              <td>{{$contact->mobile_no}}</td>
              <td>{{$contact->email}}</td>
              <td>{{$contact->facebook}}</td>
              <td>{{$contact->twitter}}</td>
              <td>{{$contact->instagram}}</td>
              <td>{{$contact->linkedin}}</td>
              <td>
                <a title="Edit" class="btn btn-sm btn-primary" href="{{route('site-setting.contents.contact.edit',$contact->id)}}"><i class="fa fa-edit"></i></a>
                <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('site-setting.contents.contact.delete')}}" data-token="{{csrf_token()}}" data-id="{{$contact->id}}"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div><!-- /.card-body -->

    </div>
  </div>
</div>

@endsection