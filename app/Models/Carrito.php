<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    protected $table = 'carrito';

    protected $fillable = ['usuario_id'];

    // Deshabilitar timestamps
    public $timestamps = true;

    // Relación con cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'usuario_id');
    }

    // Relación con detalles del carrito
    public function detalles()
    {
        return $this->hasMany(CarritoDetalle::class, 'idcarrito');
    }
}
