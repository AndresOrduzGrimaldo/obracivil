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
    $nombre = $_POST['nombreing'];
    $apellido = $_POST['apellidoing'];
    $email = $_POST['email'];
    $fecha = $_POST['fecha'];
    $cedula = $_POST['cedula'];
    $pass = $_POST['password'];

    $sql = "INSERT INTO administrador (id_administrador,nombre,apellido,cedula,fecha_nac,correo,password) VALUES('$cedula','$nombre','$apellido','$cedula','$fecha','$email','$pass')";

    $query = mysqli_query($con,$sql);

    if($query)
      {
        $msg[]="Se registro Correctamente";
      }
      else
      {
        $errors[]="No se registro de forma correcta" . mysqli_error($con);
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
