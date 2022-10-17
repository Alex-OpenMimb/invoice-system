<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'orders';

    protected $fillable = [
        'number_order',
        'saler_id',
        'buyer_id',
        'date',
        'hour',
    ];


    // Relaciones

    public function bayer()
    {
        return $this->belongsTo(Buyer::class);
    }

    public function saler()
    {
        return $this->belongsTo(Saler::class);
    }

    public function saled_product()
    {
        return $this->hasMany(SaledProduct::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }



}
