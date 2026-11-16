<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Guideline;
use Image;

class GuidelinesController extends Controller
{
    public function view(){
        $allData=Guideline::all();
        return view('backend.guideline.guideline-view',compact('allData'));
    }

    public function add(){
        return view('backend.guideline.guideline-add');
    }

    public function store(Request $request){
        $data = new Guideline;
        $data->name = $request->name;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('web-site.guidelines.view')->with('success','Successfully Inserted');
    }

    public function edit($id){
        $editData = Guideline::find($id);
        return view('backend.guideline.guideline-add',compact('editData'));
    }

    public function update(Request $request,$id){
        $data = Guideline::find($id);
        $data->name = $request->name;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return redirect()->route('web-site.guidelines.view')->with('success','Successfully Updated');
    }
}
