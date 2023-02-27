<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;
    use \Illuminate\Notifications\Notifiable;
    public $timestamps = false;
    protected $fillable = ['fname','lname','dob','email','address','mobno','course_id','semester','approval','password'];
    public $primaryKey = 'stud_id';
}
