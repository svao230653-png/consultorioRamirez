@extends('layouts.app')

@section('title', 'Citas')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <div>
        <h2 class="fw-bold mb-1">
            <i class="fa-solid fa-calendar-check me-2 text-success"></i>
            @if(session('rol') === 'doctor')
                Mis citas
            @else
                CRUD de Citas
            @endif
        </h2>
        <p class="text-muted mb-0">
            @if(session('rol') === 'doctor')
                Consulta de citas asignadas al doctor
            @else
                Administración general de citas del sistema
            @endif
        </p>
    </div>

    <div class="d-flex gap-2 flex-wrap">
        @if(session('rol') === 'doctor')
            <a href="{{ route('panel.doctor') }}" class="btn btn-secondary">
                <i class="fa-solid fa-arrow-left me-2"></i>Volver al panel
            </a>
        @elseif(session('rol') === 'asistente')
            <a href="{{ route('panel.asistente') }}" class="btn btn-secondary">
                <i class="fa-solid fa-arrow-left me-2"></i>Volver al panel
            </a>
        @else
            <a href="{{ route('panel.admin') }}" class="btn btn-secondary">
                <i class="fa-solid fa-arrow-left me-2"></i>Volver al panel
            </a>
        @endif

        @if(session('rol') !== 'doctor')
            <a href="{{ route('citas.create') }}" class="btn btn-success">
                <i class="fa-solid fa-calendar-plus me-2"></i>Nueva cita
            </a>
        @endif
    </div>
</div>

<div class="card content-card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-success">
                    <tr>
                        <th>ID</th>
                        <th>Paciente</th>
                        <th>Doctor</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Motivo</th>
                        <th>Estado</th>
                        <th width="220">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($citas as $cita)
                        <tr>
                            <td>{{ $cita->id }}</td>
                            <td>
                                {{ $cita->paciente->nombre ?? 'Sin paciente' }}
                                {{ $cita->paciente->apellido_paterno ?? '' }}
                            </td>
                            <td>{{ $cita->doctor->nombre ?? 'Sin doctor' }}</td>
                            <td>{{ $cita->fecha }}</td>
                            <td>{{ $cita->hora }}</td>
                            <td>{{ $cita->motivo }}</td>
                            <td>
                                @if($cita->estado == 'pendiente')
                                    <span class="badge bg-warning text-dark">Pendiente</span>
                                @elseif($cita->estado == 'confirmada')
                                    <span class="badge bg-primary">Confirmada</span>
                                @elseif($cita->estado == 'cancelada')
                                    <span class="badge bg-danger">Cancelada</span>
                                @else
                                    <span class="badge bg-success">Completada</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2 flex-wrap">
                                    <a href="{{ route('citas.show', $cita->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>

                                    @if(session('rol') !== 'doctor')
                                        <a href="{{ route('citas.edit', $cita->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <form action="{{ route('citas.destroy', $cita->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta cita?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">No hay citas registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $citas->onEachSide(1)->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection