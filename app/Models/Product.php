<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'title',
        'qty',
        'discount',
        'discount_type',
        'description',
        'price',
        'user_id',
        'image'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

}
