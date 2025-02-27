

<!-- Modal DE AGREGAR -->
<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR NUEVO PRODUCTO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>



      <form action="{{route('homeProductos.store')}}" method="post">
        @csrf 
      <div class="modal-body">

      <div class="mb-3">
    <label for="nombre" class="form-label">Nombre:</label>
    <input type="text" class="form-control" name="nombre" id="nombre" 
        placeholder="Ingrese solo texto" 
        pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" 
        title="Solo se permiten letras y espacios" 
        required/>
</div>

<div class="mb-3">
    <label for="precio" class="form-label">Precio:</label>
    <input type="number" class="form-control" name="precio" id="precio" 
        placeholder="Ingrese el precio" 
        min="0" 
        step="0.01" 
        required/>
</div>

<div class="mb-3">
            <label for="categoria" class="form-label">Categoría:</label>
            <div class="d-flex align-items-center">
                <!-- Botón para abrir el modal de nueva categoría SIN CERRAR el actual -->
                <button type="button" class="btn btn-success me-2" data-toggle="modal" data-target="#createCategoria" data-backdrop="static" data-keyboard="false">+</button>

                <!-- Select de categorías -->
                <select name="ID_Categoria" id="categoriaSelect" class="form-control">
                    @foreach($categoria as $categoria)
                        <option value="{{$categoria->id}}"> {{$categoria->nombre}} </option>
                    @endforeach
                </select>
            </div>
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

<!-- Modal de Agregar Categoría (Se muestra sobre el de Producto) -->
<div class="modal fade" id="createCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelCategoria" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelCategoria">AGREGAR NUEVA CATEGORÍA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="{{route('homeCategorias.store')}}" method="post">
        @csrf 
        <div class="modal-body">
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombreCategoria" 
                placeholder="Ingrese el nombre de la categoría" 
                pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+" 
                title="Solo se permiten letras y espacios" 
                required>
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

<!-- Script para que el formulario de categorías se cierre correctamente y recargue la lista -->
<script>
    $(document).ready(function() {
        $('#formCategoria').submit(function(e) {
            e.preventDefault(); // Evita que se recargue la página al enviar el formulario

            $.ajax({
                type: "POST",
                url: "{{ route('homeCategorias.store') }}", // Ruta para guardar categoría
                data: $(this).serialize(),
                success: function(response) {
                    // Agregar la nueva categoría al select sin recargar la página
                    $('#categoriaSelect').append(new Option(response.nombre, response.id));

                    // Cierra solo el modal de categoría
                    $('#createCategoria').modal('hide');

                    // Asegurar que el modal de producto siga abierto
                    $('body').addClass('modal-open'); // Evita que se cierre todo
                    $('.modal-backdrop').last().remove(); // Elimina el backdrop duplicado

                    // Limpia el campo de categoría después de agregar
                    $('#nombreCategoria').val('');
                },
                error: function() {
                    alert('Error al agregar la categoría. Inténtalo de nuevo.');
                }
            });
        });
    });
</script>

