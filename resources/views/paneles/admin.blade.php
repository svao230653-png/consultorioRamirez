@extends('layouts.app')

@section('title', 'Panel Administrador')

@section('content')
<div class="row g-4">
    <div class="col-lg-3">
        <div class="card sidebar-card">
            <div class="card-body">
                <h4 class="fw-bold text-success mb-3">
                    <i class="fa-solid fa-hospital me-2"></i>Dashboard
                </h4>

                <div class="list-group">
                    <a href="{{ route('panel.admin') }}" class="list-group-item list-group-item-action active">
                        <i class="fa-solid fa-chart-line me-2"></i>Panel general
                    </a>
                    <a href="{{ route('usuarios.index') }}" class="list-group-item list-group-item-action">
                        <i class="fa-solid fa-users me-2"></i>Usuarios
                    </a>
                    <a href="{{ route('pacientes.index') }}" class="list-group-item list-group-item-action">
                        <i class="fa-solid fa-user-injured me-2"></i>Pacientes
                    </a>
                    <a href="{{ route('citas.index') }}" class="list-group-item list-group-item-action">
                        <i class="fa-solid fa-calendar-check me-2"></i>Citas
                    </a>
                </div>

                <form action="{{ route('logout') }}" method="POST" class="mt-4">
                    @csrf
                    <button class="btn btn-danger w-100">
                        <i class="fa-solid fa-right-from-bracket me-2"></i>Cerrar sesión
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-9">
        <div class="card content-card mb-4">
            <div class="card-body">
                <h2 class="fw-bold mb-2">Bienvenido, {{ session('nombre') }}</h2>
                <p class="text-muted mb-0">
                    Este es el panel principal de <strong>Consultorio Dentista Ramírez</strong>.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card content-card h-100">
                    <div class="card-body">
                        <h5 class="text-success"><i class="fa-solid fa-users me-2"></i>Usuarios</h5>
                        <p class="text-muted">Administra administradores, asistentes y doctores.</p>
                        <a href="{{ route('usuarios.index') }}" class="btn btn-success btn-sm">Entrar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card content-card h-100">
                    <div class="card-body">
                        <h5 class="text-success"><i class="fa-solid fa-user-injured me-2"></i>Pacientes</h5>
                        <p class="text-muted">Gestiona el registro y control de pacientes.</p>
                        <a href="{{ route('pacientes.index') }}" class="btn btn-success btn-sm">Entrar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card content-card h-100">
                    <div class="card-body">
                        <h5 class="text-success"><i class="fa-solid fa-calendar-check me-2"></i>Citas</h5>
                        <p class="text-muted">Controla horarios y seguimiento de citas.</p>
                        <a href="{{ route('citas.index') }}" class="btn btn-success btn-sm">Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
            <div class="card content-card h-100">
                <div class="card-body">
                    <h5 class="text-success">
                        <i class="fa-solid fa-database me-2"></i>Respaldo BD
                    </h5>
                    <p class="text-muted">Crea y restaura copias de seguridad de la base de datos.</p>
                   <a href="/admin/backup" class="btn btn-success btn-sm">Entrar</a>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection