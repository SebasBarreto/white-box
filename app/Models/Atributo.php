<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atributo extends Model
{
    use HasFactory;

    protected $table = 'atributos'; // Nombre de la tabla

    public function valores()
    {
    return $this->hasMany(ValorAtributo::class, 'id_atributo', 'id');
    }

}
