<x-app-layout>
    <x-slot name="header">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <h1 class="text-primary fw-bold mb-3 mb-md-0" style="font-size: 18px;">
                <i class="bi bi-person-plus-fill me-2"></i> Creación de Nuevo Usuario
            </h1>
            <a href="{{ route('cliente.index') }}" class="btn btn-secondary">
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
                            <h2 class="text-lg font-medium text-gray-900 mb-4">Creación de Nuevo Usuario</h2>

                            <form method="post" action="{{ route('cliente.store') }}">
                                @csrf

                                <!-- Nombre -->
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input id="nombre" name="nombre" type="text" class="form-control" required>
                                </div>

                                <!-- Apellido -->
                                <div class="mb-3">
                                    <label for="apellido" class="form-label">Apellido</label>
                                    <input id="apellido" name="apellido" type="text" class="form-control" required>
                                </div>

                                <!-- DPI -->
                                <div class="mb-3">
                                    <label for="dpi" class="form-label">No. DPI</label>
                                    <input id="dpi" name="dpi" type="text" class="form-control">
                                </div>

                                <!-- Teléfono -->
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">No. Teléfono</label>
                                    <input id="telefono" name="telefono" type="text" class="form-control">
                                </div>

                                <!-- Dirección -->
                                <div class="mb-3">
                                    <label for="direccion" class="form-label">Dirección</label>
                                    <input id="direccion" name="direccion" type="text" class="form-control" >
                                </div>

                                <!-- Observaciones -->
                                <div class="mb-3">
                                    <label for="observacion" class="form-label">Observaciones</label>
                                    <input id="observacion" name="observacion" type="text" class="form-control" >
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
