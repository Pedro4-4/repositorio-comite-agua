<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      Acciones
    </button>
    <ul class="dropdown-menu">
      <li><a href="{{ route('gasto.show', $gasto->id) }}"class="dropdown-item" href="#">Ver</a></li>
      <li><a onclick="eliminarGasto('{{$gasto->id}}')"  class="dropdown-item" href="#">Eliminar</a></li>
      
    </ul>
  </div>