<x-app-layout>
    <x-slot name="header">
        <h1 class="text-primary fw-bold text-center">Reporte Financiero - Sistema de Agua Potable</h1>
        <p class="text-center"><strong>Fecha:</strong> 10 Octubre 2024</p>
    </x-slot>

    <div class="container py-5">
        <!-- Ingresos Mensuales -->
        <div class="section-title bg-light p-2 mb-3 fw-bold">Ingresos Mensuales</div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Mes</th>
                        <th>Usuarios Pagados</th>
                        <th>Ingreso Total (Q)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Septiembre</td>
                        <td>50</td>
                        <td>Q 5,000</td>
                    </tr>
                    <tr>
                        <td>Agosto</td>
                        <td>48</td>
                        <td>Q 4,800</td>
                    </tr>
                    <tr class="fw-bold">
                        <td colspan="2">Total de Ingresos</td>
                        <td>Q 9,800</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Gastos Mensuales -->
        <div class="section-title bg-light p-2 mb-3 fw-bold">Gastos Mensuales</div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Mes</th>
                        <th>Descripción del Gasto</th>
                        <th>Monto (Q)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Septiembre</td>
                        <td>Reparación de tuberías</td>
                        <td>Q 1,200</td>
                    </tr>
                    <tr>
                        <td>Agosto</td>
                        <td>Mantenimiento general</td>
                        <td>Q 1,000</td>
                    </tr>
                    <tr class="fw-bold">
                        <td colspan="2">Total de Gastos</td>
                        <td>Q 2,200</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Balance Neto -->
        <div class="section-title bg-light p-2 mb-3 fw-bold">Balance Neto</div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Total Ingresos (Q)</th>
                        <th>Total Gastos (Q)</th>
                        <th>Balance Neto (Q)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="fw-bold">
                        <td>Q 9,800</td>
                        <td>Q 2,200</td>
                        <td>Q 7,600</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>


<script>
    $(document).ready(function() {
        // Inicializar el Datepicker
        $('#datePicker').datepicker({
            format: 'dd-mm-yyyy',
            autoclose: true,
            todayHighlight: true,
            language: 'es'
        });

        // Manejar el evento de filtro
        $('#filtrarReporte').on('click', function() {
            var selectedDate = $('#datePicker').val();
            
            if(selectedDate) {
                // Llamar al servidor para filtrar el reporte por la fecha seleccionada
                $.ajax({
                    url: '{{ route("reporte.financiero") }}', // Asegúrate de que la ruta sea la correcta
                    type: 'GET',
                    data: { fecha: selectedDate },
                    success: function(response) {
                        // Actualiza el contenido del reporte
                        $('#reporteFinanciero').html(response);
                    },
                    error: function() {
                        alert('Error al cargar el reporte. Inténtalo nuevamente.');
                    }
                });
            } else {
                alert('Por favor, selecciona una fecha.');
            }
        });
    });
</script>
