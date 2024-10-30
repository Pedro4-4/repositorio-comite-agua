<x-app-layout>
    <x-slot name="header">
        <h1 class="text-center text-primary fw-bold mb-4" style="font-size: 24px;">
            Panel de Reportes
        </h1>
    </x-slot>

    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-sm-6">
                <label for="startDate">Fecha inicio</label>
                <input id="startDate" class="form-control" type="date" />
                <span id="startDateSelected"></span>
            </div>
            <div class="col-lg-3 col-sm-6">
                <label for="endDate">Fecha final</label>
                <input id="endDate" class="form-control" type="date" />
                <span id="endDateSelected"></span>
            </div>
        </div>


    <div class="container py-5">
        
        <div class="row">

            <!-- Reporte Financiero -->
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-currency-dollar card-icon" style="font-size: 2.5rem; color: #007bff;"></i>
                        <h5 class="card-title">Reporte Financiero</h5>
                        <p class="card-text">Accede al reporte financiero detallado.</p>
                        <br>
                        <a href="{{ url('report-financieros') }}" class="btn btn-primary">Ver Reporte</a>
                    </div>
                </div>
            </div>

            <!-- Reporte de Consumos -->
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-droplet card-icon" style="font-size: 2.5rem; color: #007bff;"></i>
                        <h5 class="card-title">Reporte de Consumos</h5>
                        <p class="card-text">Consulta los consumos de agua por usuario.</p>
                        <br>
                        <a href="{{ url('/report-consumos') }}" class="btn btn-primary">Ver Reporte</a>
                    </div>
                </div>
            </div>

            <!-- Reporte de Usuarios -->
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-people card-icon" style="font-size: 2.5rem; color: #007bff;"></i>
                        <h5 class="card-title">Reporte de Usuarios</h5>
                        <p class="card-text">Visualiza información detallada de usuarios.</p>
                        <br>
                        <a href="{{ url('/report-usuarios') }}" class="btn btn-primary">Ver Reporte</a>
                    </div>
                </div>
            </div>

            <!-- Reporte de Morosos -->
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body text-center">
                        <i class="bi bi-exclamation-triangle card-icon" style="font-size: 2.5rem; color: #007bff;"></i>
                        <h5 class="card-title">Reporte de Morosos</h5>
                        <p class="card-text">Consulta los usuarios que están en mora.</p>
                        <br>
                        <a href="{{ url('/report-morosos') }}" class="btn btn-primary">Ver Reporte</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
let startDate = document.getElementById('startDate')
let endDate = document.getElementById('endDate')

startDate.addEventListener('change',(e)=>{
  let startDateVal = e.target.value
  document.getElementById('startDateSelected').innerText = startDateVal
})

endDate.addEventListener('change',(e)=>{
  let endDateVal = e.target.value
  document.getElementById('endDateSelected').innerText = endDateVal
})
</script>