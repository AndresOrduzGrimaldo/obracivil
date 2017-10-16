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

 $max_id = "SELECT MAX(id_proveedor) AS id FROM proveedor";
 $consulta = mysqli_query($con,$max_id);
 $vec = mysqli_fetch_row($consulta);
 $var = (int)$vec[0];
 $ID = $var+1000;
 $nombre = $_POST['nameproveedor'];
 $nit = $_POST['nitprovee'];
 $telefono = $_POST['telefonopro'];
 $direccion = $_POST['direccionpro'];

 $sql_insert_pro = "INSERT INTO proveedor (id_proveedor,nit,nombre,telefono,direccion) VALUES ('$ID','$nit','$nombre','$telefono','$direccion')";

 $query_exit= mysqli_query($con,$sql_insert_pro);

 if($query_exit)
      {
        $msg[]="Se registro Correctamente el proveedor";
      }
      else
      {
        $errors[]="No se registro de forma correcta el proveedor" . mysqli_error($con);
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
