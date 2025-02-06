<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Agregar los campos que deseas permitir la asignación masiva
    protected $fillable = [
        'sku',
        'name',
        'category',
        'price',
        // Añade otros campos aquí si es necesario
    ];
}
