@extends('layouts.app')

@section('title', 'Editar usuario')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold"><i class="fa-solid fa-user-pen me-2 text-success"></i>Editar usuario</h2>
    <p class="text-muted mb-0">Actualiza la información del usuario</p>
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

        <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $usuario->nombre) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Correo</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $usuario->email) }}" required>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Teléfono</label>
                    <input type="text" name="telefono" class="form-control" value="{{ old('telefono', $usuario->telefono) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Fecha de nacimiento</label>
                    <input type="date" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento', $usuario->fecha_nacimiento) }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">Rol</label>
                    <select name="rol" class="form-select" required>
                        <option value="administrador" {{ old('rol', $usuario->rol) == 'administrador' ? 'selected' : '' }}>Administrador</option>
                        <option value="asistente" {{ old('rol', $usuario->rol) == 'asistente' ? 'selected' : '' }}>Asistente</option>
                        <option value="doctor" {{ old('rol', $usuario->rol) == 'doctor' ? 'selected' : '' }}>Doctor</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Nueva contraseña</label>
                    <input type="password" name="password" class="form-control">
                    <small class="text-muted">Déjalo vacío si no quieres cambiarla.</small>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Confirmar nueva contraseña</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    <i class="fa-solid fa-rotate me-2"></i>Actualizar
                </button>

                <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
                    <i class="fa-solid fa-arrow-left me-2"></i>Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection