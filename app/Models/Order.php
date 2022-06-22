<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'subtotal',
        'discount',
        'total',
        'payment_method',
        'payment_method_id'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($product) {
            $old = self::orderBy('id', 'desc')->first();
            $ref = 1000;
            if($old) {
              $ref = (int) substr($old->order_id, 1);
              $ref++;
            }
            $product->order_id = '#'.$ref;
        });
    }
}
