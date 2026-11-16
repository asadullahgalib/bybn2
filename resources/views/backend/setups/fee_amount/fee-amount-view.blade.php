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
        <h3 class="card-title">Fee Amount List
          <a href="{{ route('setups.fee.amount.add') }}" class="btn btn-success float-right btn-sm custom_btn"><i class="fa fa-plus-circle"> Add Fee Amount</i></a>
        </h3>
      </div>

      <div class="card-body">
        <table id="example1" class="table table-bordered">
          <thead>
          <tr>
            <th width="12%">SL</th>
            <th>Year/Session</th>
            <th>Fee Category</th>
            <th width="12%">Action</th>
          </tr>
          </thead>
          <tbody>
          @foreach($feeAmounts as $key=>$feeAmount)
            <tr class="text-center">
              <td>{{ $key + 1 }}</td>
              <td>{{ @$feeAmount['year']['name'] }}</td>
              <td>{{ @$feeAmount['fee_category']['name'] }}</td>
              <td>
                <a href="{{ route('setups.fee.amount.edit',$feeAmount->grouprandom) }}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></a>     
                <a href="{{ route('setups.fee.amount.details',$feeAmount->grouprandom) }}" class="btn btn-primary btn-sm" title="Details"><i class="fa fa-eye"></i></a>                
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