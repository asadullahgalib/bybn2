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
								@if(@$editData->id =='1')
								Edit Terms & Condition
								@else
								Edit Privacy Policy
								@endif 
								<a class="btn btn-sm btn-success float-right custom_btn" href="{{route('web-site.policy.view')}}"><i class="fa fa-list"></i> Policy List</a></h5>
						</div>
						<!-- Form Start-->
						<form method="post" action="{{!empty($editData->id) ? route('web-site.policy.update',$editData->id) : route('web-site.policy.store')}}" enctype="multipart/form-data" id="myForm">
							{{csrf_field()}}
							<div class="card-body">
								<div class="add_item">
									<div class="form-row">
										<div class="form-group col-md-12">
											<label class="control-label">Description <span style="color:red">*</span> </label>
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
	            'description_en' : {
	                required : true,
	            },
	        },
	        messages : {

	        }
	    });
    });
</script>
@endsection