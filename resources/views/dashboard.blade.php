<x-app-layout>
    <x-slot name="header">
        <div class="text-center">
            <h1 class="display-4 text-primary fw-bold">Agua Comunidad Bethania</h1>
        </div>
    </x-slot>
  
        <!-- Bootstrap Icons -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        <style>
            .card-icon {
                font-size: 2.5rem;
                color: #ddd;
            }
            .text-large {
                font-size: 2rem; /* Tamaño más grande para las estadísticas */
            }
            /* Bordes personalizados para cada tarjeta */
            .custom-border-left-primary {
                border-left: 5px solid #007bff; /* Azul */
            }
            .custom-border-left-danger {
                border-left: 5px solid #dc3545; /* Rojo */
            }
            .custom-border-left-success {
                border-left: 5px solid #28a745; /* Verde */
            }
            .custom-border-left-warning {
                border-left: 5px solid #ffc107; /* Amarillo */
            }
            .custom-border-left-info {
                border-left: 5px solid #17a2b8; /* Cian */
            }
        </style>
   
  
    
    <div class="container mt-5">
        <div class="row">
            <!-- Total de Ingresos Mensuales -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2 custom-border-left-primary">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Ingresos Mensuales</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 text-large">Q22</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-currency-dollar card-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Total de Gastos Mensuales -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2 custom-border-left-danger">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                    Gastos Mensuales</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 text-large">Q33</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-receipt card-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Número de Usuarios Activos -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2 custom-border-left-success">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Usuarios Activos</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 text-large">{{$clientes}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-people card-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Usuarios en Mora -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2 custom-border-left-warning">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Usuarios en Moraa</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 text-large">34</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-exclamation-triangle card-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Consumo de Agua Mensual -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2 custom-border-left-info">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                    Consumo de Agua (m³)</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 text-large">33 m³</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-droplet card-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Total de Recibos de Cobro Emitidos -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2 custom-border-left-primary">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Recibos de Cobro Emitidos</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 text-large">{{$lecturas2}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-file-earmark-text card-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Total de Recibos de Pago Emitidos -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2 custom-border-left-primary">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Recibos de Pago Emitidos</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 text-large">{{$lecturas}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-file-earmark-check card-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Recaudación de Pagos en lo que va del Año -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card shadow h-100 py-2 custom-border-left-success">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Recaudación Anual</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800 text-large">Q10090</div>
                            </div>
                            <div class="col-auto">
                                <i class="bi bi-bar-chart-line card-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
 
    
</x-app-layout>
