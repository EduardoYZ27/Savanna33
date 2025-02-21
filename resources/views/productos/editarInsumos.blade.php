<!-- Modal de EDITAR INSUMOS -->
<div class="modal fade" id="editarInsumosModal{{$productos->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDITAR INSUMOS DEL PRODUCTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- Formulario para editar insumos -->
      <form action="{{ route('editarInsumos', $productos->id) }}" method="post">
        @csrf 
        @method('PUT')
        <div class="modal-body">
          <!-- Puedes mostrar los insumos actuales y permitir su edición aquí -->
          <div class="mb-3">
            <label for="" class="form-label">Producto:</label>
            <input type="text" class="form-control" value="{{ $productos->nombre }}" readonly>
            <input type="hidden" name="ID_Producto" value="{{ $productos->id }}">
          </div>

          <div class="mb-3">
            <label for="" class="form-label">Categoria:</label>
            <input type="text" class="form-control" value="{{ $productos->Categoria->nombre }}" readonly>
            <input type="hidden" name="ID_Categoria" value="{{ $productos->ID_Categoria }}">
          </div>

          <!-- Agrega aquí la lógica para mostrar y editar los insumos actuales -->
@foreach($productos->insumosProductos as $insumoProducto)
    <div class="mb-2">
        <label for="insumo_{{ $insumoProducto->id }}" class="form-label">Insumo:</label>
        <select class="form-control" name="insumos[{{ $insumoProducto->id }}]">
            @foreach($insumo as $insumoItem)
                <option value="{{ $insumoItem->id }}" {{ $insumoItem->id == $insumoProducto->insumo->id ? 'selected' : '' }}>
                    {{ $insumoItem->nombre }}
                </option>
            @endforeach
        </select>

        <label for="cantidad_{{ $insumoProducto->id }}" class="form-label">Cantidad:</label>
        <input type="number" step="any" class="form-control" name="cantidades[{{ $insumoProducto->id }}]" id="cantidad_{{ $insumoProducto->id }}" value="{{ $insumoProducto->cantidad }}" aria-describedby="helpId" placeholder="" />
        
        <label for="merma_{{ $insumoProducto->id }}" class="form-label">Merma:</label>
        <input type="number" step="any" class="form-control" name="merma[{{ $insumoProducto->id }}]" id="merma_{{ $insumoProducto->id }}" value="{{ $insumoProducto->merma }}" aria-describedby="helpId" placeholder="" />

        <!-- Nueva sección para la unidad de medida -->
        <label for="unidad_medida_{{ $insumoProducto->id }}" class="form-label">Unidad de Medida:</label>
        <select class="form-control" name="unidadesMedida[{{ $insumoProducto->id }}]">
            @foreach($unidadMedida as $unidad)
                <option value="{{ $unidad->id }}" {{ $unidad->id == $insumoProducto->unidadMedida->id ? 'selected' : '' }}>
                    {{ $unidad->nombre }}
                </option>
            @endforeach
        </select>
    </div>
@endforeach
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
      </form>
    </div>
  </div>
</div>
