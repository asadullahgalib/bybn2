<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\WhyChoose;
use Image;

class whyChooseController extends Controller
{
    public function view(){
        $data['allData'] = WhyChoose::orderBy('id','asc')->get();
        return view('backend.website.why_choose.why-choose-view',$data);
    }

    public function add(){
        return view('backend.website.why_choose.why-choose-add');
    }

    public function store(Request $request){
        $data = new WhyChoose();
        $data->title_en = $request->title_en;
        $data->icon = $request->icon;
        $data->description_en = $request->description_en;
        $data->created_by = Auth::user()->id;
        // if ($request->file('image')){
        //     $file = $request->file('image');
        //     $filename =date('YmdHi').$file->getClientOriginalName();
        //     $file->move(public_path('upload/admission_images'), $filename);
        //     $file = Image::make(public_path('upload/admission_images/').$filename);
        //     $file->resize(1413,793)->save(public_path('upload/admission_images/').$filename);
        //     $data['image']= $filename;
        // }
        $data->save();
        return redirect()->route('web-site.why.choose.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $data['editData'] = WhyChoose::find($id);
        return view('backend.website.why_choose.why-choose-add',$data);
    }

    public function update(Request $request,$id){
        $data = WhyChoose::find($id);
        $data->title_en = $request->title_en;
        $data->icon = $request->icon;
        $data->description_en = $request->description_en;
        $data->updated_by = Auth::user()->id;
        // if ($request->file('image')){
        //     $file = $request->file('image');
        //     @unlink(public_path('upload/admission_images/'.$data->image));
        //     $filename =date('YmdHi').$file->getClientOriginalName();
        //     $file->move(public_path('upload/admission_images'), $filename);
        //     $file = Image::make(public_path('upload/admission_images/').$filename);
        //     $file->resize(1413,793)->save(public_path('upload/admission_images/').$filename);
        //     $data['image']= $filename;
        // }
        $data->save();
        return redirect()->route('web-site.why.choose.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $data = WhyChoose::find($request->id);
        // if (file_exists('public/upload/admission_images/' . $data->image) AND ! empty($data->image)) {
        //     unlink('public/upload/admission_images/' . $data->image);
        // }
        $data->delete();
        return redirect()->route('web-site.why.choose.view')->with('success','Data Deleted successfully');
    }
}
