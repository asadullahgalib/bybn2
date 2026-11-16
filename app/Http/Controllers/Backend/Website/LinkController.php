<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\ServiceCategory;
use App\Model\ImportantLink;
use Image;

class LinkController extends Controller
{
    public function view(){
    	$data['allData'] = ImportantLink::orderBy('id','desc')->get();
    	return view('backend.website.link.view-link',$data);
    }

    public function add(){
        $data['service_categories'] = ServiceCategory::all();
    	return view('backend.website.link.add-link', $data);
    }

    public function store(Request $request){
        $data = new ImportantLink();
        $data->title_en = $request->title_en;
        $data->service_category_id = $request->service_category_id;
        // $data->title_bn = $request->title_bn;
        $data->icon = $request->icon;
        $data->description_en = $request->description_en;
        $data->created_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/project_images'), $filename);
            $file = Image::make(public_path('upload/project_images/').$filename);
            $file->resize(500,400)->save(public_path('upload/project_images/').$filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('web-site.link.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $data['editData'] = ImportantLink::find($id);
        $data['service_categories'] = ServiceCategory::all();
        return view('backend.website.link.add-link',$data);
    }

    public function update(Request $request,$id){
        $data = ImportantLink::find($id);
        $data->title_en = $request->title_en;
        $data->service_category_id = $request->service_category_id;
        // $data->title_bn = $request->title_bn;
        $data->icon = $request->icon;
        $data->description_en = $request->description_en;
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/project_images/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/project_images'), $filename);
            $file = Image::make(public_path('upload/project_images/').$filename);
            $file->resize(500,400)->save(public_path('upload/project_images/').$filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('web-site.link.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $data = ImportantLink::find($request->id);
        if (file_exists('public/upload/project_images/' . $data->image) AND ! empty($data->image)) {
            unlink('public/upload/project_images/' . $data->image);
        }
        $data->delete();
        return redirect()->route('web-site.link.view')->with('success','Data Deleted successfully');
    }
}
