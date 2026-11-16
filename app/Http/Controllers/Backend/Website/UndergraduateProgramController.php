<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Country;
use App\Model\University;
use App\Model\UniversityUndergraduateProgram;
use App\Model\UndergraduatedProgramFaq;
use Image;

class UndergraduateProgramController extends Controller
{
    public function view(){
        $allData = UniversityUndergraduateProgram::orderBy('id','desc')->get();
        return view('backend.university.undergraduate-program-view',compact('allData'));
    }

    public function add(){
        $data['universities'] = University::all();
        return view('backend.university.undergraduate-program-add',$data);
    }

    public function store(Request $request){
        $data = new UniversityUndergraduateProgram;
        $data->university_id = $request->university_id;
        $data->description_en = $request->description_en;
        $data->description_bn = $request->description_bn;
        if ($request->file('bg_img_desktop')){
            $file = $request->file('bg_img_desktop');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/undergraduate_bg_images'), $filename);
            $file = Image::make(public_path('upload/undergraduate_bg_images/').$filename);
            $file->resize(1150,450)->save(public_path('upload/undergraduate_bg_images/').$filename);
            $data['bg_img_desktop']= $filename;
        }
        if ($request->file('image')){
            $file2 = $request->file('image');
            $file2name =date('YmdHi').$file2->getClientOriginalName();
            $file2->move(public_path('upload/undergraduate_images'), $file2name);
            $file2 = Image::make(public_path('upload/undergraduate_images/').$file2name);
            $file2->resize(1250,1500)->save(public_path('upload/undergraduate_images/').$file2name);
            $data['image']= $file2name;
        }
        $data->save();

        $countGuidline = count($request->serial);
        if($countGuidline != NULL)
        {
            for ($i=0; $i < $countGuidline; $i++) { 
                $faq = new UndergraduatedProgramFaq();
                $faq->university_undergraduate_program_id = $data->id;
                $faq->serial = $request->serial[$i];
                $faq->question = $request->question[$i];
                $faq->answer = $request->answer[$i];
                $faq->save();
            }
        }

        return redirect()->route('web-site.undergraduate.program.view')->with('success','Successfully Inserted');
    }

    public function edit($id){
        $data['editData'] = UniversityUndergraduateProgram::find($id);
        $data['universities'] = University::all();
        $data['guideline_faqs'] = UndergraduatedProgramFaq::where('university_undergraduate_program_id',@$data['editData']->id)->orderBy('serial','asc')->get();
        // dd($data['guideline_faqs']->toArray());
        return view('backend.university.undergraduate-program-edit',$data);
    }

    public function update(Request $request,$id){
        $data = UniversityUndergraduateProgram::find($id);
        $data->university_id = $request->university_id;
        $data->description_en = $request->description_en;
        $data->description_bn = $request->description_bn;
        if ($request->file('bg_img_desktop')){
            $file = $request->file('bg_img_desktop');
            @unlink(public_path('upload/undergraduate_bg_images/'.$data->bg_img_desktop));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/undergraduate_bg_images'), $filename);
            $file = Image::make(public_path('upload/undergraduate_bg_images/').$filename);
            $file->resize(1150,450)->save(public_path('upload/undergraduate_bg_images/').$filename);
            $data['bg_img_desktop']= $filename;
        }
        if ($request->file('image')){
            $file2 = $request->file('image');
            @unlink(public_path('upload/undergraduate_images/'.$data->image));
            $file2name =date('YmdHi').$file2->getClientOriginalName();
            $file2->move(public_path('upload/undergraduate_images'), $file2name);
            $file2 = Image::make(public_path('upload/undergraduate_images/').$file2name);
            $file2->resize(1250,1500)->save(public_path('upload/undergraduate_images/').$file2name);
            $data['image']= $file2name;
        }
        $data->save();

        UndergraduatedProgramFaq::where('university_undergraduate_program_id',$data->id)->delete();

        $countGuidline = count($request->serial);
        if($countGuidline != NULL)
        {
            for ($i=0; $i < $countGuidline; $i++) { 
                $faq = new UndergraduatedProgramFaq();
                $faq->university_undergraduate_program_id = $data->id;
                $faq->serial = $request->serial[$i];
                $faq->question = $request->question[$i];
                $faq->answer = $request->answer[$i];
                $faq->save();
            }
        }
        return redirect()->route('web-site.undergraduate.program.view')->with('success','Successfully Updated');
    }
}
