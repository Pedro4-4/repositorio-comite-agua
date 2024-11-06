<x-app-layout>
  <div class="container py-4">
      <div class="row g-4">
          <!-- Perfil del Cliente -->
          <div class="col-lg-4">
              <div class="card mb-4">
                  <div class="card-body text-center">
                      <img src="{{ asset('images/profile.png') }}" alt="Imagen de perfil" class="rounded-circle img-fluid" style="width: 150px; margin-left: 7.0em;">
                      <h5 class="my-3">{{ $cliente->nombre . ' ' . $cliente->apellido }}</h5>
                      @if($cliente->estado == 1)
                      <td><span class="badge bg-primary text-dark">Inactivo</span></td>
                      @else
                      <td> <span class="badge bg-success text-dark">Activo</span></td>
                      @endif
                      {{-- s --}}
                  </div>
              </div>

              <div class="card mb-4">
                  <div class="card-body">
                      @php
                          $clienteInfo = [
                              'Nombre' => $cliente->nombre . ' ' . $cliente->apellido,
                              'No. DPI' => $cliente->dpi,
                              'Teléfono' => $cliente->telefono,
                              'Dirección' => $cliente->direccion,
                              'Sector' => $cliente->contadores->first()->sector->nombre,
                              'Observación' => $cliente->observacion
                          ];
                      @endphp
                      @foreach ($clienteInfo as $label => $value)
                          <div class="row mb-3">
                              <div class="col-sm-4">
                                  <p class="mb-0 fw-bold">{{ $label }}</p>
                              </div>
                              <div class="col-sm-8">
                                  <p class="text-muted mb-0">{{ $value }}</p>
                              </div>
                          </div>
                          @if (!$loop->last)
                              <hr>
                          @endif
                      @endforeach


                  </div>
                  <a href="{{ route('cliente.index') }}" class="btn btn-primary w-100">
                      <i class="bi bi-arrow-left me-1"></i> Regresar
                  </a>
              </div>
          </div>
          
     
          <div class="col-lg-8">
            <div class="card shadow-sm">
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-hover table-striped align-middle text-center">
                          <thead class="table-dark">
                              <tr>                               
                                  <th scope="col">SALDO TOTAL</th>
                                  {{-- <th scope="col">TOTAL ABONADO</th>                                  --}}
                              </tr>
                          </thead>
                          <tbody>
                            <td>{{ $cliente->contadores->first()->lecturas_sum ? $cliente->contadores->first()->lecturas_sum->saldo : 0 }}</td>
                            {{-- <td>{{ $cliente->contadores->first()->lecturas_sum_pagadas ? $cliente->contadores->first()->lecturas_sum_pagadas->total : 0 }}</td> --}}
                            
                          </tbody>
                      </table>
                  </div>
                </div>
              </div>
              <div class="card shadow-sm">
                  <div class="card-body">
                      <div class="table-responsive">
                          <table class="table table-hover table-striped align-middle text-center">
                              <thead class="table-dark">
                                  <tr>
                                      <th scope="col">No.</th>
                                      {{-- <th scope="col">Precio</th>  Se oculto para no cargar mas la table de info--}}
                                      <th scope="col">Lectura Anterior</th>
                                      <th scope="col">Lectura Actual</th>
                                      <th scope="col">Consumo</th> {{--Se le cambio el titulo de la tabla para que entiendan mejor --}}
                                      <th scope="col">Canon Mensual</th>

                                      <th scope="col">Cobro Mensual</th>
                                      <th scope="col">Abono</th>
                                      <th scope="col">Saldo</th>
                                    
                                      <th scope="col">Nota</th>
                                      <th scope="col">Fecha</th>
                                      <th scope="col" class="text-center">Acciones</th>
                                  </tr>
                              </thead>
                              <tbody>
                                
                                  @foreach ($lecturas as $lectura)
                                      <tr>
                                          <td>{{ $lectura->id }}</td>
                                          {{-- <td>{{ $lectura->precio->monto }}</td> --}}
                                          <td>{{ $lectura->lectura_anterior }}m³</td>
                                          <td>{{ $lectura->lectura_actual }}m³</td>
                                          <td>{{ $lectura->monto }}m³</td>
                                             {{-- Canon mensual  --}}
                                        @if($lectura->canon_mensual == 0 )      
                                        <td class="text-center">-</td>                            
                                        @else                                   
                                        <td>Q {{$lectura->canon_mensual}}</td>  
                                        @endif
                                          <td>Q{{ $lectura->total }}</td> 
                                          <td>{{ $lectura->abono }}</td>
                                          <td>{{ $lectura->saldo }}</td> 
                                          <td>{{ $lectura->nota }}</td>
                                          <td>{{ $lectura->created_at->format('d/m/Y H:i') }}</td>
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
  </div>
</x-app-layout>

<script>
  $('#selectCliente').select2({
      theme: "bootstrap-5",
      width: '100%',
      placeholder: $(this).data('placeholder'),
  });
</script>
