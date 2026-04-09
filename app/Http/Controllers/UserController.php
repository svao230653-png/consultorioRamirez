<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\AvisoSistemaMail;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::orderBy('id', 'desc')->paginate(10);
        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|min:6|confirmed',
            'telefono' => 'nullable|string|max:20',
            'fecha_nacimiento' => 'nullable|date',
            'rol' => 'required|in:administrador,asistente,doctor',
        ]);

        User::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telefono' => $request->telefono,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'rol' => $request->rol,
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado correctamente.');
    }

    public function show(string $id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    public function edit(string $id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, string $id)
    {
        $usuario = User::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:100',
            'email' => 'required|email|unique:usuarios,email,' . $usuario->id,
            'telefono' => 'nullable|string|max:20',
            'fecha_nacimiento' => 'nullable|date',
            'rol' => 'required|in:administrador,asistente,doctor',
            'password' => 'nullable|min:6|confirmed',
        ]);

        $datos = [
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'rol' => $request->rol,
        ];

        if ($request->filled('password')) {
            $datos['password'] = Hash::make($request->password);
        }

        $usuario->update($datos);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        $usuario = User::findOrFail($id);

        if ($usuario->id == session('id')) {
            return redirect()->route('usuarios.index')->with('warning', 'No puedes eliminar tu propio usuario.');
        }

        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente.');
    }

    public function enviarAviso(Request $request, string $id)
    {
        if (session('rol') !== 'administrador') {
            return redirect()->route('usuarios.index')->with('error', 'No tienes permiso para realizar esta acción.');
        }

        $usuario = User::findOrFail($id);

        $mensajeCorreo = $request->mensaje_correo
            ?? 'Te informamos que hay novedades importantes en el sistema del Consultorio Dental Ramírez.';

        Mail::to($usuario->email)->send(new AvisoSistemaMail($usuario, $mensajeCorreo));

        return redirect()->route('usuarios.index')->with('success', 'Aviso enviado correctamente al usuario.');
    }
}