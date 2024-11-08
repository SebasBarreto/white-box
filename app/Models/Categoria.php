<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categoria'; // Asegúrate de que el nombre de la tabla es correcto
    protected $primaryKey = 'idcategoria'; // Clave primaria, si es diferente a 'id'

    public function articulos()
{
    return $this->hasMany(Articulo::class, 'idcategoria');
}
}
