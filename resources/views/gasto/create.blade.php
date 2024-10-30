<x-app-layout>
    <x-slot name="header">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <h1 class="text-primary fw-bold mb-3 mb-md-0" style="font-size: 18px;">
                <i class="bi bi-currency-exchange me-2"></i> Creación de Nuevo gasto
            </h1>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-body p-4">
                            <form method="post" action="{{ route('gasto.store') }}">
                                @csrf
                                @method('post')

                                <!-- Campo Descripción -->
                                <div class="form-group mb-4">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <input id="descripcion" name="descripcion" type="text" class="form-control" required>
                                </div>

                                <!-- Campo Monto -->
                                <div class="form-group mb-4">
                                    <label for="monto" class="form-label">Monto</label>
                                    <input id="monto" name="monto" type="text" class="form-control" required>
                                </div>

                                
                                <!-- Campo Referencia -->
                                <div class="form-group mb-4">
                                    <label for="referencia" class="form-label">Referencia</label>
                                    <input id="referencia" name="referencia" type="text" class="form-control" placeholder="Ingrese el número de factura o recibo">
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
