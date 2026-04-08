@extends('layouts.app')

@section('title', 'Crear cita')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">
        <i class="fa-solid fa-calendar-plus me-2 text-success"></i>Registrar cita
    </h2>
    <p class="text-muted mb-0">Completa la información de la nueva cita</p>
</div>

<div class="card content-card">
    <div class="card-body p-4">
        @if($errors->any())
            <div class="alert alert-danger">
                <strong>Corrige los siguientes errores:</strong>
                <ul class="mb-0 mt-2">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('citas.store') }}" method="POST">
            @csrf

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Paciente</label>
                    <select name="paciente_id" class="form-select" required>
                        <option value="">Selecciona un paciente</option>
                        @foreach($pacientes as $paciente)
                            <option value="{{ $paciente->id }}" {{ old('paciente_id') == $paciente->id ? 'selected' : '' }}>
                                {{ $paciente->nombre }} {{ $paciente->apellido_paterno }} {{ $paciente->apellido_materno }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Doctor</label>
                    <select name="doctor_id" class="form-select" required>
                        <option value="">Selecciona un doctor</option>
                        @foreach($doctores as $doctor)
                            <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>
                                {{ $doctor->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Fecha</label>
                    <input type="date" name="fecha" class="form-control" value="{{ old('fecha') }}" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Hora</label>
                    <input type="time" name="hora" class="form-control" value="{{ old('hora') }}" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Estado</label>
                    <select name="estado" class="form-select" required>
                        <option value="pendiente" {{ old('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="confirmada" {{ old('estado') == 'confirmada' ? 'selected' : '' }}>Confirmada</option>
                        <option value="cancelada" {{ old('estado') == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                        <option value="completada" {{ old('estado') == 'completada' ? 'selected' : '' }}>Completada</option>
                    </select>
                </div>

                <div class="col-12">
                    <label class="form-label">Motivo</label>
                    <input type="text" name="motivo" class="form-control" value="{{ old('motivo') }}" required>
                </div>
            </div>

            <div class="mt-4 d-flex gap-2 flex-wrap">
                <button type="submit" class="btn btn-success">
                    <i class="fa-solid fa-floppy-disk me-2"></i>Guardar
                </button>

                <a href="{{ route('citas.index') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-list me-2"></i>Ver citas
                </a>

                @if(session('rol') === 'asistente')
                    <a href="{{ route('panel.asistente') }}" class="btn btn-dark">
                        <i class="fa-solid fa-house me-2"></i>Volver al panel
                    </a>
                @else
                    <a href="{{ route('panel.admin') }}" class="btn btn-dark">
                        <i class="fa-solid fa-house me-2"></i>Volver al panel
                    </a>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection