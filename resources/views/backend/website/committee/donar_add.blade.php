@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Donar Member</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Donar Member</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container fullbody">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
        @if(isset($editData))
        Update Donar Member
        @else
        Add Donar Member
        @endif
        <a class="btn btn-success float-right btn-sm custom_btn" href="{{route('web-site.donar.member.view')}}"><i class="fa fa-list"></i> Donar Member List</a>
       </h3>
      </div>

      <div class="card-body">
        <form method="post" action="{{(@$editData)?route('web-site.donar.member.update',$editData->id):route('web-site.donar.member.store')}}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Name in English <span style="color:red;">*</span></label>
              <input type="text" name="name_en" value="{{@$editData->name_en}}" class="form-control form-control-sm">
            </div>
            <div class="form-group col-md-6">
              <label>Name in Bangla <span style="color:red;">*</span></label>
              <input type="text" name="name_bn" value="{{@$editData->name_bn}}" class="form-control form-control-sm">
            </div>
            <div class="form-group col-md-6">
              <label>Address in English <span style="color:red;">*</span></label>
              <input type="text" name="address_en" value="{{@$editData->address_en}}" class="form-control form-control-sm">
            </div>
            <div class="form-group col-md-6">
              <label>Address in Bangla <span style="color:red;">*</span></label>
              <input type="text" name="address_bn" value="{{@$editData->address_bn}}" class="form-control form-control-sm">
            </div>
            <div class="form-group col-md-3">
              <button type="submit" class="btn btn-primary btn-sm">{{(@$editData)?"Update":"Submit"}}</button>
            </div>
          </div>
        </form>
      </div><!-- /.card-body -->

    </div>
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
          address_en: {
            required: true,
          },
          address_bn: {
            required: true,
          },
          designation_en: {
            required: true,
          },
          designation_bn: {
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