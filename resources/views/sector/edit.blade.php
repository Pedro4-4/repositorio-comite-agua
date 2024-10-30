<x-app-layout>
    <x-slot name="header">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <h1 class="text-primary fw-bold mb-3 mb-md-0" style="font-size: 18px;">
                <i class="bi bi-pencil-fill me-2"></i> Actualización de Sector
            </h1>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-body p-4">
                            <form method="POST" action="{{ route('sector.update') }}">
                                @csrf
                                @method('PATCH')

                                <!-- Campo oculto para el ID del sector -->
                                <input type="hidden" name="id" value="{{ $sector->id }}">

                                <!-- Campo de nombre -->
                                <div class="form-group mb-4">
                                    <label for="nombre" class="form-label">Nombre del Sector</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $sector->nombre }}" required>
                                </div>

                                <!-- Botón de actualizar -->
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <i class="bi bi-save me-1"></i> Actualizar
                                    </button>
                                </div>

                                <!-- Mensaje de éxito -->
                                @if (session('status') === 'profile-updated')
                                    <div class="alert alert-success mt-4">
                                        {{ __('Sector actualizado correctamente.') }}
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
