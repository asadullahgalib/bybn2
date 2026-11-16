<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Image;
use App\Model\Role;
use App\Model\Contact;
use DB;
use PDF;

class ProfileController extends Controller
{
    public function view(){
    	$id = Auth::user()->id;

        if(Auth::user()->user_category=='employee'){
            $data['details'] = User::find($id);
            $data['educations'] = Education::where('user_id',$id)->get();
            $data['page_title'] = 'statement';
        }else{
            $data['user'] = User::find($id);
        }
    	return view('backend.user.view-profile',$data);
    }

    public function edit(){
    	$id = Auth::user()->id;
    	$editData = User::find($id);
    	return view('backend.user.edit-profile',compact('editData'));
    }

    public function update(Request $request){
        // dd($request->all());
    	$data = User::find(Auth::user()->id);
        $validatedData = $request->validate([
               'username'=>'required|unique:users,username,'.$data->id
           ],
           [
            'username.required'=> 'Mobile No/Email is Required',
            'username.unique'=> 'Mobile No/Email is already exist'
           ]
        );
        $data->username = $request->username;
        $data->name = $request->name;
        $data->address = $request->address;
        $data->gender = $request->gender;
        $data->fname = $request->fname;
        $data->mname = $request->mname;
        $data->mobile = $request->mobile;
        $img = $request->file('image');
        if ($img) {
            if($request->user_category=='student'){
                @unlink(public_path('upload/student_images/'.$data->image));
                $imgName = date('YmdHi').$img->getClientOriginalName();
                $img->move('public/upload/student_images/', $imgName);
                $img = Image::make(public_path('upload/student_images/').$imgName);
                $img->resize(300,300)->save(public_path('upload/student_images/').$imgName);
            }else{
                @unlink(public_path('upload/user_images/'.$data->image));
                $imgName = date('YmdHi').$img->getClientOriginalName();
                $img->move('public/upload/user_images/', $imgName);
                $img = Image::make(public_path('upload/user_images/').$imgName);
                $img->resize(300,300)->save(public_path('upload/user_images/').$imgName);
            }
            $data['image'] = $imgName;
        }
        $data->save();
        return redirect()->route('profiles.view')->with('success','Profile updated successfully');
    }

    public function passwordView(){
        return view('backend.user.edit-password');
    }

    public function passwordUpdate(Request $request){
        if(Auth::attempt(['id'=>Auth::user()->id,'password'=>$request->current_password])){
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->route('profiles.view')->with('success','Password changed successfully');
        }else{
            return redirect()->back()->with('error','Sorry! your current password dost not match');
        }
    }
}
