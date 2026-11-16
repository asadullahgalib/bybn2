@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Mission & Vision</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Mission & Vision</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container fullbody">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"> Mission & Vision List
          @if($countMission < 1)
          <a class="btn btn-success float-right btn-sm" href="{{route('web-site.mission-vision.add')}}"><i class="fa fa-plus-circle"></i> Add Mission & Vision</a>
          @endif
         </h3>
      </div>

      <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th width="6%">SL</th>
              <th>Description in English</th>
              <th width="13%">Action</th>
            </tr>
            </thead>
            <tbody>
              @foreach($allData as $key => $value)
            <tr class="text-center">
              <td>{{$key+1}}</td>
              <td><?php echo $value->description_en; ?></td>
              <td>
                <a title="Edit" class="btn btn-sm btn-primary" href="{{route('web-site.mission-vision.edit',$value->id)}}"><i class="fa fa-edit"></i></a> 

                <!-- <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('web-site.mission-vision.delete')}}" data-token="{{csrf_token()}}" data-id="{{$value->id}}"><i class="fa fa-trash"></i></a> -->
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