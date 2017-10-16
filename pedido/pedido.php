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

  $last = "SELECT MAX(id_pedido) AS id_pedido FROM pedido";
  $query_last = mysqli_query($con,$last);
  $max = mysqli_fetch_row($query_last);
  $suma= (int)$max[0];
  $id_last=$suma+1;

  $fecha = $hoy = date("Y-m-d");
  $cantidad = $_POST['cantidadped'];
  $ID_obra = $_POST['IDOBRA'];
  $sum = $_POST['suminis'];
  $string = $sum[0];

  $split = explode("-",$string);

  $id_proveedor = $split[0];
  $id_suministro = $split[1];

  $sql_pedido = "INSERT INTO pedido (id_pedido,id_obra,id_proveedor,id_suministro,cantidad,fecha) VALUES('$id_last','$ID_obra','$id_proveedor','$id_suministro','$cantidad','$fecha')";

  $sql_pro_obra = "INSERT INTO obra_x_proveedor(id_obra,id_proveedor) VALUES('$ID_obra','$id_proveedor')";

  $query_pedido=mysqli_query($con,$sql_pedido);
  $query_pro_obra = mysqli_query($con,$sql_pro_obra);

  if($query_pedido)
    {
      if(!$query_pro_obra)
      {
        //$msg[]="La obra ya cuenta con ese proveedor";
      }
        $msg[]="Se registro Correctamente el Pedido";
    }
    else
    {
     $errors[]="No se registro de forma correcta el pedido" . mysqli_error($con);
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
           echo $messages. "<br>";
          }
        ?>
    </div>
    <?php
  }
