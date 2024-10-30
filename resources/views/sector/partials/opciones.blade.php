<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      Acciones
    </button>
    <ul class="dropdown-menu">
      {{-- <li><a class="dropdown-item" href="#">Ver</a></li> --}}
      <li><a href="{{ route('sector.edit', $sector->id) }}"class="dropdown-item" href="#">Editar</a></li>
      <li><a onclick="eliminarSector('{{$sector->id}}')"  class="dropdown-item" href="#">Eliminar</a></li>
                  <form id="delete-form-{{$sector->id}}" action="{{ route('sector.destroy', $sector->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')

        </form>  
    </ul>
  </div>