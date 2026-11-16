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
								Update Country
								@else
								Add Country
								@endif 
								<a class="btn btn-sm btn-success float-right custom_btn" href="{{route('web-site.country.view')}}"><i class="fa fa-list"></i> Country List</a></h5>
						</div>
						<!-- Form Start-->
						<form method="post" action="{{!empty($editData->id) ? route('web-site.country.update',$editData->id) : route('web-site.country.store')}}" enctype="multipart/form-data" id="myForm">
							{{csrf_field()}}
							<div class="card-body">
								<div class="show_module_more_event">
									<div class="form-row">
										<div class="form-group col-md-6">
											<label class="control-label">Country Name <span style="color:red">*</span> </label>
											<input type="text" name="name" id="name" class="form-control form-control-sm" value="{{@$editData->name}}">
										</div>
										<div class="form-group col-md-3">
				              <label for="image">Image <span style="color:red">(200px X 200px)</span></label>
				              <input type="file" name="image" class="form-control" id="image">
				            </div>
				            <div class="form-group col-md-3">
				              <img id="showImage" src="{{(!empty($editData->image))?url('public/upload/country_images/'.$editData->image):url('public/upload/no_image.png')}}" style="width: 100px;height: 80px;border:1px solid #000;">
				            </div>
									</div>
								</div>
									
								<button type="submit" class="btn btn-success btn-sm">{{(@$editData) ? 'Update' : 'Submit'}}</button>
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
	            'name' : {
	                required : true,
	            },
	        },
	        messages : {

	        }
	    });
    });
</script>
@endsection