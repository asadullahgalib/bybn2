@extends('backend.layouts.master')
@section('content')
  <div class="col-md-12" style="padding-top:40px">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"> Video Gallery List
          <a class="btn btn-success float-right btn-sm" href="{{route('web-site.video.gallery.add')}}"><i class="fa fa-plus-circle"></i> Add Video Gallery</a>
        </h3>
      </div>

      <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th width="6%">SL</th>
              <th>Video</th>
              <th width="13%">Action</th>
            </tr>
            </thead>
            <tbody>
              @foreach($allData as $key => $value)
              <tr class="text-center">
                <td>{{$key+1}}</td>
                <td><?php echo $value->description; ?></td>
                <td>
                  <a title="Details" class="btn btn-sm btn-primary" href="{{route('web-site.video.gallery.edit',$value->id)}}"><i class="fa fa-edit"></i></a> 
                  <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('web-site.video.gallery.delete')}}" data-token="{{csrf_token()}}" data-id="{{$value->id}}"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
               @endforeach
            </tbody>
          </table>
      </div><!-- /.card-body -->

    </div>
  </div>

@endsection