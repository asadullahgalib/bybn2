<?php

namespace App\Http\Controllers\Backend\Employees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Role;
use App\Model\Contact;
use Image;
use DB;
use PDF;
use Auth;

class EmployeeRegistrationController extends Controller
{
    public function view()
    {
    	$data['allData'] = User::where('user_category','employee')->orderBy('sort','asc')->get();
    	return view('backend.employees.registration.employee-view',$data);
    }

    public function employeeInactive($id){
        DB::table('users')
                ->where('id', $id)
                ->update(['status' => 0]);
        return redirect()->route('human-resource.hrm.employee.registration.view')->with('success','Well done! status updated');
    }

    public function employeeActive($id){
        DB::table('users')
                ->where('id', $id)
                ->update(['status' => 1]);
        return redirect()->route('human-resource.hrm.employee.registration.view')->with('success','Well done! status updated');
    }

    public function add()
    {    	
        return view('backend.employees.registration.employee-add');
    }
    public function store(Request $request)
    {
        $user = new User();
        $user->usertype = 'admin';
        $user->user_category = 'employee';
        $user->name = $request->name;
        $user->sort = $request->sort;
        $user->mobile = $request->mobile;
        $user->designation = $request->designation;
        $user->email = $request->email;
        $user->join_date = null;
        $user->dob = null;
        $user->password = bcrypt(654321);
        if($request->file('image')){
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/employee_images'),$filename);
            $file = Image::make(public_path('upload/employee_images/').$filename);
            $file->resize(300,300)->save(public_path('upload/employee_images/').$filename);
            $user['image'] = $filename;
        }
        $user->save();
        return redirect()->route('human-resource.hrm.employee.registration.view')->with('success','Data inserted successfully!');
    }

    public function edit($id)
    {
    	$data['editData'] = User::find($id);
        return view('backend.employees.registration.employee-add',$data);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->sort = $request->sort;
        $user->mobile = $request->mobile;
        $user->designation = $request->designation;
        $user->email = $request->email;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/employee_images/' .$user->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/employee_images'),$filename);
            $file = Image::make(public_path('upload/employee_images/').$filename);
            $file->resize(300,300)->save(public_path('upload/employee_images/').$filename);
            $user['image'] = $filename;
        }
        $user->save();
        return redirect()->route('human-resource.hrm.employee.registration.view')->with('success','Data updated successfully!');
    }

    public function destroy(Request $request){
        $employee = User::find($request->id);
        if (file_exists('public/upload/employee_images/' . $employee->image) AND ! empty($employee->image)) {
            unlink('public/upload/employee_images/' . $employee->image);
        }
        $employee->delete();
        return redirect()->back();
    }
}
