<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Slider;
use Image;

class SliderController extends Controller
{
    public function view(){
    	$data['allData'] = Slider::orderBy('id','desc')->get();
    	return view('backend.website.slider.view-slider',$data);
    }

    public function add(){
    	return view('backend.website.slider.add-slider');
    }

    public function store(Request $request){
        $data = new Slider();
        $data->title = $request->title;
        $data->description_eng = $request->description_eng;
        $data->created_by = Auth::user()->id;
        if ($request->file('image')){
		    $file = $request->file('image');
		    $filename =date('YmdHi').$file->getClientOriginalName();
		    $file->move(public_path('upload/slider_images'), $filename);
            $file = Image::make(public_path('upload/slider_images/').$filename);
            $file->resize(1920,770)->save(public_path('upload/slider_images/').$filename);
		    $data['image']= $filename;
		}
        if ($request->file('image2')){
            $file2 = $request->file('image2');
            $file2name =date('YmdHi').$file2->getClientOriginalName();
            $file2->move(public_path('upload/slider_mobile_images'), $file2name);
            $file2 = Image::make(public_path('upload/slider_mobile_images/').$file2name);
            $file->resize(991,770)->save(public_path('upload/slider_mobile_images/').$file2name);
            $data['image2']= $file2name;
        }
        $data->save();
        return redirect()->route('web-site.slider.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $data['editData'] = Slider::find($id);
        return view('backend.website.slider.add-slider',$data);
    }

    public function update(Request $request,$id){
        $data = Slider::find($id);
        $data->title = $request->title;
        $data->description_eng = $request->description_eng;
        $data->updated_by = Auth::user()->id;
        if ($request->file('image')){
		    $file = $request->file('image');
		    @unlink(public_path('upload/slider_images/'.$data->image));
		    $filename =date('YmdHi').$file->getClientOriginalName();
		    $file->move(public_path('upload/slider_images'), $filename);
            $file = Image::make(public_path('upload/slider_images/').$filename);
            $file->resize(1920,770)->save(public_path('upload/slider_images/').$filename);
		    $data['image']= $filename;
		}
        if ($request->file('image2')){
            $file2 = $request->file('image2');
            @unlink(public_path('upload/slider_mobile_images/'.$data->image2));
            $file2name =date('YmdHi').$file2->getClientOriginalName();
            $file2->move(public_path('upload/slider_mobile_images'), $file2name);
            $file2 = Image::make(public_path('upload/slider_mobile_images/').$file2name);
            $file2->resize(991,770)->save(public_path('upload/slider_mobile_images/').$file2name);
            $data['image2']= $file2name;
        }
        $data->save();
        return redirect()->route('web-site.slider.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $data = Slider::find($request->id);
        if (file_exists('public/upload/slider_images/' . $data->image) AND ! empty($data->image)) {
            unlink('public/upload/slider_images/' . $data->image);
        }
        // if (file_exists('public/upload/slider_images/' . $data->image2) AND ! empty($data->image)) {
        //     unlink('public/upload/slider_images/' . $data->image2);
        // }
        $data->delete();
        return redirect()->route('web-site.slider.view')->with('success','Data Deleted successfully');
    }
}
