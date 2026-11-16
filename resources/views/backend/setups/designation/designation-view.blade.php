@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Designation</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Designation</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container fullbody">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Designation List
          <a href="{{ route('human-resource.hrm.designation.add') }}" class="btn btn-success float-right btn-sm custom_btn"><i class="fa fa-plus-circle"> Add Designation</i></a>
        </h3>
      </div>

      <div class="card-body">
        <table id="example1" class="table table-bordered">
          <thead>
          <tr>
            <th width="8%">SL</th>
            <th>Designation Name</th>
            <th width="14%">Action</th>
          </tr>
          </thead>
          <tbody>
          @foreach($designations as $key=>$designation)
            @php
              $designation_user = App\User::where('designation_id',$designation->id)->count();
              $salary_user = App\Model\EmployeeSalaryLog::where('designation_id',$designation->id)->count();
            @endphp
            <tr class="text-center">
              <td>{{ $key + 1 }}</td>
              <td>{{ $designation->name }}</td>
              <td>
                <a href="{{ route('human-resource.hrm.designation.edit',$designation->id) }}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                @if($designation_user <1 && $salary_user <1) 
                <a id="delete" href="{{ route('human-resource.hrm.designation.delete') }}" data-token="{{csrf_token()}}" data-id="{{$designation->id}}" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a>
                @endif                    
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