<div class="modal fade" id="modalSuministro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Suministro</h4>
      </div>
      <div id="div_ajax_registro_sum"> </div>
      <div class="modal-body">
        <form id="suministroForm" method="post" action="../gestion_proveedor/agregar_suministro.php">
            <input type="hidden" id="idPro" name="idPro">
          <div class="modal-body">
              <div class="form-group">
                <label for="codigo" class="control-label">Nombre:</label>
                <input type="text" class="form-control" id="nombresuministro" name="nombresuministro"   placeholder="Digite el nombre">
              </div>
            <div class="form-group">
                <label for="nombre" class="control-label">Descripcion:</label>
                <input type="text" class="form-control" id="descripcionsum" name="descripcionsum"  placeholder="Digite descripcion">
            </div>
            <div class="form-group">
                <label for="nombre" class="control-label">Precio:</label>
                <input type="text" class="form-control" id="precio" name="precio"  placeholder="Digite descripcion">
            </div>
            <div class="form-group">
                <label for="nombre" class="control-label">unidad de medida:</label>
                <input type="text" class="form-control" id="medida" name="medida"  placeholder="Digite su medida">
            </div>
          </div>  
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="agregar">Registrar!</button>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>
