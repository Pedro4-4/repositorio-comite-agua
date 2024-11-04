<x-app-layout>
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header text-center bg-primary text-white">
                        <h4>Realizar Pago de Servicio de Agua Potable</h4>
                    </div>
                    <div class="card-body">
                        <!-- Información del Usuario -->
                        <div class="mb-4">
                            <h5>Información del Cliente:</h5>
                            <p><strong>Nombre:</strong> {{ $cliente->nombre . ' ' . $cliente->apellido }}</p>
                            <p><strong>No. correlativo de la lectura:</strong> {{ $lectura->id }}</p>
                            <p><strong>Saldo Actual:</strong> Q{{ $cliente->contadores->first()->lecturas_sum ? $cliente->contadores->first()->lecturas_sum->saldo : 0 }}</p>
                        </div>

                        <!-- Formulario de Pago -->
                        <form action="{{ route('pago.registrar', $lectura->id) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="abono" class="form-label">Abono realizado (Q):</label>
                                <input type="number"  id="abono" name="abono" class="form-control" required>
                            </div>

                            

                            <button type="submit" class="btn btn-primary w-100">Realizar Pago</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<script>
    $(document).ready(function() {
        $('#imprimirTabla').on('click', function() {
            // Crear una ventana nueva para imprimir
            var ventanaImpresion = window.open('', '', 'height=600,width=800');
            
            // Obtener el contenido de la tabla
            var contenidoTabla = $('#tablaReporte').html();
            
            // Estructura básica de HTML para la ventana de impresión
            ventanaImpresion.document.write('<html><head><title>Imprimir Reporte</title>');
            // ventanaImpresion.document.write('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">');
            ventanaImpresion.document.write('</head><body>');
            ventanaImpresion.document.write('<h1>Reporte de Lecturas</h1>');
            ventanaImpresion.document.write('<table class="table table-bordered">' + contenidoTabla + '</table>');
            ventanaImpresion.document.write('</body></html>');
            
            // Cargar el contenido
            // ventanaImpresion.document.close();
            
            // Ejecutar la función de impresión
            ventanaImpresion.focus();
            ventanaImpresion.print();
            
            // Cerrar la ventana después de imprimir
            // ventanaImpresion.close();
        });
    });
</script>

<script>

    function imprimirCobro(id) {
        var reciboId = id
            var url = "/imprimir_recibo_cobro/" + reciboId;
            window.open(url, '_blank');
     } 


    $(document).ready(function(){
        // Evento click en el botón
        $('#imprimirRecibo').on('click', function() {
            var reciboId = $(this).data('id');  // Obtén el ID del recibo
            var url = "/recibo/" + reciboId;    // Construye la URL del recibo

            // Abre una nueva pestaña con la URL del recibo
            window.open(url, '_blank');
        });
    });
</script>