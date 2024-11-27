<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ValorAtributo extends Model
{
    use HasFactory;

    protected $table = 'valores_atributo'; // Nombre de la tabla

    public function atributo()
    {
    return $this->belongsTo(Atributo::class, 'id_atributo', 'id');
    }
}
