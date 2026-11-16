@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Meta</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Meta</li>
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
          Update Meta
          @else
          Add Meta
          @endif
          <a class="btn btn-success float-right btn-sm" href="{{route('user.meta.view')}}"><i class="fa fa-list"></i> Meta List</a>
         </h3>
      </div>

      <div class="card-body">
        <form method="post" action="{{(@$editData)?route('user.meta.update',$editData->id):route('user.meta.store')}}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="title">Meta Description <span style="color:red;">*</span> </label>
              <textarea name="description" class="form-control" rows="7">{{@$editData->description}}</textarea>
            </div>
            <div class="form-group col-md-12">
              <label for="title">Meta Keywords <span style="color:red;">*</span></label>
              <textarea name="keyword" class="form-control" rows="7">{{@$editData->keyword}}</textarea>
            </div>
            <div class="form-group col-md-6">
              <label for="description">Meta Author <span style="color:red;">*</span></label>
              <input type="text" name="author" class="form-control" value="{{@$editData->author}}">
            </div>
            <div class="form-group col-md-6">
              <label for="description">Canonical Link <span style="color:red;">*</span></label>
              <input type="text" name="canonical_link" class="form-control" value="{{@$editData->canonical_link}}">
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
      $('#myForm').validate({
        ignore : [],
        debug : false,
        rules: {
          description: {
            required: true,
          },
          keyword: {
            required: true,
          },
          author: {
            required: true,
          },
          canonical_link: {
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