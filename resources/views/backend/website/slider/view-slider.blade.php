@extends('backend.layouts.master')
@section('content')
  <div class="col-md-12" style="padding-top: 40px;">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"> Slider List
          <a class="btn btn-success float-right btn-sm" href="{{route('web-site.slider.add')}}"><i class="fa fa-plus-circle"></i> Add Slider</a>
        </h3>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th width="6%">SL</th>
                <th>Title</th>
                <th>Image</th>
                <th width="10%">Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach($allData as $key => $value)
                <tr class="text-center">
                  <td>{{$key+1}}</td>
                  <td>{{$value->title}}</td>
                  <td>
                    <img src="{{asset('public/upload/slider_images/'.$value->image)}}" style="width: 150px;">
                  </td>
                  <td>
                    <a title="Edit" class="btn btn-sm btn-primary" href="{{route('web-site.slider.edit',$value->id)}}"><i class="fa fa-edit"></i></a> 

                    <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('web-site.slider.delete')}}" data-token="{{csrf_token()}}" data-id="{{$value->id}}"><i class="fa fa-trash"></i></a>
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