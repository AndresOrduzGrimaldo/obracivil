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

  $last = "SELECT MAX(id_suministro) AS id_sum FROM suministro";
  $query_last = mysqli_query($con,$last);
  $max = mysqli_fetch_row($query_last);
  $suma= (int)$max[0];
  $id_last=$suma+1;


  $ID = $_POST['idPro'];
  $nombre = $_POST['nombresuministro'];
  $des = $_POST['descripcionsum'];
  $precio = $_POST['precio'];
  $unidad = $_POST['medida'];


  $sql_suministro ="INSERT INTO suministro (id_suministro,nombre,descripcion) VALUES ('$id_last','$nombre','$des')";
  $sql_pro_sum ="INSERT INTO proveedor_x_suministro (id_proveedor,id_suministro,precio_suministro,unidad_medida) VALUES('$ID','$id_last','$precio','$unidad')";

  $query_sum = mysqli_query($con,$sql_suministro);
  $query_pro_sum =mysqli_query($con,$sql_pro_sum);

  if($query_sum && $query_pro_sum)
      {
        $msg[]="Se registro Correctamente el Suministro";
      }
      else
      {
        $errors[]="No se registro de forma correcta el Suministro" . mysqli_error($con);
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
