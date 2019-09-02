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


Route::get('/test', function (){
  return date('Y-m-d');
});

//site
Route::get('/', 'SiteController@index');
Route::post('/question-add', 'SiteController@questionAdd');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




/*
 * academic guidance section
 */

Route::get('/academic-guidance', 'SiteGuidanceController@academicGuidance');
Route::get('/academic-guidance/relative-jobs','SiteGuidanceController@relativeJobs');
Route::get('/academic-guidance/consult', 'SiteGuidanceController@consult');
Route::post('/academic-guidance/consult-insert', 'SiteGuidanceController@consultInsert');
Route::get('/academic-guidance/purpose', 'SiteGuidanceController@goal');
Route::get('/academic-guidance/change-field', 'SiteGuidanceController@changeField');



/*
 * skill section
 */
Route::get('/skill-learning','SiteSkillController@skillLearning');
Route::get('/skill-learning/termination','SiteSkillController@term');
Route::get('/skill-learning/courses', 'SiteSkillController@courses');
Route::get('/skill-learning/course/{id}', 'SiteSkillController@courseDetail');
Route::get('/skill-learning/course/register/{id}', 'SiteSkillController@courseRegister');
Route::get('/skill-learning/offer', 'SiteSkillController@offer');
Route::post('/skill-learning/offer-insert', 'SiteSkillController@offerInsert');




/*
 * gathering section
 */
Route::get('/gathering', 'SiteGatheringController@gathering');
Route::get('/gathering/workshop', 'SiteGatheringController@workshop');
Route::get('/gathering/workshop-detail/{id}', 'SiteGatheringController@workshopDetail');
Route::get('/gathering/workshop/register/{id}', 'SiteGatheringController@workshopRegister');
Route::get('/gathering/visit-industries', 'SiteGatheringController@industry');
Route::get('/gathering/visit-industries-details/{id}', 'SiteGatheringController@industryDetail');
Route::get('/gathering/visit-industries/register/{id}', 'SiteGatheringController@industryRegister');




/*
 * idea section
 */
Route::get('/idea', 'SiteIdeaController@idea');
Route::get('/idea/support', 'SiteIdeaController@support');
Route::get('/idea/startup', 'SiteIdeaController@startup');


/*
 * success section
 */
Route::get('/success', 'SiteSuccessController@success');
Route::get('/success/graduation-job', 'SiteSuccessController@graduation');
Route::get('/success/university-startups', 'SiteSuccessController@startup');





//Route::get('/skill-learning/courses/detailes',function (){
//  return view('site.skill-course-detailes');
//});
//
//
//Route::get('/content',function (){
//  return view('site.content');
//
//});
//Route::get('/sent-successfully',function (){
//  return view('site.sent-successfully');
//});







//student section

Route::get('/student/student', 'Student\StudentController@student');
Route::get('/student/workshop', 'Student\StudentController@workshop');
Route::get('/student/consult', 'Student\StudentController@consults');
Route::get('/student/profile', 'Student\StudentController@profile');
Route::post('/student/profile-update', 'Student\StudentController@profileUpdate');
Route::post('/student/change-password', 'Student\StudentController@changePassword');
Route::get('/student/contact', 'Student\StudentController@contact');
Route::post('/student/send-message', 'Student\StudentController@sentMessage');
Route::get('/student/idea', 'Student\StudentController@idea');
Route::post('/student/idea-insert', 'Student\StudentController@ideaInsert');








//Admins
//section site information

Route::get('/admin/admin', 'Admin\AdminSiteController@admin');
Route::get('/admin/slider/remove/{id}', 'Admin\AdminSiteController@sliderRemove');
Route::post('/admin/slider/add', 'Admin\AdminSiteController@sliderAdd');
Route::get('/admin/about-hamgam', 'Admin\AdminSiteController@about');
Route::post('/admin/about-hamgam/add', 'Admin\AdminSiteController@aboutAdd');
Route::get('/admin/question', 'Admin\AdminSiteController@questions');
Route::post('/admin/question/add', 'Admin\AdminSiteController@questionAdd');
Route::get('/admin/question/remove/{id}', 'Admin\AdminSiteController@questionRemove');
Route::get('/admin/connection', 'Admin\AdminSiteController@connection');
Route::post('/admin/connection/update', 'Admin\AdminSiteController@connectionUpdate');
Route::get('/admin/inquery', 'Admin\AdminSiteController@messages');
Route::post('/admin/message/answer', 'Admin\AdminSiteController@messageAnswer');

//section guidance
Route::get('/admin/guidance', 'Admin\AdminGuidanceController@guidance');
Route::post('/admin/guidance/add', 'Admin\AdminGuidanceController@guidanceAdd');
Route::get('/admin/purpose', 'Admin\AdminGuidanceController@purpose');
Route::post('/admin/purpose/update', 'Admin\AdminGuidanceController@purposeUpdate');
Route::get('/admin/jobs', 'Admin\AdminGuidanceController@jobs');
Route::post('/admin/jobs/update', 'Admin\AdminGuidanceController@jobsUpdate');
Route::post('/admin/job/add', 'Admin\AdminGuidanceController@jobAdd');
Route::post('/admin/field/add', 'Admin\AdminGuidanceController@fieldAdd');
Route::post('/admin/field-job/add', 'Admin\AdminGuidanceController@fieldJobAdd');
Route::get('/admin/consult', 'Admin\AdminGuidanceController@consult');
Route::post('/admin/consult/update', 'Admin\AdminGuidanceController@consultUpdate');
Route::post('/admin/consult/send-to-consultant', 'Admin\AdminGuidanceController@senToConsultant');
Route::post('/admin/consult/answer', 'Admin\AdminGuidanceController@consultAnswer');
Route::get('/admin/change-field', 'Admin\AdminGuidanceController@changeField');
Route::post('/admin/change-field/update', 'Admin\AdminGuidanceController@changeFieldUpdate');


