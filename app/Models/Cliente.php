<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'cliente';

    // Define los campos asignables en masa (mass assignable)
    protected $fillable = [
        'id',        
        'nombre',
        'telefono',
        'direccion',
        'ciudad',
        'email',
        'role_id',
        'usuario_id',
        'cedula',
        'pais',
        'created_at',
        'updated_at',
    ];

    // Indica que el modelo debe manejar los timestamps automáticamente
    public $timestamps = true;

    /**
     * Relación con el modelo User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_id', 'usuario_id');
    }

    /**
     * Obtener la descripción del rol del cliente.
     *
     * @return string
     */
    public function getRoleDescriptionAttribute()
    {
        return $this->role_id == 2 ? 'Cliente' : 'Otro';
    }

    /**
     * Formatear el nombre del cliente (ejemplo de accesor).
     *
     * @return string
     */
    public function getFormattedNameAttribute()
    {
        return ucfirst($this->nombre);
    }
}
