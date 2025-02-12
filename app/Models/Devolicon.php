<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devolucion extends Model
{
    use HasFactory;

    protected $table = 'devoluciones';

    protected $fillable = ['usuario_id', 'producto_id', 'cantidad', 'motivo'];

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
