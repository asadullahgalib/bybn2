@extends('backend.layouts.master')
@section('content')
  <div class="col-md-12" style="padding-top: 40px;">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Photo Folder List
          <a class="btn btn-success float-right btn-sm" href="{{route('web-site.folder.add')}}"><i class="fa fa-plus-circle"></i> Add Photo Folder</a>
        </h3>
      </div>

      <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th width="6%">SL</th>
              <th>Folder Name</th>
              <th>Image</th>
              <th width="12%">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($allData as $key => $value)
            @php
              $folder_count = App\Model\PhotoGallery::where('photo_folder_id',$value->id)->count();
            @endphp
            <tr class="text-center">
              <td>{{$key+1}}</td>
              <td>{{$value->name_en}}</td>
              <td>
                  <img src="{{asset('public/upload/folder_images/'.$value->image)}}" style="width: 100px;">
                </td>
              <td>
                <a title="Edit" class="btn btn-sm btn-primary" href="{{route('web-site.folder.edit',$value->id)}}"><i class="fa fa-edit"></i></a>
                @if($folder_count <1)
                <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('web-site.folder.delete')}}" data-token="{{csrf_token()}}" data-id="{{$value->id}}"><i class="fa fa-trash"></i></a>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div><!-- /.card-body -->

    </div>
  </div>

@endsection