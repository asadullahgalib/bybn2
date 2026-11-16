@extends('backend.layouts.master')
@section('content')
  <div class="col-md-12" style="padding-top:40px">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          @if(isset($editData))
          Update Destination Gallery
          @else
          Add Destination Gallery
          @endif
          <a class="btn btn-success float-right btn-sm" href="{{route('web-site.destination.gallery.view')}}"><i class="fa fa-list"></i> Destination Gallery List</a>
         </h3>
      </div>

      <div class="card-body">
        <form method="post" action="{{(@$editData)?route('web-site.destination.gallery.update',$editData->id):route('web-site.destination.gallery.store')}}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-3">
              <label>Country Name <span style="color: red;">*</span> </label>
              <select name="country_id" class="form-control form-control-sm">
                <option value="">Select Country</option>
                @foreach($countries as $country)
                <option value="{{$country->id}}" {{(@$editData->country_id==$country->id)?"selected":""}}>Study in {{$country->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-3">
              <label for="image">Image 1 <span style="color:red">(1600px X 1440px)</span></label>
              <input type="file" name="image1" class="form-control" id="image">
            </div>
            <div class="form-group col-md-3">
              <img id="showImage" src="{{(!empty($editData->image1))?url('public/upload/destination_gallery1/'.$editData->image1):url('public/upload/no_image.png')}}" style="width: 100px;height: 80px;border:1px solid #000;">
            </div>
            <div class="form-group col-md-6">
              <label for="image">Image 2 <span style="color:red">(1600px X 1440px)</span></label>
              <input type="file" name="image2" class="form-control" id="image2">
            </div>
            <div class="form-group col-md-6">
              <img id="showImage2" src="{{(!empty($editData->image2))?url('public/upload/destination_gallery2/'.$editData->image2):url('public/upload/no_image.png')}}" style="width: 100px;height: 80px;border:1px solid #000;">
            </div>
            <div class="form-group col-md-6">
              <label for="image">Image 3 <span style="color:red">(1600px X 1440px)</span></label>
              <input type="file" name="image3" class="form-control" id="image3">
            </div>
            <div class="form-group col-md-6">
              <img id="showImage3" src="{{(!empty($editData->image3))?url('public/upload/destination_gallery3/'.$editData->image3):url('public/upload/no_image.png')}}" style="width: 100px;height: 80px;border:1px solid #000;">
            </div>
            <div class="form-group col-md-6">
              <label for="image">Image 4 <span style="color:red">(1600px X 1440px)</span></label>
              <input type="file" name="image4" class="form-control" id="image4">
            </div>
            <div class="form-group col-md-6">
              <img id="showImage4" src="{{(!empty($editData->image4))?url('public/upload/destination_gallery4/'.$editData->image4):url('public/upload/no_image.png')}}" style="width: 100px;height: 80px;border:1px solid #000;">
            </div>
            <div class="form-group col-md-6">
              <label for="image">Image 5 <span style="color:red">(1600px X 1440px)</span></label>
              <input type="file" name="image5" class="form-control" id="image5">
            </div>
            <div class="form-group col-md-6">
              <img id="showImage5" src="{{(!empty($editData->image5))?url('public/upload/destination_gallery5/'.$editData->image5):url('public/upload/no_image.png')}}" style="width: 100px;height: 80px;border:1px solid #000;">
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
          experience: {
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