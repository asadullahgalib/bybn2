@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Student Class</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Student Class</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container fullbody">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          @if(isset($studentClass))
            Update Class
          @else
            Add Class
          @endif
          <a href="{{ route('setups.student.class.view') }}" class="btn btn-success float-right btn-sm custom_btn"><i class="fa fa-list"> Class List</i></a>
        </h3>
      </div>

      <form role="form" action="{{(@$studentClass)?route('setups.student.class.update',$studentClass->id):route('setups.student.class.store')}}" method="POST" id="MyForm">
        @csrf
          <div class="card-body">
            <div class="form-row">                   
              <div class="form-group col-md-4">
                <label for="name">Name in English</label>
                <input type="text" name="name" class="form-control" value="{{ @$studentClass->name }}"> 
                <font style="color: red"> 
                  {{($errors->has('name'))?($errors->first('name')):''}} 
                </font>                 
              </div>
              <div class="form-group col-md-4">
                <label for="name">Name in Bangla</label>
                <input type="text" name="name_bn" class="form-control" value="{{ @$studentClass->name_bn }}"> 
              </div>
              <div class="form-group col-md-4" style="padding-top: 31px;">
                <button type="submit" class="btn btn-primary">@if(isset($studentClass)) Update  @else Submit  @endif</button>  
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
        },
        name_bn: {
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