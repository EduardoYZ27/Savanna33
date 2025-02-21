
<!-- Modal DE ACTUALIZAR Y ELIMINAR -->
<div class="modal fade" id="edit{{$insumos->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDITAR INSUMO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('home.update',$insumos->id)}}" method="post">
        @csrf 
        @method('PUT')
      <div class="modal-body">
        <div class="mb-3">
            <label for="" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="" value="{{$insumos->nombre}}" required/>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Descripción:</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="" value="{{$insumos->descripcion}}" required/>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Uidade de Medida:</label>
            <select name="ID_UnidadMedida" id="" class="form-control">
                @foreach($unidadMedidas as $unidadMedidas)
                @if($unidadMedidas->id == $insumos->ID_UnidadMedida)
                <option value="{{$unidadMedidas->id}}" selected> {{$unidadMedidas->nombre}} </option>
                @else
                <option value="{{$unidadMedidas->id}}"> {{$unidadMedidas->nombre}} </option>
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
<div class="modal fade" id="delete{{$insumos->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ELIMINAR INSUMO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form action="{{route('home.destroy', $insumos->id)}}" method="post">
        @csrf 
        @method('DELETE')
      <div class="modal-body">
       ¿ESTAS SEGURO DE ELIMINAR EL REGISTRO <strong>{{$insumos->nombre}} ?</strong>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="sumbit" class="btn btn-primary">Confirmar</button>
      </div>
    </form>
    </div>
  </div>
</div>