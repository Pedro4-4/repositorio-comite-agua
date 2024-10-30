<x-app-layout>
    <x-slot name="header">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <h1 class="text-primary fw-bold mb-3 mb-md-0" style="font-size: 18px;">
                <i class="bi bi-currency-exchange me-2"></i> Información del Precio
            </h1>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-body p-4">
                            <form class="mt-6">
                                <!-- Campo ID -->
                                <div class="form-group mb-4">
                                    <label for="id" class="form-label">ID</label>
                                    <input type="text" class="form-control" id="id" name="id" value="{{ $precio->id }}" required disabled>
                                </div>

                                <!-- Campo Descripción -->
                                <div class="form-group mb-4">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ $precio->descripcion }}" required disabled>
                                </div>

                                <!-- Campo Monto -->
                                <div class="form-group mb-4">
                                    <label for="monto" class="form-label">Monto</label>
                                    <input type="text" class="form-control" id="monto" name="monto" value="{{ $precio->monto }}" required disabled>
                                </div>

                                <!-- Campo Responsable -->
                                <div class="form-group mb-4">
                                    <label for="responsable" class="form-label">Responsable</label>
                                    <input type="text" class="form-control" id="responsable" name="responsable" value="{{ $precio->usuario->name }}" required disabled>
                                </div>

                                <!-- Botón Regresar -->
                                <div class="d-grid gap-2">
                                    <a href="{{ route('precio.index') }}" class="btn btn-primary btn-block">
                                        Regresar
                                    </a>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
