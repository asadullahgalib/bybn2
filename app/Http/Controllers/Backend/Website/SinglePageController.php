<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\PhotoFolder;
use App\Model\PhotoGallery;
use App\Model\PhotoGalleryDetail;
use DB;
use Image;

class SinglePageController extends Controller
{
    //Photo Folder
    public function folderView(){
        $data['allData'] = PhotoFolder::orderBy('id','desc')->get();
        return view('backend.website.gallery.folder_view',$data);
    }

    public function folderAdd(){
        return view('backend.website.gallery.folder_add');
    }

    public function folderStore(Request $request){
        $this->validate($request,[
            'name_en' => 'required|unique:photo_folders,name_en'
        ]);
        $data = new PhotoFolder();
        $data->name_en = $request->name_en;
        if ($request->file('image')){
            $file = $request->file('image');
            $originalName = str_replace(' ', '_', $file->getClientOriginalName());
            $filename =date('YmdHi').$originalName;
            $file->move(public_path('upload/folder_images'), $filename);
            $file = Image::make(public_path('upload/folder_images/').$filename);
            $file->resize(868,640)->save(public_path('upload/folder_images/').$filename);
            $data['image']= $filename;
        }
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('web-site.folder.view')->with('success','Data Inserted successfully');
    }

    public function folderEdit($id){
        $editData = PhotoFolder::find($id);
        return view('backend.website.gallery.folder_add',compact('editData'));
    }

    public function folderUpdate(Request $request,$id){
        $data = PhotoFolder::find($id);
        $this->validate($request,[
            'name_en' => 'required|unique:photo_folders,name_en,'.$data->id
        ]);
        $data->name_en = $request->name_en;
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/folder_images/' . $data->image));
            $originalName = str_replace(' ', '_', $file->getClientOriginalName());
            $filename =date('YmdHi').$originalName;
            $file->move(public_path('upload/folder_images'), $filename);
            $file = Image::make(public_path('upload/folder_images/').$filename);
            $file->resize(868,640)->save(public_path('upload/folder_images/').$filename);
            $data['image']= $filename;
        }
        $data->updated_by = Auth::user()->id;
        $data->save();
        return redirect()->route('web-site.folder.view')->with('success','Data updated successfully');
    }

    public function folderDelete(Request $request){
        $data = PhotoFolder::find($request->id);
        if (file_exists('public/upload/folder_images/' . $data->image) AND ! empty($data->image)) {
            unlink('public/upload/folder_images/' . $data->image);
        }
        $data->delete();
        return redirect()->back();
    }
}
