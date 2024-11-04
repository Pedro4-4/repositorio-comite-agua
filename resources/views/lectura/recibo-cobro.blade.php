<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 77mm; /* Ancho típico para impresoras térmicas */
            height: 140mm;
            margin: 0 auto;
            padding: 10px;
            border: 1px solid #000;
            box-sizing: border-box;
        }
        h1, h2, h3 {
            text-align: center;
            margin: 5px 0;
        }
        .info p, .details p, .summary p {
            margin: 2px 0;
        }
        .details, .summary {
            width: 100%;
        }
        .details p, .summary p {
            display: flex;
            justify-content: space-between;
        }
        .footer {
            text-align: center;
            margin-top: 10px;
        }
        @media print {
            body {
                margin: 0;
                padding: 0;
            }
            .container {
                border: none;
            }
        }
    </style>
</head>
<body>

<div class="container">

    <br>
    <h1 class="text-center">CODAGUACB</h1>
    <h3>Comité de Agua Cantón Bethania</h3>
    <h3>Esquipulas Palo Gordo, San Marcos</h3>

    <h2 style="margin-top: 20px;" >Recibo de Cobro</h2>

    <div class="info">
        <p><strong>Recibo #:</strong> {{ str_pad($lectura->id,6,0,0) }}</p>
        <p><strong>Fecha:</strong> {{ $lectura->created_at->locale('es')->translatedFormat('d F Y') }}</p>
        <p><strong>Usuario:</strong> {{$lectura->contador->cliente->nombre}}  {{$lectura->contador->cliente->apellido}}</p>
        <p><strong>Dirección:</strong> {{$lectura->contador->direccion}}  </p>
        <p><strong>Sector:</strong> {{$lectura->contador->sector->nombre}}  </p>
    </div>

    <h3 style="margin-top: 20px;">Detalles</h3>

    <div class="details">
        @if($lectura->canon_mensual <= 0) 


            {{-- @if($lectura->monto > 36)    
                <p><span>Valor Exceso:</span><span>  Q{{ number_format($lectura->valor_exceso,2)}}  </span></p>
            @else
                <p><span>Tarifa por m³:</span><span>  Q{{ number_format($lectura->precio->monto,2)}}  </span></p>
            @endif --}}


            <p><span>Lectura Actual:</span><span>{{$lectura->lectura_actual}} m³</span></p>
            <p><span>Lectura Anterior</span><span>{{$lectura->lectura_anterior}} m³</span></p>
            <p><span>Consumo de Agua:</span><span>{{$lectura->monto}} m³</span></p>



        @else
            <p><span>Canon Mensual:</span><span>{{$lectura->canon_mensual}} m³</span></p>
        @endif             
     
    </div>

    
    <div class="summary">
        <h2 style="margin-top: 30px;" ><span><strong>Total a Pagar:</strong></span><span><strong>Q{{ number_format($lectura->total, 2) }}</strong></span></h2>      
    </div>

    <p></p>
    <div class="footer" style="margin-top: 90px;">
        <p>Aviso importante:</p>
        <p>1. Debe cancelar con el tesorero del Comité de Agua Cantón Bethania CODAGUACB</p>
        <p>2. Todo usuario al atrasarse con 4 meses de pago le será suspendido el servicio sin previo aviso</p>
        <p>Gracias por su pago.</p>
    </div>
</div>

</body>
<script>
  

    window.onafterprint = function() {
            // Redirigir a la página específica después de imprimir
            window.location.href = "{{ url('/lecturas') }}";
        };

        // Función para iniciar la impresión cuando la página se carga
        window.onload = function() {
            window.print();
        };
</script>
</html>
