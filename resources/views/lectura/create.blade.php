<x-app-layout>
  <x-slot name="header">
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
          <h1 class="text-primary fw-bold mb-3 mb-md-0" style="font-size: 18px;">
              <i class="bi bi-plus-circle-fill me-2"></i> Creación de Nueva Lectura
          </h1>
          <a href="{{ route('lectura.index') }}" class="btn btn-secondary">
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
                          

                          <form method="post" action="{{ route('lectura.store') }}">
                              @csrf
                              <div class="row">
                              <!-- Cliente -->
                              <div class="col-lg-6  col-xs-12  mb-3">
                                  <label for="cliente" class="form-label">Cliente</label>
                                  <select class="form-select" id="selectCliente" name="cliente_id" required>
                                      <option value="">Seleccione un cliente</option>
                                      @foreach ($clientes as $cliente)
                                          <option value="{{$cliente->id}}">{{$cliente->nombre}} {{$cliente->apellido}} - {{$cliente->dpi}}</option>
                                      @endforeach
                                  </select>
                              </div>

                              <!-- Contador -->
                              <div class="col-lg-6  col-xs-12   mb-3">
                                  <label for="contador" class="form-label">Contador</label>
                                  <select id="contador" name="contador" class="form-select" required>
                                      <option value="">Seleccione un contador</option>
                                  </select>
                              </div>


                           
                              <!-- Lectura actual -->
                              <div class="col-lg-6  col-xs-12 mb-3">
                                  <label for="lectura_actual" class="form-label">Lectura actual</label>
                                  <input id="lectura_actual" name="lectura_actual" type="text" class="form-control" placeholder="Ingrese la lectura actual" required>
                              </div>

                              <!-- Lectura anterior -->
                              <div class="col-lg-6  col-xs-12 mb-3">
                                  <label for="lectura_anterior" class="form-label">Lectura anterior</label>
                                  <input id="lectura_anterior" name="lectura_anterior" type="text" class="form-control" required>
                              </div>

                              <!-- Nota -->
                              <div class="col-lg-6  col-xs-12 mb-3">
                                <label for="nota" class="form-label">Nota</label>
                                <input id="nota" name="nota" type="text" class="form-control" placeholder="Si desea agregar una nota, ingresela aquí">
                            </div>

                            <!-- Abono -->
                            <div class="col-lg-6  col-xs-12 mb-3">
                                <label for="abono" class="form-label">Abono</label>
                                <input id="abono" name="abono" type="text" class="form-control">
                            </div>

                              <!-- Saldo -->
                              <div class="col-lg-6  col-xs-12 mb-3">
                                <label for="saldo" class="form-label">Saldo</label>
                                <input id="saldo" name="saldo" type="text" class="form-control" disabled>
                            </div>

                              <!-- Precio -->
                              <div class="col-lg-6  col-xs-12 mb-3">
                                  <label for="precio" class="form-label">Precio</label>
                                  <input name="precio" id="precio" value="Q{{$precio->monto}}" type="text" class="form-control bg-light" disabled>
                                  <input name="precio_id" id="precio_id" value="{{$precio->id}}" type="hidden">
                              </div>

                              <!-- Monto -->
                              <div class="col-lg-6  col-xs-12 mb-3">
                                  <label for="monto" class="form-label">Monto</label>
                                  <input id="monto" name="monto" type="text" class="form-control" required>
                              </div>

                              <!-- Canon mensual -->
                              <div class="col-lg-6  col-xs-12 mb-3">
                                  <label for="canon_mensual" class="form-label">Canon mensual</label>
                                  <input id="canon_mensual" name="canon_mensual" type="text" class="form-control" required>
                              </div>

                              <!-- Valor exceso -->
                              {{-- <div class="col-lg-6  col-xs-12 mb-3">
                                  <label for="valor_exceso" class="form-label">Valor exceso</label>
                                  <input id="valor_exceso" name="valor_exceso" type="text" class="form-control">
                              </div> --}}



                              <!-- Total -->
                              <div class="col-lg-6  col-xs-12 mb-3">
                                <label for="total" class="form-label">Total</label>
                                <input id="total" name="total" type="text"  class="bg-light form-control border border-5" style="border-color: rgb(2, 2, 30);" required>
                            </div>
                            
                            </div>
                            

                              <!-- Opciones de impresión -->
                              <h3>Seleccione el recibo que desea imprimir</h3>
                              <br>
                              <div class="mb-3">
                                  <div class="form-check">
                                      <input class="form-check-input" type="radio" name="tipo_recibo" id="recibo_cobro" value="0" required>
                                      <label class="form-check-label" for="recibo_cobro">
                                          Imprimir recibo de Cobro
                                      </label>
                                  </div>
                                  <div class="form-check">
                                      <input class="form-check-input" type="radio" name="tipo_recibo" id="recibo_pago" value="1" required>
                                      <label class="form-check-label" for="recibo_pago">
                                          Imprimir recibo de Pago
                                      </label>
                                  </div>
                              </div>

                            </div>
                              <!-- Botón Guardar -->
                              <div class="d-grid gap-2">
                                  <button type="submit" id="guardar" class="btn btn-primary btn-block">
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

