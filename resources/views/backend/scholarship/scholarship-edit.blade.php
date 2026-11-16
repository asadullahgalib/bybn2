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
								Update Scholarship
								@else
								Add Scholarship
								@endif 
								<a class="btn btn-sm btn-success float-right custom_btn" href="{{route('web-site.scholarship.view')}}"><i class="fa fa-list"></i> Scholarship List</a></h5>
						</div>
						<!-- Form Start-->
						<form method="post" action="{{!empty($editData->id) ? route('web-site.scholarship.update',$editData->id) : route('web-site.scholarship.store')}}" enctype="multipart/form-data" id="myForm">
							{{csrf_field()}}
							<div class="card-body">
								<div class="add_item">
									<div class="form-row">
										<div class="form-group col-md-4">
											<label class="control-label">Country <span style="color:red">*</span> </label>
											<select name="country_id" id="country_id" class="form-control form-control-sm">
			                  <option value="">Select Country</option>
			                  @foreach($countries as $country)
			                  <option value="{{$country->id}}" {{(@$editData->country_id==$country->id)?"selected":""}}>{{$country->name}}</option>
			                  @endforeach
			                </select>
										</div>
										<div class="form-group col-md-4">
											<label class="control-label">University <span style="color:red">*</span> </label>
											<select name="university_id" id="university_id" class="form-control form-control-sm">
			                  <option value="">Select University</option>
			                </select>
										</div>
				            <div class="form-group col-md-3">
				              <label for="image">Image <span style="color:red">(2600px X 1300px)</span></label>
				              <input type="file" name="image" class="form-control" id="image2">
				            </div>
				            <div class="form-group col-md-1">
				              <img id="showImage2" src="{{(!empty($editData->image))?url('public/upload/scholarship_images/'.$editData->image):url('public/upload/no_image.png')}}" style="width: 80px;height: 60px;border:1px solid #000;">
				            </div>
				            <div class="form-group col-md-6">
				              <label for="image">Scholarship Name <span style="color:red">*</span></label>
				              <input type="text" name="name" value="{{@$editData->name}}" class="form-control form-control-sm">
				            </div>
				            <div class="form-group col-md-3">
				              <label for="image">Study Level <span style="color:red">*</span></label>
				              <input type="text" name="study_level" value="{{@$editData->study_level}}" class="form-control form-control-sm">
				            </div>
				            <div class="form-group col-md-3">
				              <label for="image">Deadline <span style="color:red">*</span></label>
				              <input type="text" name="deadline" value="{{@$editData->deadline}}" class="form-control form-control-sm">
				            </div>
				            <div class="form-group col-md-3">
				              <label for="image">Funding Type <span style="color:red">*</span></label>
				              <input type="text" name="funding_type" value="{{@$editData->funding_type}}" class="form-control form-control-sm">
				            </div>
				            <div class="form-group col-md-3">
				              <label for="image">Value of Award </label>
				              <input type="text" name="value_award" value="{{@$editData->value_award}}" class="form-control form-control-sm">
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
  $(function(){
    $(document).on('change','#country_id',function(){
      var country_id = $(this).val();
      $.ajax({
        url : "{{route('get-country-university')}}",
        type : "GET",
        data : {country_id:country_id},
        success:function(data){
          var html = '<option value="">Select University</option>';
          $.each(data,function(key,v){
            html +='<option value="'+v.id+'">'+v.name+'</option>';
          });
          $('#university_id').html(html);
          var university_id = "{{@$editData->university_id}}";
          if(university_id !=''){
            $('#university_id').val(university_id).trigger('change');
          }
        }
      });
    });
  });
</script>

<script type="text/javascript">
  $(function(){
    var country_id = "{{@$editData->country_id}}";
    if(country_id){
      $('#country_id').val(country_id).trigger('change');
    }
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