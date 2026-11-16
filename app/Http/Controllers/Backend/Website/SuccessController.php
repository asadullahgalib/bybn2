<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\SuccessStories;
use Image;

class SuccessController extends Controller
{
    public function view(){
        $data['allData'] = SuccessStories::orderBy('id','asc')->get();
        return view('backend.website.success.success-view',$data);
    }

    public function add(){
        return view('backend.website.success.success-add');
    }

    public function store(Request $request){
        $data = new SuccessStories();
        $data->visa_category = $request->visa_category;
        $data->team_member = $request->team_member;
        $data->visa_process = $request->visa_process;
        $data->success_rate = $request->success_rate;
        $data->created_by = Auth::user()->id;
        // if ($request->file('image')){
        //     $file = $request->file('image');
        //     $filename =date('YmdHi').$file->getClientOriginalName();
        //     $file->move(public_path('upload/success_images'), $filename);
        //     $file = Image::make(public_path('upload/success_images/').$filename);
        //     $file->resize(1500,250)->save(public_path('upload/success_images/').$filename);
        //     $data['image']= $filename;
        // }
        $data->save();
        return redirect()->route('web-site.success.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $data['editData'] = SuccessStories::find($id);
        return view('backend.website.success.success-add',$data);
    }

    public function update(Request $request,$id){
        $data = SuccessStories::find($id);
        $data->visa_category = $request->visa_category;
        $data->team_member = $request->team_member;
        $data->visa_process = $request->visa_process;
        $data->success_rate = $request->success_rate;
        $data->updated_by = Auth::user()->id;
        // if ($request->file('image')){
        //     $file = $request->file('image');
        //     @unlink(public_path('upload/success_images/'.$data->image));
        //     $filename =date('YmdHi').$file->getClientOriginalName();
        //     $file->move(public_path('upload/success_images'), $filename);
        //     $file = Image::make(public_path('upload/success_images/').$filename);
        //     $file->resize(1500,250)->save(public_path('upload/success_images/').$filename);
        //     $data['image']= $filename;
        // }
        $data->save();
        return redirect()->route('web-site.success.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $data = SuccessStories::find($request->id);
        // if (file_exists('public/upload/success_images/' . $data->image) AND ! empty($data->image)) {
        //     unlink('public/upload/success_images/' . $data->image);
        // }
        $data->delete();
        return redirect()->route('web-site.success.view')->with('success','Data Deleted successfully');
    }
}
