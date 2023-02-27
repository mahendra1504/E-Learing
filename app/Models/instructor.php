<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instructor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['uname','surname','dob','address','mobno','password'];
    public $primaryKey = "instructor_id";
}
