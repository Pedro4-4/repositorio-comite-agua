<x-app-layout>
    <x-slot name="header">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <h1 class="text-primary fw-bold mb-3 mb-md-0" style="font-size: 18px";>
                <i class="bi bi-journal-text me-2"></i> Listado de Lecturas
            </h1>
            <a href="/lectura" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Crear Nueva Lectura
            </a>
        </div>
        
    </x-slot>

    <style>
        .input-group {
            max-width: 100%; /* Ancho completo para adaptarse a la pantalla */
            margin-bottom: 20px;
        }
        .input-group-text {
            background-color: #007bff; /* Fondo azul para la lupa */
            color: white; /* Color de la lupa */
            border: none;
        }
        .form-control {
            border-right: none; /* Eliminar el borde izquierdo para que se vea mejor con la lupa */
        }
        .form-control:focus {
            box-shadow: none; /* Eliminar el sombreado cuando esté en foco */
            border-color: #007bff; /* Cambiar el borde al azul cuando esté enfocado */
        }
    </style>

<div class="container py-4">
    <div class="row">

            <!-- Campo de búsqueda -->
            <div class="row justify-content-start">
            <div style="padding-left: 13px" class="input-group flex-grow-1">
                <input id="buscarTabla" type="text" class="form-control-sm" placeholder="Buscar..." aria-label="Buscar">
                <span class="input-group-text bg-primary text-white">
                    <i class="bi bi-search"></i> <!-- Ícono de lupa de Bootstrap Icons -->
                </span>
            </div>
            

    {{-- TABLA --}}
    <div class="container">
        <div class="card shadow-sm">
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table id="tablaReporte" class="table table-hover table-striped align-middle">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">No.</th>    {{--Se le puso consumo por facilidad para el usuario pero en realidad es ID--}}
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Lectura <br> Anterior</th>
                                    <th scope="col">Lectura <br> Actual</th>
                                    <th scope="col">Consumo</th>   {{--Se le puso consumo por facilidad para el usuario pero en realidad es monto--}}
                                    <th scope="col">Precio</th>
                                    <th scope="col">Canon <br> Mensual</th>
                                    {{-- <th scope="col">Valor <br>Exceso</th> --}}
                                    <th scope="col">Abono</th>
                                    <th scope="col">Saldo</th>
                                    <th scope="col">Nota</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col" class="text-center">Acciones</th>                     
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lecturas as $lectura) 
                                    <tr>
                                        <td>{{ $lectura->id }}</td>
                                        <td>{{ $lectura->contador->cliente->nombre }} {{ $lectura->contador->cliente->apellido }}</td>
                                        
                                        {{-- Estado de lectura --}}
                                       @if($lectura->estado == 1)
                                        <td><span class="badge bg-primary text-dark">Pagado</span></td>
                                        @else
                                        <td> <span class="badge bg-warning text-dark">Pendiente</span></td>
                                        @endif
                                        
                                        <td>{{ $lectura->lectura_anterior }} m³</td>
                                        <td>{{ $lectura->lectura_actual }} m³</td>
                                        <td>{{ $lectura->monto }} m³</td>
                                        
                                        {{-- Canon mensual y valor exceso// Coloca el precio --}}
                                        @if($lectura->canon_mensual == 0 && $lectura->valor_exceso == 0)  
                                        <td>Q{{$lectura->precio->monto}}</td>                            
                                        @else                               
                                        <td class="text-center">-</td>   
                                        @endif       
                                        
                                        {{-- Canon mensual  --}}
                                        @if($lectura->canon_mensual == 0 )      
                                        <td class="text-center">-</td>                            
                                        @else                                   
                                        <td>Q {{$lectura->canon_mensual}}</td>  
                                        @endif                                  
                                        
                                        {{-- Valor exceso --}}
                                        {{-- @if($lectura->valor_exceso == 0)
                                        <td class="text-center">-</td>
                                        @else
                                        <td>Q{{$lectura->valor_exceso}}</td>
                                        @endif --}}
                                        <td>{{ $lectura->abono }}</td>
                                        <td>{{ $lectura->saldo }}</td>
                                        <td>{{ $lectura->nota }}</td>
                                        <td>Q{{ $lectura->total }}</td>
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
</x-app-layout>

{{-- <script>
    $(document).ready(function() {
        $('#imprimirTabla').on('click', function() {
            // Crear una ventana nueva para imprimir
            var ventanaImpresion = window.open('', '', 'height=600,width=800');
            
            // Obtener el contenido de la tabla
            var contenidoTabla = $('#tablaReporte').html();
            
            // Estructura básica de HTML para la ventana de impresión
            ventanaImpresion.document.write('<html><head><title>Imprimir Reporte</title>');
            ventanaImpresion.document.write('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">');
            ventanaImpresion.document.write('</head><body>');
            ventanaImpresion.document.write('<h1>Reporte de Lecturas</h1>');
            ventanaImpresion.document.write('<table class="table table-bordered">' + contenidoTabla + '</table>');
            ventanaImpresion.document.write('</body></html>');
            
            // Cargar el contenido
            // ventanaImpresion.document.close();
            
            // Ejecutar la función de impresión
            ventanaImpresion.focus();
            ventanaImpresion.print();
            
            // Cerrar la ventana después de imprimir
            // ventanaImpresion.close();
        });
    });
</script> --}}

<script>
    

    function eliminarLectura(id) {  
        Swal.fire({
            title: "Eliminar",  //este es el titulo
            text: "¿Está seguro de eliminar esta lectura?", //esto es el mensaje que se va mostrar
            icon: "warning", // este el nombre del icono que me va mostar 
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Aceptar",
            cancelButtonText: "Cancelar" 
        }).then((result) => { 
         if (result.isConfirmed) {    //aqui aparece una confirmacion antes de borrar o confirmar 
            $.ajax({  // aqui el ajax ya empieza a borrar
                type: "DELETE",
                url: "/lectura_delete/" + id,
                data: { "_token": "{{ csrf_token() }}" },
                success: function(data) {
                    if (data.errors) { // aqui empieza la funcion si algo sale mal 
                     Swal.fire({  
                            icon: 'error',
                            title: 'Lectura no eliminada',
                            text: 'Ha ocurrido un problema al eliminar la lectura '+ data.errors +', comuniquese con el administrador',
                         });
                    } else {
                    Swal.fire({     // si todo sale bien si muestra el mensaje que se borro y elimina los registros en la base
                            icon: 'success',
                            title: 'Lectura Eliminada',
                            text: 'La lectura ha sido eliminada correctamente!',
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
        

<body>

    <!-- Botón para abrir la vista del recibo en una nueva pestaña -->
    {{-- <button id="imprimirRecibo"  class="btn btn-primary">Imprimir Recibo</button> --}}

    <script>

        function imprimirCobro(id) {
            var reciboId = id
                var url = "/imprimir_recibo_cobro/" + reciboId;
                window.open(url, '_blank');
         } 
        
       


        $(document).ready(function(){
            // Evento click en el botón
            $('#imprimirRecibo').on('click', function() {
                var reciboId = $(this).data('id');  // Obtén el ID del recibo
                var url = "/recibo/" + reciboId;    // Construye la URL del recibo

                // Abre una nueva pestaña con la URL del recibo
                window.open(url, '_blank');
            });
        });
    </script>

                                                {{-- LUPA --}}
<script>
    $(document).ready(function() {
        // Evento keyup que se ejecuta al escribir en el campo de búsqueda
        $('#buscarTabla').on('keyup', function() {
            var valorBusqueda = $(this).val().toLowerCase(); // Convertir a minúsculas para hacer la búsqueda no sensible a mayúsculas/minúsculas
            $('#tablaReporte tbody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(valorBusqueda) > -1); // Mostrar solo las filas que coincidan
            });
        });
    });
</script>

</body>

                                            {{-- Boton de registrar pago --}}
<script>
$(document).ready(function() {
    $('.registrar-pago').on('click', function(event) {
        event.preventDefault(); // Evitar redirección

        // Obtener el ID de la lectura desde el botón
        const lecturaId = $(this).data('id');

        // Solicitar el monto del abono
        const abono = prompt("Ingrese el monto a abonar:");

        if (abono) {
            // Realizar la petición AJAX
            $.ajax({
                url: `/pago/${lecturaId}`,
                type: 'POST',
                data: {
                    abono: abono,
                    nota: 'Descripción del pago', // Puedes ajustar la descripción según necesites
                    _token: '{{ csrf_token() }}' // Reemplaza con la variable de tu vista
                },
                success: function(response) {
                    if (response.status) {
                        alert(response.message);
                        // Aquí puedes recargar la página o actualizar la vista si es necesario
                    } else {
                        alert('Error al registrar el pago');
                    }
                },
                error: function(error) {
                    alert('Hubo un problema al registrar el pago');
                }
            });
        }
    });
});
</script>