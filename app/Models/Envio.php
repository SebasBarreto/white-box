<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Envio extends Model
{
    use HasFactory;

    protected $table = 'envios';

    protected $fillable = ['usuario_id', 'producto_id', 'direccion', 'estado'];

    // Relación con cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'usuario_id');
    }

    // Relación con producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
