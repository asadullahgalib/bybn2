@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Student Notice</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Student Notice</li>
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

      <form method="POST" action="{{ route('sms.student.notice.send') }}" id="SearchMyForm">
        @csrf
        <div class="card-body">            
          <div class="form-row">                   
            <div class="form-group col-md-6">
              <label for="year_id">Year <span style="color:red;font-weight: bold;">*</span></label>
              <select name="year_id" class="form-control select2 year_id">
                <option value="">Select Year</option>
                @foreach($years as $year)
                <option value="{{ $year->id }}" {{(request()->year_id == $year->id)?"selected":""}}>{{ $year->name }}</option>
                @endforeach
              </select>             
            </div>
            <div class="form-group col-md-6">
              <label for="class_id">Class </label>
              <select name="class_id" class="form-control select2 class_id">
                <option value="">Select Class</option>
                @foreach($classes as $class)
                <option value="{{ $class->id }}" {{(request()->class_id == $class->id)?"selected":""}}>{{ $class->name }}</option>
                @endforeach
              </select>             
            </div>
            <div class="form-group col-md-12">
              <label>Message <span style="color:red;font-weight: bold;">*</span></label>
              <textarea name="message" class="msgInput form-control form-control-sm" rows="7"></textarea>
            </div>
            <div class="form-group col-md-12" style="font-weight: bold;">
              Characters left <span class="msgCounter" style="color: red;"></span>
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
        "year_id":{
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

<script>
  const getCurrentContentLength = (content, max) => {
    const maxLength = max;
    if (content.length > maxLength) {
      return false;
    } else {
      return true;
    }
  }
  const msgInput = document.querySelector('.msgInput');
  const counter = document.querySelector('.msgCounter');
  const max = 160;
  // Nope
  // msgInput.addEventListener('keyup', (e) => {
  //   console.log(e);
  // });
  msgInput.onkeyup = function() {
    counter.innerHTML = max - this.value.length;
    if(!getCurrentContentLength(this.value, (max - 1))) {
      msgInput.disabled = false;
    }
  }
</script>

@endsection