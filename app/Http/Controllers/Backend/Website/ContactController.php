<?php

namespace App\Http\Controllers\Backend\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Contact;
use App\Model\VideoGallery;
use App\Model\CommitteeMember;
use App\Model\DonarMember;
use Image;

class ContactController extends Controller
{
    public function view(){
        $data['countContact'] = Contact::count();
    	$data['allData'] = Contact::all();
    	return view('backend.website.contact.view-contact',$data);
    }

    public function add(){
    	return view('backend.website.contact.add-contact');
    }

    public function store(Request $request){
        // dd($request->all());
        $data = new Contact();
        $data->name_en = $request->name_en;
        $data->address_uk = $request->address_uk;
        $data->address_bd = $request->address_bd;
        $data->mobile_uk = $request->mobile_uk;
        $data->mobile_bd = $request->mobile_bd;
        $data->email_uk = $request->email_uk;
        $data->email_bd = $request->email_bd;
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->instagram = $request->instagram;
        $data->linkedin = $request->linkedin;
        $data->web_address = $request->web_address;
        $data->created_by = Auth::user()->id;
        
        $data->save();
        return redirect()->route('web-site.contact.view')->with('success','Data Inserted successfully');
    }

    public function edit($id){
        $data['editData'] = Contact::find($id);
        return view('backend.website.contact.add-contact',$data);
    }

    public function details($id){
        $data['details'] = Contact::find($id);
        return view('backend.website.contact.details-contact',$data);
    }

    public function update(Request $request,$id){
        $data = Contact::find($id);
        $data->name_en = $request->name_en;
        $data->contact_for_1 = $request->contact_for_1;
        $data->mobile1 = $request->mobile1;
        $data->email1 = $request->email1;
        $data->address1 = $request->address1;
        $data->contact_for_2 = $request->contact_for_2;
        $data->mobile2 = $request->mobile2;
        $data->email2 = $request->email2;
        $data->address2 = $request->address2;
        $data->facebook = $request->facebook;
        $data->twitter = $request->twitter;
        $data->instagram = $request->instagram;
        $data->linkedin = $request->linkedin;
        $data->website_link = $request->website_link;
        $data->tiktok = $request->tiktok;
        $data->youtube = $request->youtube;
        $data->whatsapp_number = $request->whatsapp_number;
        $data->updated_by = Auth::user()->id;
        if ($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/contact_images/'.$data->image));
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/contact_images'), $filename);
            // $file = Image::make(public_path('upload/contact_images/').$filename);
            // $file->resize(300,300)->save(public_path('upload/contact_images/').$filename);
            $data['image']= $filename;
        }
        if ($request->file('logo_header')){
            $file2 = $request->file('logo_header');
            @unlink(public_path('upload/logo_images/'.$data->image));
            $file2name =date('YmdHi').$file2->getClientOriginalName();
            $file2->move(public_path('upload/logo_header'), $file2name);
            // $file2 = Image::make(public_path('upload/contact_images/').$file2name);
            // $file2->resize(300,300)->save(public_path('upload/contact_images/').$file2name);
            $data['logo_header']= $file2name;
        }
        if ($request->file('banner')){
            $file3 = $request->file('banner');
            @unlink(public_path('upload/banner_images/'.$data->banner));
            $file3name =date('YmdHi').$file3->getClientOriginalName();
            $file3->move(public_path('upload/banner_images'), $file3name);
            $file3 = Image::make(public_path('upload/banner_images/').$file3name);
            $file3->resize(1920,500)->save(public_path('upload/banner_images/').$file3name);
            $data['banner']= $file3name;
        }
        // if ($request->file('signature')){
        //     $file4 = $request->file('signature');
        //     @unlink(public_path('upload/signature_images/'.$data->banner));
        //     $file4name =date('YmdHi').$file4->getClientOriginalName();
        //     $file4->move(public_path('upload/signature_images'), $file4name);
        //     $file4 = Image::make(public_path('upload/signature_images/').$file4name);
        //     $file4->resize(200,80)->save(public_path('upload/signature_images/').$file4name);
        //     $data['signature']= $file4name;
        // }
        $data->save();
        
        return redirect()->route('web-site.contact.view')->with('success','Data updated successfully');
    }

