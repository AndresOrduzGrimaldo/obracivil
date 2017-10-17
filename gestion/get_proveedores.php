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

$sql_proveedores = "SELECT obra_x_proveedor.id_obra, obra_x_proveedor.id_proveedor, proveedor.nombre FROM obra_x_proveedor INNER JOIN proveedor ON proveedor.id_proveedor=obra_x_proveedor.id_proveedor WHERE obra_x_proveedor.id_obra='$get'";
  $query_proveedores = mysqli_query($con,$sql_proveedores);


  if($query_proveedores)
  {
      ?>
     <h4 class="text-white">Proveedores de la Obra</h4>
     <?php
      $total = mysqli_num_rows($query_proveedores);
      if($total==0){
       printf('<p class="text-white"> No se encontraron proveedores asignados a esta obra </p>');
      }
      else
      {
        printf('<p> Genera un reporte de proveedores acerca de una obra en especifico, para mantenerte  al tanto de lo que sucede </p>');
    /*while($row = mysqli_fetch_row($query_proveedores))
    {

      ?>
       <p class="text-white">
        <?php echo 'Nombre: '. $row[2] .'codigo: '. $row[1]; ?>
       </p>
      <?php
    }*/
    ?>
     <form action="generar_reporte_proveedor.php" id="reporteProveedores" target="_blank" method="get">
       <input type="hidden" value="<?php echo $get; ?>" name="idobraproveedores" id="idobraproveedores"></input>
       <input type="submit" value="Reporte Proveedores" class="btn btn-default"></input>
     </form>
    <?php
    ?>
    <?php
    }


  }
  else
  {
    printf('<p class="black-text"> No se pudo conectar con la bases de datos </p>' . mysqli_error($con));
  }


?>
