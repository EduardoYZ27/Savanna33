
<!-- Modal DE ACTUALIZAR Y ELIMINAR -->
<div class="modal fade" id="edit{{$categoria->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDITAR CATEGORIA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('homeCategorias.update',$categoria->id)}}" method="post">
        @csrf 
        @method('PUT')
      <div class="modal-body">
      <div class="mb-3">
    <label for="nombre" class="form-label">Nombre:</label>
    <input type="text" class="form-control" name="nombre" id="nombre" 
        placeholder="Ingrese el nombre" 
        value="{{$categoria->nombre}}" 
        pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]+" 
        title="Solo se permiten letras y espacios" 
        required/>
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
<div class="modal fade" id="delete{{$categoria->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ELIMINAR CATEGORIA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form action="{{route('homeCategorias.destroy', $categoria->id)}}" method="post">
        @csrf 
        @method('DELETE')
      <div class="modal-body">
       ¿ESTAS SEGURO DE ELIMINAR EL REGISTRO <strong>{{$categoria->nombre}} ?</strong>
      <div class="modal-footer">
        <button type="sumbit" class="btn btn-primary">Confirmar</button>
      </div>
    </form>
    </div>
  </div>
</div>