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

  $get = $_GET['idObraPdf'];

  $sql_administradores = "select oa.id_obra as \"ID obra\", oa.id_admin as \"ID administrador\", \n". "concat(a.nombre,\" \", a.apellido) as \"Nombre\" \n" . "from obra_x_admin oa \n". "inner join administrador a on (oa.id_admin=a.id_administrador) \n". "where id_obra = '$get'";

  $query_administradores = mysqli_query($con,$sql_administradores);

  if($query_administradores)
  {
   ?>
     <?php
    $total = mysqli_num_rows($query_administradores);
      if($total==0){
       printf('<p class="text-white"> No se encontraron Administradores asignados a esta obra </p>');
      }
      else
      {
        printf('<p> Genera un reporte de administradores acerca de una obra en especifico </p>');
    /*while($row = mysqli_fetch_row($query_administradores))
    {

      ?>
       <p class="text-white">
        <?php echo 'Nombre: '. $row[2] .'codigo: '. $row[1]; ?>
       </p>
      <?php
    }*/
    ?>
     <form action="generar_reporte_administrador.php" id="reporteProveedores" target="_blank" method="get">
       <input type="hidden" value="<?php echo $get; ?>" name="idobraadministrador" id="idobraadministrador"></input>
       <input type="submit" value="Reporte Administrador" class="btn btn-default"></input>
     </form>
    <?php

    }


  }
  else
  {
    printf('<p class="text-white"> No se pudo conectar con la bases de datos </p>' . mysqli_error($con));
  }?>
   <?php


?>
