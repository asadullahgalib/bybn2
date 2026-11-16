<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\ServiceCategory;
use Image;

class ServiceCategoryController extends Controller
{
    public function view(){
        $data['allData'] = ServiceCategory::orderBy('id','asc')->get();
        return view('backend.website.service.service-view',$data);
    }

    public function add(){
        return view('backend.website.service.service-add');
    }

    public function store(Request $request){
        $data = new ServiceCategory();
        $data->name = $request->name;
        $data->description_en = $request->description_en;
        $data->created_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/service_category_images'), $filename);
            $file = Image::make(public_path('upload/service_category_images/').$filename);
            $file->resize(500,400)->save(public_path('upload/service_category_images/').$filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('web-site.service.category.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $data['editData'] = ServiceCategory::find($id);
        return view('backend.website.service.service-add',$data);
    }

    public function update(Request $request,$id){
        $data = ServiceCategory::find($id);
        $data->name = $request->name;
        $data->description_en = $request->description_en;
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/service_category_images/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/service_category_images'), $filename);
            $file = Image::make(public_path('upload/service_category_images/').$filename);
            $file->resize(500,400)->save(public_path('upload/service_category_images/').$filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('web-site.service.category.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $data = ServiceCategory::find($request->id);
        $data->delete();
        return redirect()->route('web-site.service.category.view')->with('success','Data Deleted successfully');
    }
}
