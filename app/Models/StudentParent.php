<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentParent extends Model
{
    use HasFactory;
    protected $table = "parents";
    protected $fillable = [
        'name',
        'dob',
        'email',
        'password',
        'phone',
        'status',
        'date',
        'last_login_ip'
    ];
}
