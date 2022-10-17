<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $table = 'products';

    protected $fillable = [
        'reference',
        'name',
        'price',
    ];

    const PRODUCTS = [ 
        'Banda corrugada',
        'Banda doble lona',
        'Banda de pvc',
        'Banda de sinfin',
        'Banda en finger',
        'Rodillo de retorno',
        'Tambor de cola',
        'Cuchilla de limpiador',
        'Limpiador',
        'Base de transportador',
        'Transportador',
        'Piñones',
    ];

    
    // Relaciones
    public function saledProduct()
    {
        return $this->hasMany(SaledProduct::class);
    }


}
