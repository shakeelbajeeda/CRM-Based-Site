<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sidebar extends Model
{
    use HasFactory;


    public function child()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function parent_bar()
    {
        return $this->belongsTo(self::class, 'parent_id', 'id')->select('id', 'parent_id', 'name');
    }
}
