<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Logo;
use App\Model\Gallery;
use Image;

class LogoController extends Controller
{
    public function view(){
        $data['countLogo'] = Logo::count();
    	$data['allData'] = Logo::all();
    	return view('backend.logo.view-logo',$data);
    }

    public function add(){
    	return view('backend.logo.add-logo');
    }

    public function store(Request $request){
    	$data = new Logo();
    	$data->created_by = Auth::user()->id;
    	if ($request->file('image')){
		    $file = $request->file('image');
		    $filename =date('YmdHi').$file->getClientOriginalName();
		    $file->move(public_path('upload/logo_images'), $filename);
            $file = Image::make(public_path('upload/logo_images/').$filename);
            $file->resize(301,107)->save(public_path('upload/logo_images/').$filename);
		    $data['image']= $filename;
		}
    	$data->save();
    	return redirect()->route('site-setting.logo.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $editData = Logo::find($id);
        return view('backend.logo.edit-logo',compact('editData'));
    }

    public function update(Request $request,$id){
        $data = Logo::find($id);
        $data->updated_by = Auth::user()->id;
    	if ($request->file('image')){
		    $file = $request->file('image');
		    @unlink(public_path('upload/logo_images/'.$data->image));
		    $filename =date('YmdHi').$file->getClientOriginalName();
		    $file->move(public_path('upload/logo_images'), $filename);
            $file = Image::make(public_path('upload/logo_images/').$filename);
            $file->resize(301,107)->save(public_path('upload/logo_images/').$filename);
		    $data['image']= $filename;
		}
    	$data->save();
        return redirect()->route('site-setting.logo.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $logo = Logo::find($request->id);
        if (file_exists('public/upload/logo_images/' . $logo->image) AND ! empty($logo->image)) {
            unlink('public/upload/logo_images/' . $logo->image);
        }
        $logo->delete();
        return redirect()->route('site-setting.logo.view')->with('success','Data Deleted successfully');
    }

    //Gallery

    public function galleryView(){
        $data['allData'] = Gallery::orderBy('id','desc')->get();
        return view('backend.logo.view-gallery',$data);
    }

    public function galleryAdd(){
        return view('backend.logo.add-gallery');
    }

    public function galleryStore(Request $request){
        $data = new Gallery();
        $data->created_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/logo_images'), $filename);
            $file = Image::make(public_path('upload/logo_images/').$filename);
            $file->resize(340,277)->save(public_path('upload/logo_images/').$filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('site-setting.gallery.view')->with('success','Data Inserted successfully');
    }

    public function galleryEdit($id){
        $editData = Gallery::find($id);
        return view('backend.logo.edit-gallery',compact('editData'));
    }

    public function galleryUpdate(Request $request,$id){
        $data = Gallery::find($id);
        $data->updated_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/logo_images/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/logo_images'), $filename);
            $file = Image::make(public_path('upload/logo_images/').$filename);
            $file->resize(340,277)->save(public_path('upload/logo_images/').$filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('site-setting.gallery.view')->with('success','Data updated successfully');
    }

    public function galleryDelete(Request $request){
        $logo = Gallery::find($request->id);
        if (file_exists('public/upload/logo_images/' . $logo->image) AND ! empty($logo->image)) {
            unlink('public/upload/logo_images/' . $logo->image);
        }
        $logo->delete();
        return redirect()->route('site-setting.gallery.view')->with('success','Data Deleted successfully');
    }
}
