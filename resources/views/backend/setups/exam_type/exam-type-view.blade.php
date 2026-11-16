@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Exam Type</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Exam Type</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container fullbody">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Exam Type List
          <!-- <a href="{{ route('setups.exam.type.add') }}" class="btn btn-success float-right btn-sm custom_btn"><i class="fa fa-plus-circle"> Add Exam Type</i></a> -->
        </h3>
      </div>

      <div class="card-body">
        <table id="example1" class="table table-bordered">
          <thead>
          <tr>
            <th width="12%">SL</th>
            <th>Exam Name in English</th>
            <th>Exam Name in Bangla</th>
            <th width="13%">Action</th>
          </tr>
          </thead>
          <tbody>
            @foreach($examTypes as $key=> $value)
            @php
              $exam_count = App\Model\StudentMarks::where('exam_type_id',$value->id)->count();
            @endphp
            <tr class="text-center">
              <td>{{ $key + 1 }}</td>
              <td>{{ $value->name }}</td>
              <td>{{ $value->name_bn }}</td>
              <td>
                <a href="{{ route('setups.exam.type.edit',$value->id) }}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                <!-- @if($exam_count < 1)
                <a title="Delete" href="{{ !empty($value->id) ? route('setups.exam.type.delete') : ''}}" id="delete" class="btn btn-danger btn-sm deleteBtn"  data-token="{{ csrf_token() }}" data-id="{{ $value->id }}"><i class="fa fa-trash"></i>
                @endif -->
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