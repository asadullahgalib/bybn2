@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Student Result SMS</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">SMS</li>
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

      <form method="GET" action="{{ route('sms.result.search') }}" id="SearchMyForm">
        <div class="card-body">            
          <div class="form-row">                                  
            <div class="form-group col-md-2">
              <label for="year_id">Year <span style="color:red;font-weight:bold;">*</span></label>
              <select name="year_id" id="year_id" class="form-control select2 year_id">
                <option value="">Select Year</option>
                @foreach($years as $year)
                <option value="{{ $year->id }}" {{(request()->year_id == $year->id)?"selected":""}}>{{ $year->name }}</option>
                @endforeach
              </select>             
            </div>
            <div class="form-group col-md-1">
              <label for="shift_id">Section</label>
              <select name="shift_id" id="shift_id" class="form-control select2 shift_id">
                <option value="">Select Section</option>
                @foreach($shifts as $shift)
                <option value="{{ $shift->id }}" {{(request()->shift_id == $shift->id)?"selected":""}}>{{ $shift->name }}</option>
                @endforeach
              </select>              
            </div>
            <div class="form-group col-md-3">
              <label for="class_id">Class <span style="color:red;font-weight:bold;">*</span></label>
              <select name="class_id" id="class_id" class="form-control select2 class_id">
                <option value="">Select Class</option>
                @foreach($classes as $class)
                <option value="{{ $class->id }}" {{(request()->class_id == $class->id)?"selected":""}}>{{ $class->name }}</option>
                @endforeach
              </select>             
            </div>
            <div class="form-group col-md-2">
              <label for="group_id">Group</label>
              <select name="group_id" id="group_id" class="form-control select2 group_id">
                <option value="">Select Group</option>
                @foreach($groups as $group)
                <option value="{{ $group->id }}" {{(request()->group_id == $group->id)?"selected":""}}>{{ $group->name }}</option>
                @endforeach
              </select>             
            </div>
            <div class="form-group col-md-2">
              <label>Date <span style="color:red;font-weight:bold;">*</span></label>
              <input type="text" id="date" name="date" class="form-control form-control-sm singledatepicker" value="{{request()->date}}" autocomplete="off" placeholder="DD-MM-YYYY" style="background-color:#fff" readonly>
            </div>
            <div class="form-group col-md-1" style="padding-top:30px">
              <button type="submit" class="btn btn-sm btn-success">Search</button>    
            </div>
          </div>            
        </div>
      </form>

      @if(isset($student_marks) && $student_marks->count() >="1")
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <table class="table table-bordered table-striped table-sm">
                <tbody>
                  <tr>
                    <td><strong>তারিখ</strong></td>
                    <td><strong>রোল</strong></td>
                    <td><strong>উপস্থিতি</strong></td>
                    <td><strong>পরীক্ষা বিবরণ ও বিষয়</strong></td>
                    <td><strong>মোট নম্বর</strong></td>
                    <td><strong>প্রাপ্ত নম্বর</strong></td>
                    <td><strong>পজিশন</strong></td>
                    <td><strong>সর্বোচ্চ (4)</strong></td>
                    <td><strong>সর্বনিম্ন (4)</strong></td>
                  </tr>
                  @foreach($student_marks as $key=> $value)
                  @php
                    $exam = App\Model\Exam::where('exam_type_id',$value->exam_type_id)->first();
                    $assing_student = App\Model\AssignStudent::where('year_id',$value->year_id)->where('class_id',$value->class_id)->where('student_id',$value->student_id)->first();
                    $heightest_4 = App\Model\StudentMarks::where('date',$value->date)->where('year_id',$value->year_id)->where('class_id',$value->class_id)->where('shift_id',$value->shift_id)->where('subject_id',$value->subject_id)->where('exam_type_id',$value->exam_type_id)->where('total_mark','!=','0')->orderBy('total_mark','desc')->get()->take(4);
                    $lowest_4 = App\Model\StudentMarks::where('date',$value->date)->where('year_id',$value->year_id)->where('class_id',$value->class_id)->where('shift_id',$value->shift_id)->where('subject_id',$value->subject_id)->where('exam_type_id',$value->exam_type_id)->where('total_mark','!=','0')->orderBy('total_mark','asc')->get()->take(4);
                    $rank = App\Model\StudentMarks::where('date',$value->date)->where('year_id',$value->year_id)->where('class_id',$value->class_id)->where('shift_id',$value->shift_id)->where('subject_id',$value->subject_id)->where('exam_type_id',$value->exam_type_id)->where('total_mark','!=','0')->pluck('total_mark')->toArray();
                    $array_unique_data = array_unique($rank);
                    rsort($array_unique_data);
                    $position = array_search($value->total_mark,$array_unique_data);
                  @endphp
                  <tr>
                    <td><span>{{date('d-m-Y',strtotime($value->date))}}</span></td>
                    <td><span>{{$assing_student->roll}}</span></td>
                    <td>
                      @if($value->total_mark !="0")
                      <span>P</span>
                      @else
                      <span style="color:red">A</span>
                      @endif
                    </td>
                    <td><span style="font-size:13px">{{@$value['exam_type']['name']}} - {{@$value['subject']['name']}}</span></td>
                    <td><span>{{$value->full_mark}}</span></td>
                    <td>
                      <span>
                        @if($value->total_mark !="0")
                      {{$value->total_mark}}
                      @else
                      @endif
                      </span>
                    </td>
                    <td>
                      <span>{{(in_array($value->total_mark,$array_unique_data))?($position+1):''}}</span>
                    </td>
                    <td>
                      @foreach($heightest_4 as $h)
                        @php
                          $heighest_roll = App\Model\AssignStudent::where('year_id',$h->year_id)->where('class_id',$h->class_id)->where('student_id',$h->student_id)->first();
                        @endphp
                        <span>{{$h->total_mark}}</span>-<span style="color:red">({{$heighest_roll->roll}})</span>,
                      @endforeach
                    </td>
                    <td>
                      @foreach($lowest_4 as $l)
                        @php
                          $lowest_roll = App\Model\AssignStudent::where('year_id',$l->year_id)->where('class_id',$l->class_id)->where('student_id',$l->student_id)->first();
                        @endphp
                        <span>{{$l->total_mark}}</span>-<span style="color:red">({{$lowest_roll->roll}})</span>,
                      @endforeach
                    </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
            <form method="POST" action="{{route('sms.result.send')}}">
              @csrf
              <input type="hidden" name="year_id" value="{{@$year_id}}">
              <input type="hidden" name="class_id" value="{{@$class_id}}">
              <input type="hidden" name="shift_id" value="{{@$shift_id}}">
              <input type="hidden" name="group_id" value="{{@$group_id}}">
              <input type="hidden" name="date" value="{{@$date}}">
              <button type="submit" class="btn btn-primary">Send SMS</button>
            </form>
          </div>
        </div>
      </div>
      @elseif(isset($student_marks) && $student_marks->count() >="0")
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <h4 style="color:red">Sorry There are no result on this date.</h4>
          </div>
        </div>
      </div>
      @endif
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {  
    $('#SearchMyForm').validate({
      rules: {           
        year_id: {
          required: true,
        },
        class_id: {
          required: true,
        },
        date: {
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