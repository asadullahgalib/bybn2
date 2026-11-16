@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Bank</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Bank</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container fullbody">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3>Bank List
          <a class="btn btn-success float-right btn-sm custom_btn" href="{{route('setup.bank.add')}}"><i class="fa fa-plus-circle"></i> Add Bank</a>
        </h3>
      </div>

      <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th width="6%">SL.</th>
              <th>Bank Name</th>
              <th>Account Name</th>
              <th>Account No</th>
              <th>Branch</th>
              <th width="12%">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($allData as $key => $value)
            <tr class="text-center">
              <td>{{$key+1}}</td>
              <td>{{$value->name}}</td>
              <td>{{$value->account_name}}</td>
              <td>{{$value->account_no}}</td>
              <td>{{$value->branch}}</td>
              <td>
                <a title="Edit" class="btn btn-sm btn-primary" href="{{route('setup.bank.edit',$value->id)}}"><i class="fa fa-edit"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div><!-- /.card-body -->

    </div>
  </div>
</div>

@endsection