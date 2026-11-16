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
            <form method="post" action="{{route('profiles.details.educational')}}">
                @csrf
                <input type="hidden" name="employee_id" id="employee_id" value="{{@$details->id}}">
                <div class="form-group">
                  <table class="table-bordered text-center" width="100%">
                    <thead>
                      <tr>
                        <th>Exam Name</th>
                        <th>Subject</th>
                        <th>Institute</th>
                        <th width="10%">Result</th>
                        <th width="10%">Passing Year</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="addRow">
                      @if(count($educations)>0)
                      @foreach(@$educations as $education)
                      <tr>
                        <td>
                          <input type="text" name="exam_name[]" class="form-control form-control-sm" value="{{$education->exam_name}}" placeholder="Exam Name">
                        </td>
                        <td>
                          <input type="text" name="subject[]" class="form-control form-control-sm" value="{{$education->subject}}" placeholder="Subject">
                        </td>
                        <td>
                          <input type="text" name="institute_name[]" class="form-control form-control-sm" value="{{$education->institute_name}}" placeholder="Institute Name">
                        </td>
                        <td>
                          <input type="text" name="result[]" class="form-control form-control-sm" value="{{$education->result}}" placeholder="GPA">
                        </td>
                        <td>
                          <input type="text" name="passing_year[]" class="form-control form-control-sm" value="{{$education->passing_year}}" placeholder="Passing Year">
                        </td>
                        <td>
                          <a class="btn btn-sm btn-facebook add_more" id="add_more" title="Add More Field"><i class="fa fa-plus"></i></a>
                          <a class="btn btn-sm btn-danger delete_row" title="Delete Row"><i class="fa fa-minus"></i></a>
                        </td>
                      </tr>
                      @endforeach
                      @else
                      <tr>
                        <td>
                          <input type="text" name="exam_name[]" class="form-control form-control-sm" placeholder="Exam Name">
                        </td>
                        <td>
                          <input type="text" name="subject[]" class="form-control form-control-sm" placeholder="Subject">
                        </td>
                        <td>
                          <input type="text" name="institute_name[]" class="form-control form-control-sm" placeholder="Institute Name">
                        </td>
                        <td>
                          <input type="text" name="result[]" class="form-control form-control-sm" placeholder="GPA">
                        </td>
                        <td>
                          <input type="text" name="passing_year[]" class="form-control form-control-sm" placeholder="Passing Year">
                        </td>
                        <td><a class="btn btn-sm btn-facebook add_more" id="add_more" title="Add More Field"><i class="fa fa-plus"></i></a></td>
                      </tr>
                      @endif
                    </tbody>
                  </table>
                </div>
                <button type="submit" class="btn btn-success btn-sm" id="storeButton">Update Information</button>
              </form>
        </div>
    </div>
  </div>

<script id="education-template" type="text/x-handlebars-template">
  <tr>
    <td>
      <input type="text" name="exam_name[]" class="form-control form-control-sm" placeholder="Exam Name">
    </td>
    <td>
      <input type="text" name="subject[]" class="form-control form-control-sm" placeholder="Subject">
    </td>
    <td>
      <input type="text" name="institute_name[]" class="form-control form-control-sm" placeholder="Institute Name">
    </td>
    <td>
      <input type="text" name="result[]" class="form-control form-control-sm" placeholder="GPA">
    </td>
    <td>
      <input type="text" name="passing_year[]" class="form-control form-control-sm" placeholder="Passing Year">
    </td>
    <td><a class="btn btn-sm btn-danger delete_row" title="Delete Row"><i class="fa fa-minus"></i></a></td>
  </tr>
</script>

<script type="text/javascript">
  $(function(){ 
    $('.add_more').on('click',function(){
      var source   = $("#education-template").html();
      var template = Handlebars.compile(source);            
      $("#addRow").append(template());
    });

    //Delete Row in Education
    $(document).on('click','.delete_row',function(){      
      var row=$(this).closest("tr");      
      row.remove();       
    }); 
  });
</script>

@endsection