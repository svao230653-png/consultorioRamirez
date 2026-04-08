@extends('layouts.app')

@section('title', 'Pacientes')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <div>
        <h2 class="fw-bold mb-1">
            <i class="fa-solid fa-user-injured me-2 text-success"></i>CRUD de Pacientes
        </h2>
        <p class="text-muted mb-0">Administración general de pacientes del sistema</p>
    </div>

    <div class="d-flex gap-2 flex-wrap">
        <a href="{{ route('panel.admin') }}" class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left me-2"></i>Volver al panel
        </a>

        <a href="{{ route('pacientes.create') }}" class="btn btn-success">
            <i class="fa-solid fa-user-plus me-2"></i>Nuevo paciente
        </a>
    </div>
</div>

<div class="card content-card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-success">
                    <tr>
                        <th>ID</th>
                        <th>Nombre completo</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Sexo</th>
                        <th>Fecha Nacimiento</th>
                        <th width="220">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pacientes as $paciente)
                        <tr>
                            <td>{{ $paciente->id }}</td>
                            <td>
                                {{ $paciente->nombre }}
                                {{ $paciente->apellido_paterno }}
                                {{ $paciente->apellido_materno }}
                            </td>
                            <td>{{ $paciente->telefono ?? 'Sin dato' }}</td>
                            <td>{{ $paciente->email ?? 'Sin dato' }}</td>
                            <td>{{ $paciente->sexo ?? 'Sin dato' }}</td>
                            <td>{{ $paciente->fecha_nacimiento ?? 'Sin dato' }}</td>
                            <td>
                                <div class="d-flex gap-2 flex-wrap">
                                    <a href="{{ route('pacientes.show', $paciente->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>

                                    <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este paciente?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No hay pacientes registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $pacientes->onEachSide(1)->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection