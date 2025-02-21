

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
            <label for="" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="" required/>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Precio:</label>
            <input type="number" class="form-control" name="precio" id="precio" aria-describedby="helpId" placeholder="" min="0" required/>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Categoria:</label>
            <select name="ID_Categoria" id="" class="form-control">
                @foreach($categoria as $categoria)
                <option value="{{$categoria->id}}"> {{$categoria->nombre}} </option>
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