<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\About;
use Image;

class AboutController extends Controller
{
    // Used for Who We are
    public function view(){
    	$data['countAbout'] = About::count();
    	$data['allData'] = About::all();
    	return view('backend.website.about.view-about',$data);
    }

    public function add(){
    	return view('backend.website.about.add-about');
    }

    public function store(Request $request){
        $data = new About();
    	$data->slug = 'about-us-details';
        $data->description_en = $request->description_en;
        $data->description_bn = $request->description_bn;
    	$data->created_by = Auth::user()->id;
    	$data->save();
        return redirect()->route('web-site.about.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $data['editData'] = About::find($id);
        return view('backend.website.about.add-about',$data);
    }

    public function update(Request $request,$id){
        $data = About::find($id);
    	$data->slug = 'about-us-details';
        $data->experience = $request->experience;
        $data->description_en = $request->description_en;
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/about_images/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/about_images'), $filename);
            $file = Image::make(public_path('upload/about_images/').$filename);
            $file->resize(685,676)->save(public_path('upload/about_images/').$filename);
            $data['image']= $filename;
        }
        $data->updated_by = Auth::user()->id;
    	$data->save();
        return redirect()->route('web-site.about.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $about = About::find($request->id);
        $about->delete();
        return redirect()->route('web-site.about.view')->with('success','Data Deleted successfully');
    }
}
