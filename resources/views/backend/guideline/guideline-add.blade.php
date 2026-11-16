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
								Update Guideline
								@else
								Add Guideline
								@endif 
								<a class="btn btn-sm btn-success float-right custom_btn" href="{{route('web-site.guidelines.view')}}"><i class="fa fa-list"></i> Guideline List</a></h5>
						</div>
						<!-- Form Start-->
						<form method="post" action="{{!empty($editData->id) ? route('web-site.guidelines.update',$editData->id) : route('web-site.guidelines.store')}}" id="myForm">
							{{csrf_field()}}
							<div class="card-body">
								<div class="show_module_more_event">
									<div class="form-row">
										<div class="form-group col-md-6">
											<label class="control-label">Guideline Name <span style="color:red">*</span> </label>
											<input type="text" name="name" id="name" class="form-control form-control-sm" value="{{@$editData->name}}">
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