<script>
$( '#selectCliente' ).select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
} );
$( '#contador' ).select2( {
    theme: "bootstrap-5",
    width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
    placeholder: $( this ).data( 'placeholder' ),
} );


        $(document).ready(function(){

          $('#lectura_actual').on('input', function() {
                
                var anterior = parseFloat($('#lectura_anterior').val()); 
                var actual = parseFloat($('#lectura_actual').val()); 
                var precio = parseFloat('{{$precio->monto}}');

                $('#canon_mensual').val(0);
              $('#valor_exceso').val(0);
              $('#monto').val(0);
              $('#total').val(0);
              

              !isNaN(anterior) && !isNaN(actual)
              var resultado = actual - anterior;
              console.log(resultado)
              var total = resultado * precio;  
              $('#monto').val(resultado)
              $('#total').val(total);
              
                // if (!isNaN(anterior) && !isNaN(actual)) {
                   
                //     var resultado = actual - anterior;
                //     console.log(resultado)
                   
                //     if (resultado > 0 && resultado <= 35) {
                //         var total = resultado * precio;  
                //         $('#total').val(total);

                //     }else if(resultado >= 36 && resultado <= 50 ){
                //       var valor_exceso = 4.50
                //       $('#valor_exceso').val(valor_exceso);
                //       var total = resultado * valor_exceso;

                //       $('#total').val(total);

                //     }else if(resultado > 50){
                        
                //       var valor_exceso = 5.50
                //       $('#valor_exceso').val(valor_exceso);
                //       var total = resultado * valor_exceso;

                //       $('#total').val(total);
                               
                //   }
                   
                //     $('#monto').val(resultado);
                // } else {
                //     $('#resultado').val('');
                // }
              


            });
            function padCodigo(codigo, length) {
            return codigo.toString().padStart(length, '0');
            }

            $('#selectCliente').change(function(){

              $('#canon_mensual').val(0);
              $('#valor_exceso').val(0);
              $('#monto').val(0);
              $('#total').val(0);
              $('#lectura_anterior').val(0);
              $('#lectura_actual').val('');

                var clienteId = $(this).val(); // Obtener el id del cliente seleccionado
                if(clienteId){
                    // Hacer una llamada AJAX
                    $.ajax({
                        url: '/get_contadores/' + clienteId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#contador').empty(); // Limpiar el segundo select
                            $('#contador').append('<option value="">Seleccione un contador</option>'); 
                            $.each(data, function(key, value) {
                              console.log(value.codigo);
                              value.codigo = value.codigo ? padCodigo(value.codigo, 6) : "";
                              if (key === 0) { 
                                console.log(value);
                                

                                    $('#contador').append('<option value="'+ value.id +'" selected>'+ value.codigo +'</option>'); // Lo seleccionamos
                                    $('#saldo').val(parseFloat(value.lecturas_sum.saldo).toFixed(2));
                                    
                                    if(value.sector_id == 4){ 
                                      $('#contador').append('<option value="'+ value.id +'" selected>'+ value.codigo +' - SECTOR 4</option>');                                    
                                      $('#canon_mensual').val(10);
                                      $('#valor_exceso').val(0);
                                      $('#monto').val(10);
                                      $('#total').val(10);
                                      $('#lectura_anterior').val(0);
                                      $('#lectura_actual').val(0);
                                    }
                                    if(value.lecturas.length > 0){                                      
                                      $('#lectura_anterior').val(value.lecturas[0].lectura_actual)
                                    }else{
                                      $('#lectura_anterior').val(0)
                                    }

                                } else {
                                    $('#contador').append('<option value="'+ value.id +'">'+ value.codigo +'</option>');

                                }                                
                            });
                        }
                    });
                }else{
                    $('#contador').empty();
                    $('#contador').append('<option value="">Seleccione un contador</option>');
                }
            });
        });


    function imprimirRecibo(id) {  
        Swal.fire({
            title: "Imprimir",  //este es el titulo
            text: "¿Que tipo de recibo desea imprimir", //esto es el mensaje que se va mostrar
            icon: "Success", // este el nombre del icono que me va mostar 
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Recibo de cobro",
            cancelButtonText: "Recibo de pago" 
        }).then((result) => { 
         if (result.isConfirmed) {    //aqui aparece una confirmacion antes de borrar o confirmar 
            $.ajax({  // aqui el ajax ya empieza a borrar
                type: "DELETE",
                url: "/precio_delete/" + id,
                data: { "_token": "{{ csrf_token() }}" },
                success: function(data) {
                    if (data.errors) { // aqui empieza la funcion si algo sale mal 
                     Swal.fire({  
                            icon: 'error',
                            title: 'Precio no eliminado',
                            text: 'Ha ocurrido un problema al eliminar el precio '+ data.errors +', comuniquese con el administrador',
                         });
                    } else {
                    Swal.fire({     // si todo sale bien si muestra el mensaje que se borro y elimina los registros en la base
                            icon: 'success',
                            title: 'Precio Eliminado',
                            text: 'El precio ha sido eliminado correctamente!',
                            timer: 3000,  // El mensaje durará 3 segundos (3000 milisegundos)
                            timerProgressBar: true // Muestra una barra de progreso durante el tiempo que esté visible
                        }).then(() => {
                            location.reload();  // Recarga la página después de que el mensaje desaparezca
                        });

                    }
                }
            });
         }
 
        });
    }
 </script>