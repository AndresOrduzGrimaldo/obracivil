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

  $sql_empleados = "select id_obra, id_personal, nombre, apellido, salario \n". "from personal \n". "where id_obra = '$get'";

  $query_empleados = mysqli_query($con,$sql_empleados);

  if($query_empleados)
  {
    ?>

    <h4 class="text-white">Empleados de la Obra</h4>
    <?php

    $total = mysqli_num_rows($query_empleados);
    if($total==0)
    {
      printf('<p class="text-white"> No se encontraron empleados asignados a esta obra </p>');
    }
    else
    {
     printf('<p> Genera un reporte de empleados acerca de una obra en especifico </p>');
    /*while($row = mysqli_fetch_row($query_empleados))
    {

      ?>
       <p class="text-white">
        <?php echo $row[2] .' '. $row[3] . ' ' .  $row[4]; ?>
       </p>
      <?php
    }*/
    ?>
     <form action="generar_reporte_empleado.php" id="reporteEmpleados" target="_blank" method="get">
       <input type="hidden" value="<?php echo $get; ?>" name="idobraempleados" id="idobraempleados"></input>
       <input type="submit" value="Reporte empleados" class="btn btn-default"></input>
     </form>
    <?php
    }

  }
  else
  {
    printf('<p class="text-white"> No se pudo conectar con la bases de datos </p>');
  }



?>
