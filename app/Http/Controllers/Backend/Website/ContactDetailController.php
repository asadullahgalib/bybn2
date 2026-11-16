<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\ContactDetails;
use Image;

class ContactDetailController extends Controller
{
    public function view(){
        $data['allData'] = ContactDetails::all();
        return view('backend.website.contact.view-contact-details',$data);
    }

    public function add(){
        return view('backend.website.contact.add-contact-details');
    }

    public function store(Request $request){
        // dd($request->all());
        $data = new ContactDetails();
        $data->address = $request->address;
        $data->branch = $request->branch;
        $data->mobile = $request->mobile;
        $data->email = $request->email;
        $data->office_day = $request->office_day;
        $data->office_time = $request->office_time;
        $data->whatsapp = $request->whatsapp;
        $data->status = $request->status;
        $data->save();
        return redirect()->route('web-site.contact.details.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $data['editData'] = ContactDetails::find($id);
        return view('backend.website.contact.add-contact-details',$data);
    }

    public function update(Request $request,$id){
        // dd($request->all());
        $data = ContactDetails::find($id);
        $data->address = $request->address;
        $data->branch = $request->branch;
        $data->mobile = $request->mobile;
        $data->email = $request->email;
        $data->office_day = $request->office_day;
        $data->office_time = $request->office_time;
        $data->whatsapp = $request->whatsapp;
        $data->status = $request->status;
        $data->save();
        return redirect()->route('web-site.contact.details.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $data = ContactDetails::find($request->id);
        $data->delete();
        return redirect()->route('web-site.contact.details.view')->with('success','Data Deleted successfully');
    }
}
