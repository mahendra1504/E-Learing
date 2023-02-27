<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class material extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name','instructor_id','course_id','semester','sub_code','path'];
    public $primaryKey = 'mat_id';
}
