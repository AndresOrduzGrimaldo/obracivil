<?php

session_start();
$con=@mysqli_connect('127.0.0.1', 'admbd', 'obracivil123', 'obra_civil');

  if(!$con)
  {
      die("imposible conectarse: ".mysqli_error($con));
  }
  if (@mysqli_connect_errno())
  {
      die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
  }

  $nombre = $_POST['nameobra'];
  $fechaini = $_POST['inicioobra'];
  $fechafin = $_POST['finalobra'];
  $auto_inc = "SELECT MAX(id_obra) AS ID FROM obra";
  $consulta = mysqli_query($con,$auto_inc);
  $vec = mysqli_fetch_row($consulta);
  $var= (int)$vec[0];
  $salario = rand(100000,30000000);

  $ID = $var+1;
  $ID_ADMIN = $_SESSION['id_administrador'];

  $sql_insert = "INSERT INTO obra (id_obra,nombre,fecha_inicio,fecha_fin) VALUES ('$ID','$nombre','$fechaini','$fechafin')";
  $slq_insert_admin_obra = "INSERT INTO obra_x_admin (id_obra,id_admin,salario_admin) VALUES ('$ID','$ID_ADMIN','$salario')";

  $query_insert = mysqli_query($con,$sql_insert);
  $query_admin_obra = mysqli_query($con,$slq_insert_admin_obra);

  if($query_insert && $query_admin_obra)
      {
        $msg[]="Se registro Correctamente la obra";
      }
      else
      {
        $errors[]="No se registro de forma correcta la obra" . mysqli_error($con);
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
