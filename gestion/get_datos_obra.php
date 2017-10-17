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
    <div class="feature wow fadeInRight animated" data-wow-offset="120" data-wow-duration="1.5s">
                                <!--<i class="fa fa-line-chart"></i>-->
     <h4 class="text-white">Empleados de la Obra</h4>
    <?php

    $total = mysqli_num_rows($query_empleados);
    if($total==0)
    {
      printf('<p class="text-white"> No se encontraron empleados asignados a esta obra </p>');
    }
    else
    {
    while($row = mysqli_fetch_row($query_empleados))
    {

      ?>
       <p class="text-white">
        <?php echo $row[2] .' '. $row[3] . ' ' .  $row[4]; ?>
       </p>
      <?php
    }
    ?>
     <form action="generar_reporte_empleado.php" id="reporteEmpleados" target="_blank" method="get">
       <input type="hidden" value="<?php echo $get; ?>" name="idobraempleados" id="idobraempleados"></input>
       <input type="submit" value="Reporte empleados" class="btn btn-default"></input>
     </form>
    <?php
    ?>
     </div><!--end feature-->
    <?php
    }

  }
  else
  {
    printf('<p class="text-white"> No se pudo conectar con la bases de datos </p>');
  }

  // $sql_proveedores =   "select op.id_obra as \"ID obra\", op.id_proveedor as \"ID  proveedor\", \n". "p.nombre as \"Nombre\" \n". "from obra_x_proveedor op \n". "inner join proveedor p on (op.id_proveedor=p.id_proveedor) \n". "where id_obra = '$get";

  $sql_proveedores = "SELECT obra_x_proveedor.id_obra, obra_x_proveedor.id_proveedor, proveedor.nombre FROM obra_x_proveedor INNER JOIN proveedor ON proveedor.id_proveedor=obra_x_proveedor.id_proveedor WHERE obra_x_proveedor.id_obra='$get'";
  $query_proveedores = mysqli_query($con,$sql_proveedores);


  if($query_proveedores)
  {
      ?><div class="feature wow fadeInRight animated" data-wow-offset="120" data-wow-duration="1.5s">
                                <!--<i class="fa fa-line-chart"></i>-->
     <h4 class="text-white">Proveedores de la Obra</h4>
     <?php
      $total = mysqli_num_rows($query_proveedores);
      if($total==0){
       printf('<p class="text-white"> No se encontraron proveedores asignados a esta obra </p>');
      }
      else
      {
    while($row = mysqli_fetch_row($query_proveedores))
    {

      ?>
       <p class="text-white">
        <?php echo 'Nombre: '. $row[2] .'codigo: '. $row[1]; ?>
       </p>
      <?php
    }
    ?>
     <form action="generar_reporte_proveedor.php" id="reporteProveedores" target="_blank" method="get">
       <input type="hidden" value="<?php echo $get; ?>" name="idobraproveedores" id="idobraproveedores"></input>
       <input type="submit" value="Reporte Proveedores" class="btn btn-default"></input>
     </form>
    <?php
    ?>
     </div><!--end feature-->
    <?php
    }


  }
  else
  {
    printf('<p class="black-text"> No se pudo conectar con la bases de datos </p>' . mysqli_error($con));
  }

  // Administradores
  $sql_administradores = "select oa.id_obra as \"ID obra\", oa.id_admin as \"ID administrador\", \n". "concat(a.nombre,\" \", a.apellido) as \"Nombre\" \n" . "from obra_x_admin oa \n". "inner join administrador a on (oa.id_admin=a.id_administrador) \n". "where id_obra = '$get'";

  $query_administradores = mysqli_query($con,$sql_administradores);

  if($query_administradores)
  {
    ?><div class="feature wow fadeInLeft animated" data-wow-offset="120" data-wow-duration="1.5s">
                                <!--<i class="fa fa-line-chart"></i>-->
     <h4 class="text-white">Adminstradores de la Obra</h4>
     <?php
    $total = mysqli_num_rows($query_administradores);
      if($total==0){
       printf('<p class="text-white"> No se encontraron Administradores asignados a esta obra </p>');
      }
      else
      {
        while($row = mysqli_fetch_row($query_administradores))
    {

      ?>
       <p class="text-white">
        <?php echo 'Nombre: '. $row[2] .'codigo: '. $row[1]; ?>
       </p>
      <?php
    }
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
     </div><!--end feature-->
   <?php
