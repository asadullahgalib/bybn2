<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\ContactMap;

class MapController extends Controller
{
    public function view(){
        $data['countMap'] = ContactMap::count();
    	$data['allData'] = ContactMap::all();
    	return view('backend.website.contact.view-map',$data);
    }

    public function add(){
    	return view('backend.website.contact.add-map');
    }

    public function store(Request $request){
        $data = new ContactMap();
        $data->description = $request->description;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('web-site.map.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $data['editData'] = ContactMap::find($id);
        return view('backend.website.contact.add-map',$data);
    }

    public function update(Request $request,$id){
        $data = ContactMap::find($id);
        $data->description = $request->description;
        $data->save();
        return redirect()->route('web-site.map.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $trade = ContactMap::find($request->id);
        $trade->delete();
        return redirect()->route('web-site.map.view')->with('success','Data Deleted successfully');
    }
}
