@extends('backend.layouts.master')
@section('content')
  <div class="col-md-12" style="padding-top:40px">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
        @if(isset($editData))
        Update Contact Us
        @else
        Add Contact Us
        @endif
        <a class="btn btn-success float-right btn-sm" href="{{route('web-site.contact.view')}}"><i class="fa fa-list"></i> Contact Us List</a>
       </h3>
      </div>

      <div class="card-body">
        <form method="post" action="{{(@$editData)?route('web-site.contact.update',$editData->id):route('web-site.contact.store')}}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-12">
              <h5>Organization Information</h5>
            </div>
            <div class="form-group col-md-4">
              <label>Organization Name <span style="color:red;">*</span> </label>
              <input type="text" name="name_en" value="{{@$editData->name_en}}" class="form-control form-control-sm" required>
            </div>
            <div class="form-group col-md-4">
              <label>Contact No <span style="color:red;">*</span> </label>
              <input type="text" name="mobile1" value="{{@$editData->mobile1}}" class="form-control form-control-sm" required>
            </div>
            <div class="form-group col-md-4">
              <label>Email</label>
              <input type="text" name="email1" value="{{@$editData->email1}}" class="form-control form-control-sm" required>
            </div>
            <div class="form-group col-md-12">
              <label>Address <span style="color:red;">*</span> </label>
              <input type="text" name="address1" value="{{@$editData->address1}}" class="form-control form-control-sm" required>
            </div>
          </div>
          <!-- <div class="form-row">
            <div class="form-group col-md-12">
              <h5>Contact Information (2) </h5>
            </div>
            <div class="form-group col-md-6">
              <label>Contact For ? <span style="color:red;">*</span>  </label>
              <input type="text" name="contact_for_2" value="{{@$editData->contact_for_2}}" class="form-control form-control-sm" required>
            </div>
            <div class="form-group col-md-6">
              <label>Contact No <span style="color:red;">*</span> </label>
              <input type="text" name="mobile2" value="{{@$editData->mobile2}}" class="form-control form-control-sm" required>
            </div>
            <div class="form-group col-md-5">
              <label>Email</label>
              <input type="text" name="email2" value="{{@$editData->email2}}" class="form-control form-control-sm" required>
            </div>
            <div class="form-group col-md-7">
              <label>Address <span style="color:red;">*</span> </label>
              <input type="text" name="address2" value="{{@$editData->address2}}" class="form-control form-control-sm" required>
            </div>
          </div> -->
          <div class="form-row">
            <div class="form-group col-md-12">
              <h5>Social Information</h5>
            </div>
            <div class="form-group col-md-4">
              <label>Facebook Page</label>
              <input type="text" name="facebook" value="{{@$editData->facebook}}" class="form-control form-control-sm">
            </div>
            <div class="form-group col-md-4">
              <label>Twitter</label>
              <input type="text" name="twitter" value="{{@$editData->twitter}}" class="form-control form-control-sm">
            </div>
            <div class="form-group col-md-4">
              <label>Instagram</label>
              <input type="text" name="instagram" value="{{@$editData->instagram}}" class="form-control form-control-sm">
            </div>
            <div class="form-group col-md-4">
              <label>Linkedin</label>
              <input type="text" name="linkedin" value="{{@$editData->linkedin}}" class="form-control form-control-sm">
            </div>
            <div class="form-group col-md-4">
              <label>Tik Tok</label>
              <input type="text" name="tiktok" value="{{@$editData->tiktok}}" class="form-control form-control-sm">
            </div>
            <div class="form-group col-md-4">
              <label>Youtube</label>
              <input type="text" name="youtube" value="{{@$editData->youtube}}" class="form-control form-control-sm">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <h5>Image Part </h5>
            </div>
            <div class="form-group col-md-2">
              <label for="image">Logo <span style="color:red;">*</span> </label>
              <input type="file" name="image" class="form-control" id="image2">
            </div>
            <div class="form-group col-md-2">
              <img id="showImage2" src="{{(!empty($editData->image))?url('public/upload/contact_images/'.$editData->image):url('public/upload/no_image.png')}}" style="width: 100px;height: 80px;border:1px solid #000;">
            </div>
            <div class="form-group col-md-4">
              <label for="image">Banner Image (Size: 1920px X 500px) </label>
              <input type="file" name="banner" class="form-control" id="image3">
            </div>
            <div class="form-group col-md-2">
              <img id="showImage3" src="{{(!empty($editData->banner))?url('public/upload/banner_images/'.$editData->banner):url('public/upload/no_image.png')}}" style="width: 100px;height: 80px;border:1px solid #000;">
            </div>
            <div class="form-group col-md-3">
              <button type="submit" class="btn btn-primary">{{(@$editData)?"Update":"Submit"}}</button>
            </div>
          </div>
        </form>
      </div><!-- /.card-body -->

    </div>
  </div>

<script type="text/javascript">
    $(document).ready(function () {
      $('#myForm').validate({
        ignore : [],
        debug : false,
        rules: {
          name_en: {
            required: true,
          },
          name_bn: {
            required: true,
          },
          mobile_en: {
            required: true,
          },
          mobile_bn: {
            required: true,
          },
          email: {
            email: true,
          },
          address_en: {
            required: true,
          },
          address_bn: {
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