

<div class="modal fade" id="verInsumosModal{{$id}}" tabindex="-1" role="dialog" aria-labelledby="verInsumosModalLabel{{$id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verInsumosModalLabel">Insumos del Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Insumo</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Unidad de Medida</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($insumosProductos as $insumoProducto)
                            <tr>
                                <td>{{ $insumoProducto->insumo->nombre }}</td>
                                <td>{{ $insumoProducto->cantidad }}</td>
                                <td>{{ $insumoProducto->unidadMedida->nombre }}</td>
                                <td>
                                    <!-- Botón para abrir el modal de confirmación -->
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteConfirmation{{$insumoProducto->id}}">
                                        Eliminar
                                    </button>

                                </td>
                            </tr>
                        @endforeach


                        
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<!-- MODAL DE CONFIRMACIÓN PARA ELIMINAR INSUMO -->
<div class="modal fade" id="deleteConfirmation{{$insumoProducto->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationLabel{{$insumoProducto->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationLabel{{$insumoProducto->id}}">ELIMINAR INSUMO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de eliminar el insumo <strong>{{$insumoProducto->insumo->nombre}} </strong>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <!-- Formulario para enviar la solicitud DELETE al confirmar -->
                <form action="{{ route('insumosproductos.destroy', $insumoProducto->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Confirmar</button>
                </form>
            </div>
        </div>
    </div>
</div>
