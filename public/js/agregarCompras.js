$(document).ready(function () {
    // Función para agregar un nuevo campo de compra
    function agregarCampoCompra() {
        var modal = $('#create');
        var modalBody = modal.find(".modal-body");
        var insumos = modal.find('.agregarCampoCompra').data('insumos');
        var unidadMedidas = modal.find('.agregarCampoCompra').data('unidadmedidas');

        var nuevoCampo = `
            <div class="card mb-3">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="ID_Insumo" class="form-label">Insumo:</label>
                        <select name="ID_Insumo[]" class="form-control">
                            ${insumos.map(insumo => `<option value="${insumo.id}">${insumo.nombre}</option>`).join('')}
                        </select>
                    </div>
                    
                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Cantidad:</label>
                        <input type="number" class="form-control cantidad" name="cantidad[]" aria-describedby="helpId" placeholder=""/>
                    </div>

                    <div class="mb-3">
                        <label for="ID_UnidadMedida" class="form-label">Unidad de Medida:</label>
                        <select name="ID_UnidadMedida[]" class="form-control">
                            ${unidadMedidas.map(unidadMedida => `<option value="${unidadMedida.id}">${unidadMedida.nombre}</option>`).join('')}
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="costoUnitario" class="form-label">Costo Unitario:</label>
                        <input type="number" step="0.01" class="form-control costoUnitario" name="costoUnitario[]" aria-describedby="helpId" placeholder=""/>
                    </div>

                    <div class="mb-3">
                        <label for="costoTotal" class="form-label">Costo Total:</label>
                        <input type="number" step="0.01" class="form-control costoTotal" name="costoTotal[]" aria-describedby="helpId" placeholder=""/>
                    </div>
                </div>
            </div>
        `;
        modalBody.find(".camposCompraDinamicos").append(nuevoCampo);
    }

    // Evento al hacer clic en el botón "Agregar Insumo"
    $(document).on("click", ".agregarCampoCompra", function (event) {
        agregarCampoCompra();
    });
});
