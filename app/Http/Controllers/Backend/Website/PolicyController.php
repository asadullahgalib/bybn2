<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Policy;
use Image;

class PolicyController extends Controller
{
    public function view(){
        $data['allData'] = Policy::orderBy('id','asc')->get();
        return view('backend.website.policy.policy-view',$data);
    }

    public function add(){
        return view('backend.website.policy.policy-add');
    }

    public function store(Request $request){
        $data = new Policy();
        $data->description_en = $request->description_en;
        $data->save();
        return redirect()->route('web-site.policy.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $data['editData'] = Policy::find($id);
        return view('backend.website.policy.policy-add',$data);
    }

    public function update(Request $request,$id){
        $data = Policy::find($id);
        $data->description_en = $request->description_en;
        $data->save();
        return redirect()->route('web-site.policy.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $data = Policy::find($request->id);
        $data->delete();
        return redirect()->route('web-site.policy.view')->with('success','Data Deleted successfully');
    }
}
