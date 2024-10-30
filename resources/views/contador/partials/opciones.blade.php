<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      Acciones
    </button>
    <ul class="dropdown-menu">
      <li><a href="{{ route('contador.show', $contador->id) }}"class="dropdown-item" href="#">Ver</a></li>
      <li><a href="{{ route('contador.edit', $contador->id) }}"class="dropdown-item" href="#">Editar</a></li>
      <li><a onclick="eliminarContador('{{$contador->id}}')"  class="dropdown-item" href="#">Eliminar</a></li>
                  <form id="delete-form-{{$contador->id}}" action="{{ route('contador.destroy', $contador->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')

        </form>         
    </ul>
  </div>