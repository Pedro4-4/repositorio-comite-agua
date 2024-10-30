<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      Acciones
    </button>
    <ul class="dropdown-menu">
      <li><a href="{{ route('lectura.show', $lectura->id) }}"class="dropdown-item" href="#">Ver</a></li>
      <li><a class="dropdown-item" href="#">Registrar pago</a></li>
      <li><a onclick="imprimirCobro('{{$lectura->id}}')" class="dropdown-item" href="#">Imprimir recibo de Cobro</a></li>
      <li><a href="{{ route('lectura.pago', $lectura->id) }}" class="dropdown-item" href="#">Imprimir recibo de Pago</a></li>
      <li><a onclick="eliminarLectura('{{$lectura->id}}')"  class="dropdown-item" href="#">Eliminar</a></li>
      
    </ul>
  </div>