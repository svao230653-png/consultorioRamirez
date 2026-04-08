@extends('layouts.app')

@section('title', 'Detalle de paciente')

@section('content')
<div class="mb-4">
    <h2 class="fw-bold">
        <i class="fa-solid fa-id-card me-2 text-success"></i>Detalle del paciente
    </h2>
</div>

<div class="card content-card">
    <div class="card-body p-4">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="fw-bold">Nombre completo:</label>
                <p>
                    {{ $paciente->nombre }}
                    {{ $paciente->apellido_paterno }}
                    {{ $paciente->apellido_materno }}
                </p>
            </div>

            <div class="col-md-6">
                <label class="fw-bold">Teléfono:</label>
                <p>{{ $paciente->telefono ?? 'Sin dato' }}</p>
            </div>

            <div class="col-md-6">
                <label class="fw-bold">Correo:</label>
                <p>{{ $paciente->email ?? 'Sin dato' }}</p>
            </div>

            <div class="col-md-6">
                <label class="fw-bold">Fecha de nacimiento:</label>
                <p>{{ $paciente->fecha_nacimiento ?? 'Sin dato' }}</p>
            </div>

            <div class="col-md-6">
                <label class="fw-bold">Sexo:</label>
                <p>{{ $paciente->sexo ?? 'Sin dato' }}</p>
            </div>

            <div class="col-md-6">
                <label class="fw-bold">Dirección:</label>
                <p>{{ $paciente->direccion ?? 'Sin dato' }}</p>
            </div>

            <div class="col-12">
                <label class="fw-bold">Alergias:</label>
                <p>{{ $paciente->alergias ?? 'Sin dato' }}</p>
            </div>

            <div class="col-md-6">
                <label class="fw-bold">Fecha de registro:</label>
                <p>{{ $paciente->created_at }}</p>
            </div>
        </div>

        <div class="mt-4 d-flex gap-2">
            <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning">
                <i class="fa-solid fa-pen-to-square me-2"></i>Editar
            </a>

            <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">
                <i class="fa-solid fa-arrow-left me-2"></i>Volver
            </a>
        </div>
    </div>
</div>
@endsection