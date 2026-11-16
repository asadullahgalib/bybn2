<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\PrincipalMessage;
use Image;

class MessageController extends Controller
{
    public function view(){
    	$data['allData'] = PrincipalMessage::orderBy('sort','asc')->get();
    	return view('backend.website.message.view-message',$data);
    }

    public function add(){
    	return view('backend.website.message.add-message');
    }

    public function store(Request $request){
        $data = new PrincipalMessage();
        $data->name_en = $request->name_en;
        $data->education = $request->education;
        $data->designation_en = $request->designation_en;
        $data->description_en = $request->description_en;
        $data->sort = $request->sort;
    	$data->created_by = Auth::user()->id;
    	if ($request->file('image')){
		    $file = $request->file('image');
		    $filename =date('YmdHi').$file->getClientOriginalName();
		    $file->move(public_path('upload/principal_images'), $filename);
            $file = Image::make(public_path('upload/principal_images/').$filename);
            $file->resize(300,300)->save(public_path('upload/principal_images/').$filename);
		    $data['image']= $filename;
		}
    	$data->save();
        return redirect()->route('web-site.principal.message.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $data['editData'] = PrincipalMessage::find($id);
        return view('backend.website.message.add-message',$data);
    }

    public function update(Request $request,$id){
        $data = PrincipalMessage::find($id);
    	$data->name_en = $request->name_en;
        $data->education = $request->education;
        $data->designation_en = $request->designation_en;
        $data->description_en = $request->description_en;
        $data->sort = $request->sort;
        $data->updated_by = Auth::user()->id;
        if ($request->file('image')){
		    $file = $request->file('image');
		    @unlink(public_path('upload/principal_images/'.$data->image));
		    $filename =date('YmdHi').$file->getClientOriginalName();
		    $file->move(public_path('upload/principal_images'), $filename);
            $file = Image::make(public_path('upload/principal_images/').$filename);
            $file->resize(300,300)->save(public_path('upload/principal_images/').$filename);
		    $data['image']= $filename;
		}
    	$data->save();
        return redirect()->route('web-site.principal.message.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $data = PrincipalMessage::find($request->id);
        if (file_exists('public/upload/principal_images/' . $data->image) AND ! empty($data->image)) {
            unlink('public/upload/principal_images/' . $data->image);
        }
        $data->delete();
        return redirect()->route('web-site.principal.message.view')->with('success','Data Deleted successfully');
    }
}
