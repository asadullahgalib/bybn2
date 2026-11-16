@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Assign Subject</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Assign Subject</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container fullbody">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Assign Subject List
          <a href="{{ route('setups.assign.subject.add') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-plus-circle"> Add Assign Subject</i></a>
        </h3>
      </div>

      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th width="12%">SL</th>
            <th>Year</th>
            <th>Class</th>
            <th width="12%">Action</th>
          </tr>
          </thead>
          <tbody>
          @foreach($assignSubjects as $key=>$value)
            <tr class="text-center">
              <td>{{ $key + 1 }}</td>
              <td>{{ @$value['year']['name'] }}</td>
              <td>{{ @$value['student_class']['name'] }}</td>
              <td>
                <a href="{{route('setups.assign.subject.edit',$value->random_group)}}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                <a href="{{ route('setups.assign.subject.details',$value->random_group) }}" class="btn btn-primary btn-sm" title="Details"><i class="fa fa-eye"></i></a>
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