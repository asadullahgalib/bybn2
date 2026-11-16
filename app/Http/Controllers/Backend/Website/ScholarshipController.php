<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Country;
use App\Model\University;
use App\Model\Scholarship;
use App\Model\ScholarshipFaq;
use Image;

class ScholarshipController extends Controller
{
    public function getUniversity(Request $request){
        $country_id = $request->country_id;
        $universities = University::where('country_id',$country_id)->get();
        return response()->json($universities);
    }

    public function view(){
        $allData = Scholarship::orderBy('id','desc')->get();
        return view('backend.scholarship.scholarship-view',compact('allData'));
    }

    public function add(){
        $data['countries'] = Country::all();
        return view('backend.scholarship.scholarship-add',$data);
    }

    public function store(Request $request){
        $data = new Scholarship;
        $data->university_id = $request->university_id;
        $data->country_id = $request->country_id;
        $data->name = $request->name;
        $data->study_level = $request->study_level;
        $data->deadline = $request->deadline;
        $data->funding_type = $request->funding_type;
        $data->value_award = $request->value_award;
        $data->title_en = $request->title_en;
        $data->description_en = $request->description_en;
        if ($request->file('image')){
            $file2 = $request->file('image');
            $file2name =date('YmdHi').$file2->getClientOriginalName();
            $file2->move(public_path('upload/scholarship_images'), $file2name);
            $file2 = Image::make(public_path('upload/scholarship_images/').$file2name);
            $file2->resize(2600,1300)->save(public_path('upload/scholarship_images/').$file2name);
            $data['image']= $file2name;
        }
        $data->save();

        $countGuidline = count($request->serial);
        if($countGuidline != NULL)
        {
            for ($i=0; $i < $countGuidline; $i++) { 
                $faq = new ScholarshipFaq();
                $faq->scholarship_id = $data->id;
                $faq->serial = $request->serial[$i];
                $faq->question = $request->question[$i];
                $faq->answer = $request->answer[$i];
                $faq->save();
            }
        }

        return redirect()->route('web-site.scholarship.view')->with('success','Successfully Inserted');
    }

    public function edit($id){
        $data['editData'] = Scholarship::find($id);
        $data['countries'] = Country::all();
        $data['guideline_faqs'] = ScholarshipFaq::where('scholarship_id',@$data['editData']->id)->orderBy('serial','asc')->get();
        return view('backend.scholarship.scholarship-edit',$data);
    }

    public function update(Request $request,$id){
        $data = Scholarship::find($id);
        $data->university_id = $request->university_id;
        $data->country_id = $request->country_id;
        $data->name = $request->name;
        $data->study_level = $request->study_level;
        $data->deadline = $request->deadline;
        $data->funding_type = $request->funding_type;
        $data->value_award = $request->value_award;
        $data->title_en = $request->title_en;
        $data->description_en = $request->description_en;
        if ($request->file('image')){
            $file2 = $request->file('image');
            @unlink(public_path('upload/scholarship_images/'.$data->image));
            $file2name =date('YmdHi').$file2->getClientOriginalName();
            $file2->move(public_path('upload/scholarship_images'), $file2name);
            $file2 = Image::make(public_path('upload/scholarship_images/').$file2name);
            $file2->resize(2600,1300)->save(public_path('upload/scholarship_images/').$file2name);
            $data['image']= $file2name;
        }
        $data->save();

        ScholarshipFaq::where('scholarship_id',$data->id)->delete();

        $countGuidline = count($request->serial);
        if($countGuidline != NULL)
        {
            for ($i=0; $i < $countGuidline; $i++) { 
                $faq = new ScholarshipFaq();
                $faq->scholarship_id = $data->id;
                $faq->serial = $request->serial[$i];
                $faq->question = $request->question[$i];
                $faq->answer = $request->answer[$i];
                $faq->save();
            }
        }

        return redirect()->route('web-site.scholarship.view')->with('success','Successfully Updated');
    }
}
