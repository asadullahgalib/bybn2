<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use DB;
use App\User;
use App\Model\Notice;
use App\Model\Contact;
use App\Model\ContactDetails;
use App\Model\Slider;
use App\Model\PrincipalMessage;
use App\Model\Contactor;
use App\Model\About;
use App\Model\ContactMap;
use App\Model\PhotoFolder;
use App\Model\PhotoGallery;
use App\Model\PhotoGalleryDetail;
use App\Model\ImportantLink;
use App\Model\SuccessStories;
use App\Model\Country;
use App\Model\StudyDestination;
use App\Model\Meta;
use App\Model\ServiceCategory;
use App\Model\Policy;
use App\Model\Volunteer;
use App\Model\BloodDonation;
use Session;
use Image;

class FrontendController extends Controller
{
    public function index(){
        $data['contact'] = Contact::first();
        $data['sliders'] = Slider::all();
        $data['about'] = About::first();
        $data['notice_all'] = Notice::orderBy('id','asc')->get()->take(4);
        $data['activities'] = ServiceCategory::orderBy('id','asc')->get();
        $data['story'] = SuccessStories::first();
        $data['countries'] = Country::all();
        $data['destinations'] = StudyDestination::all();
        $data['page_title'] = 'Home_page';
    	return view('frontend.layouts.home',$data);
    }

    public function activities(){
        $data['contact'] = Contact::first();
        $data['about'] = About::first();
        $data['activities'] = ServiceCategory::orderBy('id','asc')->get();
        $data['page_title'] = 'Activity';
        return view('frontend.about_us.activities',$data);
    }

    public function aboutUs(){
        $data['contact'] = Contact::first();
        $data['about'] = About::first();
        $data['destinations'] = StudyDestination::all();
        $data['page_title'] = 'About_page';
        return view('frontend.about_us.about-us',$data);
    }

    public function activityDetails($id){
        $data['contact'] = Contact::first();
        $data['about'] = About::first();
        $data['activity'] = ServiceCategory::find($id);
        $data['recent_services'] = ServiceCategory::where('id','!=',@$data['activity']->id)->orderBy('id','desc')->get();
        return view('frontend.about_us.activity_details',$data);
    }

    public function projects(){
        $data['contact'] = Contact::first();
        $data['about'] = About::first();
        $data['projects'] = ImportantLink::orderBy('id','asc')->get();
        $data['page_title'] = 'About_page';
        return view('frontend.project.project_list',$data);
    }

    public function projectDetails($id){
        $data['contact'] = Contact::first();
        $data['about'] = About::first();
        $data['project'] = ImportantLink::find($id);
        $data['other_projects'] = ImportantLink::where('id','!=',@$data['project']->id)->orderBy('id','desc')->get();
        $data['page_title'] = 'Project Details';
        return view('frontend.project.project_details',$data);
    }

    public function contactUs(){
        $data['contact'] = Contact::first();
        $data['about'] = About::first();
        $data['destinations'] = StudyDestination::all();
        $data['contact_map'] = ContactMap::first();
        $data['page_title'] = 'Contact_page';
        return view('frontend.contact.contact-us',$data);
    }

    public function photoGallery(){
        $data['contact'] = Contact::first();
        $data['destinations'] = StudyDestination::all();
        $data['photo_galleries'] = PhotoGalleryDetail::orderBy('id','desc')->get();
        $data['page_title'] = 'Gallery_page';
        return view('frontend.single_page.photo_gallery', $data);
    }

    public function contactStore(Request $request){
        $this->validate($request,[
            'name' => 'required|min:3|max:100',
            'mobile' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'msg' => 'required'
        ]);
        $data = new Contactor();
        $data->date = date('Y-m-d');
        $data->name = strip_tags($request->name);
        $data->mobile = strip_tags($request->mobile);
        $data->email = strip_tags($request->email);
        $data->subject = strip_tags($request->subject);
        $data->msg = strip_tags($request->msg);
        $data->save();

        Session::flash('ContactMessage','Your message is successfully sent.');

        return redirect()->back();
    }

    public function newsEvents(){
        $data['contact'] = Contact::first();
        $data['about'] = About::first();
        $data['destinations'] = StudyDestination::all();
        $data['contact_map'] = ContactMap::first();
        $data['notice_all'] = Notice::orderBy('id','asc')->get();
        $data['page_title'] = 'Events_page';
        return view('frontend.news_events.new_events',$data);
    }

