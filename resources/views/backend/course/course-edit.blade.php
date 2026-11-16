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
								Update Course
								@else
								Add Course
								@endif 
								<a class="btn btn-sm btn-success float-right custom_btn" href="{{route('web-site.course.view')}}"><i class="fa fa-list"></i> Course List</a></h5>
						</div>
						<!-- Form Start-->
						<form method="post" action="{{!empty($editData->id) ? route('web-site.course.update',$editData->id) : route('web-site.course.store')}}" enctype="multipart/form-data" id="myForm">
							{{csrf_field()}}
							<div class="card-body">
								<div class="add_item">
									<div class="form-row">
										<div class="form-group col-md-3">
											<label class="control-label">Course Type <span style="color:red">*</span> </label>
											<select name="type" class="form-control form-control-sm course_type">
			                  <option value="">Select Type</option>
			                  <option value="Undergraduate" {{(@$editData->type=="Undergraduate")?"selected":""}}>Undergraduate</option>
			                  <option value="Postgraduate" {{(@$editData->type=="Postgraduate")?"selected":""}}>Postgraduate</option>
			                  <option value="Others" {{(@$editData->type=="Others")?"selected":""}}>Others</option>
			                </select>
										</div>
										<div class="form-group col-md-5">
				              <label for="image">Course Name <span style="color:red">*</span></label>
				              <input type="text" name="name" value="{{@$editData->name}}" class="form-control form-control-sm">
				            </div>
				            <div class="form-group col-md-3">
				              <label for="image">Image <span style="color:red">(2600px X 1300px)</span></label>
				              <input type="file" name="image" class="form-control" id="image2">
				            </div>
				            <div class="form-group col-md-1">
				              <img id="showImage2" src="{{(!empty($editData->image))?url('public/upload/course_images/'.$editData->image):url('public/upload/no_image.png')}}" style="width: 80px;height: 60px;border:1px solid #000;">
				            </div>
				          </div>
			          	<!-- Graduate/Postgraduate Course Section -->
	                <div class="form-row graduate_post_course" style="display: {{@$editData->type != 'Others' ? 'block' : 'none'}}; padding-top: 29px;">
	                  <div class="form-group col-md-12">
	                    <label class="control-label">Country <span style="color:red">*</span></label>
	                    <select name="country_id" id="country_id" class="form-control form-control-sm">
	                      <option value="">Select Country</option>
	                      @foreach($countries as $country)
	                        <option value="{{$country->id}}" {{(@$editData->country_id == $country->id) ? 'selected' : ''}}>{{$country->name}}</option>
	                      @endforeach
	                    </select>
	                  </div>

	                  <div class="form-group col-md-12">
	                    <label class="control-label">University <span style="color:red">*</span></label>
	                    <select name="university_id" id="university_id" class="form-control form-control-sm">
	                      <option value="">Select University</option>
	                      @foreach($universities as $university)
	                        <option value="{{$university->id}}" {{(@$editData->university_id == $university->id) ? 'selected' : ''}}>{{$university->name}}</option>
	                      @endforeach
	                    </select>
	                  </div>
	                </div>

	                <!-- Others Course Section -->
	                <div class="others_course" style="display: {{@$editData->type == 'Others' ? 'block' : 'none'}};">
	                  <div class="form-row">
	                    <div class="form-group col-md-12">
	                      <label class="control-label">Country <span style="color:red">*</span></label>
	                      <select name="course_country_id[]" class="form-control form-control-sm select2" multiple>
	                        @foreach($countries as $country)
	                          <option value="{{$country->id}}" {{(@in_array(['country_id'=>$country->id], $country_array)) ? 'selected' : ''}}>{{$country->name}}</option>
	                        @endforeach
	                      </select>
	                    </div>

	                    <div class="form-group col-md-12">
	                      <label class="control-label">University <span style="color:red">*</span></label>
	                      <select name="course_university_id[]" class="form-control form-control-sm select2" multiple>
	                        @foreach($universities as $university)
	                          <option value="{{$university->id}}" {{(@in_array(['university_id'=>$university->id], $university_array)) ? 'selected' : ''}}>{{$university->name}}</option>
	                        @endforeach
	                      </select>
	                    </div>
	                  </div>
	                </div>

									<div class="form-row">
										<div class="form-group col-md-4">
				              <label for="image">Duration </label>
				              <input type="text" name="duration" value="{{@$editData->duration}}" class="form-control form-control-sm">
				            </div>
				            <div class="form-group col-md-4">
				              <label for="image">Course Level <span style="color:red">*</span></label>
				              <input type="text" name="level" value="{{@$editData->level}}" class="form-control form-control-sm">
				            </div>
				            <div class="form-group col-md-4">
				              <label for="image">Intake <span style="color:red">*</span></label>
				              <input type="text" name="intake" value="{{@$editData->intake}}" class="form-control form-control-sm">
				            </div>
				            <div class="form-group col-md-4">
				              <label for="image">IELTS <span style="color:red">*</span></label>
				              <input type="text" name="ielts" value="{{@$editData->ielts}}" class="form-control form-control-sm">
				            </div>
				            <div class="form-group col-md-4">
				              <label for="image">Internship Availability </label>
				              <input type="text" name="scholarship_availability" value="{{@$editData->scholarship_availability}}" class="form-control form-control-sm">
				            </div>
				            <div class="form-group col-md-4">
				              <label for="image">Home Fees </label>
				              <input type="text" name="home_fees" value="{{@$editData->home_fees}}" class="form-control form-control-sm">
				            </div>
				            <div class="form-group col-md-4">
				              <label for="image">International Fees </label>
				              <input type="text" name="international_fees" value="{{@$editData->international_fees}}" class="form-control form-control-sm">
				            </div>
				            <div class="form-group col-md-12">
				              <label for="title">Description</label>
				              <textarea name="description_en" class="form-control" rows="5">{{@$editData->description_en}}</textarea>
				            </div>
									</div>

									@foreach($guideline_faqs as $faq)
									<div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
										<div class="form-row" style="border: 1px solid darkblue;"> 
				              <div class="form-group col-md-2">
				                <label for="subject_id">Serial <span style="color: red;font-weight: bold;">*</span> </label>
				                <input type="text" name="serial[]" value="{{$faq->serial}}" class="form-control form-control-sm">
				              </div>
				              <div class="form-group col-md-10">
				                <label for="subject_id">Question <span style="color: red;font-weight: bold;">*</span> </label>
				                <input type="text" name="question[]" value="{{$faq->question}}" class="form-control form-control-sm">
				              </div>
				              <div class="form-group col-md-11">
				                <label for="subject_id">Answer <span style="color: red;font-weight: bold;">*</span> </label>
				                <textarea name="answer[]" class="form-control form-control-sm" rows="6">{{$faq->answer}}</textarea>
				              </div>
				              <div class="form-group col-md-1" style="padding-top: 35px;">
				                <span class="btn btn-success btn-sm addeventmore" style="margin-right: 5px;"><i class="fa fa-plus-circle"></i></span>
				                <span class="btn btn-danger btn-sm removeeventmore"><i class="fa fa-minus-circle"></i></span>
				              </div>
				            </div>
									</div>
									@endforeach
			            
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

