<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Country;
use App\Model\University;
use Image;

class UniversityController extends Controller
{
    public function view(){
        $allData = University::orderBy('id','desc')->get();
        return view('backend.university.university-view',compact('allData'));
    }

    public function add(){
        $data['countries'] = Country::all();
        return view('backend.university.university-add',$data);
    }

    public function store(Request $request){
        $data = new University;
        $data->country_id = $request->country_id;
        $data->name = $request->name;
        $data->description_en = $request->description_en;
        $data->location = $request->location;
        $data->ranking = $request->ranking;
        $data->international_student = $request->international_student;
        $data->study_option = $request->study_option;
        $data->intakes = $request->intakes;
        $data->scholarship = $request->scholarship;
        $data->created_by = Auth::user()->id;
        if ($request->file('logo_img')){
            $file = $request->file('logo_img');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/university_logo'), $filename);
            $file = Image::make(public_path('upload/university_logo/').$filename);
            $file->resize(360,200)->save(public_path('upload/university_logo/').$filename);
            $data['logo_img']= $filename;
        }
        if ($request->file('graph_img')){
            $file2 = $request->file('graph_img');
            $file2name =date('YmdHi').$file2->getClientOriginalName();
            $file2->move(public_path('upload/university_graph_images'), $file2name);
            $file2 = Image::make(public_path('upload/university_graph_images/').$file2name);
            $file2->resize(800,500)->save(public_path('upload/university_graph_images/').$file2name);
            $data['graph_img']= $file2name;
        }
        if ($request->file('gallery_img1')){
            $file3 = $request->file('gallery_img1');
            $file3name =date('YmdHi').$file3->getClientOriginalName();
            $file3->move(public_path('upload/university_gallery1'), $file3name);
            $file3 = Image::make(public_path('upload/university_gallery1/').$file3name);
            $file3->resize(800,500)->save(public_path('upload/university_gallery1/').$file3name);
            $data['gallery_img1']= $file3name;
        }
        if ($request->file('gallery_img2')){
            $file3 = $request->file('gallery_img2');
            $file3name =date('YmdHi').$file3->getClientOriginalName();
            $file3->move(public_path('upload/university_gallery2'), $file3name);
            $file3 = Image::make(public_path('upload/university_gallery2/').$file3name);
            $file3->resize(800,500)->save(public_path('upload/university_gallery2/').$file3name);
            $data['gallery_img2']= $file3name;
        }
        $data->save();
        return redirect()->route('web-site.university.view')->with('success','Successfully Inserted');
    }

    public function edit($id){
        $data['editData'] = University::find($id);
        $data['countries'] = Country::all();
        return view('backend.university.university-add',$data);
    }

    public function update(Request $request,$id){
        $data = University::find($id);
        $data->country_id = $request->country_id;
        $data->name = $request->name;
        $data->description_en = $request->description_en;
        $data->location = $request->location;
        $data->ranking = $request->ranking;
        $data->international_student = $request->international_student;
        $data->study_option = $request->study_option;
        $data->intakes = $request->intakes;
        $data->scholarship = $request->scholarship;
        $data->updated_by = Auth::user()->id;
        if ($request->file('logo_img')){
            $file = $request->file('logo_img');
            @unlink(public_path('upload/university_logo/'.$data->logo_img));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/university_logo'), $filename);
            $file = Image::make(public_path('upload/university_logo/').$filename);
            $file->resize(360,200)->save(public_path('upload/university_logo/').$filename);
            $data['logo_img']= $filename;
        }
        if ($request->file('graph_img')){
            $file2 = $request->file('graph_img');
            @unlink(public_path('upload/university_graph_images/'.$data->graph_img));
            $file2name =date('YmdHi').$file2->getClientOriginalName();
            $file2->move(public_path('upload/university_graph_images'), $file2name);
            $file2 = Image::make(public_path('upload/university_graph_images/').$file2name);
            $file2->resize(800,500)->save(public_path('upload/university_graph_images/').$file2name);
            $data['graph_img']= $file2name;
        }
        if ($request->file('gallery_img1')){
            $file3 = $request->file('gallery_img1');
            @unlink(public_path('upload/university_gallery1/'.$data->gallery_img1));
            $file3name =date('YmdHi').$file3->getClientOriginalName();
            $file3->move(public_path('upload/university_gallery1'), $file3name);
            $file3 = Image::make(public_path('upload/university_gallery1/').$file3name);
            $file3->resize(800,500)->save(public_path('upload/university_gallery1/').$file3name);
            $data['gallery_img1']= $file3name;
        }
        if ($request->file('gallery_img2')){
            $file3 = $request->file('gallery_img2');
            @unlink(public_path('upload/university_gallery2/'.$data->gallery_img2));
            $file3name =date('YmdHi').$file3->getClientOriginalName();
            $file3->move(public_path('upload/university_gallery2'), $file3name);
            $file3 = Image::make(public_path('upload/university_gallery2/').$file3name);
            $file3->resize(800,500)->save(public_path('upload/university_gallery2/').$file3name);
            $data['gallery_img2']= $file3name;
        }
        $data->save();
        return redirect()->route('web-site.university.view')->with('success','Successfully Updated');
    }
}
