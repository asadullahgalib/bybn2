@extends('backend.layouts.master')
@section('content')

  <div class="col-md-12" style="padding-top: 40px;">
    <div class="card">
      <div class="card-header">
        <h3>Edit profile
          <a class="btn btn-success float-right btn-sm custom_btn" href="{{route('profiles.view')}}"><i class="fa fa-list"></i> Your Profile</a>
        </h3>
      </div>

      <div class="card-body">
        <form method="post" action="{{route('profiles.update')}}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <input type ="hidden" name="user_category" value="{{$editData->user_category}}">
            <div class="form-group col-md-4">
              <label for="name">Full Name <span style="color:red;font-weight: bold;">*</span></label>
              <input type="text" name="name" value="{{$editData->name}}" class="form-control">
              <font style="color: red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
            </div>
            @if(Auth::user()->user_category=='Developer' || Auth::user()->user_category=='admin')
            <div class="form-group col-md-4">
              <label for="email">Mobile No/Email <span style="color:red;font-weight: bold;">*</span></label>
              <input type="text" name="username" value="{{$editData->username}}" class="form-control">
              <font style="color: red">{{($errors->has('username'))?($errors->first('username')):''}}</font>
            </div>
            @endif
            <div class="form-group col-md-4">
              <label for="address">Mobile No <span style="color:red;font-weight: bold;">*</span></label>
              <input type="text" name="mobile" value="{{$editData->mobile}}" class="form-control">
              <font style="color: red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
            </div>
            @if(Auth::user()->user_category=='student')
            <div class="form-group col-md-4">
              <label for="address">Father's Name <span style="color:red;font-weight: bold;">*</span></label>
              <input type="text" name="fname" value="{{$editData->fname}}" class="form-control">
            </div>
            <div class="form-group col-md-4">
              <label for="address">Mother's Name <span style="color:red;font-weight: bold;">*</span></label>
              <input type="text" name="mname" value="{{$editData->mname}}" class="form-control">
            </div>
            @endif
            <div class="form-group col-md-6">
              <label for="address">Address</label>
              <input type="text" name="address" value="{{$editData->address}}" class="form-control">
            </div>
            <div class="form-group col-md-2">
              <label for="gender">Gender</label>
              <select name="gender" id="gender" class="form-control">
                <option value="">Select Gender</option>
                <option value="Male" {{($editData->gender=="Male")?"selected":""}}>Male</option>
                <option value="Female" {{($editData->gender=="Female")?"selected":""}}>Female</option>
              </select>
            </div>
            <div class="form-group col-md-2">
              <label for="image">Image</label>
              <input type="file" name="image" class="form-control" id="image">
            </div>
            <div class="form-group col-md-2">
              <img id="showImage" src="{{(!empty($editData->image))?url('public/upload/user_images/'.$editData->image):url('public/upload/no_image.png')}}" style="width: 80px;height: 85px;border:1px solid #000;">
            </div>
            <div class="form-group col-md-6">
              <input type="submit" value="Update" class="btn btn-primary">
            </div>
          </div>
        </form>
      </div><!-- /.card-body -->

    </div>
  </div>

<script type="text/javascript">
    $(document).ready(function () {
      $('#myForm').validate({
        rules: {
          username: {
            required: true,
          },
          mobile: {
            required: true,
          },
          fname: {
            required: true,
          },
          mname: {
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