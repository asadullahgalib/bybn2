@extends('backend.layouts.master')
@section('content')
<style type="text/css">
  .profile-userpic img {
    float: none;
    margin: 0 auto;
    width: 120px;
    height: 130px;
    background-color: #ddd;
    padding: 3px;
  }
</style>
<style type="text/css">
  .btn_active{
    background: #F70F9E;
    color: #fff;
    text-decoration: underline !important;
  }
</style>
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
        <h3 class="card-title">
            Teacher Details Info
            <a href="{{ route('teachers.view') }}" class="btn btn-success float-right btn-sm custom_btn"><i class="fa fa-list"> Teacher List</i></a>
        </h3>
      </div>

      <div class="card-body">
        <div class="row">
          <div class="col-md-8 col-xs-6">
            <table>
              <tr>
                <td><strong style="font-size:25px">{{@$details->name}}</strong> </td>
              </tr>
              <tr>
                <td>{{@$details->address}}</td>
              </tr>
              <tr>
                <td><strong>Mobile No :</strong> {{@$details->mobile}}</td>
              </tr>
              <tr>
                <td><strong>Email :</strong> {{@$details->email}}</td>
              </tr>
            </table>
          </div>
          <div class="col-md-12">
            <a href="{{route('teachers.education',@$details->id)}}" class="btn btn-primary btn-sm {{(@$page_title=='education')?'btn_active':''}}" title="Education"> Educational Info</a>
          </div>
        </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <table style="width:100%;padding: 3px;">
            <tr>
              <td colspan="2"><h6><strong style="text-decoration: underline;">Details Info :</strong></h6></td>
            </tr>
            <tr>
              <td width="20%"><strong>Class</strong> </td>
              <td>: {{@$details['group']['name']}}</td>
            </tr>
            <tr>
              <td width="20%"><strong>Designation</strong> </td>
              <td>: {{ @$details->designation }}</td>
            </tr>
            <tr>
              <td width="20%"><strong>School Name</strong> </td>
              <td>: {{ @$details->school_name }}</td>
            </tr>
            <tr>
              <td width="20%"><strong>Father's Name</strong> </td>
              <td>: {{ @$details->fname }}</td>
            </tr>
            <tr>
              <td width="20%"><strong>Mather's Name</strong> </td>
              <td>: {{$details->mname}}</td>
            </tr>
            <tr>
              <td width="20%"><strong>Date of Birth</strong> </td>
              <td>: {{date('d-m-Y',strtotime(@$details->dob))}}</td>
            </tr>
            <tr>
              <td width="20%"><strong>Gender</strong> </td>
              <td>: {{@$details->gender}}</td>
            </tr>
            <tr>
              <td width="20%"><strong>Religion</strong> </td>
              <td>: {{@$details['religion']['name']}}</td>
            </tr>
            <tr>
              <td width="20%"><strong>Nationality</strong> </td>
              <td>: {{@$details->nationality}}</td>
            </tr>
            <tr>
              <td width="20%"><strong>NID No</strong> </td>
              <td>: {{@$details->nid_no}}</td>
            </tr>
            <tr>
              <td width="20%"><strong>Blood Group</strong> </td>
              <td>: {{@$details->blood_group}}</td>
            </tr>
            <tr>
              <td width="20%"><strong>Marrital Status</strong> </td>
              <td>: {{@$details->marital_status}}</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <td colspan="5"><h6><strong style="text-decoration: underline;">Educational Info :</strong></h6></td>
          <table class="table table-bordered table-striped dt-responsive table-sm" style="width: 100%">
            <thead>
              <tr>
                <th>Exam Name</th>
                <th>Subject</th>
                <th>Institute</th>
                <th>Result</th>
                <th>Passing Year</th>
              </tr>
            </thead>
            <tbody>
              @foreach($educations as $edu)
                <tr>
                  <td>{{$edu->exam_name}}</td>
                  <td>{{$edu->subject}}</td>
                  <td>{{$edu->institute_name}}</td>
                  <td>{{$edu->result}}</td>
                  <td>{{$edu->passing_year}}</td>
                </tr>
              @endforeach   
            </tbody>
          </table>
        </div>
      </div>
    </div>

    </div>
  </div>
</div>

@endsection