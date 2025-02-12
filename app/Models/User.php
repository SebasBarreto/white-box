<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Define los campos asignables en masa
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role_id',
    ];

    // Define los campos ocultos en arrays
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Define los casts para ciertos campos
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relación con el modelo Cliente
     */
    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'id', 'id');
    }

    /**
     * Definir eventos del modelo
     */
    protected static function booted()
    {
        // Evento creado eliminado para evitar que se cree el cliente automáticamente
        // static::created(function ($user) {
        //     if (!\App\Models\Cliente::find($user->id)) {
        //         \App\Models\Cliente::create([
        //             'id' => $user->id,
        //             'nombre' => $user->name,
        //             'email' => $user->email,
        //             'role_id' => $user->role_id,
        //             'created_at' => now(),
        //             'updated_at' => now(),
        //         ]);
        //     }
        // });

        // El evento de actualización permanece igual
        static::updated(function ($user) {
            $cliente = \App\Models\Cliente::find($user->id);
            if ($cliente) {
                $cliente->update([
                    'nombre' => $user->name,
                    'email' => $user->email,
                    'role_id' => $user->role_id,
                    'updated_at' => now(),
                ]);
            }
        });

        // El evento de eliminación permanece igual
        static::deleted(function ($user) {
            \App\Models\Cliente::where('id', $user->id)->delete();
        });
    }
}
