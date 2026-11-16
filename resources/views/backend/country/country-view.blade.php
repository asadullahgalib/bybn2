@extends('backend.layouts.master')
@section('content')
    <section class="content" style="padding-top: 40px;">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
      				<div class="card-header">
      					<h5>Country List
      						<a class="btn btn-sm btn-success float-right custom_btn" href="{{route('web-site.country.add')}}"><i class="fa fa-plus-circle"></i> Add Country</a>
      					</h5>
      				</div>
      				<div class="card-body">
      					<table class="table-sm table-bordered" style="width: 100%" id="example1">
      						<thead  >
      							<tr>
      								<th>Sl.</th>
      								<th>Country Name</th>
                      <th>Image</th>
      								<th>Action</th>
      							</tr>
      						</thead>
      						<tbody>
      							@foreach($allData as $key => $value)
      							<tr class="text-center">
      								<td>{{$key+1}}</td>
      								<td>{{$value->name}}</td>
                      <td>
                        <img src="{{asset('public/upload/country_images/'.$value->image)}}" style="width: 100px;">
                      </td>
      								<td>
      									<a class="btn btn-sm btn-success" title="Edit" href="{{route('web-site.country.edit',$value->id)}}"><i class="fa fa-edit"></i></a>
      								</td>
      							</tr>
      							@endforeach
      						</tbody>
      					</table>
      				</div>
      			</div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
@endsection