@extends('backend.layouts.master')
@section('content')
  <div class="col-md-12" style="padding-top:40px">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"> Project List
          <a class="btn btn-success float-right btn-sm" href="{{route('web-site.link.add')}}"><i class="fa fa-plus-circle"></i> Add Project</a>
        </h3>
      </div>

      <div class="card-body">
          <div class="table table-responsive">
            <table id="example1" class="table table-bordered table-hover table-sm">
              <thead>
                <tr>
                  <th>SL</th>
                  <th>Project Title</th>
                  <th>Image</th>
                  <th width="13%">Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($allData as $key => $value)
                  <tr class="text-center">
                    <td>{{$key+1}}</td>
                    <td>{{$value->title_en}}</td>
                    <td>
                      <img src="{{(!empty($value->image))?url('public/upload/service_images/'.$value->image):url('public/upload/no_image.png')}}" style="width: 100px;border:1px solid #f5f5f5;">
                    </td>
                    <td>
                      <a title="Edit" class="btn btn-sm btn-primary" href="{{route('web-site.link.edit',$value->id)}}"><i class="fa fa-edit"></i></a> 

                      <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('web-site.link.delete')}}" data-token="{{csrf_token()}}" data-id="{{$value->id}}"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                 @endforeach
              </tbody>
            </table>
          </div>
      </div><!-- /.card-body -->

    </div>
  </div>

@endsection