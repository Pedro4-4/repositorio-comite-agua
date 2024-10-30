<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      Acciones
    </button>
    <ul class="dropdown-menu">
      <li><a href="{{ route('cliente.show', $cliente->id) }}"class="dropdown-item" href="#">Ver</a></li>
      <li><a href="{{ route('cliente.edit2', $cliente->id) }}"class="dropdown-item" href="#">Editar</a></li>
      <li><a onclick="eliminarCliente('{{$cliente->id}}')"  class="dropdown-item" href="#">Eliminar</a></li>
     

    </ul>
  </div>