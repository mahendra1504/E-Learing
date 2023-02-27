<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use Illuminate\Support\Facades\DB;
use \Illuminate\Notifications\Notifiable;
use Mail;

class studentController extends Controller
{
    public function create()
    {
        return view('studentRegister');
    }

    public function login(Request $req)
    {
        
        	$input_name = $req->input('fname');
        	$fname = DB::table('students')->where('email','=',$input_name)->pluck('email')->first();
            $input_pass = $req->input('pwd');
            $pass = DB::table('students')->where('email','=',$input_name)->pluck('password')->first();
            $cid = DB::table('students')->where('email','=',$input_name)->pluck('course_id')->first();
            $sem = DB::table('students')->where('email','=',$input_name)->pluck('semester')->first();
            $stud_id = DB::table('students')->where('email','=',$input_name)->pluck('stud_id')->first();
            $approval = DB::table('students')->where('email','=',$input_name)->pluck('approval')->first();
            
            $firstname = (string)$fname;
            $password = (string)$pass;
            
            if($approval==1)
            {
                if(strcmp($firstname,$input_name)==0)
                {
        		    if(strcmp($password,$input_pass)==0)
        		    {
        		    	    $req->session()->put('fname',$fname);
                            $req->session()->put('cid',$cid);
                            $req->session()->put('sem',$sem);
                            $req->session()->put('stud_id',$stud_id);
            		        return view('studentHome');
                    }
        			else
        			{
        				return redirect('studentLoginPage')->with('alertPass','Password is wrong');
        			}
        		}
        		else
        		{
        			return redirect('studentLoginPage')->with('alertUname','Username not Found');
        		}
            }
            else
            {
                return redirect('studentLoginPage')->with('alertApproval','You are not approved by Admin or Instructor');
            }

    }

    public function store(Request $req)
    {
        $this->validate($req,[
            'fname' => 'required',
            'lname' => 'required',
            'dob' => 'required|before:2004-12-31',
            'email' => 'required|unique:students,email',
            'addr' => 'required',
            'mobno' => 'required|numeric|digits:10|starts_with:5,6,7,8,9|unique:students,mobno',
            'course' => 'required',
            'semester' => 'required',
            'cpass' => 'required',
            'password' => ['required', 
               'min:6', 
               'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[@!$#%]).*$/']
        ]);
         if(strcmp($req->get('cpass'),$req->get('password'))==0)
        {
		        $student = new student([
		            'fname' => $req->get('fname'),
		            'lname' =>$req->get('lname'),
		            'dob' => $req->get('dob'),
                    'email' => $req->get('email'),
		            'address' => $req->get('addr'),
		            'mobno' => $req->get('mobno'),
		            'course_id' => $req->get('course'),
                    'semester' =>$req->get('semester'),
		            'password' => $req->get('password')
		        ]);

		        $student->save();

		        return redirect('studentLoginPage')->with('success','Student You need Approval from Admin or Instructor for Login in Your Account');
		}
		else
		{
			return redirect()->route('studentRegisterPage')->with('error','Data Not Added Successfully');
		}
    }

    public function edit($stud_id)
    {
        $data = student::find($stud_id);
        return view('studentEditDataPage',['data'=>$data]);
        //return student::find($stud_id);
        
    }

    public function update(Request $request, student $student)
    {
        $saved = student::where('stud_id','=',$request->id)->update(['fname' => $request->fname, 'lname' => $request->lname,'address' => $request->addr,'dob' => $request->dob,'mobno'=>$request->mobno,'approval'=>$request->approval,'password'=>$request->password]);
        
        $to = student::select('email')->where('stud_id','=',$request->id)->get();
        $array= array();
        foreach($to as $obj){  
            array_push($array,$obj['email']);
        }
        $subject = 'Approval';
        $message = 'You are apporved or updated Successfully.Now you can login';
        $headers = 'From: mrjadhav1542000@gmail.com'       . "\r\n" .
                 'Reply-To: mrjadhav1542000@gmail.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();
        $details = array('subject'=>$subject,'message'=>$message);
        Mail::to($array)->queue(new \App\Mail\testmail($details));
        if($saved){
            return view('instructorHome')->with('success','Student Updated Successfully');
        }
        
    }

    public function getData()
    {
        $data=student::all();
        return view('studentRecordPage',['data'=>$data]);
    }

    public function destroy($id)
    {
        $data = student::where('stud_id','=',$id)->delete();
        return redirect('studentRecord');
    }

    public function sendMessage()
    {
        $nexmo = app('Nexmo\Client');
        $nexmo->message()->send([
            "to"=> '8200124230',
            "from"=> 'Vonage SMS API',
            "text"=> 'This is from Mahendra Laravel Project'
        ]);
        /*Notification::send([
            "to"=> '8200124230',
            "from"=>'Vonage SMS API',
            "text"=> 'Using Facade to send Message'
        ], new TestNotify());*/
    }

    public function getStuds($cid,$semNo)
    {
          
            $employees = DB::table('students')->where('course_id',"=",$cid)->where('semester',"=", $semNo)->get(); 
            //$subcode = subject::select('')->where('semester',"=", $id)->where('course_id',"=",$cid)->get(); 
        $userData['stud'] = $employees;
        //$userData['subcode'] = $subcode;

        echo json_encode($userData);
        exit;
    }

    public function getStudForAdmin(Request $req)
    {
        $data =   DB::table('students')->where('course_id',"=",$req->course)->where('semester',"=", $req->semester)->get(); 

        return view('admin_view_student',['data'=>$data]);
          
    }

    public function destroyByAdmin($id)
    {
        $data = student::where('stud_id','=',$id)->delete();
        return redirect('/seeStudents')->with('success','Student Deleted Successfully');
    }

    public function getStudByAdminForEdit($id)
    {
        $data = student::find($id);
        return view('admin_edit_student',['data'=>$data]);
    }

    public function updateStudByAdmin(Request $request)
    {
        $saved = student::where('stud_id','=',$request->id)->update(['fname' => $request->fname, 'lname' => $request->lname,'address' => $request->addr,'dob' => $request->dob,'mobno'=>$request->mobno,'approval'=>$request->approval,'password'=>$request->password]);
        
        $to = student::select('email')->where('stud_id','=',$request->id)->get();
        $array= array();
        foreach($to as $obj){  
            array_push($array,$obj['email']);
        }
        $subject = 'Approval';
        $message = 'You are apporved or updated Successfully.Now you can login';
        $headers = 'From: mrjadhav1542000@gmail.com'       . "\r\n" .
                 'Reply-To: mrjadhav1542000@gmail.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();
        $details = array('subject'=>$subject,'message'=>$message);
        Mail::to($array)->queue(new \App\Mail\testmail($details));

        
        if($saved){
            return redirect('/seeStudents')->with('success','Student Updated Successfully');
        }
    }
}
