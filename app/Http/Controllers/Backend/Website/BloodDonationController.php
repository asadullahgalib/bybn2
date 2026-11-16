<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\BloodDonation;
use Image;

class BloodDonationController extends Controller
{
    public function view(){
        $data['allData'] = BloodDonation::orderBy('date','desc')->get();
        return view('backend.website.donation.view-donation',$data);
    }

    public function add(){
        return view('backend.website.donation.add-donation');
    }

    public function store(Request $request){
        $data = new BloodDonation();

        $data->date = date('Y-m-d');
        $data->name = strip_tags($request->name);
        $data->mobile = strip_tags($request->mobile);
        $data->email = strip_tags($request->email);
        $data->gender = strip_tags($request->gender);
        $data->address = strip_tags($request->address);
        $data->dob = date('Y-m-d',strtotime($request->dob));
        $data->blood_group = strip_tags($request->blood_group);

        $data->save();

        return redirect()->route('web-site.donation.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $data['editData'] = BloodDonation::find($id);
        return view('backend.website.donation.add-donation',$data);
    }

    public function update(Request $request,$id){
        $data = BloodDonation::find($id);

        $data->name = strip_tags($request->name);
        $data->mobile = strip_tags($request->mobile);
        $data->email = strip_tags($request->email);
        $data->gender = strip_tags($request->gender);
        $data->address = strip_tags($request->address);
        $data->dob = date('Y-m-d',strtotime($request->dob));
        $data->blood_group = strip_tags($request->blood_group);

        $data->save();

        return redirect()->route('web-site.donation.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $data = BloodDonation::find($request->id);
        $data->delete();

        return redirect()->route('web-site.donation.view')->with('success','Data Deleted successfully');
    }
}
