<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Model\Role;
use App\Model\Meta;
use Auth;

class UserController extends Controller
{
    public function view(){
    	$data['allData'] = User::where('user_category','admin')->get();
    	return view('backend.user.view-user',$data);
    }

    public function add(){
        $data['roles'] = Role::where('mail_status','1')->get();
    	return view('backend.user.add-user',$data);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
               'username' => 'required|unique:users,username'
           ],
           [
            'username.required'=> 'Mobile No/Email is Required',
            'username.unique'=> 'Mobile No/Email is already exist'
           ]
        );
    	$data = new User();
    	$data->usertype = 'admin';
        $data->user_category = 'admin';
        $data->role = $request->role;
    	$data->name = $request->name;
    	$data->username = $request->username;
        $data->status = $request->status;
    	$data->password = bcrypt($request->password);
    	$data->save();
    	return redirect()->route('user')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $data['editData'] = User::find($id);
        $data['roles'] = Role::where('mail_status','1')->get();
        return view('backend.user.edit-user',$data);
    }

    public function update(Request $request,$id){
        $data = User::find($id);
        // $this->validate($request,[
        //     'username'=>'required|unique:users,username,'.$data->id
        // ]);

        $validatedData = $request->validate([
               'username'=>'required|unique:users,username,'.$data->id
           ],
           [
            'username.required'=> 'Mobile No/Email is Required',
            'username.unique'=> 'Mobile No/Email is already exist'
           ]
        );

        
        $data->role = $request->role;
        $data->name = $request->name;
        $data->username = $request->username;
        $data->status = $request->status;
        $data->save();
        return redirect()->route('user')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $user = User::find($request->id);
        if (file_exists('public/upload/user_images/' . $user->image) AND ! empty($user->image)) {
            unlink('public/upload/user_images/' . $user->image);
        }
        $user->delete();
        return redirect()->route('user')->with('success','Data Deleted successfully');
    }

    // Meta

    public function metaView(){
        $data['allData'] = Meta::all();
        return view('backend.user.meta.meta_view',$data);
    }

    public function metaAdd(){
        return view('backend.user.meta.meta_add');
    }

    public function metaStore(Request $request){
        $data = new Meta();
        $data->description = $request->description;
        $data->keyword = $request->keyword;
        $data->author = $request->author;
        $data->canonical_link = $request->canonical_link;
        $data->save();
        return redirect()->route('user.meta.view')->with('success','Data Inserted successfully');
    }

    public function metaEdit($id){
        $data['editData'] = Meta::find($id);
        return view('backend.user.meta.meta_add',$data);
    }

    public function metaUpdate(Request $request,$id){
        $data = Meta::find($id);
        $data->description = $request->description;
        $data->keyword = $request->keyword;
        $data->author = $request->author;
        $data->canonical_link = $request->canonical_link;
        $data->save();
        return redirect()->route('user.meta.view')->with('success','Data updated successfully');
    }
}
