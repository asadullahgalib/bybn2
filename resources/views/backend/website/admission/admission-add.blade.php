@extends('backend.layouts.master')
@section('content')
  <div class="col-md-12" style="padding-top:40px">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          @if(isset($editData))
          Update Why Choose
          @else
          Add Why Choose
          @endif
          <a class="btn btn-success float-right btn-sm" href="{{route('web-site.admission.view')}}"><i class="fa fa-list"></i> Why Choose List</a>
         </h3>
      </div>

      <div class="card-body">
        <form method="post" action="{{(@$editData)?route('web-site.admission.update',$editData->id):route('web-site.admission.store')}}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="image">Title <span style="color:red">*</span></label>
              <input type="text" name="title" class="form-control" value="{{@$editData->title}}">
            </div>
            <div class="form-group col-md-12">
              <label for="image">Description <span style="color:red">*</span></label>
              <textarea name="description" class="form-control" rows="8">{{@$editData->description}}</textarea>
            </div>
            <!-- <div class="form-group col-md-12">
              <label for="image">Long Description <span style="color:red">*</span></label>
              <textarea name="description_en" class="form-control" rows="6">{{@$editData->description_en}}</textarea>
            </div> -->
            <!-- <div class="form-group col-md-3">
              <label for="image">Image<span style="color:red">(1413px X 793px)</span></label>
              <input type="file" name="image" class="form-control" id="image">
            </div>
            <div class="form-group col-md-3">
              <img id="showImage" src="{{(!empty($editData->image))?url('public/upload/admission_images/'.$editData->image):url('public/upload/no_image.png')}}" style="width: 100px;height: 80px;border:1px solid #000;">
            </div> -->
            <!-- <div class="form-group col-md-6">
              <label for="image">Link <span style="color:red">*</span></label>
              <input type="text" name="url" class="form-control" value="{{@$editData->url}}">
            </div> -->
            <div class="form-group col-md-6">
              <button type="submit" class="btn btn-primary">{{(@$editData)?"Update":"Submit"}}</button>
            </div>
          </div>
        </form>
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
          title: {
            required: true,
          },
          description: {
            required: true,
          },
          description_en: {
            required: true,
          },
          // url: {
          //   required: true,
          // }
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