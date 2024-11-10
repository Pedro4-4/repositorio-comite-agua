<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Toggle</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet">
    <style>
        .sidebar {
            transition: margin-left 0.3s;
        }
        .sidebar-hidden {
            margin-left: -250px;
        }
    </style>
</head>
<body>

   
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="text-primary fw-bold mb-0" style="font-size: 18px;">
                {{-- <i class="bi bi-list me-2"></i> Sidebar --}}
            </h2>
            {{-- <button id="toggle-sidebar" class="btn btn-primary">Ocultar Sidebar</button> --}}
        </div>
    

    <div class="d-flex">
        <!-- Sidebar -->
        <nav id="sidebar" class="sidebar bg-dark text-white p-3" style="min-height: 100vh;">
            <ul class="nav flex-column">

                <li class="nav-item mb-3">
                    <a href="{{ url('/clientes') }}" class="nav-link text-white d-flex align-items-center p-2 rounded">
                        <i class="bi bi-speedometer2 me-2"></i> Usuarios
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a href="{{ url('/precios') }}" class="nav-link text-white d-flex align-items-center p-2 rounded">
                        <i class="bi bi-people me-2"></i> Precios
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a href="{{ url('/sectores') }}" class="nav-link text-white d-flex align-items-center p-2 rounded">
                        <i class="bi bi-box-seam me-2"></i> Sectores
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a href="{{ url('/lecturas') }}" class="nav-link text-white d-flex align-items-center p-2 rounded">
                        <i class="bi bi-currency-dollar me-2"></i> Lecturas
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a href="{{ url('/reportes') }}" class="nav-link text-white d-flex align-items-center p-2 rounded">
                        <i class="bi bi-bar-chart me-2"></i> Reportes
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a href="{{ url('/contadores') }}" class="nav-link text-white d-flex align-items-center p-2 rounded">
                        <i class="bi bi-gear me-2"></i> Contadores
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a href="{{ url('/gastos') }}" class="nav-link text-white d-flex align-items-center p-2 rounded">
                        <i class="bi bi-file-earmark-text me-2"></i> Gastos
                    </a>
                </li>
                <li class="nav-item mb-3">
                    <a href="{{ url('/usuarios_mora') }}" class="nav-link text-white d-flex align-items-center p-2 rounded">
                        <i class="bi bi-life-preserver me-2"></i> Usuarios en moraa
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Contenido principal -->
        <div class="container-fluid p-4">
            <h2 class="text-secondary mb-4">Contenido Principal</h2>
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-body">
                    <p>Aquí va el contenido principal de tu aplicación. Puedes agregar diferentes componentes y vistas para que los usuarios interactúen.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
    <script>
        document.getElementById('toggle-sidebar').addEventListener('click', function () {
            var sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('sidebar-hidden');

            var btn = document.getElementById('toggle-sidebar');
            if (sidebar.classList.contains('sidebar-hidden')) {
                btn.textContent = 'Mostrar Sidebar';
            } else {
                btn.textContent = 'Ocultar Sidebar';
            }
        });
    </script>
</body>
</html>
