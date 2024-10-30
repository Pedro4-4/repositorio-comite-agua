<x-app-layout>
    <x-slot name="header">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
            <h1 class="text-primary fw-bold mb-3 mb-md-0" style="font-size: 18px;">
                <i class="bi bi-currency-exchange me-2"></i> Listado de Gastos
            </h1>
            <a href="/gasto" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Ingresar nuevo gasto
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

    <div class="py-4">
        <div class="row">

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
                    <div class="table-responsive-sm">
                        <table id="tablaGasto"class="table table-hover table-striped align-middle">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Monto</th>
                                    <th scope="col">Referencia</th>
                                    <th scope="col">Fecha de Creación</th>
                                    <th scope="col" class="text-center">Acciones</th>                     
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($gastos as $gasto) 
                                    <tr>
                                        <td>{{ $gasto->id }}</td>
                                        <td>{{ $gasto->descripcion }}</td>
                                        <td>{{ $gasto->monto }}</td>
                                        <td>{{ $gasto->referencia }}</td>
                                        <td>{{ $gasto->created_at->format('d/m/Y H:i:s') }}</td>
                                        <td class="text-center">
                                            @include('gasto.partials.opciones')
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

<body>
    <script>
        $(document).ready(function() {
            // Evento keyup que se ejecuta al escribir en el campo de búsqueda
            $('#buscarTabla').on('keyup', function() {
                var valorBusqueda = $(this).val().toLowerCase(); // Convertir a minúsculas para hacer la búsqueda no sensible a mayúsculas/minúsculas
                $('#tablaGasto tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(valorBusqueda) > -1); // Mostrar solo las filas que coincidan
                });
            });
        });
    </script>
</body>