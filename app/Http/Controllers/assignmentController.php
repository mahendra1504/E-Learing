<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\assignment;
use App\Models\student;
use Illuminate\Support\Facades\DB;
use Mail;

class assignmentController extends Controller
{
    public function store(Request $req)
    {
    	 $this->validate($req,[
            'due_date' => 'required|after:today',
        ]);
         
        $data = $req->file('assignment');
    	$data_name = rand().'.'.$data->getClientOriginalExtension();
    	$data->move(public_path("assignment"),$data_name);

    	   
        $assignment = new assignment([
                'sub_code' => $req->get('subject'),
                'instructor_id' =>$req->get('faculty'),
                'course_id' => $req->get('course'),
                'semester' => $req->get('semester'),
                'path' => $data_name,
                'due_date' => $req->get('due_date')
            ]);
            $assignment->save();

        $to = student::select('email')->where('course_id','=',$req->course)->where('semester','=',$req->semester)->get();
        $array= array();
        foreach($to as $obj){  
            array_push($array,$obj['email']);
        }
        $subject = 'Assignment';
        $message = 'New Assignment Uploaded';
        $headers = 'From: mrjadhav1542000@gmail.com'       . "\r\n" .
                 'Reply-To: mrjadhav1542000@gmail.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();
        $details = array('subject'=>$subject,'message'=>$message);
        Mail::to($array)->queue(new \App\Mail\testmail($details));
        return redirect('manage_assignment')->with('success','Assignment Uploaded Successfully');        
    }

    public function getAssignments($id)
    {
       $ass = DB::table('assignments')->where('instructor_id',"=",$id)->get();
        return view('manage_assignmentPage',['ass'=>$ass]);
    }

    public function destroy($id)
    {
        $data = assignment::where('ass_id',"=",$id)->delete();
        return back()->with('success',"Deleted Successfully");
    }
    
    public function getAssForStud($cid,$sem,$subject)
    {
       
        $data = DB::table('assignments')->where('course_id',"=",$cid)->where('semester',"=", $sem)->where('sub_code','=',$subject)->get(); 
        
        return view('subjectWiseAss',['data'=>$data]);
    } 

    public function getAssForEdit($id)
    {
        $data = assignment::find($id);
        return view('instructorEditAss',['data'=>$data]);
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'due_date' => 'required|after:today',
        ]);
         
        $data = $request->file('assignment');
        $data_name = rand().'.'.$data->getClientOriginalExtension();
        $data->move(public_path("assignment"),$data_name);

        $saved = assignment::where('ass_id','=',$request->id)->update(['sub_code' => $request->subject, 'instructor_id' => $request->faculty,'course_id' => $request->course,'due_date' => $request->due_date,'semester'=>$request->sem,'path'=>$data_name]);
        
        if($saved){
            return back()->with('success','Assignment Updated Successfully');
        }
    }
}
