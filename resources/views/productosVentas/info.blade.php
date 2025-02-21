
<!-- Modal DE ACTUALIZAR Y ELIMINAR -->
<div class="modal fade" id="edit{{$productosVentas->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDITAR PRODUCTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('homeProductosVentas.update',$productosVentas->id)}}" method="post">
        @csrf 
        @method('PUT')
      <div class="modal-body">
      <div class="mb-3">
            <label for="" class="form-label">Precio:</label>
            <input type="number" class="form-control" name="precio" id="precio" aria-describedby="helpId" placeholder="" value="{{$productosVentas->precio}}"/>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Cantidad:</label>
            <input type="number" class="form-control" name="cantidad" id="cantidad" aria-describedby="helpId" placeholder="" value="{{$productosVentas->cantidad}}"/>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Producto:</label>
            <select name="ID_Producto" id="" class="form-control">
                @foreach($productos as $productos)
                @if($productos->id == $productosVentas->ID_Producto)
                <option value="{{$productos->id}}" selected> {{$productos->id}} </option>
                @else
                <option value="{{$productos->id}}"> {{$productos->nombre}} </option>
                @endif
                @endforeach
            </select>
           
        </div>

        <div class="mb-3">
            <label for="" class="form-label">No. Venta:</label>
            <select name="ID_Venta" id="" class="form-control">
                @foreach($ventas as $ventas)
                @if($ventas->id == $productosVentas->ID_Venta)
                <option value="{{$ventas->id}}" selected> {{$ventas->id}} </option>
                @else
                <option value="{{$ventas->id}}"> {{$ventas->nombre}} </option>
                @endif
                @endforeach
            </select>
           
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="sumbit" class="btn btn-primary">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- VALIDACION PARA ELIMINAR REGISTRO -->
<div class="modal fade" id="delete{{$productosVentas->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ELIMINAR PRODUCTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form action="{{route('homeProductosVentas.destroy', $productosVentas->id)}}" method="post">
        @csrf 
        @method('DELETE')
      <div class="modal-body">
       ¿ESTAS SEGURO DE ELIMINAR EL REGISTRO <strong>{{$productosVentas->id}} ?</strong>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="sumbit" class="btn btn-primary">Confirmar</button>
      </div>
    </form>
    </div>
  </div>
</div>