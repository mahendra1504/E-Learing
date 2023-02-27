<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\schedule;
use Illuminate\Support\Facades\DB;
use App\Models\student;
use Mail;

class scheduleController extends Controller
{
    public function store(Request $req)
    {
    	$data = $req->file('schedule');
    	$data_name = rand().'.'.$data->getClientOriginalExtension();
    	$data->move(public_path("schedule"),$data_name);

    	$schedule = new schedule([
                'course_id' => $req->get('course'),
                'semester' => $req->get('semester'),
                'sch_type' => $req->get('sch_type'),
                'upload_date' => $req->get('upload_date'),
                'path' => $data_name
        ]);
        $schedule->save();
        
        $to = student::select('email')->where('course_id','=',$req->course)->where('semester','=',$req->semester)->get();
        $array= array();
        foreach($to as $obj){  
            array_push($array,$obj['email']);
        }
        print_r( $array );
        $subject = 'Schedule';
        $message = 'New Schedule Uploaded';
        $headers = 'From: mrjadhav1542000@gmail.com'       . "\r\n" .
                 'Reply-To: mrjadhav1542000@gmail.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();
        $details = array('subject'=>$subject,'message'=>$message);
        Mail::to($array)->queue(new \App\Mail\testmail($details));
  
        return back()->with('success','Schedule Uploaded Successfully');
    }

    public function get($cid,$sem)
    {
    	$data = DB::table('schedules')->where('course_id','=',$cid)->where('semester','=',$sem)->get();
    	return view('studentSeeSchedule',['data'=>$data]);
    }

    public function getSchForInstructor()
    {
    	$data = schedule::all();
    	return view('manage_schedule',['data'=>$data]);
    }

    public function destroy($id)
    {
        $data = schedule::where('sch_id','=',$id)->delete();
        return back()->with('success','Schedule Deleted Successfully');
    }

    public function getSchForEdit($id)
    {
        $data = schedule::find($id);
        return view('instructorEditSch',['data'=>$data]);
    }

    public function update(Request $request)
    { 
        $data = $request->file('schedule');
        $data_name = rand().'.'.$data->getClientOriginalExtension();
        $data->move(public_path("schedule"),$data_name);

        $saved = schedule::where('sch_id','=',$request->id)->update(['sch_type'=>$request->type,'upload_date' => $request->upload_date,'course_id' => $request->course,'semester'=>$request->sem,'path'=>$data_name]);
        
        if($saved){
            return back()->with('success','Material Updated Successfully');
        }
    }

}
