@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Exam Room</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Exam Room</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container fullbody">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          @if(isset($editData))
            Update Exam Room
          @else
            Add Exam Room
          @endif
          <a href="{{ route('setups.exam.room.view') }}" class="btn btn-success float-right btn-sm custom_btn"><i class="fa fa-list"> Exam Room List</i></a>
        </h3>
      </div>

      <form role="form" action="{{(@$editData)?route('setups.exam.room.update',$editData->id):route('setups.exam.room.store')}}" method="POST" id="MyForm">
        @csrf
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="class_id">Class <span style="color:red;font-weight: bold;">*</span></label>
                <select name="class_id" class="form-control form-control-sm class_id">
                  <option value="">Select Class</option>
                  @foreach($classes as $class)
                  <option value="{{ $class->id }}" {{(@$editData->class_id == $class->id)?"selected":""}}>{{ $class->name }}</option>
                  @endforeach
                </select>             
              </div>                
              <div class="form-group col-md-3">
                <label for="name">Room <span style="color:red;font-weight: bold;">*</span></label>
                <input type="text" name="room_no" class="form-control form-control-sm"  value="{{ @$editData->room_no }}">  
              </div>
              <div class="form-group col-md-3">
                <label for="name">Start Roll <span style="color:red;font-weight: bold;">*</span></label>
                <input type="text" name="start_roll" class="form-control form-control-sm"  value="{{ @$editData->start_roll }}">  
              </div>
               <div class="form-group col-md-3">
                <label for="name">End Roll <span style="color:red;font-weight: bold;">*</span></label>
                <input type="text" name="end_roll" class="form-control form-control-sm"  value="{{ @$editData->end_roll }}">  
              </div>
              <div class="form-group col-md-4">
                <button type="submit" class="btn btn-primary">@if(isset($editData)) Update @else Submit @endif</button>
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
        class_id: {
          required: true,
        },
        room_no: {
          required: true,
        },
        start_roll: {
          required: true,
        },
        end_roll: {
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