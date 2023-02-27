<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\instructor;
use Illuminate\Support\Facades\DB;

class instructorController extends Controller
{
    public function create()
    {
        return view('instructorRegister');
    }
    public function login(Request $req)
    {
        $input_name = $req->input('uname');
        $fname = DB::table('instructors')->where('uname','=',$input_name)->pluck('uname')->first();
        $instructor_id = DB::table('instructors')->where('uname','=',$input_name)->pluck('instructor_id')->first();
        $input_pass = $req->input('pwd');
        $pass = DB::table('instructors')->where('uname','=',$input_name)->pluck('password')->first();
        $firstname = (string)$fname;
        $password = (string)$pass;

        if(strcmp($firstname,$input_name)==0)
        {
            if(strcmp($password,$input_pass)==0)
            {
                $req->session()->put('uname',$fname);
                $req->session()->put('iid',$instructor_id);
                return view('instructorHome')->with('success',"Successfully Loged In");
            }
            else
            {
                //echo '<script>alert("Password is Wrong")</script>';
                return redirect('instructorLoginPage')->with('alertPass','Password is wrong');
            }
        }
        else
        {
           //echo "<script>alert('Username is Wrong')</script>";
            return redirect('instructorLoginPage')->with('alertUname','Username not Found');
        }
    }

    public function store(Request $req)
    {
        $this->validate($req,[
            'fname' => 'required|unique:instructors,uname',
            'sname' => 'required',
            'dob' => 'required|before:1995-01-01',
            'addr' => 'required',
            'mobno' => 'required |numeric | digits:10 | starts_with: 6,7,8,9|unique:instructors,mobno',
            'cpass' => 'required',
            'password' => ['required', 
               'min:6', 
               'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[@!$#%]).*$/']
        ]);
        if(strcmp($req->get('cpass'),$req->get('password'))==0)
        {
            $instructor = new instructor([
                'uname' => $req->get('fname'),
                'surname' =>$req->get('sname'),
                'dob' => $req->get('dob'),
                'address' => $req->get('addr'),
                'mobno' => $req->get('mobno'),
                'password' => $req->get('password')
            ]);
            $instructor->save();

            return redirect('/instructorLoginPage')->with('success','You are Successfully Registered');
        }
        else
        {
            return redirect()->route('/instructorLoginPage')->with('error','Data Not Added Successfully');
        }
        
    }

    public function getData()
    {
        return instructor::all();
    }

    public function get()
    {
        $data = instructor::all();
        return view('manage_instructorPage',['data'=>$data]);
    }

    public function destroy($id)
    {
        $data = instructor::where('instructor_id','=',$id)->delete();
        return back()->with('success','Instructor Deleted Successfully');
    }

    public function edit($id)
    {
        $data = instructor::find($id);
        return view('updateInstructor',['data'=>$data]);
    }

    public function update(Request $request, instructor $instructor)
    {
        $saved = instructor::where('instructor_id','=',$request->instructor_id)->update(['uname' => $request->fname, 'surname' => $request->sname,'address' => $request->addr,'dob' => $request->dob,'mobno'=>$request->mobno,'password'=>$request->password]);
        
        if($saved){
            return redirect('/seeInstructors')->with('success','Updated Successfully');
        }   
    }
}
