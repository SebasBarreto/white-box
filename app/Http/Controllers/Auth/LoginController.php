<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Asegúrate de que esta vista exista
    }

    public function login(Request $request)
    {
        // Validar los campos del formulario
        $request->validate([
            'login' => ['required'], // Puede ser email o teléfono
            'password' => ['required'],
        ]);

        // Preparar las credenciales
        $credentials = ['password' => $request->password];

        if (filter_var($request->login, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $request->login;
        } else {
            $credentials['phone'] = $request->login;
        }

        // Intentar autenticación
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // Regenerar la sesión para evitar ataques de sesión fijada
            return redirect()->intended('dashboard'); // Redirigir al dashboard o página segura
        }

        // Si la autenticación falla
        return back()->withErrors([
            'login' => 'Las credenciales no coinciden.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Cerrar sesión
        $request->session()->invalidate(); // Invalidar la sesión
        $request->session()->regenerateToken(); // Regenerar el token CSRF

        return redirect('/'); // Redirigir al usuario a la página de inicio
    }
}
