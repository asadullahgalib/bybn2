@extends('backend.layouts.master')
@section('content')
  <div class="col-md-12" style="padding-top:40px">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          @if(isset($editData))
          Update Success Stories
          @else
          Add Success Stories
          @endif
          <a class="btn btn-success float-right btn-sm" href="{{route('web-site.success.view')}}"><i class="fa fa-list"></i> Success Stories List</a>
         </h3>
      </div>

      <div class="card-body">
        <form method="post" action="{{(@$editData)?route('web-site.success.update',$editData->id):route('web-site.success.store')}}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="image">Visa Categories <span style="color:red">*</span></label>
              <input type="text" name="visa_category" class="form-control" value="{{@$editData->visa_category}}">
            </div>
            <div class="form-group col-md-3">
              <label for="image">Team Member <span style="color:red">*</span></label>
              <input type="text" name="team_member" class="form-control" value="{{@$editData->team_member}}">
            </div>
            <div class="form-group col-md-3">
              <label for="image">Visa Process <span style="color:red">*</span></label>
              <input type="text" name="visa_process" class="form-control" value="{{@$editData->visa_process}}">
            </div>
            <div class="form-group col-md-3">
              <label for="image">Success Rates <span style="color:red">*</span></label>
              <input type="text" name="success_rate" class="form-control" value="{{@$editData->success_rate}}">
            </div>
            <!-- <div class="form-group col-md-3">
              <label for="image">Image<span style="color:red">(1520px X 250px)</span></label>
              <input type="file" name="image" class="form-control" id="image">
            </div>
            <div class="form-group col-md-3">
              <img id="showImage" src="{{(!empty($editData->image))?url('public/upload/success_images/'.$editData->image):url('public/upload/no_image.png')}}" style="width: 100px;height: 80px;border:1px solid #000;">
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
          visa_category: {
            required: true,
          },
          team_member: {
            required: true,
          },
          visa_process: {
            required: true,
          },
          success_rate: {
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