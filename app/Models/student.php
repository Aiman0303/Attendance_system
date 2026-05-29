<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    protected $fillable = ['IC', 'Name', 'Contact', 'class','status']; // Match the new lowercase columns
}
