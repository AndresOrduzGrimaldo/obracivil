<div class="modal fade" id="deleteProveedor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Eliminar Proveedor</h4>
      </div>
      <div id="div_delete"> </div>
      <div class="modal-body">
        <form id="eliminarProveedor" method="post" action="">
          <input type="hidden" id="IDeliminarPro" name="IDeliminarPro">
          <div class="modal-body">
            <h2 class="text-center text-muted">Estas seguro?</h2>
	          <p class="lead text-muted text-center" style="display: block;margin:10px">Esta acción eliminará de forma permanente el proveedor. Deseas continuar?</p>
          </div>  
          <div class="modal-footer">
           <button type="button" class="btn btn-lg btn-default" aria-label="Close">Cancelar</button>
           <button type="submit" class="btn btn-lg btn-primary" name="aceptar">Aceptar</button>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>