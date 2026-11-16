<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Admission;
use Image;

class AdmissionController extends Controller
{
    public function view(){
        $data['allData'] = Admission::orderBy('id','asc')->get();
        return view('backend.website.admission.admission-view',$data);
    }

    public function add(){
        return view('backend.website.admission.admission-add');
    }

    public function store(Request $request){
        $data = new Admission();
        $data->title = $request->title;
        $data->description = $request->description;
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
        return redirect()->route('web-site.admission.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $data['editData'] = Admission::find($id);
        return view('backend.website.admission.admission-add',$data);
    }

    public function update(Request $request,$id){
        $data = Admission::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
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
        return redirect()->route('web-site.admission.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $data = Admission::find($request->id);
        // if (file_exists('public/upload/admission_images/' . $data->image) AND ! empty($data->image)) {
        //     unlink('public/upload/admission_images/' . $data->image);
        // }
        $data->delete();
        return redirect()->route('web-site.admission.view')->with('success','Data Deleted successfully');
    }
}
