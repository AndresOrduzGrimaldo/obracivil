<?php
  $datos = get_suministros_proveedor();
?>
<div class="modal fade" id="administrar_obra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Administrar la obra</h4>
        <h4 id="nombre_obra"></h4>
      </div>
      <div id="div_ajax_suministro_obra"> </div>
      <div class="modal-body">
        <form id="obra_admin" method="post" action="../pedido/pedido.php">
          <div class="modal-body">
              <input type="hidden" id="IDOBRA" name="IDOBRA" value="">
              <div class="form-group">
                <label for="nombre" class="control-label">Suministros:</label>
                <select class="form-control" name="suminis[]">
              <?php
                while($row = mysqli_fetch_row($datos))
                {
                  ?>
                    <option value="<?php echo $row[0].'-'.$row[1]; ?>"><?php echo $row[2] . ' - '. $row[4]; ?></option>
                  <?php
                }
              ?>
              </select>
            </div>
              <div class="form-group">
                <label for="codigo" class="control-label">Cantida:</label>
                <input type="text" class="form-control" id="cantidadped" name="cantidadped"   placeholder="Digite la cantidad">
              </div>
          </div>  
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="actualizarObra">Registrar!</button>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>