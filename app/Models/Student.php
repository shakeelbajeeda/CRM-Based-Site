<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'fname',
        'lname',
        'dob',
        'email',
        'password',
        'phone',
        'parent_id',
        'status',
        'date_of_join',
        'last_login_ip'
    ];
}
