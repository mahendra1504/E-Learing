<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\instructorController;

use App\Http\Controllers\studentController;

use App\Http\Controllers\courseController;

use App\Http\Controllers\assignmentController;

use App\Notifications\TestNotify;

use App\Models;

use App\Models\student;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('instructorLoginData','App\Http\Controllers\instructorController@login');

Route::post('studentLoginData','App\Http\Controllers\studentController@login');

Route::get('/studentData','App\Http\Controllers\studentController@getData');


Route::get('/instructorData','App\Http\Controllers\instructorController@getData');

Route::view('/instructorLoginPage','instructorLogin');

//Route::get('/instructorLoginPage','App\Http\Controllers\courseController@getCourse');

Route::view('/studentLoginPage',function(){
        if(session()->has('fname'))
        {
            return view('studentHome');
        }
        else
            return view('studentLogin');
});

Route::get('instructorLogout',function(){
        if(session()->has('uname'))
        {
            session()->pull('uname',null);
            return redirect('instructorLoginPage');
        }
        else
            return view('instructorLoginPage');
});

Route::get('studentLogout',function(){
        if(session()->has('fname'))
        {
            session()->pull('fname',null);
            return redirect('studentLoginPage');
        }  
        else
            return view('studentLoginPage');

});

Route::view('instructorHomePage','instructorHome');

Route::view('studentHomePage','studentHome');

Route::view('instructorRegisterPage','instructorRegister')->name('instructorRegisterPage');

Route::post('instructorController','App\Http\Controllers\instructorController@store');

Route::view('/studentLoginPage','studentLogin');

Route::get('studentRegisterPage','App\Http\Controllers\courseController@getCourseForStud')->name('studentRegisterPage');

Route::post('studentController','App\Http\Controllers\studentController@store');

Route::get('studentRecord','App\Http\Controllers\studentController@getData');

Route::view('studentRecordPage','studentRecordPage');

Route::get('studentDeleteData/{id}','App\Http\Controllers\studentController@destroy');

Route::get('studentEditData/{id}','App\Http\Controllers\studentController@edit');

Route::post('/studentUpdateData','App\Http\Controllers\studentController@update');

Route::get('manage_assignment','App\Http\Controllers\courseController@getSemester');

Route::view('/manage_assignmentPage','manage_assignmentPage');

Route::post('/uploadAss','App\Http\Controllers\assignmentController@store');

Route::get('/upload_material','App\Http\Controllers\courseController@getCourseForMat');

Route::post('/uploadMaterial','App\Http\Controllers\materialController@upload');

Route::get('/getSubjects/{id}/{cid}','App\Http\Controllers\subjectController@getSubject');

Route::get('/list_assignment/{id}','App\Http\Controllers\assignmentController@getAssignments');

Route::get('/downloadAss/{ass}',function($ass)
{
    $file = public_path()."/assignment/$ass";
    return Response::download($file,$ass);
});

Route::get('/list_material/{id}','App\Http\Controllers\materialController@getMaterials');

Route::get('/downloadMat/{mat}',function($mat)
{
    $file = public_path()."/materials/$mat";
    return Response::download($file,$mat);
});

Route::get('/delAssignment/{id}','App\Http\Controllers\assignmentController@destroy');

Route::get('/delMaterial/{id}','App\Http\Controllers\materialController@destroy');

Route::get('/see_assignment/{cid}/{sem}','App\Http\Controllers\subjectController@getSubForAss');

Route::get('/see_material/{cid}/{sem}','App\Http\Controllers\subjectController@getSubForMat');

Route::get('/submitAssignmentPage/{ass_id}/{stud_id}',function($ass_id,$stud_id){
    return view('submitAssignment',['ass'=>$ass_id])->with('stud',$stud_id);
});

Route::post('/submitAss','App\Http\Controllers\ass_submissionController@submit');

Route::get('/sendMail',function(){
    $details = ["title"=>"E-Learning","body"=>"This is Test Mail"];
    \Mail::to('mrjadhav1542000@gmail.com','iet016mahnedra@gmail.com')->queue(new \App\Mail\testmail($details));
    student::first()->notify(new TestNotify);
    echo "Email has been sent";
});

Route::get('/sendMessage','App\Http\Controllers\studentController@sendMessage');

Route::get('/give_feedback','App\Http\Controllers\courseController@getCourseForFB');

Route::get('/getStuds/{cid}/{semNo}','App\Http\Controllers\studentController@getStuds');

Route::post('/storeFeedback','App\Http\Controllers\feedBackController@store');

Route::get('/see_feedback/{stud_id}','App\Http\Controllers\feedBackController@getFeedback');

Route::get('upload_schedule','App\Http\Controllers\courseController@getCourseForSch');

Route::post('/storeSchedule','App\Http\Controllers\scheduleController@store');

Route::get('/see_schedule/{cid}/{semester}','App\Http\Controllers\scheduleController@get');

Route::get('/downloadSch/{sch}',function($sch)
{
    $file = public_path()."/schedule/$sch";
    return Response::download($file,$sch);
});

Route::get('/getAss/{cid}/{sem}/{subject}','App\Http\Controllers\assignmentController@getAssForStud');

Route::get('/getMat/{cid}/{sem}/{subject}','App\Http\Controllers\materialController@getMatForStud');

Route::get('list_schedule','App\Http\Controllers\scheduleController@getSchForInstructor');

Route::get('/delSch/{id}','App\Http\Controllers\scheduleController@destroy');

Route::view('/adminLoginPage','adminLoginPage');

Route::post('/adminLogin','App\Http\Controllers\adminController@login');

Route::view('/adminHomePage','adminHome');

Route::get('/seeInstructors','App\Http\Controllers\instructorController@get');

Route::get('/deleteIns/{id}','App\Http\Controllers\instructorController@destroy');

Route::get('/editIns/{id}','App\Http\Controllers\instructorController@edit');

Route::post('/updateIns','App\Http\Controllers\instructorController@update');

Route::get('/seeStudents','App\Http\Controllers\courseController@getCourseForAdmin');

Route::post('/showStudSemWise','App\Http\Controllers\studentController@getStudForAdmin');

Route::get('/deleteStudByAdmin/{id}','App\Http\Controllers\studentController@destroyByAdmin');

Route::get('/editStudByAdmin/{id}','App\Http\Controllers\studentController@getStudByAdminForEdit');

Route::get('/adminLogout',function(){
        if(session()->has('username'))
        {
            session()->pull('username',null);
            return redirect('/adminLoginPage');
        }  
        else
            return view('/adminLoginPage');

});

Route::post('/studentEditByAdmin','App\Http\Controllers\studentController@updateStudByAdmin');

Route::get('/editAssignment/{id}','App\Http\Controllers\assignmentController@getAssForEdit');

Route::post('/updateAss','App\Http\Controllers\assignmentController@update');

Route::get('/editMaterial/{id}','App\Http\Controllers\materialController@getMatForEdit');

Route::post('/updateMaterial','App\Http\Controllers\materialController@update');

Route::get('/editSch/{id}','App\Http\Controllers\scheduleController@getSchForEdit');

Route::post('/updateSchedule','App\Http\Controllers\scheduleController@update');

Route::get('/seeSubmittedAssignment/{id}','App\Http\Controllers\ass_submissionController@get');

Route::get('/downloadSubmittedAss/{ass}',function($ass)
{
    $file = public_path()."/submitted_assignments/$ass";
    return Response::download($file,$ass);
});


