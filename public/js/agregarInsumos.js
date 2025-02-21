$(document).ready(function () {
    var contadorCampos = 1; // Agrega esta línea

    $(document).on("click", ".agregarCampoInsumo", function () {
        agregarCampo($(this).closest(".modal-body"));
    });

    $(document).on("click", ".eliminarCampoInsumo", function () {
        eliminarCampo($(this).closest(".modal-body"));
    });

    function agregarCampo(modalBody) {
        var nuevoCampo = `
            <div class="conjunto-campos" id="campo-${contadorCampos}">
                <div class="mb-3">
                    <label for="ID_Insumo" class="form-label">Seleccionar Insumo:</label>
                    <select name="ID_Insumo[]" class="form-control">
                        ${insumo.map(insumo => `<option value="${insumo.id}">${insumo.nombre}</option>`).join('')}
                    </select>
                </div>

                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad:</label>
                    <input type="number" step="any" class="form-control" name="cantidad[]" aria-describedby="helpId" placeholder="" min="0" required />
                </div>

                <div class="mb-3">
                    <label for="cantidad" class="form-label">Merma:</label>
                    <input type="number" step="any" class="form-control" name="merma[]" aria-describedby="helpId" placeholder="" min="0" required/>
                </div>

                <div class="mb-3">
                    <label for="ID_UnidadMedida" class="form-label">Unidad Medida:</label>
                    <select name="ID_UnidadMedida[]" class="form-control">
                        ${unidadMedida.map(unidad => `<option value="${unidad.id}">${unidad.nombre}</option>`).join('')}
                    </select>
                </div>
            </div>
        `;

        modalBody.find(".camposInsumoDinamicos").append(nuevoCampo);
        contadorCampos++; // Agrega esta línea para incrementar el contador
    }

    function eliminarCampo(modalBody) {
        var campos = modalBody.find(".conjunto-campos");
        if (campos.length = 1) {
            campos.last().remove();
            contadorCampos--; // Agrega esta línea para decrementar el contador
        }
    }
});
