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

function get_obras()
{
    global $con;
    $ID = $_SESSION['id_administrador'];

    $sql = "SELECT obra.id_obra,obra.nombre FROM administrador INNER JOIN obra_x_admin on administrador.id_administrador= obra_x_admin.id_admin inner join obra on obra_x_admin.id_obra=obra.id_obra WHERE administrador.id_administrador='$ID'";

    $query = mysqli_query($con,$sql);
    return $query;
}


function get_suministros_proveedor()
{
    global $con;

    $sql="SELECT proveedor.id_proveedor,suministro.id_suministro,suministro.descripcion,suministro.nombre,proveedor.nombre FROM proveedor INNER JOIN proveedor_x_suministro on proveedor.id_proveedor=proveedor_x_suministro.id_proveedor INNER JOIN suministro on suministro.id_suministro=proveedor_x_suministro.id_suministro";

    $query=mysqli_query($con,$sql);

    if($query)
    {
        return $query;
    }

    return "";

}
