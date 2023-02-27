<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ass_submission extends Model
{
    use HasFactory;
	public $timestamps = false;
	protected $fillable = ['stud_id','submitted_date','ass_id','submitted_file'];
	public $primaryKey = 'submission_id';
}
