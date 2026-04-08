@extends('layouts.app')

@section('title', 'Editar paciente')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">
        <i class="fa-solid fa-user-pen me-2 text-success"></i>Editar paciente
    </h2>
    <p class="text-muted mb-0">Actualiza la información del paciente</p>
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

        <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $paciente->nombre) }}" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Apellido paterno</label>
                    <input type="text" name="apellido_paterno" class="form-control" value="{{ old('apellido_paterno', $paciente->apellido_paterno) }}" required>
                </div>

                <div class="col-md-4">
                    <label class="form-label">Apellido materno</label>
                    <input type="text" name="apellido_materno" class="form-control" value="{{ old('apellido_materno', $paciente->apellido_materno) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $paciente->telefono) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Correo</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $paciente->email) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Fecha de nacimiento</label>
                    <input type="date" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento', $paciente->fecha_nacimiento) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Sexo</label>
                    <select name="sexo" class="form-select">
                        <option value="">Selecciona una opción</option>
                        <option value="masculino" {{ old('sexo', $paciente->sexo) == 'masculino' ? 'selected' : '' }}>Masculino</option>
                        <option value="femenino" {{ old('sexo', $paciente->sexo) == 'femenino' ? 'selected' : '' }}>Femenino</option>
                        <option value="otro" {{ old('sexo', $paciente->sexo) == 'otro' ? 'selected' : '' }}>Otro</option>
                    </select>
                </div>

                <div class="col-12">
                    <label class="form-label">Dirección</label>
                    <input type="text" name="direccion" class="form-control" value="{{ old('direccion', $paciente->direccion) }}">
                </div>

                <div class="col-12">
                    <label class="form-label">Alergias</label>
                    <textarea name="alergias" class="form-control" rows="4">{{ old('alergias', $paciente->alergias) }}</textarea>
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="fa-solid fa-rotate me-2"></i>Actualizar
                </button>

                <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-arrow-left me-2"></i>Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection