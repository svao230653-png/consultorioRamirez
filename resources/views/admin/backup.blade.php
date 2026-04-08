@extends('layouts.app')

@section('title', 'Respaldo y Restauración')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
    <div>
        <h2 class="fw-bold mb-1">
            <i class="fa-solid fa-database me-2 text-success"></i>Respaldo y Restauración
        </h2>
        <p class="text-muted mb-0">Administración de copias de seguridad de la base de datos</p>
    </div>

    <a href="{{ route('panel.admin') }}" class="btn btn-secondary">
        <i class="fa-solid fa-arrow-left me-2"></i>Volver al panel
    </a>
</div>

<div class="row g-4">
    <div class="col-md-6">
        <div class="card content-card h-100">
            <div class="card-body">
                <h4 class="text-success mb-3">
                    <i class="fa-solid fa-download me-2"></i>Crear respaldo
                </h4>
                <p class="text-muted">
                    Genera una copia de seguridad completa de la base de datos en formato SQL.
                </p>

                <a href="/admin/backup/create" class="btn btn-success">
                    <i class="fa-solid fa-floppy-disk me-2"></i>Descargar respaldo
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card content-card h-100">
            <div class="card-body">
                <h4 class="text-primary mb-3">
                    <i class="fa-solid fa-upload me-2"></i>Restaurar respaldo
                </h4>
                <p class="text-muted">
                    Sube un archivo SQL para restaurar la información de la base de datos.
                </p>

                <form action="/admin/backup/restore" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Selecciona archivo SQL</label>
                        <input type="file" name="archivo_sql" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-rotate-left me-2"></i>Restaurar base de datos
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection