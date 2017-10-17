<div class="modal fade" id="generar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Generar Archivo</h4>
      </div>
      <div id="dive"></div>
      <div class="modal-body">
        <form id="generarpdf" method="post" action="../gestion/generar_pdf_obra.php">
          <input type="hidden" id="general" name="general">
          <input type="hidden" id="loca" name="loca" value="loca">
          <div class="modal-body">
	          <p class="lead text-muted text-center" style="display: block;margin:10px">Desea descargar el arhivo?</p>
          </div>  
          <div class="modal-footer">
           <button type="button" class="btn btn-lg btn-default" aria-label="Close">Cancelar</button>
           <button type="submit" class="btn btn-lg btn-primary" name="down">Aceptar</button>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>
