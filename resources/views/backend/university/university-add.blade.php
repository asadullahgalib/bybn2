@extends('backend.layouts.master')
@section('content')
  <div class="col-md-12" style="padding-top:40px">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          @if(isset($editData))
          Update University
          @else
          Add University
          @endif
          <a class="btn btn-success float-right btn-sm" href="{{route('web-site.university.view')}}"><i class="fa fa-list"></i> University List</a>
         </h3>
      </div>

      <div class="card-body">
        <form method="POST" action="{{(@$editData)?route('web-site.university.update',$editData->id):route('web-site.university.store')}}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Country Name <span style="color: red;">*</span> </label>
              <select name="country_id" class="form-control form-control-sm">
                <option value="">Select Country</option>
                @foreach($countries as $country)
                <option value="{{$country->id}}" {{(@$editData->country_id==$country->id)?"selected":""}}>{{$country->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-8">
              <label for="image">University Name <span style="color:red">*</span></label>
              <input type="text" name="name" class="form-control form-control-sm" value="{{@$editData->name}}">
            </div>
            <div class="form-group col-md-3">
              <label for="image">Logo Image <span style="color:red">(360px X 200px)</span></label>
              <input type="file" name="logo_img" class="form-control" id="image">
            </div>
            <div class="form-group col-md-2">
              <img id="showImage" src="{{(!empty($editData->logo_img))?url('public/upload/university_logo/'.$editData->logo_img):url('public/upload/no_image.png')}}" style="width: 100px;height: 80px;border:1px solid #000;">
            </div>
            <div class="form-group col-md-3">
              <label for="image">Graph Image <span style="color:red">(800px X 500px)</span></label>
              <input type="file" name="graph_img" class="form-control" id="image2">
            </div>
            <div class="form-group col-md-2">
              <img id="showImage2" src="{{(!empty($editData->graph_img))?url('public/upload/university_graph_images/'.$editData->graph_img):url('public/upload/no_image.png')}}" style="width: 100px;height: 80px;border:1px solid #000;">
            </div>
            <div class="form-group col-md-4">
              <label for="image">Univarsity Location <span style="color:red">*</span></label>
              <input type="text" name="location" class="form-control form-control-sm" value="{{@$editData->location}}">
            </div>
            <div class="form-group col-md-4">
              <label for="image">World Ranking <span style="color:red">*</span></label>
              <input type="text" name="ranking" class="form-control form-control-sm" value="{{@$editData->ranking}}">
            </div>
            <div class="form-group col-md-4">
              <label for="image">International Student <span style="color:red">*</span></label>
              <input type="text" name="international_student" class="form-control form-control-sm" value="{{@$editData->international_student}}">
            </div>
            <div class="form-group col-md-4">
              <label for="image">Study Options <span style="color:red">*</span></label>
              <input type="text" name="study_option" class="form-control form-control-sm" value="{{@$editData->study_option}}">
            </div>
            <div class="form-group col-md-4">
              <label for="image">Available Intakes <span style="color:red">*</span></label>
              <input type="text" name="intakes" class="form-control form-control-sm" value="{{@$editData->intakes}}">
            </div>
            <div class="form-group col-md-4">
              <label for="image">Scholarships <span style="color:red">*</span></label>
              <input type="text" name="scholarship" class="form-control form-control-sm" value="{{@$editData->scholarship}}">
            </div>

            <div class="form-group col-md-12">
              <label for="image">Description <span style="color:red">*</span></label>
              <textarea name="description_en" class="form-control">{{@$editData->description_en}}</textarea>
            </div>
            <div class="form-group col-md-3">
              <label for="image">Gallery Image 1 <span style="color:red">(800px X 500px)</span></label>
              <input type="file" name="gallery_img1" class="form-control" id="image3">
            </div>
            <div class="form-group col-md-2">
              <img id="showImage3" src="{{(!empty($editData->gallery_img1))?url('public/upload/university_gallery1/'.$editData->gallery_img1):url('public/upload/no_image.png')}}" style="width: 100px;height: 80px;border:1px solid #000;">
            </div>
            <div class="form-group col-md-3">
              <label for="image">Gallery Image 2 <span style="color:red">(800px X 500px)</span></label>
              <input type="file" name="gallery_img2" class="form-control" id="image4">
            </div>
            <div class="form-group col-md-2">
              <img id="showImage4" src="{{(!empty($editData->gallery_img2))?url('public/upload/university_gallery2/'.$editData->gallery_img2):url('public/upload/no_image.png')}}" style="width: 100px;height: 80px;border:1px solid #000;">
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
          country_id: {
            required: true,
          },
          name: {
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