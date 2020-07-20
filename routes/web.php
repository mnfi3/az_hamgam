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
Route::post('/question-add', 'SiteController@questionAdd');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




/*
 * news section
 */

Route::get('/news', 'SiteController@posts');
Route::get('/news/detailes/{id}', 'SiteController@post');



/*
 * academic guidance section
 */

Route::get('/academic-guidance', 'SiteGuidanceController@academicGuidance');
Route::get('/academic-guidance/relative-jobs','SiteGuidanceController@relativeJobs');
Route::get('/academic-guidance/consult', 'SiteGuidanceController@consult');
Route::get('/academic-guidance/corona-consultation', 'SiteGuidanceController@coronaConsult');
Route::post('/academic-guidance/consult-insert', 'SiteGuidanceController@consultInsert');
Route::get('/academic-guidance/job-ads', 'SiteGuidanceController@jobAds');
Route::get('/academic-guidance/job-details/{id}', 'SiteGuidanceController@jobAdsDetails');
Route::get('/academic-guidance/change-field', 'SiteGuidanceController@changeField');



/*
 * skill section
 */
Route::get('/skill-learning','SiteSkillController@skillLearning');
Route::get('/skill-learning/termination','SiteSkillController@term');
Route::get('/skill-learning/courses', 'SiteSkillController@courses');
Route::get('/skill-learning/course/{id}', 'SiteSkillController@courseDetail');
Route::get('/skill-learning/course/register/{id}', 'SiteSkillController@courseRegister');
Route::post('/skill-learning/course/register/payment-verify', 'SiteSkillController@courseRegisterVerify');
Route::get('/skill-learning/offer', 'SiteSkillController@offer');
Route::post('/skill-learning/offer-insert', 'SiteSkillController@offerInsert');
Route::get('/skill-learning/free-courses', 'SiteSkillController@freeCourses');
Route::get('/skill-learning/free-courses-detailes/{id}', 'SiteSkillController@freeCourseDetail');
Route::get('/skill-learning/free-course/register/{id}', 'SiteSkillController@freeCourseRegister');
Route::post('/skill-learning/free-course/register/payment-verify', 'SiteSkillController@freeCourseRegisterVerify');




/*
 * gathering section
 */
Route::get('/gathering', 'SiteGatheringController@gathering');
Route::get('/gathering/workshop', 'SiteGatheringController@workshop');
Route::get('/gathering/industry-posts', 'SiteGatheringController@industryPosts');
Route::get('/gathering/industry-post/{id}', 'SiteGatheringController@industryPost');
Route::get('/gathering/workshop-detail/{id}', 'SiteGatheringController@workshopDetail');
Route::get('/gathering/workshop/register/{id}', 'SiteGatheringController@workshopRegister');
Route::post('/gathering/workshop/register/payment-verify', 'SiteGatheringController@workshopRegisterVerify');
Route::get('/gathering/visit-industries', 'SiteGatheringController@industry');
Route::get('/gathering/visit-industries-details/{id}', 'SiteGatheringController@industryDetail');
Route::get('/gathering/visit-industries/register/{id}', 'SiteGatheringController@industryRegister');




/*
 * idea section
 */
Route::get('/idea', 'SiteIdeaController@idea');
Route::get('/idea/support', 'SiteIdeaController@support');
Route::get('/idea/festivals', 'SiteIdeaController@festivals');
Route::get('/idea/festival-detail/{id}', 'SiteIdeaController@festival');
Route::get('/idea/festival-register/{id}', 'SiteIdeaController@festivalRegister');
Route::post('/idea/festival-register/payment-verify', 'SiteIdeaController@festivalPaymentVerify');
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
Route::get('/student/free-course', 'Student\StudentController@freeCourse');
Route::get('/student/consult', 'Student\StudentController@consults');
Route::get('/student/profile', 'Student\StudentController@profile');
Route::post('/student/profile-update', 'Student\StudentController@profileUpdate');
Route::post('/student/change-password', 'Student\StudentController@changePassword');
Route::get('/student/contact', 'Student\StudentController@contact');
Route::post('/student/send-message', 'Student\StudentController@sentMessage');
Route::get('/student/idea', 'Student\StudentController@idea');
Route::post('/student/idea-insert', 'Student\StudentController@ideaInsert');
Route::get('/student/festivals', 'Student\StudentController@festivals');
Route::post('/student/festival/send-file', 'Student\StudentController@festivalSendFile');



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
Route::get('/admin/message/delete/{id}', 'Admin\AdminSiteController@messageDelete');
Route::get('/admin/managers', 'Admin\AdminSiteController@managers');
Route::post('/admin/managers/update', 'Admin\AdminSiteController@managersUpdate');
Route::get('/admin/slider/edit/{id}', 'Admin\AdminSiteController@sliderEdit');
Route::post('/admin/slider/update', 'Admin\AdminSiteController@sliderUpdate');
Route::get('/admin/news', 'Admin\AdminSiteController@posts');
Route::post('/admin/new/add', 'Admin\AdminSiteController@postAdd');
Route::get('/admin/new/remove/{id}', 'Admin\AdminSiteController@postRemove');


