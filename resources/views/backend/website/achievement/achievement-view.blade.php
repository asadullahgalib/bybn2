@extends('backend.layouts.master')
@section('content')
  <div class="col-md-12" style="padding-top: 40px;">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"> What We Do
          <!-- <a class="btn btn-success float-right btn-sm" href="{{route('web-site.achievement.add')}}"><i class="fa fa-plus-circle"></i> Add Achievement</a> -->
        </h3>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table id="example1" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th width="6%">SL</th>
                <th>Description</th>
                <th width="6%">Action</th>
              </tr>
              </thead>
              <tbody>
                @foreach($allData as $key => $value)
                <tr class="text-center">
                  <td>{{$key+1}}</td>
                  <td>{{$value->description}}</td>
                  <td>
                    <a title="Edit" class="btn btn-sm btn-primary" href="{{route('web-site.achievement.edit',$value->id)}}"><i class="fa fa-edit"></i></a> 
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