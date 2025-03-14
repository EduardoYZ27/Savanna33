<!-- Modal DE AGREGAR ORDEN-->
<div class="modal fade" id="createOrden" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nueva Orden</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <form action="{{route('homeOrden.store')}}" method="post">
            @csrf 
            <div class="modal-body">
                <div class="mb-3">
                    <div class="table-responsive">
                        <table id="lista_productos" class="table">
                            <thead class="text-center">
                                <tr>
                                    <th class="col-md-3" scope="col">PRODUCTO</th>
                                    <th class="col-md-2" scope="col">CANTIDAD</th>
                                    <th class="col-md-4" scope="col">DETALLES ADICIONALES</th>
                                    <th class="col-md-1" scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <td style="display: none;">
                                    <input type="text" class="form-control" name="NoConsumo" value="{{$numero}}" required/>
                                </td>
                            </tbody>
                        </table>

                        <table class="table">
                            <tbody class="text-center">
                                <td class="col-md-3">
                                    <select id="select_producto" name="producto[]" class="form-control" required>
                                        @foreach($productos as $producto)
                                                <option value="{{$producto->id}}">{{$producto->nombre}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="col-md-2">
                                    <input id="input_cantidad" type="number" class="form-control" value="1"/>
                                    <p id="error" style="margin:0; color: red; font-size:10px;"></p>
                                </td>
                                <td class="col-md-4">
                                    <input id="input_detalle" type="text" class="form-control"/>
                                </td>
                                <td class="col-md-1">
                                    <button id="btn_agregarProducto" type="button" class="btn btn-primary">
                                        +
                                    </button>
                                </td>
                            </tbody>
                        </table>
                    </div>
                </div>  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button id="btn_agragarOrden" type="submit" class="btn btn-primary">Agregar</button>
            </div>
        </form>
      
      </div>
    </div>
</div>


<!-- Modal DE COBRAR POR SEPARADO -->
<div class="modal fade" id="cobrarMesa{{$numero}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">COBRO DE LA MESA {{$numero}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
          <form action="{{route('homeOrden.cobrarMesa')}}" method="post">
            @csrf
            
            <input style="display:none;" type="number" name="NoConsumo" value="{{$numero}}" required/>
            <input style="display:none;" type="text" id="input_total{{$numero}}" name="precioVenta" value="{{$totalMesa}}" required/>
            <br>
            <div class="modal-body text-center">
                <h4 id="total{{$numero}}">TOTAL: $ {{$totalMesa}}</h4>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="" class="form-label">Descuento:</label>
                    <select name="descuento" id="cbox{{$numero}}" class="form-control">
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
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var cont = 0;

        $('#btn_agragarOrden').css('display','none');
        $('#btn_agregarProducto').click(function(){
            cont=cont+1;
            $('#error').text('');
            if($('#input_cantidad').val() < 1){
                $('#error').text('No puede colocar cantidades menores a 1');
            }
            else if (!Number.isInteger(parseFloat($('#input_cantidad').val()))) {
                $('#error').text('No puede colocar cantidades con punto decimal');
            }
            else{

                $('#lista_productos').append(
                    '<tbody id="tbody_list_'+cont+'" class="text-center">'+
                    //'<td class="col-md-3">'+$('#select_producto').val()+'</td>'+
                    '<td class="col-md-3">'+$('#select_producto option:selected').text()+'</td>'+
                    '<td class="col-md-2">'+$('#input_cantidad').val()+'</td>'+
                    '<td class="col-md-4">'+$('#input_detalle').val()+'</td>'+
                    '<td class="col-md-1"><button id="'+cont+'" type="button" class="btn_remove_list btn btn-danger">-</button></td>'+
                    '</tbody>'+
                    '<tbody id="tbody_form_'+cont+'" style="display:none;">'+
                    '<td><input type="number" min="1" name="ID_Producto[]" value="'+$('#select_producto').val()+'" required/></td>'+
                    '<td><input type="number" min="1" name="cantidad[]" value="'+$('#input_cantidad').val()+'" required/></td>'+
                    '<td><input type="text" name="detalleAdicional[]" value=" '+$('#input_detalle').val()+' " required/></td>'+
                    '</tbody>'
                );
                $('#btn_agragarOrden').css('display','block');

                $('.btn_remove_list').click(function(){
                    
                    var id = $(this).attr('id');
                    $('#tbody_list_'+id).remove();
                    $('#tbody_form_'+id).remove();
                    var numeroTbody = $('#lista_productos tbody').length;
                    if(numeroTbody<2){
                        $('#btn_agragarOrden').css('display','none');
                    }
                });

                $('#select_producto').val(1);
                $('#input_cantidad').val(1);
                $('#input_detalle').val('');
            
            }
        });

        var totalMesaString = "<?php echo $totalMesa; ?>";
        var totalMesa = parseFloat(totalMesaString);
        var NoConsumo = "<?php echo $numero; ?>";
        
          $('#cbox'+NoConsumo).change(function() {
              var desc = $(this).val();
              var totalVenta = (totalMesa-(totalMesa*(desc/100)).toFixed(2));
              $('#total'+NoConsumo).text('TOTAL: $ '+totalVenta);
              $('#input_total'+NoConsumo).val(totalVenta);
          });
    });
</script>