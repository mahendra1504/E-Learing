<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class assignment extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['sub_code','instructor_id','course_id','semester','due_date','path'];
    public $primaryKey = 'ass_id';
}
