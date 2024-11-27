<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /*public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }*/

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
    $request->validate([
        'login' => 'required',  // Correo o Teléfono
        'password' => 'required|string',
    ]);

    // Buscar usuario por correo o teléfono
    $user = User::where('email', $request->login)
                ->orWhere('phone', $request->login)
                ->first();

    if ($user && Hash::check($request->password, $user->password)) {
        // Iniciar sesión
        Auth::login($user);

        return redirect()->intended('/dashboard');  // Redirigir al dashboard o a la página que desees
    }

    // Si no se encuentra el usuario o la contraseña no coincide
    return back()->withErrors([
        'login' => 'Las credenciales no coinciden con nuestros registros.',
    ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/'); // Redirige a la página de inicio
    }
}