    public function newsEventsDetails($id){
        $data['contact'] = Contact::first();
        $data['about'] = About::first();
        $data['destinations'] = StudyDestination::all();
        $data['contact_map'] = ContactMap::first();
        $data['notice'] = Notice::find($id);
        $data['recent_notice'] = Notice::where('id','!=',@$data['notice']->id)->orderBy('id','desc')->get();
        $data['page_title'] = @$data['notice']->title_en;
        return view('frontend.news_events.news_events_details',$data);
    }

    public function abroadDetails($id){
        $data['contact'] = Contact::first();
        $data['about'] = About::first();
        $data['destinations'] = StudyDestination::all();
        $data['contact_map'] = ContactMap::first();
        $data['abroad'] = StudyDestination::find($id);
        $data['recent_abroad'] = StudyDestination::where('id','!=',@$data['abroad']->id)->orderBy('id','desc')->get();
        $data['page_title'] = @$data['abroad']->title_en;
        return view('frontend.abroad.abroad_details',$data);
    }

    public function membership(Request $request){
        $data['contact'] = Contact::first();
        $data['destinations'] = StudyDestination::all();
        $data['principal'] = PrincipalMessage::first();
        $data['teachers'] = Volunteer::orderBy('date','asc')->where('status','1')->get();
        $data['page_title'] = 'VolunteerList_page';
        return view('frontend.single_page.volunteer_list',$data);
    }

    public function volunteerSignup(Request $request){
        $data['contact'] = Contact::first();
        $data['page_title'] = 'BloodDonation_page';
        return view('frontend.single_page.volunteer_signup',$data);
    }

    public function volunteerSignupStore(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'mobile' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'occupation' => 'required',
            'education' => 'required',
            'institute' => 'required',
            'blood_group' => 'required',
            'image' => 'required'
        ]);

        $data = new Volunteer();
        $data->date = date('Y-m-d');
        $data->name = strip_tags($request->name);
        $data->mobile = strip_tags($request->mobile);
        $data->email = strip_tags($request->email);
        $data->gender = strip_tags($request->gender);
        $data->address = strip_tags($request->address);
        $data->dob = date('Y-m-d',strtotime($request->dob));
        $data->occupation = strip_tags($request->occupation);
        $data->education = strip_tags($request->education);
        $data->institute = strip_tags($request->institute);
        $data->blood_group = strip_tags($request->blood_group);
        $data->status = '0';

        if ($request->file('image')){
            $file = $request->file('image');
            $filename =date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/volunteer_images'), $filename);
            $file = Image::make(public_path('upload/volunteer_images/').$filename);
            $file->resize(300,300)->save(public_path('upload/volunteer_images/').$filename);
            $data['image']= $filename;
        }

        $data->save();

        Session::flash('VolunteerMessage','Your registration is successfully completed');

        return redirect()->back();
    }

    public function bloodDonate(Request $request){
        $data['contact'] = Contact::first();
        $data['page_title'] = 'VolunteerSignup_page';
        return view('frontend.single_page.blood_donation',$data);
    }

    public function bloodDonateStore(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'mobile' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'dob' => 'required',
            'blood_group' => 'required'
        ]);

        $data = new BloodDonation();
        $data->date = date('Y-m-d');
        $data->name = strip_tags($request->name);
        $data->mobile = strip_tags($request->mobile);
        $data->email = strip_tags($request->email);
        $data->gender = strip_tags($request->gender);
        $data->address = strip_tags($request->address);
        $data->dob = date('Y-m-d',strtotime($request->dob));
        $data->blood_group = strip_tags($request->blood_group);
        $data->status = '1';

        $data->save();

        Session::flash('DonateMessage','Your data is successfully sent');

        return redirect()->back();
    }

    public function privacyPolicy(Request $request){
        $data['contact'] = Contact::first();
        $data['policy'] = Policy::find(2);
        $data['page_title'] = 'PrivacyPolicy_page';
        return view('frontend.single_page.privacy_policy',$data);
    }

    public function termCondition(Request $request){
        $data['contact'] = Contact::first();
        $data['policy'] = Policy::find(2);
        $data['page_title'] = 'TermCondition_page';
        return view('frontend.single_page.term_condition',$data);
    }
}
