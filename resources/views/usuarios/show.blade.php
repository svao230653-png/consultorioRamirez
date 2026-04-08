@extends('layouts.app')

@section('title', 'Detalle de usuario')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold"><i class="fa-solid fa-id-card me-2 text-success"></i>Detalle del usuario</h2>
</div>

<div class="card content-card">
    <div class="card-body p-4">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="fw-bold">Nombre:</label>
                <p>{{ $usuario->nombre }}</p>
            </div>

            <div class="col-md-6">
                <label class="fw-bold">Correo:</label>
                <p>{{ $usuario->email }}</p>
            </div>

            <div class="col-md-6">
                <label class="fw-bold">Teléfono:</label>
                <p>{{ $usuario->telefono ?? 'Sin dato' }}</p>
            </div>

            <div class="col-md-6">
                <label class="fw-bold">Fecha de nacimiento:</label>
                <p>{{ $usuario->fecha_nacimiento ?? 'Sin dato' }}</p>
            </div>

            <div class="col-md-6">
                <label class="fw-bold">Rol:</label>
                <p>{{ ucfirst($usuario->rol) }}</p>
            </div>

            <div class="col-md-6">
                <label class="fw-bold">Fecha de registro:</label>
                <p>{{ $usuario->created_at }}</p>
            </div>
        </div>

        <div class="mt-4 d-flex gap-2">
            <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-warning">
                <i class="fa-solid fa-pen-to-square me-2"></i>Editar
            </a>

            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
                <i class="fa-solid fa-arrow-left me-2"></i>Volver
            </a>
        </div>
    </div>
</div>
@endsection