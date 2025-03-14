<!-- Modal DE AGREGAR INSUMOS -->
<div class="modal fade" id="createInsumos{{$productos->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGA INSUMOS AL PRODUCTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!-- Formulario para agregar insumos -->
      <form action="{{ route('homeInsumosProductos.store') }}" method="post">
        @csrf 
        <div class="modal-body">
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

          <div class="mb-3">
            <label for="" class="form-label">Insumo:</label>
            @foreach($insumo as $index => $insumoItem)
              <div class="mb-2">
                <label for="ID_Insumo_{{ $index }}">{{ $insumoItem->nombre }}:</label>
                <select name="ID_Insumo[{{ $index }}]" id="ID_Insumo_{{ $index }}" class="form-control">
                  <option value="{{$insumoItem->id}}"> {{$insumoItem->nombre}} </option>
                </select>

                <label for="cantidad_{{ $index }}" class="form-label">Cantidad:</label>
                <input type="number" step="any" class="form-control" name="cantidades[{{ $index }}]" id="cantidad_{{ $index }}" aria-describedby="helpId" placeholder="" min="0" required />


                <label for="cantidad_{{ $index }}" class="form-label">Merma:</label>
                <input type="number" step="any" class="form-control" name="merma[{{ $index }}]" id="merma_{{ $index }}" aria-describedby="helpId" placeholder="" min="0" required />

                <label for="unidadMedida_{{ $index }}" class="form-label">Unidad Medida:</label>
                <select name="ID_UnidadMedida[{{ $index }}]" id="unidadMedida_{{ $index }}" class="form-control">
                  @foreach($unidadMedida as $unidad)
                    <option value="{{$unidad->id}}"> {{$unidad->nombre}} </option>
                  @endforeach
                </select>
              </div>
            @endforeach
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