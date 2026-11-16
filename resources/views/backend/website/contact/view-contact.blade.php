@extends('backend.layouts.master')
@section('content')
  <div class="col-md-12" style="padding-top:40px">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"> Contact Us List
          @if($countContact <1)
          <a class="btn btn-success float-right btn-sm" href="{{route('web-site.contact.add')}}"><i class="fa fa-plus-circle"></i>Add Contact Us</a>
          @endif
       </h3>
      </div>

      <div class="card-body">

          <div class="table-responsive">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Company Name</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Logo</th>
                  <th width="13%">Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($allData as $key => $value)
                  <tr class="text-center">
                    <td>{{$value->name_en}}</td>
                    <td>{{$value->mobile1}}</td>
                    <td> {{$value->email1}}</td>
                    <td> {{$value->address1}}</td>
                    <td><img src="{{asset('public/upload/contact_images/'.$value->image)}}" width="100px"></td>
                    <td>
                      <a title="Edit" class="btn btn-sm btn-primary" href="{{route('web-site.contact.edit',$value->id)}}"><i class="fa fa-edit"></i></a> 

                      <!-- <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('web-site.contact.delete')}}" data-token="{{csrf_token()}}" data-id="{{$value->id}}"><i class="fa fa-trash"></i></a> -->
                      <!-- <a title="Details" class="btn btn-sm btn-info" href="{{route('web-site.contact.details',$value->id)}}"><i class="fa fa-eye"></i></a>  -->
                    </td>
                  </tr>
                 @endforeach
              </tbody>
            </table>
          </div>
        
         
        </div><!-- /.card-body -->
      </div>
      <!-- /.card -->

    </div>
  </div>

@endsection