<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\course;
use Illuminate\Support\Facades\DB;

class courseController extends Controller
{
    public function getSemester()
    {
    	$data = course::all();
        return view('assignmentPage',['data'=>$data]);
    }

    public function getCourseForStud()
    {
        $data = course::all();
        return view('studentRegister',['data'=>$data]);
    }

    public function getCourseForMat()
    {
        $data = course::all();
        return view('materialPage',['data'=>$data]);
    }

    public function getCourseForFB()
    {
        $data = course::all();
        return view('giveFeedback',['data'=>$data]);
    }

    public function getCourseForSch()
    {
        $data = course::all();
        return view('manage_schedulePage',['data'=>$data]);
    }

    public function getCourseForAdmin()
    {
        $data = course::all();
        return view('admin_manage_student',['data'=>$data]);
    }
}
