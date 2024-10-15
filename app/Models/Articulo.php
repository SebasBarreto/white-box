<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    protected $table = 'articulo';

    protected $fillable = [
        'codigo', 'nombre', 'stock', 'descripcion', 'imagen', 'idcategoria', 'estado'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idcategoria');
    }
}
