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
Route::get('/skill-learning/offer', 'SiteSkillController@offer');
Route::post('/skill-learning/offer-insert', 'SiteSkillController@offerInsert');




/*
 * gathering section
 */
Route::get('/gathering', 'SiteGatheringController@gathering');
Route::get('/gathering/workshop', 'SiteGatheringController@workshop');
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
//in this**************************************
Route::get('/success/university-startups',function (){
  return view('site.university-startups');
});








Route::get('/content',function (){
  return view('site.content');

});


Route::get('/sent-successfully',function (){
  return view('site.sent-successfully');
});















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


//section 2

Route::get('/student/student',function (){
  return view('student.student');
});

Route::get('/student/workshop',function (){
  return view('student.workshop');
});

Route::get('/student/consult',function (){
  return view('student.consult');
});

Route::get('/student/profile',function (){
  return view('student.profile');
});

Route::get('/student/contact',function (){
  return view('student.contact');
});

Route::get('/student/idea',function (){
  return view('student.idea');
});


//section 3

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