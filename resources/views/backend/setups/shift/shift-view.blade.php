@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Section</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Section</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container fullbody">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Section List
          <a href="{{ route('setups.student.shift.add') }}" class="btn btn-success float-right btn-sm custom_btn"><i class="fa fa-plus-circle"> Add Section</i></a>
        </h3>
      </div>

      <div class="card-body">
        <table id="example1" class="table table-bordered">
          <thead>
          <tr>
            <th width="15%">SL</th>
            <th>Name in English</th>
            <th>Name in Bangla</th>
            <th width="15%">Action</th>
          </tr>
          </thead>
          <tbody>
          @foreach($sections as $key=>$shift)
            @php
              $assing_student_count = App\Model\AssignStudent::where('shift_id',$shift->id)->count();
            @endphp
            <tr class="text-center">
              <td>{{ $key + 1 }}</td>
              <td>{{ $shift->name }}</td>
              <td>{{ $shift->name_bn }}</td>
              <td>
                <a href="{{ route('setups.student.shift.edit',$shift->id) }}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></a>  
                @if($assing_student_count <1)   
                <a id="delete" href="{{ route('setups.student.shift.delete') }}" data-token="{{csrf_token()}}" data-id="{{$shift->id}}" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a>
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