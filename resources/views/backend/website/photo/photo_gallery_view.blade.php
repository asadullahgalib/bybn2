@extends('backend.layouts.master')
@section('content')
  <div class="col-md-12" style="padding-top: 40px;">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Photo Gallery List
          <a class="btn btn-success float-right btn-sm" href="{{route('web-site.photo.add')}}"><i class="fa fa-plus-circle"></i> Add Photo Gallery</a>
        </h3>
      </div>

      <div class="card-body">
          <table id="example1" class="table table-sm table-bordered table-striped">
            <thead>
              <tr>
                <th>SL</th>
                <th>Image</th>
                <th style="width:15%">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($allData as $data)
              <tr class="text-center">
                <td>{{$loop->iteration}}</td>
                <td>
                  <img src="{{asset('public/upload/gallery_images/'.$data->image)}}" style="width: 100px;">
                </td>
                <td class="text-center">
                  <a class="btn btn-sm btn-success" title="Edit" href="{{route('web-site.photo.edit',$data->id)}}"><i class="fa fa-edit"></i></a>
                  <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('web-site.photo.delete')}}" data-token="{{csrf_token()}}" data-id="{{$data->id}}"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        </div><!-- /.card-body -->

    </div>
  </div>

@endsection