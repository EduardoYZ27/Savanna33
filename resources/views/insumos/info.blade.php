<!-- Modal DE ACTUALIZAR Y ELIMINAR -->
<div class="modal fade" id="edit{{$insumo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDITAR INSUMO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{ route('home.update', $insumo->id) }}" method="post">
        @csrf 
        @method('PUT')
        <div class="modal-body">

          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" 
                placeholder="Ingrese solo texto" 
                value="{{ $insumo->nombre }}" 
                pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" 
                title="Solo se permiten letras y espacios" 
                required/>
          </div>

          <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción:</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion" 
                placeholder="Ingrese descripción" 
                value="{{ $insumo->descripcion }}" 
                required/>
          </div>

          <div class="mb-3">
            <label for="ID_UnidadMedida" class="form-label">Unidad de Medida:</label>
            <select name="ID_UnidadMedida" class="form-control">
                @foreach($unidadMedidas as $unidadMedida) 
                    <option value="{{ $unidadMedida->id }}" 
                        {{ $unidadMedida->id == $insumo->ID_UnidadMedida ? 'selected' : '' }}>
                        {{ $unidadMedida->nombre }}
                    </option>
                @endforeach
            </select>
          </div>
        
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- VALIDACIÓN PARA ELIMINAR REGISTRO -->
<div class="modal fade" id="delete{{$insumo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ELIMINAR INSUMO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{ route('home.destroy', $insumo->id) }}" method="post">
        @csrf 
        @method('DELETE')
        <div class="modal-body">
          ¿ESTÁS SEGURO DE ELIMINAR EL REGISTRO <strong>{{ $insumo->nombre }}?</strong>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-danger">Confirmar</button>
        </div>
      </form>
      
    </div>
  </div>
</div>
