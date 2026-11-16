@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Notice</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Notice</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>

<div class="card card_all">
  <div class="card-header">
    <h3 class="card-title">Notice
    </h3>
  </div>

  <form method="POST" action="{{ route('sms.manual.send') }}" id="SearchMyForm">
    @csrf
    <div class="card-body">
      <div class="form-row">
        <div class="form-group col-md-12">
          <label>To Numbers <span style="color:red;font-weight: bold;">*</span></label>
          <textarea name="mobile" class="form-control" rows="5"></textarea>
        </div>
        <div class="form-group col-md-12">
          <label>Message <span style="color:red;font-weight: bold;">*</span></label>
          <textarea name="message" class="msgInput form-control" rows="5"></textarea>
        </div>
        <div class="form-group col-md-12" style="font-weight: bold;">
          Characters left <span class="msgCounter" style="color: red;"></span>
        </div>

        <div class="form-group col-md-2">
          <button type="submit" id="search" name="button" class="btn btn-primary" name="search">Send SMS</button>
        </div>
      </div>
    </div>
  </form>
</div>

<script type="text/javascript">
  $(document).ready(function () {
    $('#SearchMyForm').validate({
      rules:{
        "mobile":{
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
