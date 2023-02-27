<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['course_id','semester','sch_type','upload_date','path'];
    public $primaryKey = 'sch_id';
}
