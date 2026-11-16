@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Teacher Report</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Teacher Report</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container fullbody">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Search Criteria</h3>
      </div>

      <form method="POST" action="{{route('teachers.report.pdf')}}" id="myForm" target="_blank">
        @csrf
        <div class="card-body">            
          <div class="form-row">                   
            <div class="form-group col-md-6">
              <label for="year_id">Teacher Class</label>
              <select name="teacher_class_id" id="teacher_class_id" class="form-control select2">
                <option value="">Select Class</option>
                @foreach($groups as $group)
                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach
              </select>            
            </div>
            <div class="form-group col-md-4" style="padding-top:30px">
              <a id="search" class="btn btn-primary btn-sm" name="search" style="cursor: pointer;"><i class="fa fa-search"></i> Search</a>
              <button type="submit" name="button" value="pdf" class="btn btn-sm btn-success"><i class="fa fa-file-pdf-o"></i> PDF</button>
              <button type="submit" name="button" value="excel" class="btn btn-sm btn-warning"><i class="fa fa-file-excel-o"></i> Excel</button>      
            </div>
          </div>            
        </div>
      </form>

      <div class="card-body">
        <div id="DocumentResults"></div> 
          <script id="document-template" type="text/x-handlebars-template">
            <table class="table table-bordered table-striped table-sm">
              <thead>
                <tr>
                  @{{{thsource}}}
                </tr>
              </thead>
              <tbody>
                @{{#each this}}
                <tr>
                  @{{{tdsource}}}
                </tr>
                @{{/each}}
              </tbody>
            </table>
          </script>
        </div>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
  $("#myForm").submit(function( event ) {
    var teacher_class_id = $('#teacher_class_id').val();
    if (teacher_class_id == ''){
      $('.notifyjs-corner').html('');
      $.notify("Teacher class is required", {globalPosition: 'top right',className: 'error'});
      event.preventDefault();
    }else{
      return true;
    }

  });
</script>

<script type="text/javascript">
  //Registration Fee
  $(document).on('click','#search',function(){
    var teacher_class_id = $('#teacher_class_id').val();
    $('.notifyjs-corner').html('');
    if(teacher_class_id == ''){
      $.notify("Teacher class is required!", {globalPosition: 'top right',className: 'error'});
      return false;
    }
    $.ajax({
      url: "{{route('teachers.report.handlebar')}}",
      type: "GET",
      data: {'teacher_class_id': teacher_class_id},
      beforeSend: function(){

      },
      success: function(data){
        var source = $("#document-template").html();
        var template = Handlebars.compile(source);
        var html = template(data);
        $('#DocumentResults').html(html);
        $('[data-toggle="tooltip"]').tooltip();
      }
    });
  });
</script>

@endsection