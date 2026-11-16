@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Committee Member</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Committee Member</li>
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
        Update Committee Member
        @else
        Add Committee Member
        @endif
        <a class="btn btn-success float-right btn-sm custom_btn" href="{{route('web-site.committee.member.view')}}"><i class="fa fa-list"></i> Committee Member List</a>
       </h3>
      </div>

      <div class="card-body">
        <form method="post" action="{{(@$editData)?route('web-site.committee.member.update',$editData->id):route('web-site.committee.member.store')}}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Name in English <span style="color:red;">*</span></label>
              <input type="text" name="name_en" value="{{@$editData->name_en}}" class="form-control form-control-sm">
            </div>
            <div class="form-group col-md-4">
              <label>Name in Bangla <span style="color:red;">*</span></label>
              <input type="text" name="name_bn" value="{{@$editData->name_bn}}" class="form-control form-control-sm">
            </div>
            <div class="form-group col-md-4">
              <label>Category in English <span style="color:red;">*</span></label>
              <input type="text" name="category_en" value="{{@$editData->category_en}}" class="form-control form-control-sm">
            </div>
            <div class="form-group col-md-4">
              <label>Category in Bangla <span style="color:red;">*</span></label>
              <input type="text" name="category_bn" value="{{@$editData->category_bn}}" class="form-control form-control-sm">
            </div>
            <div class="form-group col-md-4">
              <label>Designation in English <span style="color:red;">*</span></label>
              <input type="text" name="designation_en" value="{{@$editData->designation_en}}" class="form-control form-control-sm">
            </div>
            <div class="form-group col-md-4">
              <label>Designation in Bangla <span style="color:red;">*</span></label>
              <input type="text" name="designation_bn" value="{{@$editData->designation_bn}}" class="form-control form-control-sm">
            </div>
            <div class="form-group col-md-2">
              <label>Sort <span style="color:red;">*</span></label>
              <input type="text" name="sort" value="{{@$editData->sort}}" class="form-control form-control-sm">
            </div>
            <div class="form-group col-md-3" style="padding-top:30px">
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
          category_en: {
            required: true,
          },
          category_bn: {
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