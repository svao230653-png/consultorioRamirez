<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\User;
use App\Models\Paciente;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index()
    {
        $rol = session('rol');
        $usuarioId = session('id');

        if ($rol === 'doctor') {
            $citas = Cita::with(['paciente', 'doctor'])
                ->where('doctor_id', $usuarioId)
                ->orderBy('fecha', 'asc')
                ->orderBy('hora', 'asc')
                ->paginate(10);
        } else {
            $citas = Cita::with(['paciente', 'doctor'])
                ->orderBy('id', 'desc')
                ->paginate(10);
        }

        return view('citas.index', compact('citas'));
    }

    public function create()
    {
        if (session('rol') === 'doctor') {
            return redirect()->route('citas.index')->with('warning', 'El doctor no puede registrar citas.');
        }

        $pacientes = Paciente::orderBy('nombre')->get();
        $doctores = User::where('rol', 'doctor')->orderBy('nombre')->get();

        return view('citas.create', compact('pacientes', 'doctores'));
    }

    public function store(Request $request)
    {
        if (session('rol') === 'doctor') {
            return redirect()->route('citas.index')->with('error', 'No tienes permiso para crear citas.');
        }

        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'doctor_id' => 'required|exists:usuarios,id',
            'fecha' => 'required|date',
            'hora' => 'required',
            'motivo' => 'required|string|max:255',
            'estado' => 'required|in:pendiente,confirmada,cancelada,completada',
        ]);

        Cita::create([
            'paciente_id' => $request->paciente_id,
            'doctor_id' => $request->doctor_id,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'motivo' => $request->motivo,
            'estado' => $request->estado,
        ]);

        return redirect()->route('citas.index')->with('success', 'Cita registrada correctamente.');
    }

    public function show(string $id)
    {
        $cita = Cita::with(['paciente', 'doctor'])->findOrFail($id);

        if (session('rol') === 'doctor' && $cita->doctor_id != session('id')) {
            return redirect()->route('citas.index')->with('error', 'No puedes ver citas de otros doctores.');
        }

        return view('citas.show', compact('cita'));
    }

    public function edit(string $id)
    {
        $cita = Cita::findOrFail($id);

        if (session('rol') === 'doctor') {
            return redirect()->route('citas.index')->with('warning', 'El doctor no puede editar citas.');
        }

        $pacientes = Paciente::orderBy('nombre')->get();
        $doctores = User::where('rol', 'doctor')->orderBy('nombre')->get();

        return view('citas.edit', compact('cita', 'pacientes', 'doctores'));
    }

    public function update(Request $request, string $id)
    {
        $cita = Cita::findOrFail($id);

        if (session('rol') === 'doctor') {
            return redirect()->route('citas.index')->with('error', 'No tienes permiso para actualizar citas.');
        }

        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'doctor_id' => 'required|exists:usuarios,id',
            'fecha' => 'required|date',
            'hora' => 'required',
            'motivo' => 'required|string|max:255',
            'estado' => 'required|in:pendiente,confirmada,cancelada,completada',
        ]);

        $cita->update([
            'paciente_id' => $request->paciente_id,
            'doctor_id' => $request->doctor_id,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'motivo' => $request->motivo,
            'estado' => $request->estado,
        ]);

        return redirect()->route('citas.index')->with('success', 'Cita actualizada correctamente.');
    }

    public function destroy(string $id)
    {
        $cita = Cita::findOrFail($id);

        if (session('rol') === 'doctor') {
            return redirect()->route('citas.index')->with('error', 'No tienes permiso para eliminar citas.');
        }

        $cita->delete();

        return redirect()->route('citas.index')->with('error', 'Cita eliminada correctamente.');
    }
}