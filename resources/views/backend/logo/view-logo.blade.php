@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Logo</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Logo</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container fullbody">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3>Logo List
          @if($countLogo<1)
          <a class="btn btn-success float-right btn-sm custom_btn" href="{{route('site-setting.contents.logo.add')}}"><i class="fa fa-plus-circle"></i> Add Logo</a>
          @endif
        </h3>
      </div>

      <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>SL.</th>
              <th>Logo</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($allData as $key => $logo)
            <tr class="text-center">
              <td>{{$key+1}}</td>
              <td><img src="{{(!empty($logo->image))?url('public/upload/logo_images/'.$logo->image):url('public/upload/no_image.png')}}"></td>
              <td>
                <a title="Edit" class="btn btn-sm btn-primary" href="{{route('site-setting.contents.logo.edit',$logo->id)}}"><i class="fa fa-edit"></i></a>
                <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('site-setting.contents.logo.delete')}}" data-token="{{csrf_token()}}" data-id="{{$logo->id}}"><i class="fa fa-trash"></i></a>
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