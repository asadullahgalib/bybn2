@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Circular</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Circular</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container fullbody">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"> Circular List
          <a class="btn btn-success float-right btn-sm" href="{{route('web-site.circular.add')}}"><i class="fa fa-plus-circle"></i> Add Circular</a>
        </h3>
      </div>

      <div class="card-body">
        <div class="table table-responsive">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th width="6%">SL</th>
                <th>Title in Bangla</th>
                <th>Title in English</th>
                <th>Status</th>
                <th width="13%">Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach($allData as $key => $value)
                <?php
                  $countJobSeeker = App\Model\JobSeeker::where('circular_id',$value->id)->count();
                ?>
                <tr class="text-center">
                  <td>{{$key+1}}</td>
                  <td>{{$value->title_bn}}</td>
                  <td>{{$value->title_en}}</td>
                  <td>
                    @if($value->status=="1")
                    Active
                    @else
                    Inactive
                    @endif
                  </td>
                  <td>
                    <a title="Edit" class="btn btn-sm btn-primary" href="{{route('web-site.circular.edit',$value->id)}}"><i class="fa fa-edit"></i></a> 
                    @if($countJobSeeker <1)
                    <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('web-site.circular.delete')}}" data-token="{{csrf_token()}}" data-id="{{$value->id}}"><i class="fa fa-trash"></i></a>
                    @endif
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