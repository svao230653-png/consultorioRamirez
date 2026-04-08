<div class="mt-4 d-flex gap-2 flex-wrap">
    <button type="submit" class="btn btn-success">
        <i class="fa-solid fa-rotate me-2"></i>Actualizar
    </button>

    <a href="{{ route('citas.index') }}" class="btn btn-secondary">
        <i class="fa-solid fa-list me-2"></i>Ver citas
    </a>

    @if(session('rol') === 'asistente')
        <a href="{{ route('panel.asistente') }}" class="btn btn-dark">
            <i class="fa-solid fa-house me-2"></i>Volver al panel
        </a>
    @else
        <a href="{{ route('panel.admin') }}" class="btn btn-dark">
            <i class="fa-solid fa-house me-2"></i>Volver al panel
        </a>
    @endif
</div>