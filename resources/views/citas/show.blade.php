@extends('layouts.app')

@section('title', 'Detalle de cita')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <div>
        <h2 class="fw-bold mb-1">
            <i class="fa-solid fa-calendar-check me-2 text-success"></i>
            Detalle de la cita
        </h2>
        <p class="text-muted mb-0">Información completa del registro seleccionado.</p>
    </div>
</div>

<div class="card content-card">
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <strong>ID:</strong>
                <p>{{ $cita->id }}</p>
            </div>

            <div class="col-md-6">
                <strong>Paciente:</strong>
                <p>
                    {{ $cita->paciente->nombre ?? 'Sin paciente' }}
                    {{ $cita->paciente->apellido_paterno ?? '' }}
                </p>
            </div>

            <div class="col-md-6">
                <strong>Doctor:</strong>
                <p>{{ $cita->doctor->nombre ?? 'Sin doctor' }}</p>
            </div>

            <div class="col-md-6">
                <strong>Fecha:</strong>
                <p>{{ $cita->fecha }}</p>
            </div>

            <div class="col-md-6">
                <strong>Hora:</strong>
                <p>{{ $cita->hora }}</p>
            </div>

            <div class="col-md-6">
                <strong>Motivo:</strong>
                <p>{{ $cita->motivo }}</p>
            </div>

            <div class="col-md-6">
                <strong>Estado:</strong>
                <p>
                    @if($cita->estado == 'pendiente')
                        <span class="badge bg-warning text-dark">Pendiente</span>
                    @elseif($cita->estado == 'confirmada')
                        <span class="badge bg-primary">Confirmada</span>
                    @elseif($cita->estado == 'cancelada')
                        <span class="badge bg-danger">Cancelada</span>
                    @else
                        <span class="badge bg-success">Completada</span>
                    @endif
                </p>
            </div>
        </div>

        <div class="mt-4 d-flex gap-2 flex-wrap">
            @if(session('rol') === 'administrador')
                <a href="{{ route('citas.edit', $cita->id) }}" class="btn btn-warning">
                    <i class="fa-solid fa-pen-to-square me-2"></i>Editar
                </a>
            @endif

            <a href="{{ route('citas.index') }}" class="btn btn-secondary">
                <i class="fa-solid fa-list me-2"></i>Ver citas
            </a>

            @if(session('rol') === 'doctor')
                <a href="{{ route('panel.doctor') }}" class="btn btn-dark">
                    <i class="fa-solid fa-house me-2"></i>Volver al panel
                </a>
            @elseif(session('rol') === 'asistente')
                <a href="{{ route('panel.asistente') }}" class="btn btn-dark">
                    <i class="fa-solid fa-house me-2"></i>Volver al panel
                </a>
            @else
                <a href="{{ route('panel.admin') }}" class="btn btn-dark">
                    <i class="fa-solid fa-house me-2"></i>Volver al panel
                </a>
            @endif
        </div>
    </div>
</div>
@endsection