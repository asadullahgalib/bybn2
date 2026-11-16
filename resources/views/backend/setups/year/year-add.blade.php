@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Year/Session</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Year/Session</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container fullbody">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          @if(isset($years))
            Update Year/Session
          @else
            Add Year/Session
          @endif
          <a href="{{ route('setups.student.year.view') }}" class="btn btn-success float-right btn-sm custom_btn"><i class="fa fa-list"> Year/Session List</i></a>
        </h3>
      </div>

      <form role="form" action="{{(@$years)?route('setups.student.year.update',$years->id):route('setups.student.year.store')}}" method="POST" id="MyForm">
        @csrf
          <div class="card-body">
            <div class="form-row">                   
              <div class="form-group col-md-6">
                <label for="name">Year/Session</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Year/Session" value="{{ @$years->name }}"> 
                <font style="color: red"> 
                  {{($errors->has('name'))?($errors->first('name')):''}} 
                </font>                 
              </div>
              <div class="form-group col-md-6" style="padding-top: 31px;">
                <button type="submit" class="btn btn-primary">@if(isset($years)) Update @else Submit @endif</button>
              </div>
            </div>
          </div>
        </form>       

    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {  
    $('#MyForm').validate({
      rules: {           
        name: {
          required: true,
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