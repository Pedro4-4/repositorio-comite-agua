<x-app-layout>
  <x-slot name="header">
      <div class="">
        <h1 style="font-size: 18px; color: rgb(32, 32, 184); font-weight: bold;">
          <i class="bi bi-file-earmark-plus-fill me-2"></i> Creación de Nuevo Contador
      </h1>
      
      
      </div>
  </x-slot>

  <div class="py-5 bg-light">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-8 col-lg-6">
                  <div class="card shadow-lg border-0 rounded-lg">
                                     
                  
                      <div class="card-body p-4">
                          <form method="post" action="{{ route('contador.store') }}">
                              @csrf
                              @method('post')

                              <!-- Cliente -->
                              <div class="form-group mb-4">
                                  <label for="cliente_id" class="form-label">Cliente</label>
                                  <select name="cliente_id" id="cliente_id" class="form-select" required>
                                      <option value="" disabled selected>Seleccione el cliente</option>
                                      @foreach ($clientes as $cliente)
                                          <option value="{{$cliente->id}}">
                                              {{$cliente->nombre}} {{$cliente->apellido}} - {{$cliente->dpi}}
                                          </option>
                                      @endforeach
                                  </select>
                              </div>

                              <!-- Sector -->
                              <div class="form-group mb-4">
                                  <label for="sector" class="form-label">Sector</label>
                                  <select name="sector" class="form-select" required>
                                      <option value="" disabled selected>Seleccione el sector</option>
                                      @foreach ($sectores as $sector)
                                          <option value="{{$sector->id}}">{{$sector->nombre}}</option>
                                      @endforeach
                                  </select>
                              </div>

                              <!-- Dirección -->
                              <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input id="direccion" name="direccion" type="text" class="form-control" >
                            </div>

                              <!-- Precio -->
                              <div class="form-group mb-4">
                                  <label for="precio_monto" class="form-label">Precio</label>
                                  <input name="precio_monto" id="precio_monto" value="Q{{$precio->monto}}" type="text" class="form-control bg-light" disabled>
                                  <input name="precio_id" id="precio_id" value="{{$precio->id}}" type="hidden">
                              </div>

                              <!-- Código -->
                              <div class="form-group mb-4">
                                  <label for="codigo" class="form-label">Código</label>
                                  <input id="codigo" name="codigo" value="{{$ultimoCliente}}" type="text" class="form-control bg-light" disabled>
                              </div>

                              <!-- Botón Guardar -->
                              <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-block">
                                    <i class="bi bi-save me-1"></i> Guardar Contador
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


<script>
$( '#selectCliente' ).select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
} );

</script>