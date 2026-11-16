@extends('backend.layouts.master')
@section('content')
  <div class="col-md-12" style="padding-top:40px">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          @if(isset($editData))
            Update Blood Donate
          @else
            Add Blood Donate
          @endif
          <a href="{{ route('web-site.donation.view') }}" class="btn btn-success float-right btn-sm custom_btn"><i class="fa fa-list"> Blood Donate List</i></a>
        </h3>
      </div>

      <form role="form" action="{{(@$editData)?route('web-site.donation.update',$editData->id):route('web-site.donation.store')}}" method="POST" enctype="multipart/form-data" id="MyForm">
        @csrf
          <div class="card-body">
            <div class="form-row">
              <div class="col-md-4 form-group">
                  <label>Name <span >*</span> </label>
                  <input type="text" name="name" class="form-control" value="{{@$editData->name}}" placeholder="Write your Full Name">
                  <font color="red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
              </div>
              <div class="col-md-4 form-group">
                  <label>Mobile No <span >*</span> </label>
                  <input type="text" name="mobile" class="form-control" value="{{@$editData->mobile}}">
                  <font color="red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
              </div>
              <div class="col-md-4 form-group">
                  <label>Email  </label>
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
          blood_group: {
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