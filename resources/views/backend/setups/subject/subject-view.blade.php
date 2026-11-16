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
        <h3 class="card-title">Subject List
          <a href="{{ route('setups.subject.add') }}" class="btn btn-success float-right btn-sm custom_btn"><i class="fa fa-plus-circle"> Add Subject</i></a>
        </h3>
      </div>

      <div class="card-body">
        <table id="example1" class="table table-bordered">
          <thead>
          <tr>
            <th width="15%">SL</th>
            <th>Subject in English</th>
            <th>Subject in Bangla</th>
            <th width="15%">Action</th>
          </tr>
          </thead>
          <tbody>
          @foreach($subjects as $key=>$subject)
            @php
              $assing_subject_count = App\Model\AssignSubject::where('subject_id',$subject->id)->count();
              $student_marks_count = App\Model\StudentMarks::where('subject_id',$subject->id)->count();
            @endphp
            <tr class="text-center">
              <td>{{ $key + 1 }}</td>
              <td>{{ $subject->name }}</td>
              <td>{{ $subject->name_bn }}</td>
              <td>
                <a href="{{ route('setups.subject.edit',$subject->id) }}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                @if($assing_subject_count <1 && $student_marks_count <1)
                <a id="delete" href="{{ route('setups.subject.delete') }}" data-token="{{csrf_token()}}" data-id="{{$subject->id}}" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a>
                @endif  
              </td>
            </tr> 
          @endforeach               
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>

@endsection