<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Notice;
use Image;

class NoticeController extends Controller
{
    public function view(){
    	$data['allData'] = Notice::orderBy('id','desc')->get();
    	return view('backend.website.notice.view-notice',$data);
    }

    public function add(){
    	return view('backend.website.notice.add-notice');
    }

    public function store(Request $request){
        $data = new Notice();
        // $data->slug = str_slug($request->title_en).date('YmdHi');
        $data->title_en = $request->title_en;
        // $data->date = date('Y-m-d',strtotime($request->date));
        $data->description_en = $request->description_en;
        $data->created_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/notice_files'), $filename);
            $file = Image::make(public_path('upload/notice_files/').$filename);
            $file->resize(300,370)->save(public_path('upload/notice_files/').$filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('web-site.notice.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $data['editData'] = Notice::find($id);
        return view('backend.website.notice.add-notice',$data);
    }

    public function update(Request $request,$id){
        $data = Notice::find($id);
        // $data->slug = str_slug($request->title_en).date('YmdHi');
        $data->title_en = $request->title_en;
        // $data->date = date('Y-m-d',strtotime($request->date));
        $data->description_en = $request->description_en;
        $data->updated_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/notice_files/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/notice_files'), $filename);
            $file = Image::make(public_path('upload/notice_files/').$filename);
            $file->resize(300,370)->save(public_path('upload/notice_files/').$filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('web-site.notice.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $data = Notice::find($request->id);
        if (file_exists('public/upload/notice_files/' . $data->image) AND ! empty($data->image)) {
            unlink('public/upload/notice_files/' . $data->image);
        }
        $data->delete();
        return redirect()->route('web-site.notice.view')->with('success','Data Deleted successfully');
    }
}
