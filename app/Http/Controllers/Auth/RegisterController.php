<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    // Mostrar el formulario de registro
    public function showRegistrationForm()
    {
        return view('auth.register'); // Asegúrate de que esta vista exista
    }

    // Registrar un nuevo usuario
    public function register(Request $request)
    {
        // Validación de los datos de usuario
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone' => 'required|string|max:20|unique:users,phone',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Si la validación falla, redirigir con errores
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Crear usuario en la tabla 'users'
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role_id' => 2, // Rol predeterminado
        ]);

        // Iniciar sesión automáticamente
        Auth::login($user);

        // Redirigir al dashboard con un mensaje de éxito
        return redirect()->intended('dashboard')->with('success', 'Registro exitoso. Bienvenido/a, ' . $user->name . '!');
    }

    // Método para actualizar los datos del usuario y crear cliente
    public function updateUser(Request $request, $userId)
    {
        // Validación de los datos del usuario
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $userId,
            'phone' => 'required|string|max:20|unique:users,phone,' . $userId,
        ]);

        // Si la validación falla, redirigir con errores
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Obtener el usuario
        $user = User::findOrFail($userId);

        // Actualizar el usuario
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        // Verificar si ya existe un cliente asociado al usuario
        $clienteExistente = Cliente::where('usuario_id', $user->id)->first();

        // Si no existe un cliente asociado, crear uno nuevo
        if (!$clienteExistente) {
            Cliente::create([
                'usuario_id' => $user->id,
                'nombre' => $user->name,
                'telefono' => $user->phone,
                'email' => $user->email,
                'role_id' => 2, // Role o algún valor que sea pertinente
            ]);
        }

        // Redirigir al dashboard con un mensaje de éxito
        return redirect()->route('dashboard')->with('success', 'Datos actualizados correctamente.');
    }
}
