<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\feedback;
use Illuminate\Support\Facades\DB;

class feedBackController extends Controller
{
    public function store(Request $req)
    {
    	$this->validate($req,[
            'instructor_id' => 'required',
            'stud_id' => 'required',
            'type' => 'required',
            'feedback' => 'required'
        ]);	

        $feedback = new feedback([
                'instructor_id' => $req->get('instructor_id'),
                'stud_id' =>$req->get('stud_id'),
                'type' =>$req->get('type'),
                'feedback' => $req->get('feedback'),
        ]);
        
        $feedback->save();

        return back()->with('success','Feedback given Successfully');
    }

    public function getFeedback($stud_id)
    {
    	$data = DB::table('feedback')->where('stud_id','=',$stud_id)->get();
    	return view('studentSeeFeedback',['data'=>$data]);
    }
}
