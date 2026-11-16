@extends('backend.layouts.master')
@section('content')
  <div class="col-md-12" style="padding-top: 40px;">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Blood Donate List
          <a href="{{ route('web-site.donation.add') }}" class="btn btn-success float-right btn-sm custom_btn"><i class="fa fa-plus-circle"> Add Blood Donate</i></a>
        </h3>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-sm">
            <thead>
            <tr>
              <th width="8%">SL</th>
              <th>Date</th>
              <th>Name</th>
              <th>Mobile</th> 
              <th>Address</th>
              <th>Blood Group</th>
              <th width="12%">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($allData as $key=> $value)
              <tr class="text-center">
                <td style="vertical-align: middle;">{{ $key + 1 }}</td>
                <td style="vertical-align: middle;">{{ date('d-m-Y',strtotime($value->date)) }}</td>
                <td style="vertical-align: middle;">{{ $value->name }}</td>
                <td style="vertical-align: middle;">{{ $value->mobile }}</td> 
                <td style="vertical-align: middle;">{{ $value->address }}</td>
                <td style="vertical-align: middle;">{{ $value->blood_group }}</td>
                <td style="vertical-align: middle;">
                  <a href="{{ route('web-site.donation.edit',$value->id) }}" class="btn btn-info btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                  <a title="Delete" href="{{ !empty($value->id) ? route('web-site.donation.delete') : ''}}" id="delete" class="btn btn-danger btn-sm deleteBtn"  data-token="{{ csrf_token() }}" data-id="{{ $value->id }}"><i class="fa fa-trash"></i> </a>
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