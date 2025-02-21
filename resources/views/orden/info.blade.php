<!-- Modal DE CANCELAR -->
<div class="modal fade" id="cancelarOrden{{$orden->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿ESTA SEGURO DE CANCELAR LA ORDEN NO. {{$orden->id}}?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
          <form action="{{route('homeOrden.cancelar')}}" method="post">
            @csrf
            <input style="display: none;" type="number" name="ID_Orden" value="{{$orden->id}}" required/>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </form>
      </div>
    </div>
</div>

<!-- Modal DE COBRAR POR SEPARADO -->
<div class="modal fade" id="cobrarseparado{{$orden->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">COBRO DE LA ORDEN NO. {{$orden->id}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
          <form action="{{route('homeOrden.cobrarPorSeparado')}}" method="post">
            @csrf
            <input style="display:none;" type="number" name="NoConsumo" value="{{$numero}}" required/>
            <input style="display:none;" type="number" name="ID_Orden" value="{{$orden->id}}" required/>
            <input style="display:none;" type="text" id="input_totalseparado{{$orden->id}}" name="precioVenta" value="{{$total}}" required/>
            <br>
            <div class="modal-body text-center">
                <h4 id="total_separado{{$orden->id}}">TOTAL: $ {{$total}}</h4>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="" class="form-label">Descuento:</label>
                    <select name="descuento" id="cbox_separado{{$orden->id}}" class="form-control">
                        <option value="0">No aplica</option>
                        <option value="5">5%</option>
                        <option value="10">10%</option>
                        <option value="25">25%</option>
                        <option value="50">50%</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
        </form>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function() {
        var totalString = "<?php echo $total; ?>";
        var total = parseFloat(totalString);
        var id = "<?php echo $orden->id; ?>";
        
          $('#cbox_separado'+id).change(function() {
              var desc = $(this).val();
              var totalVenta = (total-(total*(desc/100)).toFixed(2));
              $('#total_separado'+id).text('TOTAL: $ '+totalVenta);
              $('#input_totalseparado'+id).val(totalVenta);
          });
      });
  </script>
</div>