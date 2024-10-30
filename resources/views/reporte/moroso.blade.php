<x-app-layout>
    <x-slot name="header">
        <h1 class="text-primary fw-bold text-center">Reporte de Usuarios en Mora</h1>
        <p class="text-center"><strong>Fecha:</strong> 10 Octubre 2024</p>
    </x-slot>

    <div class="container py-5">
        <!-- Sección de Usuarios en Mora -->
        <div class="section-title bg-light p-2 mb-3 fw-bold">Lista de Usuarios en Mora</div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="bg-danger text-white">
                    <tr>
                        <th>ID Usuario</th>
                        <th>Nombre</th>
                        <th>Deuda Pendiente (Q)</th>
                        <th>Meses en Mora</th>
                        <th>Último Pago</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>001</td>
                        <td>Juan Pérez</td>
                        <td>Q 400</td>
                        <td>2</td>
                        <td>Agosto 2024</td>
                    </tr>
                    <tr>
                        <td>002</td>
                        <td>María López</td>
                        <td>Q 600</td>
                        <td>3</td>
                        <td>Julio 2024</td>
                    </tr>
                    <tr>
                        <td>003</td>
                        <td>Pedro Gómez</td>
                        <td>Q 200</td>
                        <td>1</td>
                        <td>Septiembre 2024</td>
                    </tr>
                    <tr class="fw-bold bg-light">
                        <td colspan="2" class="text-end">Total Deuda del Sistema</td>
                        <td colspan="3">Q 1,200</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
