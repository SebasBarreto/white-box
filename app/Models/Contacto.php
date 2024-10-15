<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    use HasFactory;

    protected $table = 'contacto'; // Aseguramos que apunte a la tabla 'contacto'
    protected $primaryKey = 'idcontacto'; // Clave primaria personalizada

    // Los campos que pueden ser llenados en masa
    protected $fillable = ['nombre', 'telefono', 'email', 'mensaje', 'fecha_contacto'];
}
