<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Volunteer;
use Image;

class VolunteerController extends Controller
{
    public function view(){
        $data['allData'] = Volunteer::orderBy('date','desc')->get();
        return view('backend.website.volunteer.view-volunteer',$data);
    }

    public function add(){
        return view('backend.website.volunteer.add-volunteer');
    }

    public function store(Request $request){
        $data = new Volunteer();

        $data->date = date('Y-m-d');
        $data->name = strip_tags($request->name);
        $data->mobile = strip_tags($request->mobile);
        $data->email = strip_tags($request->email);
        $data->gender = strip_tags($request->gender);
        $data->address = strip_tags($request->address);
        $data->dob = date('Y-m-d',strtotime($request->dob));
        $data->occupation = strip_tags($request->occupation);
        $data->education = strip_tags($request->education);
        $data->institute = strip_tags($request->institute);
        $data->blood_group = strip_tags($request->blood_group);
        $data->status = $request->status;

        if ($request->file('image')){
            $file = $request->file('image');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/volunteer_images'), $filename);
            $file = Image::make(public_path('upload/volunteer_images/').$filename);
            $file->resize(300,300)->save(public_path('upload/volunteer_images/').$filename);
            $data['image']= $filename;
        }

        $data->save();

        return redirect()->route('web-site.volunteer.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $data['editData'] = Volunteer::find($id);
        return view('backend.website.volunteer.add-volunteer',$data);
    }

    public function update(Request $request,$id){
        $data = Volunteer::find($id);

        $data->name = strip_tags($request->name);
        $data->mobile = strip_tags($request->mobile);
        $data->email = strip_tags($request->email);
        $data->gender = strip_tags($request->gender);
        $data->address = strip_tags($request->address);
        $data->dob = date('Y-m-d',strtotime($request->dob));
        $data->occupation = strip_tags($request->occupation);
        $data->education = strip_tags($request->education);
        $data->institute = strip_tags($request->institute);
        $data->blood_group = strip_tags($request->blood_group);
        $data->status = $request->status;

        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/volunteer_images/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/volunteer_images'), $filename);
            $file = Image::make(public_path('upload/volunteer_images/').$filename);
            $file->resize(300,300)->save(public_path('upload/volunteer_images/').$filename);
            $data['image']= $filename;
        }

        $data->save();

        return redirect()->route('web-site.volunteer.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $data = Volunteer::find($request->id);
        if (file_exists('public/upload/volunteer_images/' . $data->image) AND ! empty($data->image)) {
            unlink('public/upload/volunteer_images/' . $data->image);
        }
        $data->delete();

        return redirect()->route('web-site.volunteer.view')->with('success','Data Deleted successfully');
    }
}
