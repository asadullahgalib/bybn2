<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Achievement;
use Image;

class AchievementController extends Controller
{
    public function view(){
        $data['allData'] = Achievement::orderBy('id','asc')->get();
        return view('backend.website.achievement.achievement-view',$data);
    }

    public function add(){
        return view('backend.website.achievement.achievement-add');
    }

    public function store(Request $request){
        $data = new Achievement();
        $data->description = $request->description;
        $data->created_by = Auth::user()->id;
        // if ($request->file('image')){
        //     $file = $request->file('image');
        //     $filename =date('YmdHi').$file->getClientOriginalName();
        //     $file->move(public_path('upload/achievement_images'), $filename);
        //     // $file = Image::make(public_path('upload/achievement_images/').$filename);
        //     // $file->resize(1593,845)->save(public_path('upload/achievement_images/').$filename);
        //     $data['image']= $filename;
        // }
        $data->save();
        return redirect()->route('web-site.achievement.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $data['editData'] = Achievement::find($id);
        return view('backend.website.achievement.achievement-add',$data);
    }

    public function update(Request $request,$id){
        $data = Achievement::find($id);
        $data->description = $request->description;
        $data->updated_by = Auth::user()->id;
        // if ($request->file('image')){
        //     $file = $request->file('image');
        //     @unlink(public_path('upload/achievement_images/'.$data->image));
        //     $filename =date('YmdHi').$file->getClientOriginalName();
        //     $file->move(public_path('upload/achievement_images'), $filename);
        //     // $file = Image::make(public_path('upload/achievement_images/').$filename);
        //     // $file->resize(1593,845)->save(public_path('upload/achievement_images/').$filename);
        //     $data['image']= $filename;
        // }
        $data->save();
        return redirect()->route('web-site.achievement.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $data = Achievement::find($request->id);
        if (file_exists('public/upload/achievement_images/' . $data->image) AND ! empty($data->image)) {
            unlink('public/upload/achievement_images/' . $data->image);
        }
        $data->delete();
        return redirect()->route('web-site.achievement.view')->with('success','Data Deleted successfully');
    }
}
