<x-app-layout>
    <x-slot name="header">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <h1 class="text-primary fw-bold mb-3 mb-md-0" style="font-size: 18px;">
                <i class="bi bi-pencil-fill me-2"></i> Editar información de Usuario
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
                            <h2 class="text-lg font-medium text-gray-900 mb-4">Editar información de usuario - Servicio Agua Potable</h2>

                            <form method="POST" action="{{ route('cliente.update') }}">
                                @csrf
                                @method('PATCH')

                                <input type="hidden" name="id" value="{{ $cliente->id }}">

                                <!-- Nombre -->
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" value="{{ $cliente->nombre }}" id="nombre" name="nombre" required>
                                </div>

                                <!-- Apellido -->
                                <div class="mb-3">
                                    <label for="apellido" class="form-label">Apellido</label>
                                    <input type="text" class="form-control" value="{{ $cliente->apellido }}" id="apellido" name="apellido" required>
                                </div>

                                <!-- DPI -->
                                <div class="mb-3">
                                    <label for="dpi" class="form-label">No. DPI</label>
                                    <input type="text" class="form-control" value="{{ $cliente->dpi }}" id="dpi" name="dpi" required>
                                </div>

                                <!-- Teléfono -->
                                <div class="mb-3">
                                    <label for="telefono" class="form-label">No. Teléfono</label>
                                    <input type="text" class="form-control" value="{{ $cliente->telefono }}" id="telefono" name="telefono" required>
                                </div>

                                <!-- Dirección -->
                                <div class="mb-3">
                                    <label for="direccion" class="form-label">Dirección</label>
                                    <input type="text" class="form-control" value="{{ $cliente->direccion }}" id="direccion" name="direccion" required>
                                </div>

                                <!-- Sector -->
                                <div class="mb-3">
                                    <label for="sector" class="form-label">Sector</label>
                                    <select name="sector" class="form-select" required>
                                        @foreach ($sectores as $sector)
                                            <option value="{{ $sector->id }}" {{ $sector->id == $cliente->sector_id ? 'selected' : '' }}>{{ $sector->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Observaciones -->
                                <div class="mb-3">
                                    <label for="observacion" class="form-label">Observaciones</label>
                                    <input type="text" class="form-control" value="{{ $cliente->observacion }}" id="observacion" name="observacion" required>
                                </div>

                                <!-- Botón Guardar -->
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        <i class="bi bi-save me-1"></i> Guardar
                                    </button>
                                </div>

                                <!-- Mensaje de éxito -->
                                @if (session('status') === 'profile-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-success mt-3"
                                    >Información actualizada correctamente.</p>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
