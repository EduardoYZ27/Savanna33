

<!-- Modal DE AGREGAR -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR NUEVA UNIDAD DE MEDIDA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('homeUnidadMedidas.store')}}" method="post">
        @csrf 
      <div class="modal-body">

      @if($errors->has('nombre'))
    <div class="alert alert-danger">{{ $errors->first('nombre') }}</div>
      @endif

        <div class="mb-3">
            <label for="" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="" value="{{ old('nombre') }}" required/>
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