<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    protected $fillable = ['ic', 'name', 'contact', 'class']; // Match the new lowercase columns
}
