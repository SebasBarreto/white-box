<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoImagen extends Model
{
    use HasFactory;

    protected $table = 'producto_imagenes';

    // Relación inversa con Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