//section guidance
Route::get('/admin/guidance', 'Admin\AdminGuidanceController@guidance');
Route::post('/admin/guidance/add', 'Admin\AdminGuidanceController@guidanceAdd');
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
Route::post('admin/job-ads/update', 'Admin\AdminGuidanceController@jobAdsUpdate');
Route::get('/admin/job-ads', 'Admin\AdminGuidanceController@jobAds');
Route::get('/admin/job-ad/edit/{id}', 'Admin\AdminGuidanceController@jobAdEdit');
Route::post('admin/job-ad/update', 'Admin\AdminGuidanceController@jobAdUpdate');
Route::post('/admin/job-ad/insert', 'Admin\AdminGuidanceController@jobAdInsert');
Route::get('/admin/job-ad/remove/{id}', 'Admin\AdminGuidanceController@jobAdRemove');
Route::get('/admin/job-ad/accept/{id}', 'Admin\AdminGuidanceController@jobAdAccept');
Route::get('/admin/job-ad/reject/{id}', 'Admin\AdminGuidanceController@jobAdReject');

//Route::get('/admin/industry-inquiries', 'Admin\AdminGuidanceController@industryInquiries');


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
Route::get('/admin/free-courses', 'Admin\AdminSkillController@freeCourses');
Route::get('/admin/free-course-details/{id}', 'Admin\AdminSkillController@freeCourseDetail');
Route::post('/admin/free-courses/update', 'Admin\AdminSkillController@freeCourseUpdate');
Route::get('/admin/free-courses/remove/{id}', 'Admin\AdminSkillController@freeCourseRemove');
Route::post('/admin/free-course/add', 'Admin\AdminSkillController@freeCourseAdd');
Route::post('/admin/free-course/edit', 'Admin\AdminSkillController@freeCourseEdit');
Route::post('/admin/free-course/send-cert', 'Admin\AdminSkillController@freeCourseSendCert');



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
Route::get('/admin/invite-industries', 'Admin\AdminGatheringController@industryPost');
Route::post('/admin/industry-post/add', 'Admin\AdminGatheringController@industryPostAdd');
Route::get('/admin/invite-industries/remove/{id}', 'Admin\AdminGatheringController@industryPostRemove');
Route::post('/admin/invite-industries/update', 'Admin\AdminGatheringController@inviteIndustryUpdate');







//section idea
Route::get('/admin/idea', 'Admin\AdminIdeaController@idea');
Route::post('/admin/idea/update', 'Admin\AdminIdeaController@ideaUpdate');
Route::get('/admin/idea-support', 'Admin\AdminIdeaController@ideaSupport');
Route::post('/admin/idea-support/update', 'Admin\AdminIdeaController@ideaSupportUpdate');
Route::post('/admin/idea-support/answer', 'Admin\AdminIdeaController@ideaSupportAnswer');
Route::get('/admin/startup', 'Admin\AdminIdeaController@startup');
Route::post('/admin/startup/update', 'Admin\AdminIdeaController@startupUpdate');
Route::post('/admin/idea/festivals-update', 'Admin\AdminIdeaController@ideaFestivalsUpdate');
Route::post('/admin/idea/festival/add-student', 'Admin\AdminIdeaController@ideaFestivalAddStudnet');
Route::get('/admin/idea/festivals', 'Admin\AdminIdeaController@festivals');
Route::post('/admin/idea/festival-insert', 'Admin\AdminIdeaController@festivalAdd');
Route::get('/admin/idea/festival-detail/{id}', 'Admin\AdminIdeaController@festivalDetail');
Route::get('/admin/idea/festival-remove/{id}', 'Admin\AdminIdeaController@festivalRemove');
Route::post('/admin/idea/festival-update', 'Admin\AdminIdeaController@festivalUpdate');




//section success
Route::get('/admin/success', 'Admin\AdminSuccessController@success');
Route::post('/admin/success/update', 'Admin\AdminSuccessController@successUpdate');
Route::get('/admin/success/graduation-jobs', 'Admin\AdminSuccessController@graduationJobs');
Route::post('/admin/success/graduation-jobs/update', 'Admin\AdminSuccessController@graduationJobsUpdate');
Route::get('/admin/success/graduation-jobs/remove/{id}', 'Admin\AdminSuccessController@graduationJobsRemove');
Route::post('/admin/success/graduation-jobs/add', 'Admin\AdminSuccessController@graduationJobsAdd');
Route::get('/admin/success/startups', 'Admin\AdminSuccessController@startups');
Route::post('/admin/success/startups/update', 'Admin\AdminSuccessController@startupsUpdate');
Route::post('/admin/success/startup/add', 'Admin\AdminSuccessController@startupAdd');
Route::get('/admin/success/startup/remove/{id}', 'Admin\AdminSuccessController@startupRemove');



