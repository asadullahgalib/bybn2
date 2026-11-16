@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Employee Assign Subject</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Assign Subject</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>

<div class="container fullbody">
  <div class="col-md-12">

    <div class="card card_all">
      <div class="card-header">
        <h3 class="card-title">Employee Assign Subject Details Info
          <a href="{{ route('setups.employee.subject.view') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"> Employee Assign Subject List</i></a>
        </h3>
      </div>

      <div class="card-body">
        <table class="table table-bordered table-striped table-sm table-sm">
          <thead>
          <tr>
            <th>SL</th>
            <th>Year</th>
            <th>Class</th>
            <th>Subject Name</th>
          </tr>
          </thead>
          <tbody>
          @foreach($assignSubjects as $key=> $value)
            <tr class="text-center">
              <td>{{ $key + 1 }}</td>
              <td>{{ @$value['year']['name'] }}</td>
              <td>{{ @$value['student_class']['name'] }}</td>
              <td>{{ @$value['subject']['name'] }}</td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

@endsection
