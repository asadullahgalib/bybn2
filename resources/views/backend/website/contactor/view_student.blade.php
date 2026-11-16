@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Applicant Student</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Applicant</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container fullbody">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">  Applicant Student List</h3>
      </div>

      <div class="card-body">
        <div class="table table-responsive">
          <table id="example1" class="table table-bordered table-hover table-sm">
            <thead>
              <tr>
                <th width="6%">SL</th>
                <th>Image</th>
                <th>Name</th>
                <th>Mobile No</th>
                <th>Class</th>
                <th>Gender</th>
                <th>Status</th>
                <th width="15%">Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach($allData as $key => $value)
                <tr class="text-center">
                  <td>{{$key+1}}</td>
                  <td>
                    <img src="{{(!empty(@$value['student']['image']))?url('public/upload/student_images/'.@$value['student']['image']):url('public/upload/no_image.png')}}" style="width:80px;border: 2px solid grey;">
                  </td>
                  <td>{{ @$value['student']['name_en'] }}</td>
                  <td>{{ @$value['student']['father_mobile'] }}</td>
                  <td>{{ @$value['student_class']['name'] }}</td>
                  <td>{{ @$value['student']['gender'] }}</td>
                  <td>
                    @if($value->status=='2')
                    Pending
                    @else
                    Approved
                    @endif
                  </td>
                  <td>
                    <a title="Verify" class="btn btn-sm btn-success" href="{{route('web-site.student.verify',$value->id)}}"><i class="fa fa-check"></i></a>
                    <a target="_blank" title="Print" class="btn btn-sm btn-primary" href="{{route('web-site.student.details',$value->id)}}"><i class="fa fa-print"></i></a> 
                    <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('web-site.student.delete')}}" data-token="{{csrf_token()}}" data-id="{{$value->id}}"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
               @endforeach
            </tbody>
          </table>
        </div>
      </div><!-- /.card-body -->

    </div>
  </div>
</div>

@endsection