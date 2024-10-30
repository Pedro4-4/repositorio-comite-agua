<x-app-layout>
    <x-slot name="header">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <h1 class="text-primary fw-bold mb-3 mb-md-0" style="font-size: 18px;">
                <i class="bi bi-plus-circle-fill me-2"></i> Creación de Nuevo Sector
            </h1>
            <a href="{{ route('sector.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-1"></i> Regresar
            </a>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h2 class="text-lg font-medium text-gray-900 mb-4">Creación de Nuevo Sector</h2>

                            <form method="post" action="{{ route('sector.store') }}">
                                @csrf
                                @method('post')

                                <!-- Nombre del sector -->
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre del Sector</label>
                                    <input id="nombre" name="nombre" type="text" class="form-control" required>
                                </div>

                                <!-- Botón Guardar -->
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <i class="bi bi-save me-1"></i> Guardar
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
