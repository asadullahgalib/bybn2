<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Country;
use Image;

class CountryController extends Controller
{
    public function view(){
        $allData=Country::all();
        return view('backend.country.country-view',compact('allData'));
    }

    public function add(){
        return view('backend.country.country-add');
    }

    public function store(Request $request){
        $data = new Country;
        $data->name = $request->name;
        $data->created_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/country_images'), $filename);
            $file = Image::make(public_path('upload/country_images/').$filename);
            $file->resize(200,200)->save(public_path('upload/country_images/').$filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('web-site.country.view')->with('success','Successfully Inserted');
    }

    public function edit($id){
        $editData = Country::find($id);
        return view('backend.country.country-add',compact('editData'));
    }

    public function update(Request $request,$id){
        $data = Country::find($id);
        $data->name = $request->name;
        $data->updated_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/country_images/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/country_images'), $filename);
            $file = Image::make(public_path('upload/country_images/').$filename);
            $file->resize(200,200)->save(public_path('upload/country_images/').$filename);
            $data['image']= $filename;
        }
        $data->save();
        return redirect()->route('web-site.country.view')->with('success','Successfully Updated');
    }
}
