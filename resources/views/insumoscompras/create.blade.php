<!-- MODAL AGREGAR COMPRA DE INSUMOS -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR UNA NUEVA COMPRA DE INSUMOS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('homeInsumosCompras.store')}}" method="post">
        @csrf 
        <div class="modal-body">

          <!-- INSUMO -->
          <div class="mb-3">
            <label for="" class="form-label">Insumo:</label>
            <select name="ID_Insumo" id="" class="form-control">
                @foreach($insumos as $insumo)
                <option value="{{$insumo->id}}"> {{$insumo->nombre}} </option>
                @endforeach
            </select>
          </div> 

          <!-- UNIDAD DE MEDIDA + BOTÓN PARA ABRIR MODAL -->
          <div class="mb-3">
            <label for="" class="form-label">Unidad de Medida:</label>
            <div class="d-flex align-items-center">
                <select name="ID_UnidadMedida" id="ID_UnidadMedida" class="form-control flex-grow-1">
                    @foreach($unidadMedidas as $unidadMedida)
                    <option value="{{$unidadMedida->id}}"> {{$unidadMedida->nombre}} </option>
                    @endforeach
                </select>
                <button type="button" class="btn btn-success ml-2" data-toggle="modal" data-target="#modalUnidadMedida">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
          </div>
          

          <!-- CANTIDAD -->
          <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad:</label>
            <input type="number" class="form-control" name="cantidad" id="cantidad" 
                placeholder="Ingrese la cantidad" 
                min="0" step="1" 
                title="Solo se permiten números enteros positivos" 
                required>
          </div>

          <!-- COSTOS -->
          <label for="">Ingresa alguno de los costos:</label>

          <div class="mb-3">
            <label for="costo" class="form-label">Costo Unitario:</label>
            <input type="number" step="0.01" class="form-control" name="costo" id="costo" 
                placeholder="Ingrese el costo unitario" 
                min="0" 
                pattern="^\d+(\.\d{1,2})?$"
                title="Ingrese un número válido con hasta dos decimales" 
                required>
          </div>

          <div class="mb-3">
            <label for="costoT" class="form-label">Costo Total:</label>
            <input type="number" step="0.01" class="form-control" name="costoT" id="costoT" 
                placeholder="Costo total" 
                min="0" readonly>
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

<!-- MODAL AGREGAR UNIDAD DE MEDIDA -->
<div class="modal fade" id="modalUnidadMedida" tabindex="-1" role="dialog" aria-labelledby="modalUnidadMedidaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalUnidadMedidaLabel">AGREGAR NUEVA UNIDAD DE MEDIDA</h5>
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
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" 
                placeholder="Ingrese el nombre" 
                value="{{ old('nombre') }}" 
                pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ ]+" 
                title="Solo se permiten letras y espacios" 
                required/>
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

<!-- SCRIPT PARA CALCULAR COSTO TOTAL -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const cantidadInput = document.getElementById("cantidad");
        const costoInput = document.getElementById("costo");
        const costoTotalInput = document.getElementById("costoT");

        function calcularCostoTotal() {
            const cantidad = parseFloat(cantidadInput.value) || 0;
            const costoUnitario = parseFloat(costoInput.value) || 0;
            const total = cantidad * costoUnitario;

            // Actualizar el campo de Costo Total con 2 decimales
            costoTotalInput.value = total.toFixed(2);
        }

        // Escuchar cambios en los campos de cantidad y costo unitario
        cantidadInput.addEventListener("input", calcularCostoTotal);
        costoInput.addEventListener("input", calcularCostoTotal);
    });
</script>

<!-- Asegúrate de tener FontAwesome para los iconos -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


