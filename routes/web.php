<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "All Cache Cleared!";
});

Route::get('/language/{language}',function($language){
	Session::put('language',$language);
	return redirect()->back();
})->name('language');

Route::get('/','Frontend\FrontendController@index')->name('frontend.index');
Route::get('/about-us','Frontend\FrontendController@aboutUs')->name('frontend.about.us');
Route::get('/news-events','Frontend\FrontendController@newsEvents')->name('frontend.our-events');
Route::get('/news-events/details/{id}','Frontend\FrontendController@newsEventsDetails')->name('frontend.our-events.details');
Route::get('/activity/details/{id}','Frontend\FrontendController@activityDetails')->name('frontend.service.category.details');
Route::get('/activities','Frontend\FrontendController@activities')->name('frontend.services');
Route::get('/projects','Frontend\FrontendController@projects')->name('frontend.projects');
Route::get('/projects/details/{id}','Frontend\FrontendController@projectDetails')->name('frontend.project.details');
Route::get('/study-abroad/details/{id}','Frontend\FrontendController@abroadDetails')->name('frontend.study.abroad.details');
Route::get('/contact-us','Frontend\FrontendController@contactUs')->name('frontend.contact.us');
Route::post('/contact/store','Frontend\FrontendController@contactStore')->name('frontend.contact.store');
Route::get('/photo-gallery','Frontend\FrontendController@photoGallery')->name('our.photo-gallery');
Route::get('/photo-gallery/details','Frontend\FrontendController@photoGalleryDetails')->name('our.photo-gallery.details');
Route::get('/blog','Frontend\FrontendController@ourBlog')->name('frontend.our.blog');
Route::get('/membership','Frontend\FrontendController@membership')->name('frontend.membership');
Route::get('/volunteer-signup','Frontend\FrontendController@volunteerSignup')->name('frontend.volunteer-signup');
Route::post('/volunteer-signup/store','Frontend\FrontendController@volunteerSignupStore')->name('frontend.volunteer-signup.store');
Route::get('/blood-donate','Frontend\FrontendController@bloodDonate')->name('frontend.blood-donate');
Route::post('/blood-donate/store','Frontend\FrontendController@bloodDonateStore')->name('frontend.blood-donate.store');
Route::get('/privacy-policy','Frontend\FrontendController@privacyPolicy')->name('frontend.privacy-policy');
Route::get('/term-condition','Frontend\FrontendController@termCondition')->name('frontend.term-condition');

//Reset Password
Route::get('reset/password','Backend\PasswordResetController@resetPassword')->name('reset.password');
Route::post('check/email','Backend\PasswordResetController@checkEmail')->name('check.email');
Route::get('check/name','Backend\PasswordResetController@checkName')->name('check.name');
Route::get('check/code','Backend\PasswordResetController@checkCode')->name('check.code');
Route::post('submit/check/code','Backend\PasswordResetController@submitCode')->name('submit.check.code');
Route::get('new/password','Backend\PasswordResetController@newPassword')->name('new.password');
Route::post('store/new/password','Backend\PasswordResetController@newPasswordStore')->name('store.new.password');

Auth::routes();
//customer-dashboard
Route::group(['middleware'=>['auth','customer']],function(){
	Route::get('/dashboard','Frontend\DashboardController@dashboard')->name('dashboard');
});

//Meta
Route::get('/meta/view','Backend\UserController@metaView')->name('user.meta.view');
Route::get('/meta/add','Backend\UserController@metaAdd')->name('user.meta.add');
Route::post('/meta/store','Backend\UserController@metaStore')->name('user.meta.store');
Route::get('/meta/edit/{id}','Backend\UserController@metaEdit')->name('user.meta.edit');
Route::post('/meta/update/{id}','Backend\UserController@metaUpdate')->name('user.meta.update');

