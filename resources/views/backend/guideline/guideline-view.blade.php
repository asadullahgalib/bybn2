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
      					<h5>Guideline List
      						<a class="btn btn-sm btn-success float-right custom_btn" href="{{route('web-site.guidelines.add')}}"><i class="fa fa-plus-circle"></i> Add Guideline</a>
      					</h5>
      				</div>
      				<div class="card-body">
      					<table class="table-sm table-bordered" style="width: 100%" id="example1">
      						<thead  >
      							<tr>
      								<th width="10%">Sl.</th>
      								<th>Guideline Name</th>
      								<th width="10%">Action</th>
      							</tr>
      						</thead>
      						<tbody>
      							@foreach($allData as $key => $value)
      							<tr class="text-center">
      								<td>{{$key+1}}</td>
      								<td>{{$value->name}}</td>
      								<td>
      									<a class="btn btn-sm btn-success" title="Edit" href="{{route('web-site.guidelines.edit',$value->id)}}"><i class="fa fa-edit"></i></a>
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