<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SaledProduct extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'saled_products';

    protected $fillable = [
        'product_id',
        'amount',
        'total',
        'order_id',
    ];



    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
