<x-app-layout>
    <x-slot name="header">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <h1 class="text-primary fw-bold mb-3 mb-md-0" style="font-size: 18px;">
                <i class="bi bi-file-earmark-plus-fill me-2"></i> Listado de Contadores
            </h1>
            <button type="button" class="btn btn-primary" onclick="window.location.href='/contador'">
                <i class="bi bi-plus-circle me-1"></i> Crear Nuevo Contador
            </button>
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


    <div class="py-4">
                    <!-- Campo de búsqueda -->
                    <div class="row justify-content-start">
                        <div style="padding-left: 13px" class="input-group flex-grow-1">
                            <input id="buscarTabla" type="text" class="form-control-sm" placeholder="Buscar..." aria-label="Buscar">
                            <span class="input-group-text bg-primary text-white">
                                <i class="bi bi-search"></i> <!-- Ícono de lupa de Bootstrap Icons -->
                            </span>
                        </div>



        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    <!-- Clase table-responsive para permitir desplazamiento en pantallas pequeñas -->
                    <div class="table-responsive-sm">
                        <table id="tablaContador" class="table table-hover table-striped align-middle">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Código</th>
                                    <th scope="col">Cliente</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Sector</th>
                                    <th scope="col">Fecha de Creación</th>
                                    <th scope="col" class="text-center">Acciones</th>                     
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contadores as $contador) 
                                    <tr>
                                        <td>{{ str_pad($contador->codigo, 6, '0', STR_PAD_LEFT) }}</td>
                                        <td>{{ $contador->cliente->nombre }} {{ $contador->cliente->apellido }}</td>
                                        <td>{{ $contador->direccion }}</td>
                                        <td>{{ $contador->precio->monto }}</td>
                                        <td>{{ $contador->sector->nombre }}</td>
                                        <td>
                                            @if ($contador->created_at)
                                                {{ $contador->created_at->format('d/m/Y H:i:s') }}
                                            @else
                                                Sin fecha
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @include('contador.partials.opciones')
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
    function eliminarContador(id) {  
        Swal.fire({
            title: "Eliminar",  //este es el titulo
            text: "¿Está seguro de eliminar este contador?", //esto es el mensaje que se va mostrar
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
                url: "/contador_delete/" + id,
                data: { "_token": "{{ csrf_token() }}" },
                success: function(data) {
                    if (data.errors) { // aqui empieza la funcion si algo sale mal 
                     Swal.fire({  
                            icon: 'error',
                            title: 'Contador no eliminado',
                            text: 'Ha ocurrido un problema al eliminar el contador '+ data.errors +', comuniquese con el administrador',
                         });
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Contador Eliminado',
                            text: 'El contador ha sido eliminado correctamente!',
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

<script>
    $(document).ready(function() {
        // Evento keyup que se ejecuta al escribir en el campo de búsqueda
        $('#buscarTabla').on('keyup', function() {
            var valorBusqueda = $(this).val().toLowerCase(); // Convertir a minúsculas para hacer la búsqueda no sensible a mayúsculas/minúsculas
            $('#tablaContador tbody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(valorBusqueda) > -1); // Mostrar solo las filas que coincidan
            });
        });
    });
</script>