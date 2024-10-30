<x-app-layout>
    

     <div style="padding-top: 50px; padding-left: 50px; padding-right: 50px" class="row">

    <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img style="width: 150px;margin-left: 9.0em;" src="{{ asset('images/profile.png') }}" alt="Imagen de perfil" alt="profile" 
              class="rounded-circle img-fluid" >
              
            <h5 class="my-3">{{ $cliente->nombre . ' ' . $cliente->apellido }}</h5>
            <p class="text-muted mb-1">ESTADO ACTIVO-INACTIVO</p>
            <p class="text-muted mb-4">MORA</p>
           
          </div>
        </div>   

        <div class="card mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Nombre</p>
                </div>
                <div class="col-sm-9">
                <p class="text-muted mb-0">{{ $cliente->nombre . ' ' . $cliente->apellido }}</p>

                  </BR>
                </div>
              </div>
              <hr>
              <div class="row">
                <div style="padding-top: 15px; padding-bottom:15px" class="col-sm-3">
                  <p class="mb-0">No. DPI</p>
                </div>
                <div style="padding-top: 15px; padding-bottom:15px" class="col-sm-9">
                  <p class="text-muted mb-0">{{ $cliente->dpi }}</p>
           
                </div>
              </div>
              <hr>
              <div class="row">
                <div style="padding-top: 15px; padding-bottom:15px" class="col-sm-3">
                  <p class="mb-0">Telefono</p>
                </div>
                <div style="padding-top: 15px; padding-bottom:15px" class="col-sm-9">
                  <p class="text-muted mb-0">{{$cliente->telefono}}</p>
              
                </div>
              </div>
              <hr>
              <div class="row">
                <div style="padding-top: 15px; padding-bottom:15px" class="col-sm-3">
                  <p class="mb-0">Direccion</p>
                </div>
                <div style="padding-top: 15px; padding-bottom:15px" class="col-sm-9">
                  <p class="text-muted mb-0">{{$cliente->direccion}}</p>
                </div>
              </div>
              
              <hr>
              <div class="row">
                <div style="padding-top: 15px; padding-bottom:15px" class="col-sm-3">
                  <p class="mb-0">Sector</p>
                </div>
                <div style="padding-top: 15px; padding-bottom:15px" class="col-sm-9">
               <p class="text-muted mb-0"> {{$cliente->contadores->first ()->sector->nombre}} {{--</p> se puso asi para mostrar la relacion entre el cliente y el sector y que muestre solo el nombre del sector --}}
                 

                </div>
              </div>
            <hr>
              <div class="row">
                <div style="padding-top: 15px; padding-bottom:15px" class="col-sm-4">
                  <p class="mb-0">Observacion</p>
                </div>
                <div style="padding-top: 15px; padding-bottom:15px" class="col-sm-8">
                  <p class="text-muted mb-0">{{ $cliente->observacion }}</p>
              
                </div>
                
            </div>
            
          </div>
          
          <a href="{{ route('cliente.index') }}" class="btn btn-primary w-100">
            <i class="bi bi-arrow-left me-1"></i> Regresar
        </a>
    </div>
    
  
  
                 
        </div>
        <div class="col-lg-8">
          <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
          <div class="table-responsive-sm">
            <table class="table table-hover table-striped align-middle">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Lectura Anterior</th>
                        <th scope="col">Lectura Actual</th>
                        <th scope="col">Monto</th>
                        <th scope="col">Canon Mensual</th>
                        <th scope="col">Valor Exceso</th>
                        <th scope="col">Nota</th>
                        <th scope="col">Total</th>
                        <th scope="col">Fecha</th>
                        <th scope="col" class="text-center">Acciones</th>                     
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cliente->contadores->first()->lecturas as $lectura) 
                        <tr>
                            <td>{{ $lectura->id }}</td>
                    
                            <td>{{ $lectura->precio->monto }}</td>
                            <td>{{ $lectura->lectura_anterior }}</td>
                            <td>{{ $lectura->lectura_actual }}</td>
                            <td>{{ $lectura->monto }}</td>
                            @if($lectura->canon_mensual == 0 )
                            <td></td>
                            @else
                            <td>{{$lectura->canon_mensual}}</td>
                            @endif
                            <td>{{ $lectura->valor_exceso }}</td>
                            <td>{{ $lectura->nota }}</td>
                            <td>{{ $lectura->total }}</td>
                            <td>{{ $lectura->created_at->format('d/m/Y H:i:s') }}</td>
                            <td class="text-center">
                                @include('lectura.partials.opciones')
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>
        </div>
    <div class="py-12">
                                             
                        </form>
                    </section>
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
    
