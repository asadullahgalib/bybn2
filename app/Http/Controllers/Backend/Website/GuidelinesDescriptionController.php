<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Guideline;
use App\Model\GuidelineDescription;
use App\Model\GuidelineDescriptionFaq;
use Image;


class GuidelinesDescriptionController extends Controller
{
    public function view(){
        $allData = GuidelineDescription::all();
        return view('backend.guideline.guideline-description-view',compact('allData'));
    }

    public function add(){
        $data['guidelines'] = Guideline::all();
        return view('backend.guideline.guideline-description-add',$data);
    }

    public function store(Request $request){
        // dd($request->all());
        $data = new GuidelineDescription;
        $data->guideline_id = $request->guideline_id;
        $data->title_en = $request->title_en;
        $data->description_en = $request->description_en;
        $data->created_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/guideline_images'), $filename);
            $file = Image::make(public_path('upload/guideline_images/').$filename);
            $file->resize(1250,1500)->save(public_path('upload/guideline_images/').$filename);
            $data['image']= $filename;
        }
        $data->save();

        $countGuidline = count($request->serial);
        if($countGuidline != NULL)
        {
            for ($i=0; $i < $countGuidline; $i++) { 
                $faq = new GuidelineDescriptionFaq();
                $faq->guideline_description_id = $data->id;
                $faq->serial = $request->serial[$i];
                $faq->question = $request->question[$i];
                $faq->answer = $request->answer[$i];
                $faq->save();
            }
        }

        return redirect()->route('web-site.guidelines.description.view')->with('success','Successfully Inserted');
    }

    public function edit($id){
        $data['editData'] = GuidelineDescription::find($id);
        $data['guidelines'] = Guideline::all();
        $data['guideline_faqs'] = GuidelineDescriptionFaq::where('guideline_description_id',@$data['editData']->id)->orderBy('serial','asc')->get();
        return view('backend.guideline.guideline-description-edit',$data);
    }

    public function update(Request $request,$id){
        $data = GuidelineDescription::find($id);
        $data->guideline_id = $request->guideline_id;
        $data->title_en = $request->title_en;
        $data->description_en = $request->description_en;
        $data->updated_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/guideline_images/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/guideline_images'), $filename);
            $file = Image::make(public_path('upload/guideline_images/').$filename);
            $file->resize(1250,1500)->save(public_path('upload/guideline_images/').$filename);
            $data['image']= $filename;
        }
        $data->save();

        GuidelineDescriptionFaq::where('guideline_description_id',$data->id)->delete();

        $countGuidline = count($request->serial);
        if($countGuidline != NULL)
        {
            for ($i=0; $i < $countGuidline; $i++) { 
                $faq = new GuidelineDescriptionFaq();
                $faq->guideline_description_id = $data->id;
                $faq->serial = $request->serial[$i];
                $faq->question = $request->question[$i];
                $faq->answer = $request->answer[$i];
                $faq->save();
            }
        }
        return redirect()->route('web-site.guidelines.description.view')->with('success','Successfully Updated');
    }
}
