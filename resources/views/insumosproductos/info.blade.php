
<!-- Modal DE ACTUALIZAR Y ELIMINAR -->
<div class="modal fade" id="edit{{$insumoProducto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDITAR INSUMOS PROMEDIO DE CADA PRODUCTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{ route('homeInsumosProductos.update', $insumoProducto->id) }}" method="post">
        @csrf 
        @method('PUT')
        <div class="modal-body">
          <!-- Producto -->
          <div class="mb-3">
            <label for="" class="form-label">Producto:</label>
            <select name="ID_Producto" id="" class="form-control">
              @foreach($productos as $producto)
                @if($producto->id == $insumoProducto->producto->id)
                  <option value="{{$producto->id}}" selected> {{$producto->nombre}} </option>
                @else
                  <option value="{{$producto->id}}"> {{$producto->nombre}} </option>
                @endif
              @endforeach
            </select>
          </div>

          <!-- Categoría -->
          <div class="mb-3">
            <label for="" class="form-label">Categoría:</label>
            <select name="ID_Categoria" id="" class="form-control">
              @if($insumoProducto->categoria)
                <option value="{{ $insumoProducto->categoria->id }}" selected>{{ $insumoProducto->categoria->nombre }}</option>
              @endif
              @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}"> {{$categoria->nombre}} </option>
              @endforeach
            </select>
          </div>

          <!-- Insumo -->
          <div class="mb-3">
            <label for="" class="form-label">Insumo:</label>
            <select name="ID_Insumo[]" id="" class="form-control" multiple>
              @if($insumoProducto->insumos)
                @foreach($insumos as $insumo)
                  <option value="{{$insumo->id}}" {{ $insumoProducto->insumos->contains($insumo->id) ? 'selected' : '' }}> {{$insumo->nombre}} </option>
                @endforeach
              @else
                @foreach($insumos as $insumo)
                  <option value="{{$insumo->id}}"> {{$insumo->nombre}} </option>
                @endforeach
              @endif
            </select>
          </div>

          <!-- Cantidades -->
          <div class="mb-3">
            <label for="" class="form-label">Cantidades:</label>
            @foreach($insumos as $insumoCantidad)
              <div class="mb-2">
                <label for="cantidad_{{ $insumoCantidad->id }}">{{ $insumoCantidad->nombre }}:</label>
                <input type="number" step="any" class="form-control" name="cantidades[{{ $insumoCantidad->id }}]" id="cantidad_{{ $insumoCantidad->id }}" aria-describedby="helpId" placeholder="" />

                <label for="" class="form-label">Unidad de Medida:</label>
            <select name="ID_UnidadMedida" id="" class="form-control">
              @if($insumoProducto->unidadMedida)
                <option value="{{ $insumoProducto->unidadMedida->id }}" selected>{{ $insumoProducto->unidadMedida->nombre }}</option>
              @endif
              @foreach($unidadMedida as $unidad)
                <option value="{{$unidad->id}}"> {{$unidad->nombre}} </option>
              @endforeach
            </select>
              </div>
            @endforeach
          </div>

          <!-- Unidad de Medida -->
          <div class="mb-3">
            
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

<!-- VALIDACION PARA ELIMINAR REGISTRO -->
<div class="modal fade" id="delete{{$insumoProducto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ELIMINAR INSUMOS DE  LOS PRODUCTOS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form action="{{route('homeInsumosProductos.destroy', $insumoProducto->id)}}" method="post">
        @csrf 
        @method('DELETE')
      <div class="modal-body">
       ¿ESTAS SEGURO DE ELIMINAR EL REGISTRO <strong>{{$insumoProducto->id}} ?</strong>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="sumbit" class="btn btn-primary">Confirmar</button>
      </div>
    </form>
    </div>
  </div>
</div>