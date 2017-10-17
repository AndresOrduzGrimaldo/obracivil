<?php

$con=@mysqli_connect('127.0.0.1', 'admbd', 'obracivil123', 'obra_civil');

  if(!$con)
  {
      die("imposible conectarse: ".mysqli_error($con));
  }
  if (@mysqli_connect_errno())
  {
      die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
  }

  $nombre = $_POST['nombreproveedor'];
  $direccion = $_POST['direccionproveedor'];
  $nit = $_POST['nitproveedor'];
  $telefono = $_POST['telefonoproveedor'];
  $ID = $_POST['IDproveedor'];

  $sql_up_pro = "UPDATE proveedor SET nombre='$nombre', direccion='$direccion' ,nit='$nit',telefono='$telefono' WHERE id_proveedor='$ID'";

  $query_pro = mysqli_query($con,$sql_up_pro);

  if($query_pro)
      {
        $msg[]="Se Actualizo Correctamente";
      }
      else
      {
        $errors[]="No se actualizo de forma correcta" . mysqli_error($con);
      }

  if (isset($errors))
  {
    ?>
    <div class="alert alert-danger" role="alert">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error!</strong>
        <?php
          foreach ($errors as $error)
          {
            echo $error;
          }
        ?>
    </div>
    <?php
  }


 else if (isset($msg)){
    ?>
    <div class="alert alert-success" role="alert">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
       <strong>¡Bien hecho!</strong><br>
        <?php
          foreach ($msg as $messages) {
           echo $messages;
          }
        ?>
    </div>
    <?php
  }
