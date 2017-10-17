<?php

  require('../fpdf181/fpdf.php');

  $con=@mysqli_connect('127.0.0.1', 'admbd', 'obracivil123', 'obra_civil');

  if(!$con)
  {
      die("imposible conectarse: ".mysqli_error($con));
  }
  if (@mysqli_connect_errno())
  {
      die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
  }

  class PDF extends FPDF
{
    function Footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Este es el pie de página creado con el método Footer() de la clase creada PDF que hereda de FPDF','T',0,'C');
    }

    function Header(){
        $this->SetFont('Arial','B',9);
        $this->Line(10,10,206,10);
        $this->Line(10,35.5,206,35.5);
        $this->Cell(30,25,'',0,0,'C',$this->Image('images/logo.png', 152,12, 19));
        $this->Cell(111,25,'ALGÚN TÍTULO DE ALGÚN LUGAR',0,0,'C', $this->Image('images/logoIzquierda.png',20,12,20));
        $this->Cell(40,25,'',0,0,'C',$this->Image('images/logoDerecha.png', 175, 12, 19));
        //Se da un salto de línea de 25
        $this->Ln(25);
    }

    function ImprimirTexto($file){
        //Se lee el archivo
        $txt = file_get_contents($file);
        $this->SetFont('Arial','',12);
        //Se imprime
        $this->MultiCell(0,5,$txt);
    }
}


if(isset($_GET['submitreporte']))
  {

  $var = $_GET['idObraPdf'];
  echo $var;
//   $sql2 = "SELECT * FROM OBRA";
//   $sql ="SELECT  o.id_obra as ID_obra o.nombre as Nombre de la obra, o.fecha_inicio as Fecha de inicio, o.fecha_fin as Fecha de finalización, oa.id_admin as ID administrador, concat(a.nombre, '',a.apellido) as Nombre del administrador, oa.salario_admin as Salario del administrador, concat(pe.nombre, pe.apellido) as Nombre del empleado, op.id_proveedor as ID del proveedor, op.contrato as Contrato, p.nombre as Nombre del proveedor from obra o left join obra_x_admin oa on o.id_obra = oa.id_obra left join administrador a on oa.id_admin = a.id_administrador left join personal pe on o.id_obra = pe.id_obra left join obra_x_proveedor op on o.id_obra = op.id_obra left join proveedor p on op.id_proveedor = p.id_proveedor WHERE o.id_obra='$var'";


  $sql = "select o.id_obra as \"ID obra\", o.nombre as \"Nombre de la obra\", o.fecha_inicio as \"Fecha de inicio\", o.fecha_fin as \"Fecha de finalización\", oa.id_admin as \"ID administrador\", concat(a.nombre, \" \",a.apellido) as \"Nombre del administrador\", oa.salario_admin as \"Salario del administrador\", concat(pe.nombre, pe.apellido) as \"Nombre del empleado\", op.id_proveedor as \"ID del proveedor\", op.contrato as \"Contrato\", p.nombre as \"Nombre del proveedor\" from obra o left join obra_x_admin oa on (o.id_obra = oa.id_obra) left join administrador a on (oa.id_admin = a.id_administrador) left join personal pe on (o.id_obra = pe.id_obra) left join obra_x_proveedor op on (o.id_obra = op.id_obra) left join proveedor p on (op.id_proveedor = p.id_proveedor) where o.id_obra=7";

  $query = mysqli_query($con,$sql);


  while($row = mysqli_fetch_row($query))
  {
    var_dump($row);
  }





//    $pdf = new FPDF();
//    $pdf->AddPage();
//    $pdf->SetFont('Arial','B',16);
//    $pdf->Cell(40,10,$var,0,1,'R');
//    $pdf->Output();

   }


?>
