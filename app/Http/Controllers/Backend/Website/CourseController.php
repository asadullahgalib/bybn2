<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Country;
use App\Model\University;
use App\Model\Course;
use App\Model\CourseFaq;
use App\Model\OtherCourseCountry;
use App\Model\OtherCourseUniversity;
use Image;

class CourseController extends Controller
{
    public function view(){
        $allData = Course::orderBy('id','asc')->get();
        return view('backend.course.course-view',compact('allData'));
    }

    public function add(){
        $data['countries'] = Country::all();
        $data['universities'] = University::all();
        return view('backend.course.course-add',$data);
    }

    public function store(Request $request){
        // dd($request->all());
        $data = new Course;
        $data->name = $request->name;
        $data->description_en = $request->description_en;
        if ($request->file('image')){
            $file2 = $request->file('image');
            $file2name =date('YmdHi').$file2->getClientOriginalName();
            $file2->move(public_path('upload/course_images'), $file2name);
            $file2 = Image::make(public_path('upload/course_images/').$file2name);
            $file2->resize(750,403)->save(public_path('upload/course_images/').$file2name);
            $data['image']= $file2name;
        }
        $data->save();


        return redirect()->route('web-site.course.view')->with('success','Successfully Inserted');
    }

    public function edit($id){
        $data['editData'] = Course::find($id);
        // dd($data['country_array']);
        return view('backend.course.course-add',$data);
    }

    public function update(Request $request,$id){
        $data = Course::find($id);
        $data->name = $request->name;
        $data->description_en = $request->description_en;
        if ($request->file('image')){
            $file2 = $request->file('image');
            @unlink(public_path('upload/course_images/'.$data->image));
            $file2name =date('YmdHi').$file2->getClientOriginalName();
            $file2->move(public_path('upload/course_images'), $file2name);
            $file2 = Image::make(public_path('upload/course_images/').$file2name);
            $file2->resize(750,403)->save(public_path('upload/course_images/').$file2name);
            $data['image']= $file2name;
        }
        $data->save();

        return redirect()->route('web-site.course.view')->with('success','Successfully Updated');
    }
}
