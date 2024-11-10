<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Agua Comunidad Bethania</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" /> --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
  

           
    <body class="font-sans antialiased">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     
        {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script> --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
          

            
         
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Sidebar Toggle con Ícono</title>
                <!-- Bootstrap Icons -->
                <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
                <style>
                    .sidebar {
                        transition: margin-left 0.3s;
                    }
                    .sidebar-hidden {
                        margin-left: -250px;
                    }
                    .toggle-btn {
                        background: none;
                        border: none;
                        color: #007bff;
                        font-size: 24px;
                    }
                    .nav-link.active {
                        background-color: #007bff;
                        color: white;
                    }
                </style>
            </head>
            <body>
            
                <div class="d-flex justify-content-between align-items-center">
                    <!-- Botón de Toggle Sidebar -->
                   
                </div>
            
                <div class="d-flex">
                    <!-- Sidebar -->
                    <nav id="sidebar" class="sidebar bg-dark text-white p-3" style="min-height: 100vh;">
                        <ul class="nav flex-column">
                            <li class="nav-item mb-3">
                                <a href="{{ url('/clientes') }}" class="nav-link text-white d-flex align-items-center p-2 rounded shadow-sm {{ Request::is('clientes') ? 'active' : '' }}">
                                    <i class="bi bi-speedometer2 me-2"></i> Usuarios
                                </a>
                            </li>
                            <li class="nav-item mb-3">
                                <a href="{{ url('/precios') }}" class="nav-link text-white d-flex align-items-center p-2 rounded {{ Request::is('precios') ? 'active' : '' }}">
                                    <i class="bi bi-people me-2"></i> Precios
                                </a>
                            </li>
                            <li class="nav-item mb-3">
                                <a href="{{ url('/sectores') }}" class="nav-link text-white d-flex align-items-center p-2 rounded {{ Request::is('sectores') ? 'active' : '' }}">
                                    <i class="bi bi-box-seam me-2"></i> Sectores
                                </a>
                            </li>
                            <li class="nav-item mb-3">
                                <a href="{{ url('/lecturas') }}" class="nav-link text-white d-flex align-items-center p-2 rounded {{ Request::is('lecturas') ? 'active' : '' }}">
                                    <i class="bi bi-currency-dollar me-2"></i> Lecturas
                                </a>
                            </li>
                            <li class="nav-item mb-3">
                                <a href="{{ url('/report') }}" class="nav-link text-white d-flex align-items-center p-2 rounded {{ Request::is('reportes') ? 'active' : '' }}">
                                    <i class="bi bi-bar-chart me-2"></i> Reportes
                                </a>
                            </li>
                            <li class="nav-item mb-3">
                                <a href="{{ url('/contadores') }}" class="nav-link text-white d-flex align-items-center p-2 rounded {{ Request::is('contadores') ? 'active' : '' }}">
                                    <i class="bi bi-gear me-2"></i> Contadores
                                </a>
                            </li>
                            <li class="nav-item mb-3">
                                <a href="{{ url('/gastos') }}" class="nav-link text-white d-flex align-items-center p-2 rounded {{ Request::is('gastos') ? 'active' : '' }}">
                                    <i class="bi bi-file-earmark-text me-2"></i> Gastos
                                </a>
                            </li>
                            {{-- <li class="nav-item mb-3"> --}}
                                {{-- <a href="{{ url('/usuarios_mora') }}" class="nav-link text-white d-flex align-items-center p-2 rounded {{ Request::is('usuarios_mora') ? 'active' : '' }}"> --}}
                                    {{-- <i class="bi bi-life-preserver me-2"></i> Usuarios en moraa --}}
                                </a>
                            </li>
                        </ul>
                    </nav>
            
                    <!-- Contenido principal -->
                    <div class="container-fluid p-4">
                        <!-- Page Heading -->
                        @if (isset($header))
                        <header class="bg-white shadow">
                            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>
                        </header>
                    @endif
                       <!-- Page Content -->
                       <main>
                          {{ $slot }}
                      </main>
                  </div>
            
                <!-- Bootstrap JS -->
                {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
                <script>
                    document.getElementById('toggle-sidebar').addEventListener('click', function () {
                        var sidebar = document.getElementById('sidebar');
                        sidebar.classList.toggle('sidebar-hidden');
            
                        var icon = document.getElementById('sidebar-icon');
                        if (sidebar.classList.contains('sidebar-hidden')) {
                            icon.classList.remove('bi-list');
                            icon.classList.add('bi-arrow-right-circle'); // Cambia a ícono de flecha cuando está oculto
                        } else {
                            icon.classList.remove('bi-arrow-right-circle');
                            icon.classList.add('bi-list'); // Cambia a ícono de lista cuando está visible
                        }
                    });
                </script>
            </body>
        
            

        
        
        
    </div>



          

           
        </div>
    </body>
</html>
