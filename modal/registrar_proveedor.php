<div class="modal fade" id="registrarProveedorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Registra un Proveedor</h4>
      </div>
      <div id="div_ajax_registro_pro"> </div>
      <div class="modal-body">
        <form id="registrarProveedor" method="post" action="../gestion_proveedor/registrar_proveedor.php">
          <div class="modal-body">
              <div class="form-group">
                <label for="codigo" class="control-label">Nombre del Proveedor:</label>
                <input type="text" class="form-control" id="nameproveedor" name="nameproveedor"   placeholder="Nombre del Proveedor" value="">
              </div>
            <div class="form-group">
                <label for="nombre" class="control-label">NIT:</label>
                <input type="text" class="form-control" id="nitprovee" name="nitprovee"  placeholder="NIT" value="">
            </div>
            <div class="form-group">
                <label for="nombre" class="control-label">Telefono:</label>
                <input type="text" class="form-control" id="telefonopro" name="telefonopro"  placeholder="Telefono" value="">
            </div>
            <div class="form-group">
                <label for="nombre" class="control-label">Direccion:</label>
                <input type="text" class="form-control" id="direccionpro" name="direccionpro"  placeholder="Direccion " value="">
            </div>
          </div>  
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="registrarpro">Registrar Proveedor!</button>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>