

<!-- Modal DE AGREGAR -->
<div class="modal fade" id="createInventarioInicial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">INVENTARIO INICIAL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <form action="{{route('homeInventario.inventarioInicial')}}" method="post">
          @csrf 
          <div class="modal-body">
              <div class="mb-3">
                  <div class="table-responsive">
                      <table class="table">
                          <thead>
                              <tr class="text-center">
                                  <th scope="col">INSUMO</th>
                                  <th scope="col">CANTIDAD FISICA</th>
                                  <th scope="col">UNIDAD MEDIDA</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach($insumos as $insumo)
                              <tr>
                                  <td style="display: none;">
                                      <input type="text" class="form-control" name="ID_Insumo[]" value="{{$insumo->id}}" required/>
                                  </td>
                                  <td>{{$insumo->nombre}}</td>
                                  <td>
                                      <input type="number" step="any" class="form-control" name="cantidadFisica[]" step="0.01" min="0" value="0" required/>
                                  </td>
                                  <td>
                                      <select name="ID_UnidadMedida[]" class="form-control" required>
                                          @foreach($unidadMedidas as $unidadMedida)
                                              @if ($unidadMedida->id==$insumo->ID_UnidadMedida)
                                                  <option value="{{$unidadMedida->id}}" selected>{{$unidadMedida->nombre}}</option>
                                              @else
                                                  <option value="{{$unidadMedida->id}}">{{$unidadMedida->nombre}}</option>
                                              @endif
                                          @endforeach
                                      </select>
                                  </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                  </div>
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



<!-- Modal DE AGREGAR -->
<div class="modal fade" id="createNuevoInventario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿EN VERDAD DESEA GENERAR UN NUEVO INVENTARIO?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
          <form action="{{route('homeInventario.store')}}" method="post">
            @csrf 
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
      
      </div>
    </div>
  </div>