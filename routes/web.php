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
  $util = new \App\Util();
  return date('Y-m-d');
});

//site
Route::get('/', 'SiteController@index');

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





Route::get('/skill-learning/courses/detailes',function (){
  return view('site.skill-course-detailes');
});


Route::get('/content',function (){
  return view('site.content');

});
Route::get('/sent-successfully',function (){
  return view('site.sent-successfully');
});







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
//section1

Route::get('/admin/admin',function (){
  return view('admin.admin');
});
Route::get('/admin/about-hamgam',function (){
  return view('admin.about-hamgam');
});
Route::get('/admin/statistic',function (){
  return view('admin.statistic');
});
Route::get('/admin/question',function (){
  return view('admin.question');
});

Route::get('/admin/connection',function (){
  return view('admin.connection');
});

Route::get('/admin/inquery',function (){
  return view('admin.inquery');
});

Route::get('/admin/purpose',function (){
  return view('admin.purpose');
});

Route::get('/admin/jobs',function (){
  return view('admin.jobs');
});

Route::get('/admin/consult',function (){
  return view('admin.consult');
});

Route::get('/admin/change-field',function (){
  return view('admin.change-field');
});

Route::get('/admin/skill-courses',function (){
  return view('admin.skill-coures');
});

Route::get('/admin/explanation',function (){
  return view('admin.explanation');
});

Route::get('/admin/course-offer',function (){
  return view('admin.course-offer');
});

Route::get('/admin/schedule',function (){
  return view('admin.schedule');
});

Route::get('/admin/workshop',function (){
  return view('admin.workshop');
});

Route::get('/admin/workshop-detailes',function (){
  return view('admin.workshop-detailes');
});

Route::get('/admin/course-detailes',function (){
  return view('admin.course-detailes');
});

Route::get('/admin/visit-industries',function (){
  return view('admin.visit-industries');
});

Route::get('/admin/visit-details',function (){
  return view('admin.visit-details');
});

Route::get('/admin/idea-support',function (){
  return view('admin.idea-support');
});

Route::get('/admin/startup',function (){
  return view('admin.startup');
});

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

Route::get('/admin/guidance',function (){
  return view('admin.guidance');
});

Route::get('/admin/skill-learning',function (){
  return view('admin.skill-learning');
});

Route::get('/admin/idea',function (){
  return view('admin.idea');
});

Route::get('/admin/success',function (){
  return view('admin.success');
});

Route::get('/admin/gathering',function (){
  return view('admin.gathering');
});




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