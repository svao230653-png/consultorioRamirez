@extends('layouts.app')

@section('title', 'Editar cita')

@section('content')
<div class="container">
    <h2 class="mb-4">
        <i class="fa-solid fa-pen-to-square me-2 text-warning"></i>
        Editar cita
    </h2>

    <div class="card shadow-sm">
        <div class="card-body">

            <form action="{{ route('citas.update', $cita->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Fecha</label>
                    <input type="date" name="fecha" class="form-control" value="{{ $cita->fecha }}">
                </div>

                <div class="mb-3">
                    <label>Hora</label>
                    <input type="time" name="hora" class="form-control" value="{{ $cita->hora }}">
                </div>

                <div class="mb-3">
                    <label>Motivo</label>
                    <input type="text" name="motivo" class="form-control" value="{{ $cita->motivo }}">
                </div>

                <div class="mb-3">
                    <label>Estado</label>
                    <select name="estado" class="form-control">
                        <option value="pendiente" {{ $cita->estado=='pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="confirmada" {{ $cita->estado=='confirmada' ? 'selected' : '' }}>Confirmada</option>
                        <option value="cancelada" {{ $cita->estado=='cancelada' ? 'selected' : '' }}>Cancelada</option>
                        <option value="completada" {{ $cita->estado=='completada' ? 'selected' : '' }}>Completada</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">
                    Actualizar
                </button>

                <a href="{{ route('citas.index') }}" class="btn btn-secondary">
                    Ver citas
                </a>

                <a href="{{ route('panel.admin') }}" class="btn btn-dark">
                    Volver al panel
                </a>

            </form>

        </div>
    </div>
</div>
@endsection