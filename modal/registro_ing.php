<!--Modal para registrar-->
<div class="modal fade" id="myModalRegistro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Registrate</h4>
      </div>
      <div id="success"></div>
      <div class="modal-body">
        <form id="registroIng" method="post" action="page_part/registro_ing.php">
          <div class="modal-body">
              <div class="form-group">
                <label for="codigo" class="control-label">Nombre:</label>
                <input type="text" class="form-control" id="nombreing" name="nombreing"  placeholder="Nombre">
              </div>
              <div class="form-group">
                <label for="nombre" class="control-label">Apellido:</label>
                <input type="text" class="form-control" id="apellidoing" name="apellidoing"  maxlength="50" placeholder="Apellidos">
            </div>
            <div class="form-group">
                <label for="nombre" class="control-label">Email:</label>
                <input type="text" class="form-control" id="email" name="email"  placeholder="Email">
                <div id="info"> </div>
            </div>
            <div class="form-group">
                <label for="nombre" class="control-label">Fecha Nacimiento:</label>
                <input type="text" class="form-control" id="fecha" name="fecha"  placeholder="Fecha nacimiento">
            </div>
            
            <div class="form-group">
                <label for="nombre" class="control-label">Cedula:</label>
                <input type="text" class="form-control" id="cedula" name="cedula"  placeholder="Cedula">
            </div>
            <div class="form-group">
                <label for="nombre" class="control-label">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password"  placeholder="Contraseña">
            </div>
            <div class="form-group">
                <label for="nombre" class="control-label">Rectificar Contraseña:</label>
                <input type="password" class="form-control" id="password_re" name="password_re" placeholder="Repetir Contraseña">
            </div>
          </div>  
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="login">Registrar!</button>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>

