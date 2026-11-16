<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Country;
use App\Model\University;
use App\Model\Ielts;
use App\Model\IeltsFaq;
use Image;

class IeltsController extends Controller
{
    public function view(){
        $allData = Ielts::orderBy('id','desc')->get();
        return view('backend.ielts.ielts-view',compact('allData'));
    }

    public function add(){
        return view('backend.ielts.ielts-add');
    }

    public function store(Request $request){
        $data = new Ielts;
        $data->title_en = $request->title_en;
        $data->description_en = $request->description_en;
        if ($request->file('image')){
            $file2 = $request->file('image');
            $file2name =date('YmdHi').$file2->getClientOriginalName();
            $file2->move(public_path('upload/ielts_images'), $file2name);
            $file2 = Image::make(public_path('upload/ielts_images/').$file2name);
            $file2->resize(2600,1300)->save(public_path('upload/ielts_images/').$file2name);
            $data['image']= $file2name;
        }
        $data->save();

        $countGuidline = count($request->serial);
        if($countGuidline != NULL)
        {
            for ($i=0; $i < $countGuidline; $i++) { 
                $faq = new IeltsFaq();
                $faq->ielts_id = $data->id;
                $faq->serial = $request->serial[$i];
                $faq->question = $request->question[$i];
                $faq->answer = $request->answer[$i];
                $faq->save();
            }
        }

        return redirect()->route('web-site.ielts.view')->with('success','Successfully Inserted');
    }

    public function edit($id){
        $data['editData'] = Ielts::find($id);
        $data['guideline_faqs'] = IeltsFaq::where('ielts_id',@$data['editData']->id)->orderBy('serial','asc')->get();
        // dd($data['guideline_faqs']->toArray());
        return view('backend.ielts.ielts-edit',$data);
    }

    public function update(Request $request,$id){
        $data = Ielts::find($id);
        $data->title_en = $request->title_en;
        $data->description_en = $request->description_en;
        if ($request->file('image')){
            $file2 = $request->file('image');
            @unlink(public_path('upload/ielts_images/'.$data->image));
            $file2name =date('YmdHi').$file2->getClientOriginalName();
            $file2->move(public_path('upload/ielts_images'), $file2name);
            $file2 = Image::make(public_path('upload/ielts_images/').$file2name);
            $file2->resize(2600,1300)->save(public_path('upload/ielts_images/').$file2name);
            $data['image']= $file2name;
        }
        $data->save();

        IeltsFaq::where('ielts_id',$data->id)->delete();

        $countGuidline = count($request->serial);
        if($countGuidline != NULL)
        {
            for ($i=0; $i < $countGuidline; $i++) { 
                $faq = new IeltsFaq();
                $faq->ielts_id = $data->id;
                $faq->serial = $request->serial[$i];
                $faq->question = $request->question[$i];
                $faq->answer = $request->answer[$i];
                $faq->save();
            }
        }
        return redirect()->route('web-site.ielts.view')->with('success','Successfully Updated');
    }
}
