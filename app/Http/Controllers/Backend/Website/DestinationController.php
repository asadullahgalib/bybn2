<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Country;
use App\Model\StudyDestination;
use Image;

class DestinationController extends Controller
{
    public function view(){
        $data['allData'] = StudyDestination::orderBy('id','asc')->get();
        return view('backend.website.destination.destination-view',$data);
    }

    public function add(){
        $data['countries'] = Country::all();
        return view('backend.website.destination.destination-add',$data);
    }

    public function store(Request $request){
        $data = new StudyDestination();
        $data->title_en = $request->title_en;
        // $data->country_id = $request->country_id;
        $data->description_en = $request->description_en;
        // $data->icon = $request->icon;
        $data->description = $request->description;
        $data->created_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/destination_images'), $filename);
            $file = Image::make(public_path('upload/destination_images/').$filename);
            $file->resize(800,400)->save(public_path('upload/destination_images/').$filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('web-site.destination.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $data['editData'] = StudyDestination::find($id);
        $data['countries'] = Country::all();
        return view('backend.website.destination.destination-add',$data);
    }

    public function update(Request $request,$id){
        $data = StudyDestination::find($id);
        $data->title_en = $request->title_en;
        // $data->country_id = $request->country_id;
        $data->description_en = $request->description_en;
        // $data->icon = $request->icon;
        $data->description = $request->description;
        $data->updated_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/destination_images/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/destination_images'), $filename);
            $file = Image::make(public_path('upload/destination_images/').$filename);
            $file->resize(800,400)->save(public_path('upload/destination_images/').$filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('web-site.destination.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $data = StudyDestination::find($request->id);
        if (file_exists('public/upload/destination_images/' . $data->image) AND ! empty($data->image)) {
            unlink('public/upload/destination_images/' . $data->image);
        }
        $data->delete();
        return redirect()->route('web-site.destination.view')->with('success','Data Deleted successfully');
    }
}
