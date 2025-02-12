<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    use HasFactory;

    protected $table = 'favoritos';  // Asegúrate de que la tabla sea correcta

    protected $fillable = ['idusuario', 'idproducto']; // Añadir los campos que son rellenables

    // Relación con producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idproducto'); // Relación con el modelo Producto
    }

    // Relación con cliente/usuario
    public function usuario()
    {
        return $this->belongsTo(Cliente::class, 'idusuario'); // Relación con el modelo Cliente
    }
}
