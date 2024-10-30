<x-app-layout>
    <x-slot name="header">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <h1 class="text-primary fw-bold mb-3 mb-md-0" style="font-size: 18px;">
                <i class="bi bi-currency-exchange me-2"></i> Listado de Precios
            </h1>
            <a href="/precio" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Crear Precio
            </a>
        </div>
    </x-slot>

    <div class="py-4">
        <div class="container">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-hover table-striped align-middle">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Código</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Monto</th>
                                    <th scope="col">Responsable</th>
                                    <th scope="col">Fecha de Creación</th>
                                    <th scope="col" class="text-center">Acciones</th>                     
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($precios as $precio) 
                                    <tr>
                                        <td>{{ $precio->id }}</td>
                                        <td>{{ $precio->descripcion }}</td>
                                        <td>{{ $precio->monto }}</td>
                                        <td>{{ $precio->usuario->name }}</td>
                                        <td>{{ $precio->created_at->format('d/m/Y H:i:s') }}</td>
                                        <td class="text-center">
                                            @include('precio.partials.opciones')
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
<script>
    function eliminarPrecio(id) {  
        Swal.fire({
            title: "Eliminar",  //este es el titulo
            text: "¿Está seguro de eliminar este precio?", //esto es el mensaje que se va mostrar
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
