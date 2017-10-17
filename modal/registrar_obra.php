<div class="modal fade" id="registrarobra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Registra una obra</h4>
      </div>
      <div id="div_ajax_registro"> </div>
      <div class="modal-body">
        <form id="registrarObra" method="post" action="../gestion/registro_obra.php">
          <div class="modal-body">
              <input type="hidden" id="ID" name="ID">
              <div class="form-group">
                <label for="codigo" class="control-label">Nombre de la Obra:</label>
                <input type="text" class="form-control" id="nameobra" name="nameobra"   placeholder="Nombre de la Obra" value="">
              </div>
            <div class="form-group">
                <label for="nombre" class="control-label">Fecha Inicio Obra:</label>
                <input type="date" class="form-control" id="inicioobra" name="inicioobra"  placeholder="Fecha Inicio obra" value="">
            </div>
            <div class="form-group">
                <label for="nombre" class="control-label">Fecha Fin Obra:</label>
                <input type="date" class="form-control" id="finalobra" name="finalobra"  placeholder="Fecha Fin obra" value="">
            </div>
          </div>  
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="registrarObra">Registra Obra!</button>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>