//section users management
Route::get('/admin/users/student', 'Admin\AdminUserController@students');
Route::get('/admin/users/student-detailes/{id}', 'Admin\AdminUserController@studentDetail');
Route::get('/admin/users/student/course/cert-print/{student_id}/{course_id}', 'Admin\AdminUserController@printCourseCert');
Route::get('/admin/users/student/workshop/cert-print/{student_id}/{workshop_id}', 'Admin\AdminUserController@printWorkshopCert');
Route::get('/admin/users/student/free-course/cert-print/{student_id}/{free_course_id}', 'Admin\AdminUserController@printFreeCourseCert');
Route::get('/admin/users/master', 'Admin\AdminUserController@masters');
Route::post('/admin/users/master-remove', 'Admin\AdminUserController@masterRemove');
Route::post('/admin/users/master/add', 'Admin\AdminUserController@masterAdd');
Route::get('/admin/users/master-detailes/{id}', 'Admin\AdminUserController@masterDetail');
Route::get('/admin/users/consult', 'Admin\AdminUserController@consult');
Route::post('/admin/users/consult/add', 'Admin\AdminUserController@consultAdd');
Route::post('/admin/users/consult-remove', 'Admin\AdminUserController@consultRemove');
Route::get('/admin/users/forums', 'Admin\AdminUserController@forums');
Route::post('/admin/users/forum/add', 'Admin\AdminUserController@forumAdd');
Route::get('/admin/industries', 'Admin\AdminUserController@industries');
Route::post('/admin/industry/add', 'Admin\AdminUserController@industryAdd');
Route::get('/admin/performance-report', 'Admin\AdminUserController@counselorReports');
Route::get('/admin/performance-report-print/{id}', 'Admin\AdminUserController@counselorReportPrint');








//section backup
Route::get('/admin/backup', 'Admin\BackupController@index');



//master panel
Route::get('/master/master', 'Master\MasterController@master');
Route::get('/master/course-detalis/{id}', 'Master\MasterController@courseDetail');
Route::get('/master/workshop', 'Master\MasterController@workshops');
Route::get('/master/free-course', 'Master\MasterController@freeCourse');
Route::get('/master/workshop-detalis/{id}', 'Master\MasterController@workshopDetail');
Route::get('/master/free-course-detalis/{id}', 'Master\MasterController@freeCourseDetail');
Route::get('/master/profile', 'Master\MasterController@profile');
Route::post('/master/change-pass', 'Master\MasterController@changePass');
Route::get('/master/contact', 'Master\MasterController@contact');
Route::post('/master/contact/send-message', 'Master\MasterController@sendMessage');



//conultant panel
Route::get('/counselor/counselor', 'Consultant\ConsultantController@consultant');
Route::post('/counselor/send-answer', 'Consultant\ConsultantController@sendAnswer');
Route::get('/counselor/profile', 'Consultant\ConsultantController@profile');
Route::post('/consultant/change-password', 'Consultant\ConsultantController@changePass');
Route::get('/counselor/contact', 'Consultant\ConsultantController@contact');
Route::post('/counselor/send-message', 'Consultant\ConsultantController@sendMessage');
Route::get('/counselor/performant-report', 'Consultant\ConsultantController@reports');
Route::post('/counselor/performant-report-send', 'Consultant\ConsultantController@sendReport');



//forum panel
Route::get('/forum/forum', 'Forum\ForumController@forum');
Route::post('/forum/send-message', 'Forum\ForumController@sendMessage');
Route::get('/forum/profile', 'Forum\ForumController@profile');
Route::post('/forum/change-pass', 'Forum\ForumController@changePassword');



//industry panel
Route::get('/industry/industry', 'Industry\IndustryController@industry');
Route::post('/industry/send-message', 'Industry\IndustryController@sendMessage');
Route::get('/industry/profile', 'Industry\IndustryController@profile');
Route::post('/industry/change-pass', 'Industry\IndustryController@changePassword');
Route::get('/industry/jobs', 'Industry\IndustryController@jobs');
Route::post('/industry/job/insert', 'Industry\IndustryController@jobAdInsert');
Route::get('/industry/job/edit/{id}', 'Industry\IndustryController@jobEdit');
Route::post('/industry/job/update', 'Industry\IndustryController@jobAdUpdate');
Route::get('/industry/job/remove/{id}', 'Industry\IndustryController@jobRemove');



