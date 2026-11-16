<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Country;
use App\Model\StudyDestination;
use App\Model\StudyDestinationGallery;
use Image;

class DestinationGalleryController extends Controller
{
    public function view(){
        $data['allData'] = StudyDestinationGallery::orderBy('id','asc')->get();
        return view('backend.website.destination.gallery-view',$data);
    }

    public function add(){
        $data['countries'] = Country::all();
        return view('backend.website.destination.gallery-add',$data);
    }

    public function store(Request $request){
        $data = new StudyDestinationGallery();
        $data->country_id = $request->country_id;
        $data->created_by = Auth::user()->id;
        if ($request->file('image1')){
            $file = $request->file('image1');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/destination_gallery1'), $filename);
            $file = Image::make(public_path('upload/destination_gallery1/').$filename);
            $file->resize(1600,1440)->save(public_path('upload/destination_gallery1/').$filename);
            $data['image1']= $filename;
        }

        if ($request->file('image2')){
            $file2 = $request->file('image2');
            $file2name =date('YmdHi').$file2->getClientOriginalName();
            $file2->move(public_path('upload/destination_gallery2'), $file2name);
            $file2 = Image::make(public_path('upload/destination_gallery2/').$file2name);
            $file2->resize(1600,1440)->save(public_path('upload/destination_gallery2/').$file2name);
            $data['image2']= $file2name;
        }

        if ($request->file('image3')){
            $file3 = $request->file('image3');
            $file3name =date('YmdHi').$file3->getClientOriginalName();
            $file3->move(public_path('upload/destination_gallery3'), $file3name);
            $file3 = Image::make(public_path('upload/destination_gallery3/').$file3name);
            $file3->resize(1600,1440)->save(public_path('upload/destination_gallery3/').$file3name);
            $data['image3']= $file3name;
        }

        if ($request->file('image4')){
            $file4 = $request->file('image4');
            $file4name =date('YmdHi').$file4->getClientOriginalName();
            $file4->move(public_path('upload/destination_gallery4'), $file4name);
            $file4 = Image::make(public_path('upload/destination_gallery4/').$file4name);
            $file4->resize(1600,1440)->save(public_path('upload/destination_gallery4/').$file4name);
            $data['image4']= $file4name;
        }

        if ($request->file('image5')){
            $file5 = $request->file('image5');
            $file5name =date('YmdHi').$file5->getClientOriginalName();
            $file5->move(public_path('upload/destination_gallery5'), $file5name);
            $file5 = Image::make(public_path('upload/destination_gallery5/').$file5name);
            $file5->resize(1600,1440)->save(public_path('upload/destination_gallery5/').$file5name);
            $data['image5']= $file5name;
        }

        $data->save();
        return redirect()->route('web-site.destination.gallery.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $data['editData'] = StudyDestinationGallery::find($id);
        $data['countries'] = Country::all();
        return view('backend.website.destination.gallery-add',$data);
    }

    public function update(Request $request,$id){
        $data = StudyDestinationGallery::find($id);
        $data->country_id = $request->country_id;
        $data->updated_by = Auth::user()->id;
        if ($request->file('image1')){
            $file = $request->file('image1');
            @unlink(public_path('upload/destination_gallery1/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/destination_gallery1'), $filename);
            $file = Image::make(public_path('upload/destination_gallery1/').$filename);
            $file->resize(1600,1440)->save(public_path('upload/destination_gallery1/').$filename);
            $data['image1']= $filename;
        }

        if ($request->file('image2')){
            $file2 = $request->file('image2');
            @unlink(public_path('upload/destination_gallery2/'.$data->image2));
            $file2name =date('YmdHi').$file2->getClientOriginalName();
            $file2->move(public_path('upload/destination_gallery2'), $file2name);
            $file2 = Image::make(public_path('upload/destination_gallery2/').$file2name);
            $file2->resize(1600,1440)->save(public_path('upload/destination_gallery2/').$file2name);
            $data['image2']= $file2name;
        }

        if ($request->file('image3')){
            $file3 = $request->file('image3');
            @unlink(public_path('upload/destination_gallery3/'.$data->image3));
            $file3name =date('YmdHi').$file3->getClientOriginalName();
            $file3->move(public_path('upload/destination_gallery3'), $file3name);
            $file3 = Image::make(public_path('upload/destination_gallery3/').$file3name);
            $file3->resize(1600,1440)->save(public_path('upload/destination_gallery3/').$file3name);
            $data['image3']= $file3name;
        }

        if ($request->file('image4')){
            $file4 = $request->file('image4');
            @unlink(public_path('upload/destination_gallery4/'.$data->image4));
            $file4name =date('YmdHi').$file4->getClientOriginalName();
            $file4->move(public_path('upload/destination_gallery4'), $file4name);
            $file4 = Image::make(public_path('upload/destination_gallery4/').$file4name);
            $file4->resize(1600,1440)->save(public_path('upload/destination_gallery4/').$file4name);
            $data['image4']= $file4name;
        }

        if ($request->file('image5')){
            $file5 = $request->file('image5');
            @unlink(public_path('upload/destination_gallery5/'.$data->image5));
            $file5name =date('YmdHi').$file5->getClientOriginalName();
            $file5->move(public_path('upload/destination_gallery5'), $file5name);
            $file5 = Image::make(public_path('upload/destination_gallery5/').$file5name);
            $file5->resize(1600,1440)->save(public_path('upload/destination_gallery5/').$file5name);
            $data['image5']= $file5name;
        }

        $data->save();
        return redirect()->route('web-site.destination.gallery.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $data = StudyDestinationGallery::find($request->id);
        if (file_exists('public/upload/destination_gallery1/' . $data->image1) AND ! empty($data->image1)) {
            unlink('public/upload/destination_gallery1/' . $data->image1);
        }
        if (file_exists('public/upload/destination_gallery2/' . $data->image2) AND ! empty($data->image2)) {
            unlink('public/upload/destination_gallery2/' . $data->image2);
        }
        if (file_exists('public/upload/destination_gallery3/' . $data->image3) AND ! empty($data->image3)) {
            unlink('public/upload/destination_gallery3/' . $data->image3);
        }
        if (file_exists('public/upload/destination_gallery4/' . $data->image4) AND ! empty($data->image4)) {
            unlink('public/upload/destination_gallery4/' . $data->image4);
        }
        if (file_exists('public/upload/destination_gallery5/' . $data->image5) AND ! empty($data->image5)) {
            unlink('public/upload/destination_gallery5/' . $data->image5);
        }
        $data->delete();
        return redirect()->route('web-site.destination.gallery.view')->with('success','Data Deleted successfully');
    }
}
