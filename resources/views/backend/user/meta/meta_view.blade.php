@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Meta</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Meta</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container fullbody">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
          <h3>Meta List
            <!-- <a class="btn btn-success float-right btn-sm custom_btn" href="{{route('user.meta.add')}}"><i class="fa fa-plus-circle"></i> Add Meta</a> -->
          </h3>
      </div>

      <div class="card-body">
        <div class="table table-responsive">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Description</th>
                <th>Keywords</th>
                <th>Author</th>
                <th>Canonical Link</th>
                <th width="5%">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($allData as $key => $value)
              <tr class="text-center">
                <td>{{$value->description}}</td>
                <td>{{$value->keyword}}</td>
                <td>{{$value->author}}</td>
                <td>{{$value->canonical_link}}</td>
                <td>
                  <a title="Edit" class="btn btn-sm btn-primary" href="{{route('user.meta.edit',$value->id)}}"><i class="fa fa-edit"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div><!-- /.card-body -->

    </div>
  </div>
</div>

@endsection