@extends('layouts.app')

@section('title', 'Panel Asistente')

@section('content')
<div class="row g-4">
    <div class="col-lg-3">
        <div class="card sidebar-card">
            <div class="card-body">
                <h4 class="fw-bold text-success mb-3">
                    <i class="fa-solid fa-user-nurse me-2"></i>Asistente
                </h4>

                <div class="list-group">
                    <a href="{{ route('panel.asistente') }}" class="list-group-item list-group-item-action active">
                        <i class="fa-solid fa-table-columns me-2"></i>Panel general
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
                    Como <strong>asistente</strong>, desde aquí puedes registrar, editar y administrar las citas del consultorio.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="card content-card h-100">
                    <div class="card-body">
                        <h5 class="text-success">
                            <i class="fa-solid fa-calendar-plus me-2"></i>Registrar cita
                        </h5>
                        <p class="text-muted">Agrega una nueva cita para un paciente con su doctor correspondiente.</p>
                        <a href="{{ route('citas.create') }}" class="btn btn-success btn-sm">Entrar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card content-card h-100">
                    <div class="card-body">
                        <h5 class="text-success">
                            <i class="fa-solid fa-calendar-days me-2"></i>Administrar citas
                        </h5>
                        <p class="text-muted">Consulta, actualiza y organiza las citas registradas en el sistema.</p>
                        <a href="{{ route('citas.index') }}" class="btn btn-success btn-sm">Entrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection