<?php

namespace App\Http\Controllers\Backend\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\PhotoFolder;
use App\Model\PhotoGallery;
use App\Model\PhotoGalleryDetail;
use Auth;
use Image;
use DB;

class PhotoGalleryController extends Controller
{
    public function photoView()
    {
        $data['allData'] = PhotoGalleryDetail::orderBy('id','desc')->get();
        return view('backend.website.photo.photo_gallery_view',$data);
    }

    public function photoAdd()
    {
        return view('backend.website.photo.photo_gallery_add');
    }

    public function photoStore(Request $request)
    {
        $data = new PhotoGalleryDetail();
        if ($request->file('image')){
            $file = $request->file('image');
            $originalName = str_replace(' ', '_', $file->getClientOriginalName());
            $filename =date('YmdHi').$originalName;
            $file->move(public_path('upload/gallery_images'), $filename);
            $file = Image::make(public_path('upload/gallery_images/').$filename);
            $file->resize(320,280)->save(public_path('upload/gallery_images/').$filename);
            $data['image']= $filename;
        }
        $data->save();

        return redirect()->route('web-site.photo.view')->with('success','Data Saved successfully');
    }

    public function photoEdit($id)
    {
        $data['editData'] = PhotoGalleryDetail::find($id);
        return view('backend.website.photo.photo_gallery_add',$data);
    }

    public function photoUpdate(Request $request,$id)
    {
        $data = PhotoGalleryDetail::find($id);
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/gallery_images/' . $data->image));
            $originalName = str_replace(' ', '_', $file->getClientOriginalName());
            $filename =date('YmdHi').$originalName;
            $file->move(public_path('upload/gallery_images'), $filename);
            $file = Image::make(public_path('upload/gallery_images/').$filename);
            $file->resize(320,280)->save(public_path('upload/gallery_images/').$filename);
            $data['image']= $filename;
        }
        $data->save();

        return redirect()->route('web-site.photo.view')->with('success','Data Updated successfully');
    }

    public function photoDelete(Request $request)
    {
        $data = PhotoGalleryDetail::find($request->id);
        if (file_exists('public/upload/gallery_images/' . $data->image) AND ! empty($data->image)) {
            unlink('public/upload/gallery_images/' . $data->image);
        }
        $data->delete();
        return redirect()->back();
    }
}
