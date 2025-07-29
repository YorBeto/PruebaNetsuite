<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'sku',
        'price',
        'created_at',
        'updated_at',
    ];
    public $timestamps = true; // Habilitar timestamps si es necesario
    protected $table = 'products'; // Asegúrate de que el nombre de la tabla sea correcto
    
}
