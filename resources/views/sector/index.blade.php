<x-app-layout>
    <x-slot name="header">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <h1 class="text-primary fw-bold mb-3 mb-md-0" style="font-size: 18px;">
                <i class="bi bi-file-earmark-plus-fill me-2"></i> Listado de Sectores
            </h1>
            <a href="/sector" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Crear Sector
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
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Fecha de Creación</th>
                                    <th scope="col" class="text-center">Acciones</th>                     
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sectores as $sector) 
                                    <tr>
                                        <td>{{ $sector->id }}</td>
                                        <td>{{ $sector->nombre }}</td>
                                        <td>{{ $sector->created_at->format('d/m/Y H:i:s') }}</td>
                                        <td class="text-center">
                                            @include('sector.partials.opciones')
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
    function eliminarSector(id) {  
        Swal.fire({
            title: "Eliminar",  //este es el titulo
            text: "¿Está seguro de eliminar este sector?", //esto es el mensaje que se va mostrar
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
                url: "/sector_delete/" + id,
                data: { "_token": "{{ csrf_token() }}" },
                success: function(data) {
                    if (data.errors) { // aqui empieza la funcion si algo sale mal 
                     Swal.fire({  
                            icon: 'error',
                            title: 'Sector no eliminado',
                            text: 'Ha ocurrido un problema al eliminar el contador '+ data.errors +', comuniquese con el administrador',
                         });
                    } else {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sector Eliminado',
                            text: 'El sector ha sido eliminado correctamente!',
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