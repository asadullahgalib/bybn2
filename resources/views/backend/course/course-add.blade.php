@extends('backend.layouts.master')
@section('content')
<section class="content" style="padding-top:40px">
  <div class="container-fluid">
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-md-12">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
						<div class="card-header">
							<h5>
								@if(@$editData)
								Update Program
								@else
								Add Program
								@endif 
								<a class="btn btn-sm btn-success float-right custom_btn" href="{{route('web-site.course.view')}}"><i class="fa fa-list"></i> Program List</a></h5>
						</div>
						<!-- Form Start-->
						<form method="post" action="{{!empty($editData->id) ? route('web-site.course.update',$editData->id) : route('web-site.course.store')}}" enctype="multipart/form-data" id="myForm">
							{{csrf_field()}}
							<div class="card-body">
								<div class="add_item">
									<div class="form-row">
										<div class="form-group col-md-8">
				              <label for="image">Program Name <span style="color:red">*</span></label>
				              <input type="text" name="name" value="{{@$editData->name}}" class="form-control form-control-sm">
				            </div>
				            <div class="form-group col-md-3">
				              <label for="image">Image <span style="color:red">(750px X 403px)</span></label>
				              <input type="file" name="image" class="form-control" id="image2">
				            </div>
				            <div class="form-group col-md-1">
				              <img id="showImage2" src="{{(!empty($editData->image))?url('public/upload/course_images/'.$editData->image):url('public/upload/no_image.png')}}" style="width: 80px;height: 60px;border:1px solid #000;">
				            </div>
				            <div class="form-group col-md-12">
				              <label for="title">Description</label>
				              <textarea name="description_en" class="form-control" rows="5">{{@$editData->description_en}}</textarea>
				            </div>
									</div>
								</div>
									
								<button type="submit" class="btn btn-success btn-sm" style="margin-top:40px">{{(@$editData) ? 'Update' : 'Submit'}}</button>
							</div>
						</form>
						<!--Form End-->
					</div>
        <!-- /.card -->
      </section>
      <!-- right col -->
    </div>
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>

<script>
    $(document).ready(function(){
    	$('#myForm').validate({
    		errorClass:'text-danger',
	      	validClass:'text-success',
	        rules : {
	            "name": {
			          required: true,
			        },
	        },
	        messages : {

	        }
	    });
    });
</script>
@endsection