@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Slogan</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Slogan</li>
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
          Update Slogan
          @else
          Add Slogan
          @endif
          <a class="btn btn-success float-right btn-sm" href="{{route('web-site.slogan.view')}}"><i class="fa fa-list"></i> Slogan List</a>
         </h3>
      </div>

      <div class="card-body">
        <form method="post" action="{{(@$editData)?route('web-site.slogan.update',$editData->id):route('web-site.slogan.store')}}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="title">Title in English</label>
              <input type="text" name="title_en" class="form-control" value="{{@$editData->title_en}}">
              <font color="red">{{($errors->has('title_en'))?($errors->first('title_en')):''}}</font>
            </div>
            <div class="form-group col-md-6">
              <label for="title">Title in Bangla</label>
              <input type="text" name="title_bn" class="form-control" value="{{@$editData->title_bn}}">
              <font color="red">{{($errors->has('title_bn'))?($errors->first('title_bn')):''}}</font>
            </div>
            <div class="form-group col-md-12">
              <label for="description">Description in English</label>
              <textarea name="description_en" class="form-control" rows="8">{{@$editData->description_en}}</textarea>
            </div>
            <div class="form-group col-md-12">
              <label for="description">Description in Bangla</label>
              <textarea name="description_bn" class="form-control" rows="8">{{@$editData->description_bn}}</textarea>
            </div>
            <div class="form-group col-md-6">
              <button type="submit" class="btn btn-primary">{{(@$editData)?"Update":"Submit"}}</button>
            </div>
          </div>
        </form>
        </form>
      </div><!-- /.card-body -->

    </div>
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
      $('description_en').each(function(){
          $(this).val($(this).val().trim());
        }
      );
      $('description_bn').each(function(){
          $(this).val($(this).val().trim());
        }
      );

      $('#myForm').validate({
        ignore : [],
        debug : false,
        rules: {
          title_en: {
            required: true,
          },
          title_bn: {
            required: true,
          },
          description_en: {
            required: true,
          },
          description_bn: {
            required: true,
          }
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