//section skill
Route::get('/admin/skill-learning', 'Admin\AdminSkillController@skill');
Route::post('/admin/skill-learning/update', 'Admin\AdminSkillController@skillUpdate');
Route::get('/admin/skill-courses', 'Admin\AdminSkillController@courses');
Route::post('/admin/skill-courses/update', 'Admin\AdminSkillController@coursesUpdate');
Route::get('/admin/skill-course/remove/{id}', 'Admin\AdminSkillController@courseRemove');
Route::post('/admin/skill-course/add', 'Admin\AdminSkillController@courseAdd');
Route::post('/admin/skill-course/edit', 'Admin\AdminSkillController@courseEdit');
Route::get('/admin/course-detailes/{id}','Admin\AdminSkillController@courseDetail');
Route::post('/admin/skill-course/send-cert','Admin\AdminSkillController@sendCert');
Route::get('/admin/course-offer', 'Admin\AdminSkillController@courseOffer');
Route::post('/admin/course-offer/update', 'Admin\AdminSkillController@courseOfferUpdate');
Route::get('/admin/schedule', 'Admin\AdminSkillController@schedule');
Route::post('/admin/schedule/update', 'Admin\AdminSkillController@scheduleUpdate');



//section gathering
Route::get('/admin/gathering', 'Admin\AdminGatheringController@gathering');
Route::post('/admin/gathering/update', 'Admin\AdminGatheringController@gatheringUpdate');
Route::get('/admin/workshop', 'Admin\AdminGatheringController@workshops');
Route::post('/admin/workshop/update', 'Admin\AdminGatheringController@workshopsUpdate');
Route::get('/admin/workshop/remove/{id}', 'Admin\AdminGatheringController@workshopRemove');
Route::post('/admin/workshop/add', 'Admin\AdminGatheringController@workshopAdd');
Route::get('/admin/workshop-detailes/{id}', 'Admin\AdminGatheringController@workshopDetail');
Route::post('/admin/workshop/edit', 'Admin\AdminGatheringController@workshopEdit');
Route::post('/admin/workshop/send-cert', 'Admin\AdminGatheringController@workshopSendCert');
Route::get('/admin/visit-industries', 'Admin\AdminGatheringController@visitIndustry');
Route::post('/admin/visit-industries/update', 'Admin\AdminGatheringController@visitIndustryUpdate');
Route::get('/admin/visit-industries/remove/{id}', 'Admin\AdminGatheringController@visitIndustryRemove');
Route::post('/admin/visit-industries/add', 'Admin\AdminGatheringController@visitIndustryAdd');
Route::get('/admin/visit-details/{id}', 'Admin\AdminGatheringController@visitIndustryDetail');
Route::post('/admin/visit-industries/edit', 'Admin\AdminGatheringController@visitIndustryEdit');







//section idea
Route::get('/admin/idea', 'Admin\AdminIdeaController@idea');
Route::post('/admin/idea/update', 'Admin\AdminIdeaController@ideaUpdate');
Route::get('/admin/idea-support', 'Admin\AdminIdeaController@ideaSupport');
Route::post('/admin/idea-support/update', 'Admin\AdminIdeaController@ideaSupportUpdate');
Route::post('/admin/idea-support/answer', 'Admin\AdminIdeaController@ideaSupportAnswer');
Route::get('/admin/startup', 'Admin\AdminIdeaController@startup');
Route::post('/admin/startup/update', 'Admin\AdminIdeaController@startupUpdate');

Route::get('/admin/users/student',function (){
  return view('admin.users.student');
});

Route::get('/admin/users/student-detailes',function (){
  return view('admin.users.student-detailes');
});

Route::get('/admin/users/forums',function (){
  return view('admin.users.forums');
});

Route::get('/admin/users/master',function (){
  return view('admin.users.master');
});

Route::get('/admin/users/master-detailes',function (){
  return view('admin.users.master-detailes');
});

Route::get('/admin/success/startups',function (){
  return view('admin.uni-startups');
});

Route::get('/admin/users/consult',function (){
  return view('admin.users.consult');
});

Route::get('/admin/users/forums',function (){
  return view('admin.users.forums');
});

Route::get('/admin/success/graduation-jobs',function (){
  return view('admin.graduation-job');
});







Route::get('/admin/success',function (){
  return view('admin.success');
});



//Route::get('/admin/statistic',function (){
//  return view('admin.statistic');
//});

//Route::get('/admin/explanation',function (){
//  return view('admin.explanation');
//});




//master

Route::get('/master/master',function (){
  return view('master.master');
});
Route::get('/master/course-detalis',function (){
  return view('master.course-detalis');
});

Route::get('/master/workshop',function (){
  return view('master.workshop');
});

Route::get('/master/workshop-detalis',function (){
  return view('master.workshop-detalis');
});

Route::get('/master/profile',function (){
  return view('master.profile');
});

Route::get('/master/contact',function (){
  return view('master.contact');
});

//section 4

Route::get('/counselor/counselor',function (){
  return view('counselor.counselor');
});

Route::get('/counselor/contact',function (){
  return view('counselor.contact');
});

Route::get('/counselor/profile',function (){
  return view('counselor.profile');
});