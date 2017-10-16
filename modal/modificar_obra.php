<div class="modal fade" id="modalobra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modifica la obra</h4>
      </div>
      <div id="div_ajax_update"> </div>
      <div class="modal-body">
        <form id="modificarObra" method="post" action="../gestion/modificar_obra.php">
          <div class="modal-body">
              <input type="hidden" id="ID" name="ID">
              <div class="form-group">
                <label for="codigo" class="control-label">Nombre de la Obra:</label>
                <input type="text" class="form-control" id="nombreobra" name="nombreobra"   placeholder="Nombre de la Obra" value="">
              </div>
            <div class="form-group">
                <label for="nombre" class="control-label">Fecha Inicio Obra:</label>
                <input type="date" class="form-control" id="iniobra" name="iniobra"  placeholder="Fecha Inicio obra" value="">
            </div>
            <div class="form-group">
                <label for="nombre" class="control-label">Fecha Fin Obra:</label>
                <input type="date" class="form-control" id="finobra" name="finobra"  placeholder="Fecha Fin obra" value="">
            </div>
          </div>  
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="actualizarObra">Actualizar!</button>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>
