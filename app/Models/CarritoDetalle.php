<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarritoDetalle extends Model
{
    use HasFactory;

    protected $table = 'carrito_detalle';

    protected $fillable = [
        'idcarrito',
        'idproducto',
        'cantidad',
        'precio_unitario',
        'subtotal',
    ];

    public $timestamps = true;

    public function carrito()
    {
        return $this->belongsTo(Carrito::class, 'idcarrito');
    }

    public function producto()
    {
    return $this->belongsTo(Producto::class, 'idproducto', 'id');
    }
}
