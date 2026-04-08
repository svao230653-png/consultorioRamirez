<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\LoginNotification;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('admin.login');
    }

    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|min:6|confirmed',
            'telefono' => 'nullable|string|max:20',
            'fecha_nacimiento' => 'nullable|date',
            'rol' => 'required|in:asistente,doctor',
        ]);

        User::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telefono' => $request->telefono,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'rol' => $request->rol,
        ]);

        return redirect()->route('login')->with('success', 'Registro completado correctamente. Ahora inicia sesión.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $usuario = User::where('email', $request->email)->first();

        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            return back()->with('error', 'Correo o contraseña incorrectos.');
        }

        session([
            'id' => $usuario->id,
            'nombre' => $usuario->nombre,
            'email' => $usuario->email,
            'rol' => $usuario->rol,
        ]);

        try {
            Log::info('Intentando enviar correo de login...');

            Mail::to('svao230653@upemor.edu.mx')->send(new LoginNotification([
                'nombre' => $usuario->nombre,
                'email' => $usuario->email,
                'login_time' => now()->format('d/m/Y H:i:s'),
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]));

            Log::info('Correo enviado correctamente.');
        } catch (\Exception $e) {
            Log::error('Error enviando correo de login: ' . $e->getMessage());
        }

        return redirect()->route('panel')->with('success', 'Bienvenido al sistema.');
    }

    public function panel()
    {
        $rol = session('rol');

        return match ($rol) {
            'administrador' => redirect()->route('panel.admin'),
            'asistente' => redirect()->route('panel.asistente'),
            'doctor' => redirect()->route('panel.doctor'),
            default => redirect()->route('login')->with('error', 'Rol no válido.'),
        };
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect()->route('inicio')->with('warning', 'Sesión cerrada correctamente.');
    }
}