Route::group(['middleware'=>['auth','admin']],function(){
	Route::group(['middleware'=>['permission']],function(){
		//admin-dashboard
		Route::get('/admin/home', 'HomeController@index')->name('home');

		Route::prefix('user')->group(function(){
			//User
			Route::get('/','Backend\UserController@view')->name('user');
			Route::get('/add','Backend\UserController@add')->name('user.add');
			Route::post('/store','Backend\UserController@store')->name('user.store');
			Route::get('/edit/{id}','Backend\UserController@edit')->name('user.edit');
			Route::post('/update/{id}','Backend\UserController@update')->name('user.update');
			Route::post('/delete','Backend\UserController@delete')->name('user.delete');
			
			//Role
			Route::get('/role/view','Backend\RoleController@view')->name('user.role');
			Route::get('/role/add','Backend\RoleController@add')->name('user.role.add');
			Route::post('/role/store','Backend\RoleController@store')->name('user.role.store');
			Route::get('/role/edit/{id}','Backend\RoleController@edit')->name('user.role.edit');
			Route::post('/role/update/{id}','Backend\RoleController@update')->name('user.role.update');
			Route::post('/role/delete','Backend\RoleController@delete')->name('user.role.delete');

			Route::get('/permission','Backend\Menu\MenuPermissionController@index')->name('user.permission');
			Route::post('/permission/store','Backend\Menu\MenuPermissionController@storePermission')->name('user.permission.store');
		});

		Route::prefix('frontend-menu')->group(function(){
			//Post
			Route::get('/post/view', 'Backend\Post\PostController@view')->name('frontend-menu.post.view');
	        Route::get('/post/add','Backend\Post\PostController@add')->name('frontend-menu.post.add');
			Route::post('/post/store','Backend\Post\PostController@store')->name('frontend-menu.post.store');
			Route::get('/post/edit/{id}','Backend\Post\PostController@edit')->name('frontend-menu.post.edit');
			Route::post('/post/update/{id}','Backend\Post\PostController@update')->name('frontend-menu.post.update');
	        Route::post('/post-delete', 'Backend\Post\PostController@delete')->name('frontend-menu.post.delete');
			Route::get('/post/file-delete','Backend\Post\PostController@fileDelete')->name('frontend-menu.post.file.delete');
	        //Frontend Menu
	        Route::get('/menu/view', 'Backend\Post\FrontendMenuController@view')->name('frontend-menu.menu.view');
	        Route::get('/menu/add','Backend\Post\FrontendMenuController@add')->name('frontend-menu.menu.add');
			Route::post('/menu/single/store','Backend\Post\FrontendMenuController@singleStore')->name('frontend-menu.menu.single.store');
			Route::post('/menu/store','Backend\Post\FrontendMenuController@store')->name('frontend-menu.menu.store');
			Route::get('/menu/edit/{id}','Backend\Post\FrontendMenuController@edit')->name('frontend-menu.menu.edit');
			Route::post('/menu/update/{id}','Backend\Post\FrontendMenuController@update')->name('frontend-menu.menu.update');
	        Route::get('/menu/delete', 'Backend\Post\FrontendMenuController@destroy')->name('frontend-menu.menu.destroy');
		});

		//Website
		Route::prefix('web-site')->group(function(){
			//Contact Us
			Route::get('/contact/view','Backend\Website\ContactController@view')->name('web-site.contact.view');
			Route::get('/contact/add','Backend\Website\ContactController@add')->name('web-site.contact.add');
			Route::post('/contact/store','Backend\Website\ContactController@store')->name('web-site.contact.store');
			Route::get('/contact/edit/{id}','Backend\Website\ContactController@edit')->name('web-site.contact.edit');
			Route::post('/contact/update/{id}','Backend\Website\ContactController@update')->name('web-site.contact.update');
			Route::post('/contact/delete','Backend\Website\ContactController@delete')->name('web-site.contact.delete');
			Route::get('/contact/details/{id}','Backend\Website\ContactController@details')->name('web-site.contact.details');
			//Contact Details
			Route::get('/contact-detail/view','Backend\Website\ContactDetailController@view')->name('web-site.contact.details.view');
			Route::get('/contact-detail/add','Backend\Website\ContactDetailController@add')->name('web-site.contact.details.add');
			Route::post('/contact-detail/store','Backend\Website\ContactDetailController@store')->name('web-site.contact.details.store');
			Route::get('/contact-detail/edit/{id}','Backend\Website\ContactDetailController@edit')->name('web-site.contact.details.edit');
			Route::post('/contact-detail/update/{id}','Backend\Website\ContactDetailController@update')->name('web-site.contact.details.update');
			Route::post('/contact-detail/delete','Backend\Website\ContactDetailController@delete')->name('web-site.contact.details.delete');
			Route::get('/contact-detail/details/{id}','Backend\Website\ContactDetailController@details')->name('web-site.contact.details.details');
			//Video Gallery
			Route::get('/video-gallery/view','Backend\Website\ContactController@galleryView')->name('web-site.video.gallery.view');
			Route::get('/video-gallery/add','Backend\Website\ContactController@galleryAdd')->name('web-site.video.gallery.add');
			Route::post('/video-gallery/store','Backend\Website\ContactController@galleryStore')->name('web-site.video.gallery.store');
			Route::get('/video-gallery/edit/{id}','Backend\Website\ContactController@galleryEdit')->name('web-site.video.gallery.edit');
			Route::post('/video-gallery/update/{id}','Backend\Website\ContactController@galleryUpdate')->name('web-site.video.gallery.update');
			Route::post('/video-gallery/delete','Backend\Website\ContactController@galleryDelete')->name('web-site.video.gallery.delete');
			//Committee Member
			Route::get('/committee-member/view','Backend\Website\ContactController@committeeMemberView')->name('web-site.committee.member.view');
			Route::get('/committee-member/add','Backend\Website\ContactController@committeeMemberAdd')->name('web-site.committee.member.add');
			Route::post('/committee-member/store','Backend\Website\ContactController@committeeMemberStore')->name('web-site.committee.member.store');
			Route::get('/committee-member/edit/{id}','Backend\Website\ContactController@committeeMemberEdit')->name('web-site.committee.member.edit');
			Route::post('/committee-member/update/{id}','Backend\Website\ContactController@committeeMemberUpdate')->name('web-site.committee.member.update');
			Route::post('/committee-member/delete','Backend\Website\ContactController@committeeMemberDelete')->name('web-site.committee.member.delete');
			//Donar Member
			Route::get('/donar-member/view','Backend\Website\ContactController@donarMemberView')->name('web-site.donar.member.view');
			Route::get('/donar-member/add','Backend\Website\ContactController@donarMemberAdd')->name('web-site.donar.member.add');
			Route::post('/donar-member/store','Backend\Website\ContactController@donarMemberStore')->name('web-site.donar.member.store');
			Route::get('/donar-member/edit/{id}','Backend\Website\ContactController@donarMemberEdit')->name('web-site.donar.member.edit');
			Route::post('/donar-member/update/{id}','Backend\Website\ContactController@donarMemberUpdate')->name('web-site.donar.member.update');
			Route::post('/donar-member/delete','Backend\Website\ContactController@donarMemberDelete')->name('web-site.donar.member.delete');
			//Important Link
			Route::get('/link/view','Backend\Website\LinkController@view')->name('web-site.link.view');
			Route::get('/link/add','Backend\Website\LinkController@add')->name('web-site.link.add');
			Route::post('/link/store','Backend\Website\LinkController@store')->name('web-site.link.store');
			Route::get('/link/edit/{id}','Backend\Website\LinkController@edit')->name('web-site.link.edit');
			Route::post('/link/update/{id}','Backend\Website\LinkController@update')->name('web-site.link.update');
			Route::post('/link/delete','Backend\Website\LinkController@delete')->name('web-site.link.delete');
			//Service Category
			Route::get('/service/category/view','Backend\Website\ServiceCategoryController@view')->name('web-site.service.category.view');
			Route::get('/service/category/add','Backend\Website\ServiceCategoryController@add')->name('web-site.service.category.add');
			Route::post('/service/category/store','Backend\Website\ServiceCategoryController@store')->name('web-site.service.category.store');
			Route::get('/service/category/edit/{id}','Backend\Website\ServiceCategoryController@edit')->name('web-site.service.category.edit');
			Route::post('/service/category/update/{id}','Backend\Website\ServiceCategoryController@update')->name('web-site.service.category.update');
			Route::post('/service/category/delete','Backend\Website\ServiceCategoryController@delete')->name('web-site.service.category.delete');
			//Notice
			Route::get('/notice/view','Backend\Website\NoticeController@view')->name('web-site.notice.view');
			Route::get('/notice/add','Backend\Website\NoticeController@add')->name('web-site.notice.add');
			Route::post('/notice/store','Backend\Website\NoticeController@store')->name('web-site.notice.store');
			Route::get('/notice/edit/{id}','Backend\Website\NoticeController@edit')->name('web-site.notice.edit');
			Route::post('/notice/update/{id}','Backend\Website\NoticeController@update')->name('web-site.notice.update');
			Route::post('/notice/delete','Backend\Website\NoticeController@delete')->name('web-site.notice.delete');
			//About
			Route::get('/about/view','Backend\Website\AboutController@view')->name('web-site.about.view');
			Route::get('/about/add','Backend\Website\AboutController@add')->name('web-site.about.add');
			Route::post('/about/store','Backend\Website\AboutController@store')->name('web-site.about.store');
			Route::get('/about/edit/{id}','Backend\Website\AboutController@edit')->name('web-site.about.edit');
			Route::post('/about/update/{id}','Backend\Website\AboutController@update')->name('web-site.about.update');
			Route::post('/about/delete','Backend\Website\AboutController@delete')->name('web-site.about.delete');
			//Principal Message
			Route::get('/message/view','Backend\Website\MessageController@view')->name('web-site.principal.message.view');
			Route::get('/message/add','Backend\Website\MessageController@add')->name('web-site.principal.message.add');
			Route::post('/message/store','Backend\Website\MessageController@store')->name('web-site.principal.message.store');
			Route::get('/message/edit/{id}','Backend\Website\MessageController@edit')->name('web-site.principal.message.edit');
			Route::post('/message/update/{id}','Backend\Website\MessageController@update')->name('web-site.principal.message.update');
			Route::post('/message/delete','Backend\Website\MessageController@delete')->name('web-site.principal.message.delete');
			//Slider
			Route::get('/slider/view','Backend\Website\SliderController@view')->name('web-site.slider.view');
			Route::get('/slider/add','Backend\Website\SliderController@add')->name('web-site.slider.add');
			Route::post('/slider/store','Backend\Website\SliderController@store')->name('web-site.slider.store');
			Route::get('/slider/edit/{id}','Backend\Website\SliderController@edit')->name('web-site.slider.edit');
			Route::post('/slider/update/{id}','Backend\Website\SliderController@update')->name('web-site.slider.update');
			Route::post('/slider/delete','Backend\Website\SliderController@delete')->name('web-site.slider.delete');
			//Google Map
			Route::get('/map/view','Backend\Website\MapController@view')->name('web-site.map.view');
			Route::get('/map/add','Backend\Website\MapController@add')->name('web-site.map.add');
			Route::post('/map/store','Backend\Website\MapController@store')->name('web-site.map.store');
			Route::get('/map/edit/{id}','Backend\Website\MapController@edit')->name('web-site.map.edit');
			Route::post('/map/update/{id}','Backend\Website\MapController@update')->name('web-site.map.update');
			Route::post('/map/delete','Backend\Website\MapController@delete')->name('web-site.map.delete');
			//Achievement
			Route::get('/achievement/view','Backend\Website\AchievementController@view')->name('web-site.achievement.view');
			Route::get('/achievement/add','Backend\Website\AchievementController@add')->name('web-site.achievement.add');
			Route::post('/achievement/store','Backend\Website\AchievementController@store')->name('web-site.achievement.store');
			Route::get('/achievement/edit/{id}','Backend\Website\AchievementController@edit')->name('web-site.achievement.edit');
			Route::post('/achievement/update/{id}','Backend\Website\AchievementController@update')->name('web-site.achievement.update');
			Route::post('/achievement/delete','Backend\Website\AchievementController@delete')->name('web-site.achievement.delete');
			//Admission
			Route::get('/admission/view','Backend\Website\AdmissionController@view')->name('web-site.admission.view');
			Route::get('/admission/add','Backend\Website\AdmissionController@add')->name('web-site.admission.add');
			Route::post('/admission/store','Backend\Website\AdmissionController@store')->name('web-site.admission.store');
			Route::get('/admission/edit/{id}','Backend\Website\AdmissionController@edit')->name('web-site.admission.edit');
			Route::post('/admission/update/{id}','Backend\Website\AdmissionController@update')->name('web-site.admission.update');
			Route::post('/admission/delete','Backend\Website\AdmissionController@delete')->name('web-site.admission.delete');
			//Why Choose
			Route::get('/why-chose/view','Backend\Website\whyChooseController@view')->name('web-site.why.choose.view');
			Route::get('/why-chose/add','Backend\Website\whyChooseController@add')->name('web-site.why.choose.add');
			Route::post('/why-chose/store','Backend\Website\whyChooseController@store')->name('web-site.why.choose.store');
			Route::get('/why-chose/edit/{id}','Backend\Website\whyChooseController@edit')->name('web-site.why.choose.edit');
			Route::post('/why-chose/update/{id}','Backend\Website\whyChooseController@update')->name('web-site.why.choose.update');
			Route::post('/why-chose/delete','Backend\Website\whyChooseController@delete')->name('web-site.why.choose.delete');
			//Destination
			Route::get('/destination/view','Backend\Website\DestinationController@view')->name('web-site.destination.view');
			Route::get('/destination/add','Backend\Website\DestinationController@add')->name('web-site.destination.add');
			Route::post('/destination/store','Backend\Website\DestinationController@store')->name('web-site.destination.store');
			Route::get('/destination/edit/{id}','Backend\Website\DestinationController@edit')->name('web-site.destination.edit');
			Route::post('/destination/update/{id}','Backend\Website\DestinationController@update')->name('web-site.destination.update');
			Route::post('/destination/delete','Backend\Website\DestinationController@delete')->name('web-site.destination.delete');
			//Destination Gallery
			Route::get('/destination-gallery/view','Backend\Website\DestinationGalleryController@view')->name('web-site.destination.gallery.view');
			Route::get('/destination-gallery/add','Backend\Website\DestinationGalleryController@add')->name('web-site.destination.gallery.add');
			Route::post('/destination-gallery/store','Backend\Website\DestinationGalleryController@store')->name('web-site.destination.gallery.store');
			Route::get('/destination-gallery/edit/{id}','Backend\Website\DestinationGalleryController@edit')->name('web-site.destination.gallery.edit');
			Route::post('/destination-gallery/update/{id}','Backend\Website\DestinationGalleryController@update')->name('web-site.destination.gallery.update');
			Route::post('/destination-gallery/delete','Backend\Website\DestinationGalleryController@delete')->name('web-site.destination.gallery.delete');
			//Country
			Route::get('/country/view','Backend\Website\CountryController@view')->name('web-site.country.view');
			Route::get('/country/add','Backend\Website\CountryController@add')->name('web-site.country.add');
			Route::post('/country/store','Backend\Website\CountryController@store')->name('web-site.country.store');
			Route::get('/country/edit/{id}','Backend\Website\CountryController@edit')->name('web-site.country.edit');
			Route::post('/country/update/{id}','Backend\Website\CountryController@update')->name('web-site.country.update');
			Route::post('/country/delete','Backend\Website\CountryController@delete')->name('web-site.country.delete');
			//Guidelines
			Route::get('/guidelines/view','Backend\Website\GuidelinesController@view')->name('web-site.guidelines.view');
			Route::get('/guidelines/add','Backend\Website\GuidelinesController@add')->name('web-site.guidelines.add');
			Route::post('/guidelines/store','Backend\Website\GuidelinesController@store')->name('web-site.guidelines.store');
			Route::get('/guidelines/edit/{id}','Backend\Website\GuidelinesController@edit')->name('web-site.guidelines.edit');
			Route::post('/guidelines/update/{id}','Backend\Website\GuidelinesController@update')->name('web-site.guidelines.update');
			Route::post('/guidelines/delete','Backend\Website\GuidelinesController@delete')->name('web-site.guidelines.delete');
			//IELTS
			Route::get('/ielts/view','Backend\Website\IeltsController@view')->name('web-site.ielts.view');
			Route::get('/ielts/add','Backend\Website\IeltsController@add')->name('web-site.ielts.add');
			Route::post('/ielts/store','Backend\Website\IeltsController@store')->name('web-site.ielts.store');
			Route::get('/ielts/edit/{id}','Backend\Website\IeltsController@edit')->name('web-site.ielts.edit');
			Route::post('/ielts/update/{id}','Backend\Website\IeltsController@update')->name('web-site.ielts.update');
			Route::post('/ielts/delete','Backend\Website\IeltsController@delete')->name('web-site.ielts.delete');
			//University
			Route::get('/university/view','Backend\Website\UniversityController@view')->name('web-site.university.view');
			Route::get('/university/add','Backend\Website\UniversityController@add')->name('web-site.university.add');
			Route::post('/university/store','Backend\Website\UniversityController@store')->name('web-site.university.store');
			Route::get('/university/edit/{id}','Backend\Website\UniversityController@edit')->name('web-site.university.edit');
			Route::post('/university/update/{id}','Backend\Website\UniversityController@update')->name('web-site.university.update');
			Route::post('/university/delete','Backend\Website\UniversityController@delete')->name('web-site.university.delete');
			//Course
			Route::get('/course/view','Backend\Website\CourseController@view')->name('web-site.course.view');
			Route::get('/course/add','Backend\Website\CourseController@add')->name('web-site.course.add');
			Route::post('/course/store','Backend\Website\CourseController@store')->name('web-site.course.store');
			Route::get('/course/edit/{id}','Backend\Website\CourseController@edit')->name('web-site.course.edit');
			Route::post('/course/update/{id}','Backend\Website\CourseController@update')->name('web-site.course.update');
			Route::post('/course/delete','Backend\Website\CourseController@delete')->name('web-site.course.delete');
			//Undergraduate Program
			Route::get('/undergraduate/program/view','Backend\Website\UndergraduateProgramController@view')->name('web-site.undergraduate.program.view');
			Route::get('/undergraduate/program/add','Backend\Website\UndergraduateProgramController@add')->name('web-site.undergraduate.program.add');
			Route::post('/undergraduate/program/store','Backend\Website\UndergraduateProgramController@store')->name('web-site.undergraduate.program.store');
			Route::get('/undergraduate/program/edit/{id}','Backend\Website\UndergraduateProgramController@edit')->name('web-site.undergraduate.program.edit');
			Route::post('/undergraduate/program/update/{id}','Backend\Website\UndergraduateProgramController@update')->name('web-site.undergraduate.program.update');
			Route::post('/undergraduate/program/delete','Backend\Website\UndergraduateProgramController@delete')->name('web-site.undergraduate.program.delete');
			//Postgraduate Program
			Route::get('/postgraduate/program/view','Backend\Website\PostgraduateProgramController@view')->name('web-site.postgraduate.program.view');
			Route::get('/postgraduate/program/add','Backend\Website\PostgraduateProgramController@add')->name('web-site.postgraduate.program.add');
			Route::post('/postgraduate/program/store','Backend\Website\PostgraduateProgramController@store')->name('web-site.postgraduate.program.store');
			Route::get('/postgraduate/program/edit/{id}','Backend\Website\PostgraduateProgramController@edit')->name('web-site.postgraduate.program.edit');
			Route::post('/postgraduate/program/update/{id}','Backend\Website\PostgraduateProgramController@update')->name('web-site.postgraduate.program.update');
			Route::post('/postgraduate/program/delete','Backend\Website\PostgraduateProgramController@delete')->name('web-site.postgraduate.program.delete');
			//Scholarship
			Route::get('/get-country-university','Backend\Website\ScholarshipController@getUniversity')->name('get-country-university');
			Route::get('/scholarship/view','Backend\Website\ScholarshipController@view')->name('web-site.scholarship.view');
			Route::get('/scholarship/add','Backend\Website\ScholarshipController@add')->name('web-site.scholarship.add');
			Route::post('/scholarship/store','Backend\Website\ScholarshipController@store')->name('web-site.scholarship.store');
			Route::get('/scholarship/edit/{id}','Backend\Website\ScholarshipController@edit')->name('web-site.scholarship.edit');
			Route::post('/scholarship/update/{id}','Backend\Website\ScholarshipController@update')->name('web-site.scholarship.update');
			Route::post('/scholarship/delete','Backend\Website\ScholarshipController@delete')->name('web-site.scholarship.delete');
			//Guidelines Description
			Route::get('/guidelines/description/view','Backend\Website\GuidelinesDescriptionController@view')->name('web-site.guidelines.description.view');
			Route::get('/guidelines/description/add','Backend\Website\GuidelinesDescriptionController@add')->name('web-site.guidelines.description.add');
			Route::post('/guidelines/description/store','Backend\Website\GuidelinesDescriptionController@store')->name('web-site.guidelines.description.store');
			Route::get('/guidelines/description/edit/{id}','Backend\Website\GuidelinesDescriptionController@edit')->name('web-site.guidelines.description.edit');
			Route::post('/guidelines/description/update/{id}','Backend\Website\GuidelinesDescriptionController@update')->name('web-site.guidelines.description.update');
			Route::post('/guidelines/description/delete','Backend\Website\GuidelinesDescriptionController@delete')->name('web-site.guidelines.description.delete');
			//Success Stories
			Route::get('/success/view','Backend\Website\SuccessController@view')->name('web-site.success.view');
			Route::get('/success/add','Backend\Website\SuccessController@add')->name('web-site.success.add');
			Route::post('/success/store','Backend\Website\SuccessController@store')->name('web-site.success.store');
			Route::get('/success/edit/{id}','Backend\Website\SuccessController@edit')->name('web-site.success.edit');
			Route::post('/success/update/{id}','Backend\Website\SuccessController@update')->name('web-site.success.update');
			Route::post('/success/delete','Backend\Website\SuccessController@delete')->name('web-site.success.delete');
			//Policy
			Route::get('/policy/view','Backend\Website\PolicyController@view')->name('web-site.policy.view');
			Route::get('/policy/add','Backend\Website\PolicyController@add')->name('web-site.policy.add');
			Route::post('/policy/store','Backend\Website\PolicyController@store')->name('web-site.policy.store');
			Route::get('/policy/edit/{id}','Backend\Website\PolicyController@edit')->name('web-site.policy.edit');
			Route::post('/policy/update/{id}','Backend\Website\PolicyController@update')->name('web-site.policy.update');
			Route::post('/policy/delete','Backend\Website\PolicyController@delete')->name('web-site.policy.delete');
			//Volunteer
			Route::get('/volunteer/view','Backend\Website\VolunteerController@view')->name('web-site.volunteer.view');
			Route::get('/volunteer/add','Backend\Website\VolunteerController@add')->name('web-site.volunteer.add');
			Route::post('/volunteer/store','Backend\Website\VolunteerController@store')->name('web-site.volunteer.store');
			Route::get('/volunteer/edit/{id}','Backend\Website\VolunteerController@edit')->name('web-site.volunteer.edit');
			Route::post('/volunteer/update/{id}','Backend\Website\VolunteerController@update')->name('web-site.volunteer.update');
			Route::post('/volunteer/delete','Backend\Website\VolunteerController@delete')->name('web-site.volunteer.delete');
			//Blood Donation
			Route::get('/donation/view','Backend\Website\BloodDonationController@view')->name('web-site.donation.view');
			Route::get('/donation/add','Backend\Website\BloodDonationController@add')->name('web-site.donation.add');
			Route::post('/donation/store','Backend\Website\BloodDonationController@store')->name('web-site.donation.store');
			Route::get('/donation/edit/{id}','Backend\Website\BloodDonationController@edit')->name('web-site.donation.edit');
			Route::post('/donation/update/{id}','Backend\Website\BloodDonationController@update')->name('web-site.donation.update');
			Route::post('/donation/delete','Backend\Website\BloodDonationController@delete')->name('web-site.donation.delete');
			//Photo Folder
			Route::get('/folder/view','Backend\Website\SinglePageController@folderView')->name('web-site.folder.view');
			Route::get('/folder/add','Backend\Website\SinglePageController@folderAdd')->name('web-site.folder.add');
			Route::post('/folder/store','Backend\Website\SinglePageController@folderStore')->name('web-site.folder.store');
			Route::get('/folder/edit/{id}','Backend\Website\SinglePageController@folderEdit')->name('web-site.folder.edit');
			Route::post('/folder/update/{id}','Backend\Website\SinglePageController@folderUpdate')->name('web-site.folder.update');
			Route::post('/folder/delete','Backend\Website\SinglePageController@folderDelete')->name('web-site.folder.delete');
			//Photo Gallery
			Route::get('/photo/view','Backend\Website\PhotoGalleryController@photoView')->name('web-site.photo.view');
			Route::get('/photo/add','Backend\Website\PhotoGalleryController@photoAdd')->name('web-site.photo.add');
			Route::post('/photo/store','Backend\Website\PhotoGalleryController@photoStore')->name('web-site.photo.store');
			Route::get('/photo/edit/{id}','Backend\Website\PhotoGalleryController@photoEdit')->name('web-site.photo.edit');
			Route::get('/photo/details/{id}','Backend\Website\PhotoGalleryController@photoDetails')->name('web-site.photo.details');
			Route::post('/photo/update/{id}','Backend\Website\PhotoGalleryController@photoUpdate')->name('web-site.photo.update');
			Route::post('/photo/status/{id}','Backend\Website\PhotoGalleryController@photoStatus')->name('web-site.photo.status');
			Route::post('/photo/delete','Backend\Website\PhotoGalleryController@photoDelete')->name('web-site.photo.delete');
			Route::post('/photo/details-delete','Backend\Website\PhotoGalleryController@photoDetailsDelete')->name('web-site.photo.details.delete');
			//Circular
			Route::get('/circular/view','Backend\Website\CircularController@circularView')->name('web-site.circular.view');
			Route::get('/circular/add','Backend\Website\CircularController@circularAdd')->name('web-site.circular.add');
			Route::post('/circular/store','Backend\Website\CircularController@circularStore')->name('web-site.circular.store');
			Route::get('/circular/edit/{id}','Backend\Website\CircularController@circularEdit')->name('web-site.circular.edit');
			Route::post('/circular/update/{id}','Backend\Website\CircularController@circularUpdate')->name('web-site.circular.update');
			Route::post('/circular/delete','Backend\Website\CircularController@circularDelete')->name('web-site.circular.delete');
			//Contactor
			Route::get('/contactor/view','Backend\Website\ContactorController@contactorView')->name('web-site.contactor.view');
			Route::get('/contactor/details/{id}','Backend\Website\ContactorController@contactorDetails')->name('web-site.contactor.details');
			Route::post('/contactor-delete','Backend\Website\ContactorController@contactorDelete')->name('web-site.contactor.delete');
			Route::get('/job-seeker/view','Backend\Website\ContactorController@jobSeekerView')->name('web-site.job-seeker.view');
			Route::post('/job-seeker-delete','Backend\Website\ContactorController@jobSeekerDelete')->name('web-site.job-seeker.delete');
			Route::get('/student/view','Backend\Website\ContactorController@studentView')->name('web-site.student.view');
			Route::get('/student/details/{id}','Backend\Website\ContactorController@studentDetails')->name('web-site.student.details');
			Route::post('/student-delete','Backend\Website\ContactorController@studentDelete')->name('web-site.student.delete');
			Route::get('/student/verify/{id}','Backend\Website\ContactorController@studentVerify')->name('web-site.student.verify');
			Route::post('/student/verify-store/{id}','Backend\Website\ContactorController@studentVerifyStore')->name('web-site.student.verify.store');
		});

		Route::prefix('profiles')->group(function(){
			Route::get('/view','Backend\ProfileController@view')->name('profiles.view');
			Route::get('/edit','Backend\ProfileController@edit')->name('profiles.edit');
			Route::post('/store','Backend\ProfileController@update')->name('profiles.update');
			Route::get('/passowrd/view','Backend\ProfileController@passwordView')->name('profiles.passowrd.view');
			Route::post('/passowrd/update','Backend\ProfileController@passwordUpdate')->name('profiles.passowrd.update');
		});

		// Website Module
		Route::prefix('site-setting')->group(function(){
			//Content
			Route::prefix('contents')->group(function(){
				//Logo
				Route::get('/logo/view','Backend\LogoController@view')->name('site-setting.contents.logo.view');
				Route::get('/logo/add','Backend\LogoController@add')->name('site-setting.contents.logo.add');
				Route::post('/logo/store','Backend\LogoController@store')->name('site-setting.contents.logo.store');
				Route::get('/logo/edit/{id}','Backend\LogoController@edit')->name('site-setting.contents.logo.edit');
				Route::post('/logo/update/{id}','Backend\LogoController@update')->name('site-setting.contents.logo.update');
				Route::post('/logo/delete','Backend\LogoController@delete')->name('site-setting.contents.logo.delete');
				//Contact Us
				Route::get('/contact/view','Backend\ContactController@view')->name('site-setting.contents.contact.view');
				Route::get('/contact/add','Backend\ContactController@add')->name('site-setting.contents.contact.add');
				Route::post('/contact/store','Backend\ContactController@store')->name('site-setting.contents.contact.store');
				Route::get('/contact/edit/{id}','Backend\ContactController@edit')->name('site-setting.contents.contact.edit');
				Route::post('/contact/update/{id}','Backend\ContactController@update')->name('site-setting.contents.contact.update');
				Route::post('/contact/delete','Backend\ContactController@delete')->name('site-setting.contents.contact.delete');
			});
		});
		
		// Human Resource Module
		Route::prefix('human-resource')->group(function(){
			//HRM
			Route::prefix('hrm')->group(function(){
				//Employee Add
				Route::get('/employee/view','Backend\Employees\EmployeeRegistrationController@view')->name('human-resource.hrm.employee.registration.view');
				Route::get('/employee/add','Backend\Employees\EmployeeRegistrationController@add')->name('human-resource.hrm.employee.registration.add');
				Route::post('/employee/store','Backend\Employees\EmployeeRegistrationController@store')->name('human-resource.hrm.employee.registration.store');
				Route::get('/employee/edit/{id}','Backend\Employees\EmployeeRegistrationController@edit')->name('human-resource.hrm.employee.registration.edit');
				Route::post('/employee/update/{id}','Backend\Employees\EmployeeRegistrationController@update')->name('human-resource.hrm.employee.registration.update');
				Route::get('/employee/passowrd/{id}','Backend\Employees\EmployeeRegistrationController@editPassword')->name('human-resource.hrm.employee.registration.edit.password');
				Route::post('/employee/passowrd/{id}','Backend\Employees\EmployeeRegistrationController@updatePassword')->name('human-resource.hrm.employee.registration.update.passowrd');
				Route::post('/employee/delete','Backend\Employees\EmployeeRegistrationController@destroy')->name('human-resource.hrm.employee.registration.delete');
				Route::get('/employee-inactive/{id}', 'Backend\Employees\EmployeeRegistrationController@employeeInactive')->name('human-resource.hrm.employee.inactive');
                Route::get('/employee-active/{id}', 'Backend\Employees\EmployeeRegistrationController@employeeActive')->name('human-resource.hrm.employee.active');
			});
		});
		
		//Start Setup
		Route::prefix('setup')->group(function(){
			//Color
			Route::get('color/view','Backend\Admin\Setup\ColorController@index')->name('setup.color.view');
			Route::get('color/add','Backend\Admin\Setup\ColorController@add')->name('setup.color.add');
			Route::post('color/store','Backend\Admin\Setup\ColorController@store')->name('setup.color.store');
			Route::get('color/edit/{id}','Backend\Admin\Setup\ColorController@edit')->name('setup.color.edit');
			Route::post('color/update/{id}','Backend\Admin\Setup\ColorController@update')->name('setup.color.update');
			Route::get('color/delete/{id}','Backend\Admin\Setup\ColorController@delete')->name('setup.color.delete');
			//Table
			Route::get('/table/view','Backend\Setup\SetupController@viewTable')->name('setup.table.view');
			Route::get('/table/add','Backend\Setup\SetupController@addTable')->name('setup.table.add');
			Route::post('/table/store','Backend\Setup\SetupController@storeTable')->name('setup.table.store');
			Route::get('/table/edit/{id}','Backend\Setup\SetupController@editTable')->name('setup.table.edit');
			Route::post('/table/update/{id}','Backend\Setup\SetupController@updateTable')->name('setup.table.update');
		});
		//End Setup
	});
});


