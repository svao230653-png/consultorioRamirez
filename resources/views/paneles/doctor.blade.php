@extends('layouts.app')

@section('title', 'Panel Doctor')

@section('content')
<div class="row g-4">
    <div class="col-lg-3">
        <div class="card sidebar-card">
            <div class="card-body">
                <h4 class="fw-bold text-success mb-3">
                    <i class="fa-solid fa-user-doctor me-2"></i>Doctor
                </h4>

                <div class="list-group">
                    <a href="{{ route('panel.doctor') }}" class="list-group-item list-group-item-action active">
                        <i class="fa-solid fa-table-columns me-2"></i>Panel general
                    </a>
                    <a href="{{ route('citas.index') }}" class="list-group-item list-group-item-action">
                        <i class="fa-solid fa-calendar-check me-2"></i>Mis citas
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
                <h2 class="fw-bold mb-2">Bienvenido, Dr. {{ session('nombre') }}</h2>
                <p class="text-muted mb-0">
                    Como <strong>doctor</strong>, aquí puedes consultar únicamente las citas que tienes asignadas.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-8">
                <div class="card content-card h-100">
                    <div class="card-body">
                        <h5 class="text-success">
                            <i class="fa-solid fa-calendar-day me-2"></i>Ver mis citas
                        </h5>
                        <p class="text-muted">
                            Revisa tus citas programadas, pacientes asignados, fecha, hora y estado de cada consulta.
                        </p>
                        <a href="{{ route('citas.index') }}" class="btn btn-success btn-sm">Entrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection