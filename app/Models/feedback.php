<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class feedback extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['instructor_id','stud_id','type','feedback'];
    public $primaryKey = 'feedback_id';
}
