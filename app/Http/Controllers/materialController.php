<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\material;
use Illuminate\Support\Facades\DB;
use App\Models\student;
use Mail;

class materialController extends Controller
{
    public function upload(Request $req)
    {
    	
    	$data = $req->file('material');
    	$data_name = rand().'.'.$data->getClientOriginalExtension();
    	$data->move(public_path("materials"),$data_name);

    	$material = new material([
    			'name' => $req->get('material_name'),
                'instructor_id' =>$req->get('faculty'),
                'course_id' => $req->get('course'),
                'semester' => $req->get('semester'),
                'sub_code' => $req->get('subject'),                
                'path' => $data_name,
                
            ]);
        
        $material->save();

        $to = student::select('email')->where('course_id','=',$req->course)->where('semester','=',$req->semester)->get();
        $array= array();
        foreach($to as $obj){  
            array_push($array,$obj['email']);
        }
        print_r( $array );
        $subject = 'Material';
        $message = 'New Material Uploaded';
        $headers = 'From: mrjadhav1542000@gmail.com'       . "\r\n" .
                 'Reply-To: mrjadhav1542000@gmail.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();
        $details = array('subject'=>$subject,'message'=>$message);
        Mail::to($array)->queue(new \App\Mail\testmail($details));

    	return back()->with('success','Material Uploaded Successfully');

    }

    public function getMaterials($id)
    {
    	$mat = DB::table('materials')->where('instructor_id',"=",$id)->get();
        return view('manage_materialPage',['mat'=>$mat]);
    }

    public function destroy($id)
    {
        $mat = material::where('mat_id',"=",$id)->delete();
        return back()->with('success',"Deleted Successfully!!!");
    }

    public function getMatForStud($cid,$sem,$subject)
    {   
       
        $data = DB::table('materials')->where('course_id',"=",$cid)->where('semester',"=", $sem)->where('sub_code','=',$subject)->get(); 
        
        return view('subjectWiseMat',['data'=>$data]);
    } 

    public function getMatForEdit($id)
    {
       $data = material::find($id);
       return view('instructorEditMat',['data'=>$data]);
    }

    public function update(Request $request)
    { 
        $data = $request->file('material');
        $data_name = rand().'.'.$data->getClientOriginalExtension();
        $data->move(public_path("materials"),$data_name);

        $saved = material::where('mat_id','=',$request->id)->update(['sub_code' => $request->subject,'name'=>$request->material_name,'instructor_id' => $request->faculty,'course_id' => $request->course,'semester'=>$request->sem,'path'=>$data_name]);
        
        if($saved){
            return back()->with('success','Material Updated Successfully');
        }
    }
} 
