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


  $id_personal = $_POST['codigoempleado'];
  $ID_jefe = $_POST['id_admin'];
  $nombre = $_POST['nameempleado'];
  $apellido = $_POST['apellidoemp'];
  $cedula = $_POST['cedulaemp'];
  $fecha = $_POST['fechanac'];
  $salario = $_POST['salarioemp'];
  $email = $_POST['emailemp'];
  $obra= $_POST['obra'];

  $id_obra = $obra[0];


  $sql = "INSERT INTO personal (id_personal,nombre,apellido,cedula,fecha_nac,salario,correo,id_obra,jefe) VALUES('$id_personal','$nombre','$apellido','$cedula','$fecha','$salario','$email','$id_obra','$ID_jefe')";

  $query_inser = mysqli_query($con,$sql);

  if($query_inser)
      {
        $msg[]="Se registro Correctamente el empleado a la obra";
      }
      else
      {
        $errors[]="No se registro de forma correcta el empleado" . mysqli_error($con);
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
