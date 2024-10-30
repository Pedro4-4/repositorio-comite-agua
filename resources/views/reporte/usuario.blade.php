<x-app-layout>
    <x-slot name="header">
        <h1 class="text-primary fw-bold text-center">Reporte de Usuarios y Contadores</h1>
        <p class="text-center"><strong>Fecha:</strong> 10 Octubre 2024</p>
    </x-slot>

    <div class="container py-5">
        <!-- Usuarios del Sistema -->
        <div class="section-title bg-light p-2 mb-3 fw-bold">Usuarios del Sistema</div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>ID Usuario</th>
                        <th>Nombre</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>001</td>
                        <td>Juan Pérez</td>
                        <td>juan@example.com</td>
                    </tr>
                    <tr>
                        <td>002</td>
                        <td>María López</td>
                        <td>maria@example.com</td>
                    </tr>
                    <tr>
                        <td>003</td>
                        <td>Pedro Gómez</td>
                        <td>pedro@example.com</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <p class="fw-bold">Total de Usuarios: 3</p> <!-- Total de usuarios -->

        <!-- Estado de Contadores -->
        <div class="section-title bg-light p-2 mb-3 fw-bold">Estado de Contadores</div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>ID Contador</th>
                        <th>Usuario</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>001</td>
                        <td>Juan Pérez</td>
                        <td><span class="text-success fw-bold">Activo</span></td>
                    </tr>
                    <tr>
                        <td>002</td>
                        <td>María López</td>
                        <td><span class="text-danger fw-bold">Inactivo</span></td>
                    </tr>
                    <tr>
                        <td>003</td>
                        <td>Pedro Gómez</td>
                        <td><span class="text-success fw-bold">Activo</span></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <p class="fw-bold">Total de Contadores Activos: 2</p> <!-- Total de contadores activos -->
        <p class="fw-bold">Total de Contadores Inactivos: 1</p> <!-- Total de contadores inactivos -->
    </div>
</x-app-layout>
