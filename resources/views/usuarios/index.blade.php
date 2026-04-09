@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <div>
        <h2 class="fw-bold mb-1">
            <i class="fa-solid fa-users me-2 text-success"></i>CRUD de Usuarios
        </h2>
        <p class="text-muted mb-0">Administración general de usuarios del sistema</p>
    </div>

    <div class="d-flex gap-2 flex-wrap">
        <a href="{{ route('panel.admin') }}" class="btn btn-secondary">
            <i class="fa-solid fa-arrow-left me-2"></i>Volver al panel
        </a>

        <a href="{{ route('usuarios.create') }}" class="btn btn-success">
            <i class="fa-solid fa-user-plus me-2"></i>Nuevo usuario
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
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Fecha Nacimiento</th>
                        <th>Rol</th>
                        <th width="220">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->nombre }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->telefono ?? 'Sin dato' }}</td>
                            <td>{{ $usuario->fecha_nacimiento ?? 'Sin dato' }}</td>
                            <td>
                                @if($usuario->rol == 'administrador')
                                    <span class="badge bg-danger">Administrador</span>
                                @elseif($usuario->rol == 'asistente')
                                    <span class="badge bg-warning text-dark">Asistente</span>
                                @else
                                    <span class="badge bg-info text-dark">Doctor</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-2 flex-wrap">
                                    <a href="{{ route('usuarios.show', $usuario->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>

                                    <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>

                                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este usuario?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                        @if(session('rol') === 'administrador')
                                    <form action="{{ route('usuarios.enviarAviso', $usuario->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <input type="hidden" name="mensaje_correo" value="Te informamos que el sistema del Consultorio Dental Ramírez tiene nuevas actualizaciones y avisos importantes.">
                                        <button type="submit" class="btn btn-sm btn-info" onclick="return confirm('¿Enviar aviso al usuario?')">
                                            <i class="fa-solid fa-envelope"></i>
                                        </button>
                                    </form>
                                @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No hay usuarios registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $usuarios->onEachSide(1)->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection