<div class="mt-4 d-flex gap-2 flex-wrap">
    @if(session('rol') !== 'doctor')
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