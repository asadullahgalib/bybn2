@extends('backend.layouts.master')
@section('content')

  <div class="col-md-12" style="padding-top:40px">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          @if(isset($editData))
          Update Map
          @else
          Add Map
          @endif
          <a class="btn btn-success float-right btn-sm" href="{{route('web-site.map.view')}}"><i class="fa fa-list"></i> Map List</a>
        </h3>
      </div>

      <div class="card-body">
        <form method="post" action="{{(@$editData)?route('web-site.map.update',$editData->id):route('web-site.map.store')}}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="form-row">
            <div class="form-group col-md-12">
              <label>Map Location Link</label>
              <textarea name="description" class="form-control" rows="5" required>{{@$editData->description}}</textarea>
            </div>
            <div class="form-group col-md-3">
              <button type="submit" class="btn btn-primary">{{(@$editData)?"Update":"Submit"}}</button>
            </div>
          </div>
        </form>
      </div><!-- /.card-body -->

    </div>
  </div>

<script type="text/javascript">
    $(document).ready(function () {

      $('#myForm').validate({
        ignore : [],
        debug : false,
        rules: {
          description: {
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