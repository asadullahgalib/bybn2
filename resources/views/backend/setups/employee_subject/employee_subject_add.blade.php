@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Employee Assign Subject</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Employee</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>

<div class="container fullbody">
  <div class="col-md-12">
    <div class="card card_all">
      <div class="card-header">
        <h3 class="card-title">
          @if(isset($editData))
            Employee Assign Subject
          @else
            Employee Assign Subject
          @endif
          <a href="{{ route('setups.employee.subject.view') }}" class="btn btn-success float-right btn-sm custom_btn"><i class="fa fa-list"> Employee Assign Subject List</i></a>
        </h3>
      </div>

          <div class="card-body">
            <form>
              <div class="form-row">
                <div class="form-group col-md-8">
                  <label>Teacher Name <span style="color:red;font-weight: bold;">*</span></label>
                  <select name="user_id" id="user_id" class="form-control form-control-sm select2 user_id">
                    <option value="">Select Teacher</option>
                    @foreach($teachers as $teacher)
                    <option value="{{$teacher->id}}">{{$teacher->name}} - {{$teacher->mobile}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label>Year <span style="color:red;font-weight: bold;">*</span></label>
                  <select name="year_id" id="year_id" class="form-control form-control-sm select2 year_id">
                    <option value="">Select Year</option>
                    @foreach($years as $year)
                    <option value="{{$year->id}}" {{(@$editData->year_id==$year->id)?"selected":""}}>{{$year->name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label>Class <span style="color:red;font-weight: bold;">*</span></label>
                  <select name="class_id" id="class_id" class="form-control form-control-sm select2 class_id">
                    <option value="">Select Class</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label>Subject <span style="color:red;font-weight: bold;">*</span></label>
                  <select name="subject_id" id="subject_id" class="form-control form-control-sm select2 subject_id">
                    <option value="">Select Subject</option>
                  </select>
                </div>
                <div class="form-group col-md-1" style="padding-top:30px">
                  <i id="search" class="btn btn-primary fa fa-plus-circle addeventmore"> Add</i>
                </div>
              </div>
            </form>
          </div>

          <div class="card border-info">
            <form method="post" action="{{route('setups.employee.subject.store')}}" id="myForm">
              @csrf
              <div class="card-body table table-responsive">
                <table class="table-sm table-bordered table-sm" width="100%">
                  <thead>
                    <tr class="text-center">
                      <th>Class</th>
                      <th>Subject</th>
                      <th width="5%">Action</th>
                    </tr>
                  </thead>
                  <tbody id="addRow" class="addRow">

                  </tbody>
                </table>
                
                <br>
                <div class="form-group">
                  <button type="submit" class="btn btn-sm btn-primary" id="storeButton">Assign Subject</button>
                </div>
              </div>
            </form>
          </div>
    </div>
  </div>
</div>

<script id="document-template" type="text/x-handlebars-template">
  <tr class="delete_add_more_item text-center" id="delete_add_more_item">
    <td>
      <input type="hidden" name="user_id" value="@{{user_id}}">
      <input type="hidden" name="year_id" value="@{{year_id}}">
      <input type="hidden" name="class_id[]" value="@{{class_id}}">
      <input type="hidden" name="subject_id[]" value="@{{subject_id}}">
      @{{class_name}}
    </td> 
    <td>
      @{{subject_name}}
    </td>
    <td>
      <i class="btn btn-danger fa fa-close removeeventmore"> </i>
    </td>

  </tr>
</script>

<!-- extra_add_exist_item -->
<script type="text/javascript">
  $(document).ready(function () {
    $(document).on("click",".addeventmore", function () {
      var user_id = $('#user_id').val();
      var year_id = $('#year_id').val();
      var year_name  = $('#year_id').find('option:selected').text();
      var class_id = $('#class_id').val();
      var class_name  = $('#class_id').find('option:selected').text();
      var section_id = $('#section_id').val();
      var section_name  = $('#section_id').find('option:selected').text();
      var subject_id = $('#subject_id').val();
      var subject_name  = $('#subject_id').find('option:selected').text();

      $('.notifyjs-corner').html('');

      if(user_id ==''){
        $.notify("Teacher is required", {globalPosition: 'top right',className: 'error'});
        return false;
      }
      if(year_id ==''){
        $.notify("Year is required", {globalPosition: 'top right',className: 'error'});
        return false;
      }
      if(class_id ==''){
        $.notify("Class is required", {globalPosition: 'top right',className: 'error'});
        return false;
      }
      if(subject_id ==''){
        $.notify("Subject is required", {globalPosition: 'top right',className: 'error'});
        return false;
      }

      var source = $("#document-template").html();
      var template = Handlebars.compile(source);
      var data= {user_id:user_id,year_id:year_id,year_name:year_name,class_id:class_id,class_name:class_name,subject_id:subject_id,subject_name:subject_name};
      var html = template(data);
      $("#addRow").append(html);
    });

    $(document).on("click", ".removeeventmore", function (event) {
      $(this).closest(".delete_add_more_item").remove();
    });

  });
</script>

<script type="text/javascript">
  $(function(){
    $(document).on('change','#year_id',function(){
      var year_id = $(this).val();
      $.ajax({
        url : "{{route('get-class.by-year')}}",
        type : "GET",
        data : {year_id:year_id},
        success:function(data){
          var html = '<option value="">Select Class</option>';
          $.each(data,function(key,v){
            html +='<option value="'+v.class_id+'">'+v.student_class.name+'</option>';
          });
          $('#class_id').html(html);
          var class_id = "{{@$class_id}}";
          if(class_id !=''){
            $('#class_id').val(class_id).trigger('change');
          }
        }
      });
    });
  });
</script>

<script type="text/javascript">
  $(document).on('change','.class_id,.year_id',function(){
    var year_id = $('.year_id').val();
    var class_id = $('.class_id').val();
    $.ajax({
      url:"{{route('get-subject-for-exam')}}",
      type:"GET",
      data:{year_id:year_id,class_id:class_id},
      success:function(data){
        var html = '<option value="">Select Subject</option>';
          $.each(data,function(key,v){
            html +='<option value="'+v.subject_id+'">'+v.subject.name+'</option>';
          });
          $('.subject_id').html(html);
          var subject_id = "{{@$editData->subject_id}}";
          if(subject_id !=''){
            $('.subject_id').val(subject_id);
          }
        $('.select2').select2({
        });
      }
    });
  });
</script>

@endsection