<div style="visibility: hidden;">                     
  <div class="whole_extra_item_add" id="whole_extra_item_add">
    <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
      <div class="form-row" style="border: 1px solid darkblue;">
        <div class="form-group col-md-2">
          <label for="subject_id">Serial <span style="color: red;font-weight: bold;">*</span> </label>
          <input type="text" name="serial[]" class="form-control form-control-sm">
        </div>
        <div class="form-group col-md-10">
          <label for="subject_id">Question <span style="color: red;font-weight: bold;">*</span> </label>
          <input type="text" name="question[]" class="form-control form-control-sm">
        </div>
        <div class="form-group col-md-11">
          <label for="subject_id">Answer <span style="color: red;font-weight: bold;">*</span> </label>
          <textarea name="answer[]" class="form-control form-control-sm" rows="6"></textarea>
        </div>
        <div class="form-group col-md-1" style="padding-top: 35px;">
          <div class="form-row">
            <span class="btn btn-success btn-sm addeventmore" style="margin-right: 5px;"><i class="fa fa-plus-circle"></i></span>
            <span class="btn btn-danger btn-sm removeeventmore"><i class="fa fa-minus-circle"></i></span>
          </div>
        </div>        
      </div>
    </div>
  </div>                            
</div>

<script type="text/javascript">
  $(document).ready(function(){
    var counter = 0;
    $(document).on("click",".addeventmore",function(){
      var whole_extra_item_add = $("#whole_extra_item_add").html();
      $(this).closest(".add_item").append(whole_extra_item_add);
      counter++;
    });
    $(document).on("click",".removeeventmore",function(event){
      $(this).closest(".delete_whole_extra_item_add").remove();
      counter -= 1
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $(document).on('change', '.course_type', function() {
      var course_type = $(this).val();
      if (course_type === 'Others') {
        $('.others_course').show();
        $('.graduate_post_course').hide();
      } else {
        $('.others_course').hide();
        $('.graduate_post_course').show();
      }
    });
  });
</script>

<script>
    $(document).ready(function(){
    	$('#myForm').validate({
    		errorClass:'text-danger',
	      	validClass:'text-success',
	        rules : {
	            'country_id' : {
	                required : true,
	            },
	            'university_id' : {
	                required : true,
	            },
	            "name": {
			          required: true,
			        },
			        "serial[]": {
			          required: true,
			        },
			        "question[]": {
			          required: true,
			        },
			        "answer[]": {
			          required: true,
			        },
	        },
	        messages : {

	        }
	    });
    });
</script>
@endsection