<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ass_submission;
use Illuminate\Support\Facades\DB;

class ass_submissionController extends Controller
{
    public function submit(Request $req)
    {
    	$data = $req->file('submitted_file');
    	$data_name = rand().'.'.$data->getClientOriginalExtension();
    	$data->move(public_path("submitted_assignments"),$data_name);

    	$ass_submission = new ass_submission([
    		'stud_id' => $req->get('stud_id'),
    		'submitted_date' => $req->get('submit_date'),
    		'ass_id' => $req->get('ass_id'),
    		'submitted_file' => $data_name
    	]);

    	$ass_submission->save();

    	return back()->with('success','Submitted Successfully');
    }

    public function get($id)
    {
        $data = DB::table('ass_submissions')->where('ass_id','=',$id)->get();
        return view('submittedAssignments',['data'=>$data]);
    }
}
