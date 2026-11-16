@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Fee Category Amount</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Fee Amount</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container fullbody">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Fee Amount Details Info
          <a href="{{ route('setups.fee.amount.view') }}" class="btn btn-success float-right btn-sm custom_btn"><i class="fa fa-list"> Fee Amount List</i></a>
        </h3>
      </div>

      <div class="card-body">
        <h6><strong>Year :</strong>{{ $feeAmounts[0]['year']['name'] }}, &nbsp;&nbsp; <strong>Fee Category :</strong>{{ $feeAmounts[0]['fee_category']['name'] }}</h6>
        <table class="table table-bordered table-sm">
          <thead>
          <tr>
            <th>SL</th>
            <th>Student Class</th>
            <th>Fee Amount</th>
          </tr>
          </thead>
          <tbody>
          @foreach($feeAmounts as $key=>$feeAmount)
            <tr class="text-center">
              <td>{{ $key + 1 }}</td>
              <td>{{ @$feeAmount['student_class']['name'] }}</td>
              <td>{{ $feeAmount->amount }}</td>
            </tr> 
          @endforeach               
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>

@endsection