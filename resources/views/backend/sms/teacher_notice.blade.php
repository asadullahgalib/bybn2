@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage External Teacher Notice</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">External Teacher Notice</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container fullbody">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Search Criteria
        </h3>
      </div>

      <form method="POST" action="{{ route('sms.external.teacher.send') }}" id="SearchMyForm">
        @csrf
        <div class="card-body">            
          <div class="form-row">   
            <div class="form-group col-md-4">
              <label for="class_id">Class <span style="color:red;font-weight: bold;">*</span></label>
              <select name="teacher_class_id" class="form-control form-control-sm select2">
                  <option value="">Select Class</option>
                 @foreach($groups as $group)
                  <option value="{{$group->id}}" {{(@$editData->teacher_class_id == $group->id)?('selected'):''}}>{{$group->name}}</option>
                 @endforeach
              </select>   
            </div>
            <div class="form-group col-md-8">
              <label>Message <span style="color:red;font-weight: bold;">*</span></label>
              <textarea name="message" class="form-control form-control-sm" cols="3"></textarea>
            </div>
            <div class="form-group col-md-1 mt-auto">
              <button type="submit" id="search" name="button" class="btn btn-primary btn-sm" name="search">Submit</button>            
            </div>
          </div>            
        </div>
      </form>

    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {  
    $('#SearchMyForm').validate({
      rules:{
        "teacher_class_id":{
          required:true
        },
        "message":{
          required:true
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