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
        <h3 class="card-title">Class List
          <!-- <a href="{{ route('setups.student.class.add') }}" class="btn btn-success float-right btn-sm custom_btn"><i class="fa fa-plus-circle"> Add Class</i></a> -->
        </h3>
      </div>

      <div class="card-body">
        <table id="example1" class="table table-bordered">
          <thead>
          <tr>
            <th width="10%">SL</th>
            <th>Name in English</th>
            <th>Name in Bangla</th>
            <th width="12%">Action</th>
          </tr>
          </thead>
          <tbody>
          @foreach($classDetails as $key=>$detail)
            @php
              $assing_student_count = App\Model\AssignStudent::where('class_id',$detail->id)->count();
              $assign_subject_count = App\Model\AssignSubject::where('class_id',$detail->id)->count();
              $fee_category_amount_count = App\Model\FeeCategoryAmount::where('class_id',$detail->id)->count();
            @endphp
            <tr class="text-center">
              <td>{{ $key + 1 }}</td>
              <td>{{ $detail->name }}</td>
              <td>{{ $detail->name_bn }}</td>
              <td>
                <a href="{{ route('setups.student.class.edit',$detail->id) }}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                @if($assing_student_count <1 && $assign_subject_count <1 && $fee_category_amount_count <1)
                <!-- <a id="delete" href="{{ route('setups.student.class.delete') }}" data-token="{{csrf_token()}}" data-id="{{$detail->id}}" class="btn btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a> -->
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