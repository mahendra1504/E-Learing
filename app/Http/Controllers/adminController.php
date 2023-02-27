<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    public function login(Request $req)
    {
    	$input_name = $req->input('username');
        $fname = DB::table('admins')->where('username','=',$input_name)->pluck('username')->first();
        $admin_id = DB::table('admins')->where('username','=',$input_name)->pluck('admin_id')->first();
        $input_pass = $req->input('password');
        $pass = DB::table('admins')->where('username','=',$input_name)->pluck('password')->first();
        $firstname = (string)$fname;
        $password = (string)$pass;

        if(strcmp($firstname,$input_name)==0)
        {
            if(strcmp($password,$input_pass)==0)
            {
                $req->session()->put('username',$fname);
                $req->session()->put('aid',$admin_id);
                return view('adminHome')->with('success',"Successfully Loged In");
            }
            else
            {
                //echo '<script>alert("Password is Wrong")</script>';
                return redirect('adminLoginPage')->with('errorP','Password is wrong');
            }
        }
        else
        {
           //echo "<script>alert('Username is Wrong')</script>";
            return redirect('adminLoginPage')->with('errorU','Username not Found');
        }
    }
}
