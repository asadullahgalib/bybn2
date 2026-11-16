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

  <div class="col-md-12" style="padding-top: 40px;">
    <div class="card">
        @if(Auth::user()->user_category=='employee')
        <div class="card-body">
          <div class="row">
            <div class="col-md-8 col-xs-6">
              <table>
                <tr>
                  <td><strong style="font-size:25px">{{@$details->name}}</strong> </td>
                </tr>
                <tr>
                  <td>{{@$details->present_address}}</td>
                </tr>
                <tr>
                  <td><strong>Mobile No/Email :</strong> {{@$details->username}}</td>
                </tr>
                <tr>
                  <td><strong>Mobile No :</strong> {{@$details->mobile}}</td>
                </tr>
              </table>
            </div>
            <div class="col-md-4 col-xs-6">
              <div class="profile-sidebar">
              <div class="profile-userpic text-center">
                 <img src="{{(!empty(@$details->image))?url('public/upload/employee_images/'.@$details->image):url('public/upload/no_image.png')}}" class="img-responsive" alt="">
              </div>
            </div>
            </div>
            <div class="col-md-12">
              <a href="{{route('profiles.view')}}" class="btn btn-primary btn-sm {{(@$page_title=='statement')?'btn_active':''}}" title="Statement"> Details Info</a>
              <a href="{{route('profiles.official.details')}}" class="btn btn-primary btn-sm {{(@$page_title=='official')?'btn_active':''}}" title="Official"> Official Info</a>
              <a href="{{route('profiles.personal.details')}}" class="btn btn-primary btn-sm {{(@$page_title=='personal')?'btn_active':''}}" title="Personal"> Personal Info </a>
              <a href="{{route('profiles.education.details')}}" class="btn btn-primary btn-sm {{(@$page_title=='education')?'btn_active':''}}" title="Education"> Educational Info</a>
              <a href="{{route('profiles.contact.details')}}" class="btn btn-primary btn-sm {{(@$page_title=='contact')?'btn_active':''}}" title="Contact"> Contact Info</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <table style="width:100%;padding: 3px;">
                <tr>
                  <td colspan="2"><h6><strong style="text-decoration: underline;">Official Info :</strong></h6></td>
                </tr>
                <tr>
                  <td width="20%"><strong>Department</strong> </td>
                  <td>: {{ @$details['department']['name'] }}</td>
                </tr>
                <tr>
                  <td width="20%"><strong>Designation</strong> </td>
                  <td>: {{ @$details['designation']['name'] }}</td>
                </tr>
                <tr>
                  <td width="20%"><strong>Employee Type</strong> </td>
                  <td>: 
                      @if(@$details->employee_type=='1')
                      Teacher
                      @elseif(@$details->employee_type=='0')
                      Staff
                      @endif
                  </td>
                </tr>
                <!-- <tr>
                  <td width="20%"><strong>Join Date</strong> </td>
                  <td>: {{ date('d-m-Y',strtotime(@$details->join_date)) }}</td>
                </tr>
                <tr>
                  <td width="20%"><strong>Salary</strong> </td>
                  <td>: {{ @$details->salary }} Tk</td>
                </tr> -->
                <tr>
                  <td colspan="2"><h6><strong style="text-decoration: underline;">Personal Info :</strong></h6></td>
                </tr>
                <tr>
                  <td width="20%"><strong>Father's Name</strong> </td>
                  <td>: {{ @$user->fname }}</td>
                </tr>
                <tr>
                  <td width="20%"><strong>Mather's Name</strong> </td>
                  <td>: {{$details->mname}}</td>
                <tr>
                  <td width="20%"><strong>Date of Birth</strong> </td>
                  <td>: 
                    @if($details->dob !=null)
                    {{date('d-m-Y',strtotime(@$details->dob))}}
                    @endif
                  </td>
                </tr>
                </tr>
                <tr>
                  <td width="20%"><strong>Birth Place</strong> </td>
                  <td>: {{@$details->birth_place}}</td>
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
                <tr>
                  <td colspan="2"><h6><strong style="text-decoration: underline;">Contact Info :</strong></h6></td>
                </tr>
                <tr>
                  <td width="20%"><strong>Present Address</strong> </td>
                  <td>: {{@$details->present_address}}</td>
                </tr>
                <tr>
                  <td width="20%"><strong>Permanent Address</strong> </td>
                  <td>: {{@$details->permanent_address}}</td>
                </tr>
                <tr>
                  <td width="20%"><strong>Emergency Contact Person</strong> </td>
                  <td>: {{@$details->emergency_contact_name}}</td>
                </tr>
                <tr>
                  <td width="20%"><strong>Relation with Contact Person</strong> </td>
                  <td>: {{@$details->relation_with}}</td>
                </tr>
                <tr>
                  <td width="20%"><strong>Emergency Contact Person Mobile</strong> </td>
                  <td>: {{@$details->emergency_contact_no}}</td>
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
        @else
        <section class="col-md-6 offset-md-3">
          <div class="card-body box-profile">
              <div class="text-center">
                @if(Auth::user()->user_category=='Developer' || Auth::user()->user_category=='admin')
                <img class="profile-user-img img-fluid img-circle" src="{{(!empty($user->image))?url('public/upload/user_images/'.$user->image):url('public/upload/no_image.png')}}" alt="User profile picture">
                @endif
                @if(Auth::user()->user_category=='student')
                <img class="profile-user-img img-fluid img-circle" src="{{(!empty($user->image))?url('public/upload/student_images/'.$user->image):url('public/upload/no_image.png')}}" alt="User profile picture">
                @endif
              </div>

              <h3 class="profile-username text-center">{{$user->name}}</h3>

              <p class="text-muted text-center">{{$user->address}}</p>

              <table width="100%" class="table table-bordered table-sm">
                <tbody>
                  <tr>
                    <td>Mobile No</td>
                    <td>{{$user->mobile}}</td>
                  </tr>
                  @if(Auth::user()->user_category=='Developer' || Auth::user()->user_category=='admin')
                  <tr>
                    <td>Mobile No/Email</td>
                    <td>{{$user->username}}</td>
                  </tr>
                  @endif
                  @if(Auth::user()->user_category=='student')
                  <tr>
                    <td>Father's Name</td>
                    <td>{{$user->fname}}</td>
                  </tr>
                  <tr>
                    <td>Mother's Name</td>
                    <td>{{$user->mname}}</td>
                  </tr>
                  <tr>
                    <td>Religion</td>
                    <td>{{@$user['religion']['name']}}</td>
                  </tr>
                  @endif
                  <tr>
                    <td>Gender</td>
                    <td>{{$user->gender}}</td>
                  </tr>
                </tbody>
              </table>

              <a href="{{route('profiles.edit')}}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
          </div>
        </section>
        @endif
    </div>
  </div>

@endsection