<x-app-layout>
    <x-slot name="header">
        <h1 class="text-primary fw-bold text-center">Reporte de Consumo de Agua por Usuario</h1>
        <p class="text-center"><strong>Fecha:</strong> 10 Octubre 2024</p>
    </x-slot>

    <div class="container py-5">
        <!-- Consumo de Agua por Usuario -->
        <div class="section-title bg-light p-2 mb-3 fw-bold">Consumo de Agua por Usuario</div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>ID Usuario</th>
                        <th>Nombre</th>
                        <th>Lectura Anterior (m³)</th>
                        <th>Lectura Actual (m³)</th>
                        <th>Consumo (m³)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>001</td>
                        <td>Juan Pérez</td>
                        <td>100</td>
                        <td>150</td>
                        <td>50</td>
                    </tr>
                    <tr>
                        <td>002</td>
                        <td>María López</td>
                        <td>160</td>
                        <td>180</td>
                        <td>20</td>
                    </tr>
                    <tr>
                        <td>003</td>
                        <td>Pedro Gómez</td>
                        <td>110</td>
                        <td>120</td>
                        <td>10</td>
                    </tr>
                    <tr class="fw-bold bg-light">
                        <td colspan="4" class="text-end">Consumo Total del Sistema</td>
                        <td>80 m³</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
