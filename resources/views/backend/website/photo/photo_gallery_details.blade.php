@extends('backend.layouts.master')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h1 class="main-title float-left">Manage Photo Gallery</h1>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('home')}}"><strong>Home</strong></a></li>
      <li class="breadcrumb-item active">Photo Gallery</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>
<div class="container fullbody">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <a class="btn btn-success float-right btn-sm" href="{{route('web-site.photo.view')}}"><i class="fa fa-list"></i> Photo Gallery List</a>
        </h3>
      </div>

      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
           <strong>Folder Name :</strong> 
              {{@$editData['photo_folder']['name_en']}}
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th width="40%">Image</th>
                  <th>Open In Folder</th>
                </tr>
              </thead>
                <tbody>
                  @if (isset($editData['photo_Gallery_details']) && count($editData['photo_Gallery_details']) > 0)
                  @foreach ($editData['photo_Gallery_details'] as $image)
                  <tr>
                    <td>
                      <img src="{{ url('public/uploadgallery_images/',$image->image) }}" width="200px">
                    </td>
                    <td>
                      <form method="POST" action="{{route('web-site.photo.status',$image->id)}}">
                      @csrf
                      <input type="hidden" name="id" value="{{$image->id}}">
                      <input type="checkbox" name="status" value="1" {{(@$image->status=="1")?"checked":""}}> &nbsp;&nbsp;
                      <button type="submit" class="btn btn-success btn-sm">save</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
            </table>
          </div>
        </div>
      </div><!-- /.card-body -->

    </div>
  </div>
</div>

@endsection