@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Subject</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Subject</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container fullbody">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          @if(isset($subjects))
            Update Subject
          @else
            Add Subject
          @endif
          <a href="{{ route('setups.subject.view') }}" class="btn btn-success float-right btn-sm custom_btn"><i class="fa fa-list"> Subject List</i></a>
        </h3>
      </div>

      <form role="form" action="{{(@$subjects)?route('setups.subject.update',$subjects->id):route('setups.subject.store')}}" method="POST" id="MyForm">
        @csrf
          <div class="card-body">
            <div class="form-row">                   
              <div class="form-group col-md-5">
                <label for="name">Subject in English <span style="color:red;">*</span> </label>
                <input type="text" name="name" class="form-control" value="{{ @$subjects->name }}"> 
                <font style="color: red"> 
                  {{($errors->has('name'))?($errors->first('name')):''}} 
                </font>                 
              </div>
              <div class="form-group col-md-5">
                <label for="name">Subject in Bangla <span style="color:red;">*</span> </label>
                <input type="text" name="name_bn" class="form-control" value="{{ @$subjects->name_bn }}">
              </div>
              <div class="form-group col-md-2" style="padding-top: 31px;">
                <button type="submit" class="btn btn-primary">@if(isset($subjects)) Update @else Submit @endif</button>
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