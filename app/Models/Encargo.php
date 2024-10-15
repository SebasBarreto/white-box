<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encargo extends Model
{
    use HasFactory;

    protected $table = 'encargo'; // Nombre en singular
    protected $primaryKey = 'id'; // Clave primaria estándar

    // Los campos que pueden ser llenados en masa
    protected $fillable = [
        'nombre_producto', 
        'cantidad', 
        'descripcion_del_producto', 
        'transporte', 
        'lugar_de_destino', 
        'correo_electronico'
    ];
}
