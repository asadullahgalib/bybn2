<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Contactor;
use App\Model\JobSeeker;
use App\Model\User;
use App\Model\AssignStudent;
use App\Model\Contact;
use App\Model\DiscountStudent;
use App\Model\Year;
use App\Model\Religion;
use App\Model\StudentClass;
use PDF;
use DB;

class ContactorController extends Controller
{
    public function contactorView(){
    	$data['allData'] = Contactor::orderBy('id','desc')->get();
    	return view('backend.website.contactor.view-contactor',$data);
    }

    public function contactorDetails($id){
    	$data['detail'] = Contactor::find($id);
    	return view('backend.website.contactor.detail-contactor',$data);
    }

    public function contactorDelete(Request $request){
        $data = Contactor::find($request->id);
        $data->delete();
        return redirect()->back();
    }

    public function jobSeekerView(){
        $data['allData'] = JobSeeker::orderBy('id','desc')->get();
        return view('backend.website.contactor.view_job_seeker',$data);
    }

    public function jobSeekerDelete(Request $request){
        $data = JobSeeker::find($request->id);
        if (file_exists('public/upload/job_seeker_files/' . $data->file) AND ! empty($data->file)) {
            unlink('public/upload/job_seeker_files/' . $data->file);
        }
        $data->delete();
        return redirect()->back();
    }

    public function studentView(){
        $data['allData'] = AssignStudent::where('status','2')->orderBy('id','desc')->get();
        return view('backend.website.contactor.view_student',$data);
    }

    public function studentDetails($id){
        $data['details'] = AssignStudent::with(['student'])->where('id',$id)->first();
        $data['school'] = Contact::first();
        $pdf = PDF::loadView('frontend.student.pdf.stdudent_details_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        $pdf->stream('student-registration-copy.pdf');
    }

    function studentDelete(Request $request) 
    {
        $assign = AssignStudent::find($request->id);
        $user = User::where('id',$assign->student_id)->first();
        if (file_exists('public/upload/student_images/' . @$user->image) AND ! empty(@$user->image)) {
            unlink('public/upload/student_images/' . @$user->image);
        }
        DiscountStudent::where('assign_student_id',@$assign->id)->delete();
        $user->delete();
        $assign->delete();
        return redirect()->back();
    }

    public function studentVerify($id)
    {
        $data['editData'] = AssignStudent::with(['student','student_discount'])->where('id',$id)->first();
        $data['years'] = Year::orderBy('id','DESC')->get();
        $data['religions'] = Religion::all();
        $data['classes'] = StudentClass::where('status','1')->get();
        return view('backend.website.contactor.verify_student',$data);
    }

    public function studentVerifyStore(Request $request, $id)
    {
        DB::transaction(function() use($request, $id){
            $requestYear = Year::find($request->year_id)->name;
            $yearLastDisit = substr($requestYear, 2);
            if($request->class_id=='1'){
                $digit = '100';
            }elseif($request->class_id=='2'){
                $digit = '200';
            }elseif($request->class_id=='3'){
                $digit = '300';
            }elseif($request->class_id=='4'){
                $digit = '400';
            }elseif($request->class_id=='5'){
                $digit = '500';
            }elseif($request->class_id=='6'){
                $digit = '600';
            }elseif($request->class_id=='7'){
                $digit = '700';
            }elseif($request->class_id=='8'){
                $digit = '800';
            }elseif($request->class_id=='9'){
                $digit = '900';
            }elseif($request->class_id=='10'){
                $digit = '1000';
            }elseif($request->class_id=='11'){
                $digit = '11000';
            }elseif($request->class_id=='12'){
                $digit = '120000';
            }elseif($request->class_id=='13'){
                $digit = '1300000';
            }

            $combineYearAndDigit = $yearLastDisit.$digit;
            // dd($combineYearAndDigit);
            // dd($combineYearAndDigit);

            $checkAssignStudent = AssignStudent::where('year_id',$request->year_id)->where('class_id',$request->class_id)->where('shift_id',$request->shift_id)->orderBy('id','desc')->first();
            $studentUser = User::where('id',@$checkAssignStudent->student_id)->first();
            if($studentUser == NULL){
                $id_no = $combineYearAndDigit.'1';
            }else{
                $id_no = @$studentUser->id_no+1;
            }
            $user = User::where('id',$request->student_id)->first();
            $user->id_no = $id_no;
            $user->username = $id_no;
            $user->name_bn = $request->name_bn;
            $user->name_en = $request->name_en;
            $user->dob = $request->dob !== null ? date('Y-m-d', strtotime($request->dob)) : null;
            $user->student_type = $request->student_type;
            $user->fname_bn = $request->fname_bn;
            $user->fname_en = $request->fname_en;
            $user->father_occupation_bn = $request->father_occupation_bn;
            $user->father_occupation_en = $request->father_occupation_en;
            $user->father_mobile = $request->father_mobile;
            $user->mname_bn = $request->mname_bn;
            $user->mname_en = $request->mname_en;
            $user->mother_occupation_bn = $request->mother_occupation_bn;
            $user->mother_occupation_en = $request->mother_occupation_en;
            $user->mother_mobile = $request->mother_mobile;
            $user->present_address_bn = $request->present_address_bn;
            $user->present_address_en = $request->present_address_en;
            $user->permanent_village_bn = $request->permanent_village_bn;
            $user->permanent_village_en = $request->permanent_village_en;
            $user->permanent_post_bn = $request->permanent_post_bn;
            $user->permanent_post_en = $request->permanent_post_en;
            $user->permanent_upazila_bn = $request->permanent_upazila_bn;
            $user->permanent_upazila_en = $request->permanent_upazila_en;
            $user->permanent_district_bn = $request->permanent_district_bn;
            $user->permanent_district_en = $request->permanent_district_en;
            $user->previous_school_bn = $request->previous_school_bn;
            $user->previous_school_en = $request->previous_school_en;
            $user->nomini_father_name_en = $request->nomini_father_name_en;
            $user->nomini_father_name_en = $request->nomini_father_name_en;
            $user->nomini_address_bn = $request->nomini_address_bn;
            $user->nomini_address_en = $request->nomini_address_en;
            $user->nomini_occupation_bn = $request->nomini_occupation_bn;
            $user->nomini_occupation_en = $request->nomini_occupation_en;
            $user->father_yearly_income = $request->father_yearly_income;
            $user->gender = $request->gender;
            $user->blood_group = $request->blood_group;
            $user->religion_id = $request->religion_id;
            $user->birth_reg = $request->birth_reg;
            if($request->file('image')){
                $file = $request->file('image');
                @unlink(public_path('upload/student_images/' .$user->image));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/student_images'),$filename);
                $file = Image::make(public_path('upload/student_images/').$filename);
                $file->resize(300,385)->save(public_path('upload/student_images/').$filename);
                $user['image'] = $filename;
            }
            $user->status = '1';
            $user->save();
            $assignStudent = AssignStudent::where('id',$id)->where('student_id',$request->student_id)->first();
            $assignStudent->student_id = $user->id;
            $assignStudent->admission_date = $request->admission_date !== null ? date('Y-m-d', strtotime($request->admission_date)) : null;
            $assignStudent->roll = $request->roll;
            $assignStudent->gender = $request->gender;
            $assignStudent->year_id = $request->year_id;
            $assignStudent->class_id = $request->class_id;
            $assignStudent->status = '1';
            $assignStudent->save();
        });       

        return redirect()->route('web-site.student.view')->with('success','Student Verified successfully!');
    }
}
