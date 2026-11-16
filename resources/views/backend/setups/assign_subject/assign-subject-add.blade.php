@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Assign Subject</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Assign Subject</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container fullbody">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          Add Assign Subject
          <a href="{{ route('setups.assign.subject.view') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"> Assign Subject List</i></a>
        </h3>
      </div>

      <div class="card-body">
        <form role="form" action="{{ route('setups.assign.subject.store') }}" method="POST" id="MyForm">
        @csrf
          <div class="add_item"> 
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="class_id">Year <span style="color: red;font-weight: bold;">*</span> </label>
                <select name="year_id" class="form-control select2bs4">
                  <option value="">Select Year</option>
                    @foreach($years as $year)
                      <option value="{{ $year->id }}">{{ $year->name }}</option>
                    @endforeach
                </select>                 
              </div>
              <div class="form-group col-md-3">
                <label for="class_id">Class Name <span style="color: red;font-weight: bold;">*</span> </label>
                <select name="class_id" class="form-control select2bs4">
                  <option value="">Select Class</option>
                    @foreach($classes as $class)
                      <option value="{{ $class->id }}">{{ $class->name }}</option>
                    @endforeach
                </select>                 
              </div>                  
            </div>
            <div class="form-row"> 
              <div class="form-group col-md-6">
                <label for="subject_id">Subject Name <span style="color: red;font-weight: bold;">*</span> </label>
                <select name="subject_id[]" class="form-control">
                  <option value="">Select Subject</option>
                    @foreach($subjects as $subject)
                      <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>                 
              </div>
              <div class="form-group col-md-1" style="padding-top: 35px;">
                <span class="btn btn-success btn-sm addeventmore" style="margin-right: 5px;"><i class="fa fa-plus-circle"></i></span>
              </div>
            </div>                                  
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>  
        </form> 
      </div>     

    </div>
  </div>
</div>

<div style="visibility: hidden;">                     
  <div class="whole_extra_item_add" id="whole_extra_item_add">
    <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="subject_id">Subject Name <span style="color: red;font-weight: bold;">*</span> </label>
          <select name="subject_id[]" class="form-control">
            <option value="">Select Subject</option>
              @foreach($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
              @endforeach
          </select>                 
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
  $(document).ready(function () {  
    $('#MyForm').validate({
      rules: {           
        "year_id": {
          required: true,
        },
        "class_id": {
          required: true,
        },
        "subject_id[]": {
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