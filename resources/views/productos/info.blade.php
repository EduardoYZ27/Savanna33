
<!-- Modal DE ACTUALIZAR Y ELIMINAR -->
<div class="modal fade" id="edit{{$productos->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDITAR PRODUCTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('homeProductos.update',$productos->id)}}" method="post">
        @csrf 
        @method('PUT')
      <div class="modal-body">
      <div class="mb-3">
            <label for="" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="" value="{{$productos->nombre}}" required/>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Precio:</label>
            <input type="text" class="form-control" name="precio" id="precio" aria-describedby="helpId" placeholder="" value="{{$productos->precio}}" required/>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Categoria:</label>
            <select name="ID_Categoria" id="" class="form-control">
                @foreach($categoria as $categoria)
                @if($categoria->id == $productos->ID_Categoria)
                <option value="{{$categoria->id}}" selected> {{$categoria->nombre}} </option>
                @else
                <option value="{{$categoria->id}}"> {{$categoria->nombre}} </option>
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
<div class="modal fade" id="delete{{$productos->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ELIMINAR PRODUCTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form action="{{route('homeProductos.destroy', $productos->id)}}" method="post">
        @csrf 
        @method('DELETE')
      <div class="modal-body">
       ¿ESTAS SEGURO DE ELIMINAR EL REGISTRO <strong>{{$productos->nombre}} ?</strong>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="sumbit" class="btn btn-primary">Confirmar</button>
      </div>
    </form>
    </div>
  </div>
</div>