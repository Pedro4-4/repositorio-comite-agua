<x-app-layout>
    <x-slot name="header">
        <div class="">
            <h1 style="font-size: 18px; color: rgb(32, 32, 184); font-weight: bold;">
                <i class="bi bi-file-earmark-plus-fill me-2"></i> Información del Contador
            </h1>
        </div>
    </x-slot>

    <div class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="card shadow-lg border-0 rounded-lg">
                        <div class="card-body p-4">
                            <form class="mt-6 space-y-6">
                                
                                <!-- Cliente -->
                                <div class="form-group mb-4">
                                    <label for="cliente" class="form-label">Cliente</label>
                                    <input type="text" class="form-control" value="{{$cliente->nombre}} {{$cliente->apellido}}" id="cliente" name="cliente" disabled>
                                </div>


                                <div class="form-group mb-4">
                                    <label for="direccion" class="form-label">Dirección</label>
                                    <input type="text" class="form-control" value="{{ $contador->direccion }}" id="direccion" name="direccion" disabled>
                                </div>

                                <!-- Precio -->
                                <div class="form-group mb-4">
                                    <label for="precio" class="form-label">Precio</label>
                                    <input type="text" class="form-control" value="{{ $precio->monto }}" id="precio" name="precio" disabled>
                                </div>

                                <!-- Código -->
                                <div class="form-group mb-4">
                                    <label for="codigo" class="form-label">Código</label>
                                    <input type="text" class="form-control" value="{{ $ultimoCliente }}" id="codigo" name="codigo" disabled>
                                </div>

                                <!-- Botón Regresar -->
                                <div class="d-grid gap-2">
                                    <a type="button" href="{{ route('contador.index') }}" class="btn btn-primary btn-block">
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
