@extends('backend.layouts.master')
@section('content')
<!-- <div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Contact Us</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Contact Us</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div> -->
<div class="col-md-12" style="padding-top: 40px;">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">
      @if(isset($editData))
      Update Contact Details
      @else
      Add Contact Details
      @endif
      <a class="btn btn-success float-right btn-sm custom_btn" href="{{route('web-site.contact.details.view')}}"><i class="fa fa-list"></i> Contact Details List</a>
     </h3>
    </div>

    <div class="card-body">
      <form method="post" action="{{(@$editData)?route('web-site.contact.details.update',$editData->id):route('web-site.contact.details.store')}}" id="myForm" enctype="multipart/form-data">
        @csrf
        <div class="add_item">
          <div class="form-row">
             <div class="form-group col-md-3">
                <label>Branch <span style="color:red;">*</span></label>
                <input type="text" name="branch" value="{{@$editData->branch}}" class="form-control">
              </div>
             <div class="form-group col-md-6">
                <label>Address <span style="color:red;">*</span></label>
                <input type="text" name="address" value="{{@$editData->address}}" class="form-control">
              </div>
              <div class="form-group col-md-3">
                <label>Mobile <span style="color:red;">*</span></label>
                <input type="text" name="mobile" value="{{@$editData->mobile}}" class="form-control">
              </div>
              <div class="form-group col-md-3">
                <label>Email <span style="color:red;">*</span></label>
                <input type="text" name="email" value="{{@$editData->email}}" class="form-control">
              </div>
              <div class="form-group col-md-3">
                <label>Office Days</label>
                <input type="text" name="office_day" value="{{@$editData->office_day}}" class="form-control">
              </div>
              <div class="form-group col-md-3">
                <label>Office Time</label>
                <input type="text" name="office_time" value="{{@$editData->office_time}}" class="form-control">
              </div>
              <div class="form-group col-md-3">
                <label>WhatsApp</label>
                <input type="text" name="whatsapp" value="{{@$editData->whatsapp}}" class="form-control">
              </div>
              <div class="form-group col-md-3">
                <label>Show IELTS</label>
                <select name="status" class="form-control">
                  <option value="0" {{(@$editData->status=="0")?"selected":""}}>No</option>
                  <option value="1" {{(@$editData->status=="1")?"selected":""}}>Yes</option>
                </select>
              </div>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-2" style="padding-top:30px">
            <button type="submit" class="btn btn-primary btn-sm">{{(@$editData)?"Update":"Submit"}}</button>
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
          branch: {
            required: true,
          },
          address: {
            required: true,
          },
          mobile: {
            required: true,
          },
          email: {
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