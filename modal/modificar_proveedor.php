<div class="modal fade" id="modalproveedor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modifica Proveedor</h4>
      </div>
      <div id="div_ajax_update_pro"> </div>
      <div class="modal-body">
        <form id="modificarProveedor" method="post" action="../gestion_proveedor/modificar_proveedor.php">
          <div class="modal-body">
              <input type="hidden" id="IDproveedor" name="IDproveedor">
              <div class="form-group">
                <label for="codigo" class="control-label">Nombre del Proveedor:</label>
                <input type="text" class="form-control" id="nombreproveedor" name="nombreproveedor"   placeholder="Nombre del Proveedor" value="">
              </div>
            <div class="form-group">
                <label for="nombre" class="control-label">NIT del proveedor:</label>
                <input type="text" class="form-control" id="nitproveedor" name="nitproveedor"  placeholder="NIT del proveedor" value="">
            </div>
            <div class="form-group">
                <label for="nombre" class="control-label">Telefono:</label>
                <input type="text" class="form-control" id="telefonoproveedor" name="telefonoproveedor"  placeholder="Telefono" value="">
            </div>
            <div class="form-group">
                <label for="nombre" class="control-label">Direccion:</label>
                <input type="text" class="form-control" id="direccionproveedor" name="direccionproveedor"  placeholder="Direccion" value="">
            </div>
          </div>  
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="actualizarProveedor">Actualizar!</button>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>