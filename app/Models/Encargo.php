<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encargo extends Model
{
    use HasFactory;

    protected $table = 'encargos';

    protected $fillable = ['usuario_id', 'producto_id', 'cantidad', 'estado'];

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
