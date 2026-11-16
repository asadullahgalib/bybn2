@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Teacher</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Teacher</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container fullbody">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Teacher List
          <a href="{{ route('teachers.add') }}" class="btn btn-success float-right btn-sm custom_btn"><i class="fa fa-plus-circle"> Add Teacher</i></a>
        </h3>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table id="example1" class="table table-borderedd">
            <thead>
            <tr>
              <th width="8%">SL</th>
              <th>Name</th>
              <th>Mobile</th>  
              <th>Class</th>  
              <th>School Name</th>
              <th>Designation</th>
              <th>Address</th>
              <th>Gender</th>
              <th width="14%">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($allData as $key=>$value)
              <tr class="text-center">
                <td>{{ $key + 1 }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->mobile }}</td> 
                <td>{{ @$value['group']['name'] }}</td> 
                <td>{{ $value->school_name }}</td>
                <td>{{ $value->designation }}</td>
                <td>{{ $value->address }}</td>
                <td>{{ $value->gender }}</td>
                <td>
                  <a href="{{ route('teachers.edit',$value->id) }}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></a>  
                     
                  <a href="{{ route('teachers.details',$value->id) }}" class="btn btn-success btn-sm" title="Details"><i class="fa fa-eye"></i></a>

                  <a title="Delete" href="{{ !empty($value->id) ? route('teachers.delete') : ''}}" id="delete" class="btn btn-danger btn-sm deleteBtn"  data-token="{{ csrf_token() }}" data-id="{{ $value->id }}"><i class="fa fa-trash"></i>
                                       
                </td>
              </tr> 
            @endforeach               
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection