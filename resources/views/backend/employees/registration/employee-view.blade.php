@extends('backend.layouts.master')
@section('content')
  <div class="col-md-12" style="padding-top: 40px;">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Member List
          <a href="{{ route('human-resource.hrm.employee.registration.add') }}" class="btn btn-success float-right btn-sm custom_btn"><i class="fa fa-plus-circle"> Add Member</i></a>
        </h3>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-sm">
            <thead>
            <tr>
              <th width="8%">SL</th>
              <th>Image</th>
              <th>Name</th>
              <th>Designation</th> 
              <th>Email</th> 
              <th>Mobile</th> 
              <th>Sort</th>
              <th>Status</th>
              <th width="17%">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($allData as $key=> $value)
              <tr class="text-center">
                <td>{{ $key + 1 }}</td>
                <td>
                  <img src="{{(!empty($value->image))?url('public/upload/employee_images/'.$value->image):url('public/upload/no_image.png')}}" style="width: 60px;">
                </td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->designation }}</td> 
                <td>{{ $value->email }}</td> 
                <td>{{ $value->mobile }}</td> 
                <td>{{ $value->sort }}</td> 
                <td>
                  @if($value->status=='1')
                  <span style="background: #FF0099;color: #fff;padding: 5px;">Active</span>
                  @elseif($value->status=='0')
                  <span style="background: #FF0099;color: #fff;padding: 5px;">Inactive</span>
                  @endif
                </td>
                <td>
                  <a href="{{ route('human-resource.hrm.employee.registration.edit',$value->id) }}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></a>  
                  @if($value->status=='1')
                  <a class="btn btn-primary btn-sm" href="{{ !empty($value->id) ? route('human-resource.hrm.employee.inactive',$value->id) : '' }}"><i class="fa fa-thumbs-up"></i></a>
                  @elseif($value->status=='0')
                  <a class="btn btn-danger btn-sm" href="{{ !empty($value->id) ? route('human-resource.hrm.employee.active',$value->id) : '' }}"><i class="fa fa-thumbs-down"></i></a>
                  @endif
                  <a title="Delete" href="{{ !empty($value->id) ? route('human-resource.hrm.employee.registration.delete') : ''}}" id="delete" class="btn btn-danger btn-sm deleteBtn"  data-token="{{ csrf_token() }}" data-id="{{ $value->id }}"><i class="fa fa-trash"></i> </a>
                </td>
              </tr> 
            @endforeach               
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>

@endsection