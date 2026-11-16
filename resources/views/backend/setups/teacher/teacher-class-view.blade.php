@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Tacher Class</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Tacher Class</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container fullbody">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Tacher Class List
          <a href="{{ route('teachers.class.add') }}" class="btn btn-success float-right btn-sm custom_btn"><i class="fa fa-plus-circle"> Add Teacher Class</i></a>
        </h3>
      </div>

      <div class="card-body">
        <table id="example1" class="table table-bordered">
          <thead>
          <tr>
            <th width="8%">SL</th>
            <th>Class Name</th>
            <th width="14%">Action</th>
          </tr>
          </thead>
          <tbody>
          @foreach($allData as $key=>$value)
            @php
              $countTeacher = App\Model\Teacher::where('teacher_class_id',$value->id)->count();
            @endphp
            <tr class="text-center">
              <td>{{ $key + 1 }}</td>
              <td>{{ $value->name }}</td>
              <td>
                <a href="{{ route('teachers.class.edit',$value->id) }}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></a>  
                @if($countTeacher <1)
                <a title="Delete" href="{{ !empty($value->id) ? route('teachers.class.delete') : ''}}" id="delete" class="btn btn-danger btn-sm deleteBtn"  data-token="{{ csrf_token() }}" data-id="{{ $value->id }}"><i class="fa fa-trash"></i>
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