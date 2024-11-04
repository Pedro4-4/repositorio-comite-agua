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
                                    <label for="cliente" class="form-label">Usuario</label>
                                    <input type="text" class="form-control" value="{{$cliente->nombre}} {{$cliente->apellido}}" id="cliente" name="cliente" disabled>
                                </div>

                              <!-- Contador direccion-->
                                <div class="form-group mb-4">
                                    <label for="contador" class="form-label">Dirección del contador</label>
                                    <input type="text" class="form-control" value="{{ $contador->direccion}}" id="contador" name="contador" disabled>
                                </div>

                                <!-- Contador codigo-->
                                <div class="form-group mb-4">
                                    <label for="contador" class="form-label">Código del contador</label>
                                    <input type="text" class="form-control" value="{{$ultimoCliente}}" id="contador" name="contador" disabled>
                                </div>

                                <!-- Fecha de lectura --> 
                                <div class="form-group mb-4">
                                    <label for="created_at" class="form-label">Fecha y hora de la lectura</label>
                                    <input type="text" class="form-control" value="{{ $lectura->created_at->format('d/m/Y H:i') }}" id="created_at" name="created_at" disabled>
                                </div>

                                <!-- Estado --> 
                                <div class="form-group mb-4">
                                    <label for="estado" class="form-label">Estado</label>
                                    <input type="text" class="form-control" value="{{ $lectura->estado == 1 ? 'Pagado' : 'Pendiente'}}" id="estado" name="estado" disabled>
                                </div>


                                <!-- Lectura actual -->
                                <div class="form-group mb-4">
                                <label for="lectura_actual" class="form-label">Lectura actual</label>
                                <input type="text" class="form-control" value="{{ $lectura->lectura_actual}}"  id="lectura_actual" name="lectura_actual"disabled>
                                </div>

                                <!-- Lectura anterior -->
                                <div class="form-group mb-4">
                                    <label for="lectura_anterior" class="form-label">Lectura anterior</label>
                                    <input type="text" class="form-control" value="{{ $lectura->lectura_anterior}}"  id="lectura_anterior" name="lectura_anterior"disabled>
                                </div>

                                <!-- Monto -->
                                <div class="form-group mb-4">
                                    <label for="monto" class="form-label">Monto</label>
                                    <input type="text" class="form-control" value="{{ $lectura->monto }}" id="monto" name="monto" disabled>
                                </div>

                                <!-- Nota -->
                                <div class="form-group mb-4">
                                    <label for="nota" class="form-label">Nota</label>
                                    <input type="text" class="form-control" value="{{ $lectura->nota}}"  id="nota" name="nota"disabled>
                                </div>
                                
                                <!-- Precio -->
                                <div class="form-group mb-4">
                                    <label for="precio" class="form-label">Precio</label>
                                    <input type="text" class="form-control" value="Q{{ $precio->monto }}" id="precio" name="precio" disabled>
                                </div>

                                <!-- Canon mensual -->
                                <div class="form-group mb-4">
                                    <label for="canon_mensual" class="form-label">Canon mensual</label>
                                    <input type="text" class="form-control" value="{{ $lectura->canon_mensual }}" id="canon_mensual" name="canon_mensual" disabled>
                                </div>

                                 <!-- valor exceso -->
                                 {{-- <div class="form-group mb-4">
                                    <label for="valor_exceso" class="form-label">Valor exceso</label>
                                    <input type="text" class="form-control" value="{{ $lectura->valor_exceso}}"  id="valor_exceso" name="valor_exceso"disabled>
                                </div> --}}

                                 <!-- total -->
                                 <div class="form-group mb-4">
                                    <label for="total" class="form-label">Total</label>
                                    <input type="text" class="form-control" value="{{ $lectura->total}}"  id="total" name="total"disabled>
                                </div>

                                 

                               
                                <!-- Botón Regresar -->
                                <div class="d-grid gap-2">
                                    <a type="button" href="{{ route('lectura.index') }}" class="btn btn-primary btn-block">
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
