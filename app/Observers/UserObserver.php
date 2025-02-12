<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    public function updated(User $user)
    {
        // Verifica si el usuario tiene un cliente relacionado
        if ($user->cliente) {
            $user->cliente->update([
                'nombre' => $user->name,
                'telefono' => $user->phone,
                'email' => $user->email,
            ]);
        }
    }

    public function boot()
    {
    User::observe(UserObserver::class);
    }

    public function created(User $user)
    {
        // Crea automáticamente un cliente al crear un usuario
        //$user->cliente()->create([
         //   'nombre' => $user->name,
         //   'telefono' => $user->phone,
            //'email' => $user->email,
            //'role_id' => $user->role_id,
          //  'usuario_id' => $user->id,
        //]);
    }
}
