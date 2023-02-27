<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name','course_name','semester'];
    public $primaryKey = 'sub_code';
}
