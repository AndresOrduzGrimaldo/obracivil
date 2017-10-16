<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Inicio Sesion</h4>
      </div>
      <div id="div_error_login"></div>
      <div class="modal-body">
        <form id="loginData" method="post" action="page_part/login_usuario.php">
          <div class="modal-body">
              <div class="form-group">
                <label for="codigo" class="control-label">Email:</label>
                <input type="text" class="form-control" id="usuario" name="usuario"   placeholder="Digite su Email">
              </div>
            <div class="form-group">
                <label for="nombre" class="control-label">Contraseña:</label>
                <input type="password" class="form-control" id="pass" name="pass"  placeholder="Digite su contraseña">
            </div>
          </div>  
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="login">Ingresar!</button>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>
