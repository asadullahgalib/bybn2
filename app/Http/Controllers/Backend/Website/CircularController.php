<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Circular;

class CircularController extends Controller
{
    public function circularView()
    {
        $data['allData'] = Circular::orderBy('id','desc')->get();
        return view('backend.website.circular.circular_view',$data);
    }

    public function circularAdd()
    {
        return view('backend.website.circular.circular_add');
    }

    public function circularStore(Request $request)
    {
        $data = new Circular();
        $data->slug = str_slug($request->title_en).date('YmdHi');
        $data->title_en = $request->title_en;
        $data->title_bn = $request->title_bn;
        $data->status = $request->status;
        if ($request->file('image')){
            $file = $request->file('image');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/circular_images'), $filename);
            $data['image']= $filename;
        }
        $data->save();

        return redirect()->route('web-site.circular.view')->with('success','Data Saved successfully');
    }

    public function circularEdit($id)
    {
        $data['editData'] = Circular::find($id);
        return view('backend.website.circular.circular_add',$data);
    }

    public function circularUpdate(Request $request,$id)
    {
        $data = Circular::find($id);
        $data->slug = str_slug($request->title_en).date('YmdHi');
        $data->title_en = $request->title_en;
        $data->title_bn = $request->title_bn;
        $data->status = $request->status;
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/circular_images/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/circular_images'), $filename);
            $data['image']= $filename;
        }
        $data->save();

        return redirect()->route('web-site.circular.view')->with('success','Data Updated successfully');
    }

    public function circularDelete(Request $request)
    {
        $data = Circular::find($request->id);
        if (file_exists('public/upload/circular_images/' . $data->image) AND ! empty($data->image)) {
            unlink('public/upload/circular_images/' . $data->image);
        }
        $data->delete();
        return redirect()->back();
    }
}
