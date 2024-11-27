<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default, this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home'; // Redirige al home después de registrarse

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('guest'); 
    }*/

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'min:10', 'max:15'], // Validación del número de teléfono
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'terms' => ['accepted'], // Verifica que los términos y condiciones sean aceptados
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'], // Asegúrate de tener el campo 'phone' en la tabla 'users'
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request)
{
    // Validación de los datos
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'phone' => 'nullable|string|max:15',  // Si deseas permitir teléfono
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Crear el usuario
    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'phone' => $validated['phone'],  // Si usas teléfono
        'password' => bcrypt($validated['password']),
        'role' => 'user',  // Asignamos el rol de usuario no admin
    ]);

    // Iniciar sesión automáticamente
    Auth::login($user);

    // Redirigir al dashboard o página principal
    return redirect()->route('dashboard');
}

}


