<?php

namespace App\Http\Controllers\Backend\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Model\MenuPost;
use App\Model\MenuPostFile;
use Image;

class PostController extends Controller
{
    public function view(){
        $data['allData'] = MenuPost::orderBy('id','desc')->get();
        return view('backend.post.post-view', $data);
    }

    public function add(){
        return view('backend.post.post-add');
    }

    public function store(Request $request){
        // dd($request->all());
        // $this->validate($request,[
        //     'file' => 'mimes:pdf',
        // ]);
        $data = new MenuPost();
        $data->date = $request->date ? date('Y-m-d',strtotime($request->date)) : null;
        $data->title_en = $request->title_en;
        $data->description_en = $request->description_en;
        if ($request->file('image')){
            $file = $request->file('image');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/post_iamges'), $filename);
            $file = Image::make(public_path('upload/post_iamges/').$filename);
            $file->resize(600,500)->save(public_path('upload/post_iamges/').$filename);
            $data['image']= $filename;
        }
        $img2 = $request->file('file');
        if ($img2) {
            $imgName2 = date('YmdHi').$img2->getClientOriginalName();
            $img2->move('public/upload/post_pdf_files/', $imgName2);
            $data['file'] = $imgName2;
        }

        $data->created_by = Auth::user()->id;
        $data->save();

        return redirect()->route('frontend-menu.post.view')->with('success','Data! successfully inserted');
    }

    public function edit($id){
        $data['editData'] = MenuPost::find($id);
        return view('backend.post.post-add', $data);
    }

    public function update(Request $request ,$id){
        // $this->validate($request,[
        //     'file' => 'mimes:pdf',
        // ]);
        $data = MenuPost::find($id);
        $data->date = $request->date ? date('Y-m-d',strtotime($request->date)) : null;
        $data->title_en = $request->title_en;
        $data->description_en = $request->description_en;
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/post_iamges/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/post_iamges'), $filename);
            $file = Image::make(public_path('upload/post_iamges/').$filename);
            $file->resize(600,500)->save(public_path('upload/post_iamges/').$filename);
            $data['image']= $filename;
        }
        $img2 = $request->file('file');
        if ($img2) {
            @unlink(public_path('upload/post_pdf_files/'.$data->file));
            $imgName2 = date('YmdHi').$img2->getClientOriginalName();
            $img2->move('public/upload/post_pdf_files/', $imgName2);
            $data['file'] = $imgName2;
        }
        $data->updated_by = Auth::user()->id;
        $data->save();

        return redirect()->route('frontend-menu.post.view')->with('success','Data! successfully updated');
    }
    
    public function delete(Request $request){ 
        $data = MenuPost::find($request->id);
        if (file_exists('public/upload/post_iamges/' . $data->image) AND ! empty($data->image)) {
            unlink('public/upload/post_iamges/' . $data->image);
        }
        if (file_exists('public/upload/post_pdf_files/' . $data->file) AND ! empty($data->file)) {
            unlink('public/upload/post_pdf_files/' . $data->file);
        }
        $data->delete();
        return redirect()->route('frontend-menu.post.view')->with('success','Data Deleted successfully');
    }
}
