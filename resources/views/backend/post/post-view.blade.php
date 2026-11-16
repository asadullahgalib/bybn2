@extends('backend.layouts.master')
@section('content')

@if ($errors->any())
  @foreach ($errors->all() as $error)
  <script type="text/javascript">
    $(function () {
      $.notify("{{$error}}", {globalPosition: 'top right', className: 'error'});
    });
  </script>
  @endforeach
  @endif
  <div class="col-md-12" style="padding-top: 40px;">
    <div class="card">
      <div class="card-header">
        <h5>Post List
          <a class="btn btn-sm btn-success float-right" href="{{route('frontend-menu.post.add')}}"><i class="fa fa-plus-circle"></i> Add Post</a>
        </h5>
      </div>
        <div class="card-body">
          <table id="example1" class="table table-sm table-bordered table-striped">
            <thead>
              <tr>
                <th width="5%">SL</th>
                <th>Image</th>
                <th>Type</th>
                <th style="width:10%">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($allData as $data)
              <tr class="text-center">
                <td>{{$loop->iteration}}</td>
                <td>
                  <img src="{{(!empty(@$data->image))?url('public/upload/post_iamges/'.@$data->image):url('public/upload/no_image.png')}}" style="width: 80px;">
                </td>
                <td>{{$data->title_en}}</td>
                <td>
                  <a class="btn btn-sm btn-success" title="Edit" href="{{route('frontend-menu.post.edit',$data->id)}}"><i class="fa fa-edit"></i></a>
                  <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('frontend-menu.post.delete')}}" data-token="{{csrf_token()}}" data-id="{{$data->id}}"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
