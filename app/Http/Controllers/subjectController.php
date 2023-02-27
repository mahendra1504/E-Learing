<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subject;
use Illuminate\Support\Facades\DB;

class subjectController extends Controller
{
    public function getSubject($id,$cid)
    {
    	if($id==0)
        { 
            $employees = subject::orderby('sub_code','asc')->select('name')->get(); 
        }
        else
        {   
            $employees = subject::select('name')->where('semester',"=", $id)->where('course_id',"=",$cid)->get(); 
            $subcode = subject::select('sub_code')->where('semester',"=", $id)->where('course_id',"=",$cid)->get(); 
            
        }
        $userData['sub'] = $employees;
        $userData['subcode'] = $subcode;

        echo json_encode($userData);
        exit;
    }

    public function getSubForAss($cid,$sem)
    {
        $data = DB::table('subjects')->where('course_id','=',$cid)->where('semester','=',$sem)->get();

        return view('studentSeeAssignment',['data'=>$data]);
    }

    public function getSubForMat($cid,$sem)
    {
        $data = DB::table('subjects')->where('course_id','=',$cid)->where('semester','=',$sem)->get();

        return view('studentSeeMaterial',['data'=>$data]);
    }
}
