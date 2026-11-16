@extends('backend.layouts.master')
@section('content')
  <div class="col-md-12" style="padding-top:40px">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          @if(isset($editData))
            Update Volunteer
          @else
            Add Volunteer
          @endif
          <a href="{{ route('web-site.volunteer.view') }}" class="btn btn-success float-right btn-sm custom_btn"><i class="fa fa-list"> Volunteer List</i></a>
        </h3>
      </div>

      <form role="form" action="{{(@$editData)?route('web-site.volunteer.update',$editData->id):route('web-site.volunteer.store')}}" method="POST" enctype="multipart/form-data" id="MyForm">
        @csrf
          <div class="card-body">
            <div class="form-row">
              <div class="col-md-4 form-group">
                  <label>Name <span >*</span> </label>
                  <input type="text" name="name" class="form-control" placeholder="Write your Full Name" value="{{@$editData->name}}">
                  <font color="red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
              </div>
              <div class="col-md-4 form-group">
                  <label>Mobile No <span >*</span> </label>
                  <input type="text" name="mobile" class="form-control" value="{{@$editData->mobile}}">
                  <font color="red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
              </div>
              <div class="col-md-4 form-group">
                  <label>Email </label>
                  <input type="text" name="email" class="form-control" value="{{@$editData->email}}">
                  <font color="red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
              </div>
              <div class="col-md-4 form-group">
                  <label>Gender <span >*</span> </label>
                  <select name="gender" class="form-control">
                      <option value="">Select Gender</option>
                      <option value="Male" {{(@$editData->gender=='Male')?'selected':''}}>Male</option>
                      <option value="Female" {{(@$editData->gender=='Female')?'selected':''}}>Female</option>
                      <option value="Others" {{(@$editData->gender=='Others')?'selected':''}}>Others</option>
                  </select>
                  <font color="red">{{($errors->has('gender'))?($errors->first('gender')):''}}</font>
              </div>
              <div class="col-md-8 form-group">
                  <label>Address <span >*</span> </label>
                  <input type="text" name="address" class="form-control" value="{{@$editData->address}}">
                  <font color="red">{{($errors->has('address'))?($errors->first('address')):''}}</font>
              </div>
              <div class="col-md-4 form-group">
                  <label>Date of Birth <span >*</span> </label>
                  <input type="date" name="dob" class="form-control" autocomplete="off" value="{{@$editData->dob}}">
              </div>
              <div class="col-md-4 form-group">
                  <label>Occupation <span >*</span> </label>
                  <input type="text" name="occupation" class="form-control" placeholder="Write your Occupation" value="{{@$editData->occupation}}">
                  <font color="red">{{($errors->has('occupation'))?($errors->first('occupation')):''}}</font>
              </div>
              <div class="col-md-4 form-group">
                  <label>Highest Level of Education <span >*</span> </label>
                  <select name="education" class="form-control">
                      <option value="">Select Level</option>
                      <option value="Primary School (Grade 1-5)" {{(@$editData->education=='Primary School (Grade 1-5)')?'selected':''}}>Primary School (Grade 1-5)</option>
                      <option value="High School (Grade 6-10)" {{(@$editData->education=='High School (Grade 6-10)')?'selected':''}}>High School (Grade 6-10)</option>
                      <option value="Secondary School / O Levels /Dakhil Equivalent" {{(@$editData->education=='Secondary School / O Levels /Dakhil Equivalent')?'selected':''}}>Secondary School / O Levels /Dakhil Equivalent</option>
                      <option value="Higher Secondary / A Level /Alim /Equivalent" {{(@$editData->education=='Higher Secondary / A Level /Alim /Equivalent')?'selected':''}}>Higher Secondary / A Level /Alim /Equivalent</option>
                      <option value="Diploma /Equivalent" {{(@$editData->education=='Diploma /Equivalent')?'selected':''}}>Diploma /Equivalent</option>
                      <option value="Bachelor /Hons /Equivalent" {{(@$editData->education=='Bachelor /Hons /Equivalent')?'selected':''}}>Bachelor /Hons /Equivalent</option>
                      <option value="Masters / Post Graduation /Equivalent" {{(@$editData->education=='Masters / Post Graduation /Equivalent')?'selected':''}}>Masters / Post Graduation /Equivalent</option>
                  </select>
                  <font color="red">{{($errors->has('education'))?($errors->first('education')):''}}</font>
              </div>
              <div class="col-md-8 form-group">
                  <label>Last Educational Institute's Name <span >*</span> </label>
                  <input type="text" name="institute" class="form-control" value="{{@$editData->institute}}">
                  <font color="red">{{($errors->has('institute'))?($errors->first('institute')):''}}</font>
              </div>
              <div class="col-md-4 form-group">
                  <label>Blood Group <span >*</span> </label>
                  <select name="blood_group" class="form-control">
                      <option value="">Select Group</option>
                      <option value="A Positive (A+)" {{(@$editData->blood_group=='A Positive (A+)')?'selected':''}}>A Positive (A+)</option>
                      <option value="A Negative (A-)" {{(@$editData->blood_group=='A Negative (A-)')?'selected':''}}>A Negative (A-)</option>
                      <option value="B Positive (B+)" {{(@$editData->blood_group=='B Positive (B+)')?'selected':''}}>B Positive (B+)</option>
                      <option value="B Negative (B-)" {{(@$editData->blood_group=='B Negative (B-)')?'selected':''}}>B Negative (B-)</option>
                      <option value="AB Positive (AB+)" {{(@$editData->blood_group=='AB Positive (AB+)')?'selected':''}}>AB Positive (AB+)</option>
                      <option value="AB Negative (AB-)" {{(@$editData->blood_group=='AB Negative (AB-)')?'selected':''}}>AB Negative (AB-)</option>
                      <option value="O Positive (O+)" {{(@$editData->blood_group=='O Positive (O+)')?'selected':''}}>O Positive (O+)</option>
                      <option value="O Negative (O-)" {{(@$editData->blood_group=='O Negative (O-)')?'selected':''}}>O Negative (O-)</option>
                  </select>
                  <font color="red">{{($errors->has('blood_group'))?($errors->first('blood_group')):''}}</font>
              </div>
              <div class="col-md-4 form-group">
                  <label>Status <span >*</span> </label>
                  <select name="status" class="form-control">
                      <option value="">Select Status</option>
                      <option value="1" {{(@$editData->status=='1')?'selected':''}}>Active</option>
                      <option value="0" {{(@$editData->status=='0')?'selected':''}}>Inactive</option>
                  </select>
              </div>
              <div class="col-md-4 form-group">
                  <label>Image (Size: 300px X 300px) <span >*</span> </label>
                  <input type="file" name="image" class="form-control" id="image">
                  <font color="red">{{($errors->has('image'))?($errors->first('image')):''}}</font>
              </div>
              <div class="col-md-2 form-group">
                  <img id="showImage" src="{{(!empty($editData->image))?url('public/upload/volunteer_images/'.$editData->image):url('public/upload/no_image.png')}}" style="width: 100px;height: 80px;border:1px solid #000;">
              </div>
              <div class="col-md-3" style="padding-top:30px;">
                  <button type="submit" id="button" name="submit" class="btn btn-success">{{(@$editData)?"Update":"Submit"}}</button>
              </div>
            </div>
          </div>
        </form>

    </div>
  </div>

<script type="text/javascript">
    $(document).ready(function () {
      $('#MyForm').validate({
        ignore : [],
        debug : false,
        rules: {
          name: {
            required: true,
          },
          mobile: {
            required: true,
          },
          gender: {
            required: true,
          },
          address: {
            required: true,
          },
          dob: {
            required: true,
          },
          occupation: {
            required: true,
          },
          education: {
            required: true,
          },
          institute: {
            required: true,
          },
          blood_group: {
            required: true,
          },
          status: {
            required: true,
          },
        },
        messages: {
          
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
  </script>

@endsection