    public function delete(Request $request){
        $data = Contact::find($request->id);
        if (file_exists('public/upload/contact_images/' . $data->image) AND ! empty($data->image)) {
            unlink('public/upload/contact_images/' . $data->image);
        }
        if (file_exists('public/upload/banner_images/' . $data->banner) AND ! empty($data->image)) {
            unlink('public/upload/banner_images/' . $data->banner);
        }
        $data->delete();
        return redirect()->route('web-site.contact.view')->with('success','Data Deleted successfully');
    }

    // Committee Member

    public function committeeMemberView(){
        $data['allData'] = CommitteeMember::orderBy('sort','asc')->get();
        return view('backend.website.committee.committee_view',$data);
    }

    public function committeeMemberAdd(){
        return view('backend.website.committee.committee_add');
    }

    public function committeeMemberStore(Request $request){
        $data = new CommitteeMember();
        $data->name_en = $request->name_en;
        $data->name_bn = $request->name_bn;
        $data->category_en = $request->category_en;
        $data->category_bn = $request->category_bn;
        $data->designation_en = $request->designation_en;
        $data->designation_bn = $request->designation_bn;
        $data->sort = $request->sort;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('web-site.committee.member.view')->with('success','Data Inserted successfully');
    }

    public function committeeMemberEdit($id){
        $data['editData'] = CommitteeMember::find($id);
        return view('backend.website.committee.committee_add',$data);
    }

    public function committeeMemberUpdate(Request $request,$id){
        // dd($request->all());
        $data = CommitteeMember::find($id);
        $data->name_en = $request->name_en;
        $data->name_bn = $request->name_bn;
        $data->category_en = $request->category_en;
        $data->category_bn = $request->category_bn;
        $data->designation_en = $request->designation_en;
        $data->designation_bn = $request->designation_bn;
        $data->sort = $request->sort;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return redirect()->route('web-site.committee.member.view')->with('success','Data updated successfully');
    }

    public function committeeMemberDelete(Request $request){
        $data = CommitteeMember::find($request->id);
        $data->delete();
        return redirect()->route('web-site.committee.member.view')->with('success','Data Deleted successfully');
    }

    // Donar Member

    public function donarMemberView(){
        $data['allData'] = DonarMember::orderBy('id','asc')->get();
        return view('backend.website.committee.donar_view',$data);
    }

    public function donarMemberAdd(){
        return view('backend.website.committee.donar_add');
    }

    public function donarMemberStore(Request $request){
        $data = new DonarMember();
        $data->name_en = $request->name_en;
        $data->name_bn = $request->name_bn;
        $data->address_en = $request->address_en;
        $data->address_bn = $request->address_bn;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('web-site.donar.member.view')->with('success','Data Inserted successfully');
    }

    public function donarMemberEdit($id){
        $data['editData'] = DonarMember::find($id);
        return view('backend.website.committee.donar_add',$data);
    }

    public function donarMemberUpdate(Request $request,$id){
        // dd($request->all());
        $data = DonarMember::find($id);
        $data->name_en = $request->name_en;
        $data->name_bn = $request->name_bn;
        $data->address_en = $request->address_en;
        $data->address_bn = $request->address_bn;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return redirect()->route('web-site.donar.member.view')->with('success','Data updated successfully');
    }

    public function donarMemberDelete(Request $request){
        $data = DonarMember::find($request->id);
        $data->delete();
        return redirect()->route('web-site.donar.member.view')->with('success','Data Deleted successfully');
    }

    // Photo Gallery

    public function galleryView(){
        $data['allData'] = VideoGallery::orderBy('id','desc')->get();
        return view('backend.website.gallery.video_gallery_view',$data);
    }

    public function galleryAdd(){
        return view('backend.website.gallery.video_gallery_add');
    }

    public function galleryStore(Request $request){
        $data = new VideoGallery();
        $data->description = $request->description;
        $data->created_by = Auth::user()->id;
        $data->save();
        return redirect()->route('web-site.video.gallery.view')->with('success','Data Inserted successfully');
    }

    public function galleryEdit($id){
        $data['editData'] = VideoGallery::find($id);
        return view('backend.website.gallery.video_gallery_add',$data);
    }

    public function galleryUpdate(Request $request,$id){
        // dd($request->all());
        $data = VideoGallery::find($id);
        $data->description = $request->description;
        $data->updated_by = Auth::user()->id;
        $data->save();
        return redirect()->route('web-site.video.gallery.view')->with('success','Data updated successfully');
    }

    public function galleryDelete(Request $request){
        $data = VideoGallery::find($request->id);
        $data->delete();
        return redirect()->route('web-site.video.gallery.view')->with('success','Data Deleted successfully');
    }
    
}
