<!-- Modal DE ACTUALIZAR OBSERVACIONES-->
<div class="modal fade" id="editObs{{$insumo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$insumo->nombre}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('homeInventario.update',$idInventario)}}" method="post">
        @csrf 
        @method('PUT')
      <div class="modal-body">
        <div class="mb-3">
          <input style="display:none;" type="number" class="form-control" name="ID_Insumo" value="{{$insumo->id}}" required/>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">Observaciónes:</label>
          <input type="text" class="form-control" name="observaciones" id="cantidad" aria-describedby="helpId" value="{{$inventarioInsumo->observaciones}}" required/>
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

<!-- Modal DE ACTUALIZAR CANTIDAD FISICA-->
<div class="modal fade" id="editCantFis{{$insumo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$insumo->nombre}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('homeInventario.update',$idInventario)}}" method="post">
        @csrf 
        @method('PUT')
      <div class="modal-body">
        <div class="mb-3">
          <input style="display:none;" type="number" class="form-control" name="ID_Insumo" value="{{$insumo->id}}" required/>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">CANTIDAD FISICA</label>
          <input type="number" class="form-control" name="cantidad" id="cantidad" aria-describedby="helpId" step="0.01" min="0" value="{{$inventarioInsumo->cantidadFisica}}" required/>
        </div>
        <div class="mb-3">
          <label for="" class="form-label">UNIDAD DE MEDIDA</label>
          <select name="ID_UnidadMedida" class="form-control" required>
            @foreach($unidadMedidas as $unidadMedida)
                @if ($unidadMedida->id==$inventarioInsumo->ID_UnidadMedida)
                    <option value="{{$unidadMedida->id}}" selected>{{$unidadMedida->nombre}}</option>
                @else
                    <option value="{{$unidadMedida->id}}">{{$unidadMedida->nombre}}</option>
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

<!-- Modal DE ACTUALIZAR OBSERVACIONES-->
<div class="modal fade" id="editAjuste{{$insumo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('homeInventario.update',$idInventario)}}" method="post">
        @csrf 
        @method('PUT')
      <div class="modal-body">
        <div class="mb-3">
          <input style="display:none;" type="number" class="form-control" name="ID_Insumo" value="{{$insumo->id}}" required/>
        </div>
        <div class="mb-3">
          <input type="text" class="form-control" name="ajuste" id="input_ajuste{{$insumo->id}}" aria-describedby="helpId" required/>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="sumbit{{$insumo->id}}" type="sumbit" class="btn btn-primary">Guardar</button>
      </div>
      </form>
    </div>
  </div>
</div>