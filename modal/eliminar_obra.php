<div class="modal fade" id="dataDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar Obra</h4>
      </div>
      <div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Este Modulo Aun esta en desarrollo</strong>
		  </div>
      <div class="modal-body">
        <form id="eliminarObra" method="post" action="../gestion/eliminar_obra.php">
          <input type="hidden" id="IDeliminar" name="IDeliminar">
          <div class="modal-body">
            <h2 class="text-center text-muted">Estas seguro?</h2>
	          <p class="lead text-muted text-center" style="display: block;margin:10px">Esta acción eliminará de forma permanente la obra. Deseas continuar?</p>
          </div>  
          <div class="modal-footer">
           <!--<button type="button" class="btn btn-lg btn-default" aria-label="Close">Cancelar</button>
           <button type="submit" class="btn btn-lg btn-primary" name="aceptar">Aceptar</button>-->
          </div>
      </form>
      </div>
    </div>
  </div>
</div>
