@extends('backend.layouts.master')
@section('content')

  <div class="col-md-12" style="padding-top: 40px;">
    <div class="card">
      <div class="card-header">
          <h3>Role List
            <a class="btn btn-success float-right btn-sm custom_btn" href="{{route('user.role.add')}}"><i class="fa fa-plus-circle"></i> Add Role</a>
          </h3>
      </div>

      <div class="card-body">
        <table id="example1" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th width="6%">SL.</th>
              <th>Role Name</th>
              @if(@Auth::user()->user_category=="Developer")
              <th width="12%">Action</th>
              @endif
            </tr>
          </thead>
          <tbody>
            @foreach($allData as $key => $value)
            @php
              $user_count = App\User::where('role',$value->id)->count();
              $permision_count = App\Model\MenuPermission::where('role_id',$value->id)->count();
            @endphp
            <tr class="text-center">
              <td>{{$key+1}}</td>
              <td>{{$value->name}}</td>
              @if(@Auth::user()->user_category=="Developer")
              <td>
                <a title="Edit" class="btn btn-sm btn-primary" href="{{route('user.role.edit',$value->id)}}"><i class="fa fa-edit"></i></a>
                <!-- @if($user_count <1 && $permision_count <1)
                <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('user.role.delete')}}" data-token="{{csrf_token()}}" data-id="{{$value->id}}"><i class="fa fa-trash"></i></a>
                @endif -->
              </td>
              @endif
            </tr>
            @endforeach
          </tbody>
        </table>
      </div><!-- /.card-body -->

    </div>
  </div>

@endsection