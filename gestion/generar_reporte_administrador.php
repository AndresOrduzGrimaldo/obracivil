<?php
session_start();
require('../fpdf181/fpdf.php');
class PDF extends FPDF
{
    function Footer()
    {
        $this->SetY(-40);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Universidad Francisco de Paula Santander','T',0,'L',$this->Image('../images/ufps.png',150,242,50));
        $this->ln(3);
        $this->Cell(0,10,'Norte de Santander',0,'L');
        $this->ln(3);
        $this->Cell(0,10,'San Jose De Cucuta',0,'L');
        $this->ln(3);
        $this->Cell(0,10,'2017',0,'L');
        // $this->Cell(30,25,'',0,0,'R',$this->Image('../images/log.png',152,400,19));
    }

    function Header()
    {
        $this->SetFont('Arial','B',15);
        $this->Line(10,10,206,10);
        $this->Line(10,35.5,206,35.5);
        $this->Cell(30,25,'',0,0,'C');//,$this->Image('', 152,12,19));
        $this->Cell(90,25,'Reporte de Administradores - Constructora',0,0,'R',$this->Image('../images/log.png',170,11,19));
        //$this->Cell(40,25,'',0,0,'C',$this->Image('images/logoDerecha.png', 175, 12, 19));
        //Se da un salto de línea de 25
        $this->Ln(25);
    }

    function get_content($txt)
    {
       $this->SetFont('Arial','',12);

     while($row = mysqli_fetch_row($txt))
     {
        $fila='Nombre: '. $row[2] .' - codigo: '. $row[1];
        $this->MultiCell(0,5,$fila);
     }

    }


}

  $con=@mysqli_connect('127.0.0.1', 'admbd', 'obracivil123', 'obra_civil');

  if(!$con)
  {
      die("imposible conectarse: ".mysqli_error($con));
  }
  if (@mysqli_connect_errno())
  {
      die("Connect failed: ".mysqli_connect_errno()." : ". mysqli_connect_error());
  }

   $id = $_GET['idobraadministrador'];
   $session = $_SESSION['id_administrador'];

   $sql_administradores = "select oa.id_obra as \"ID obra\", oa.id_admin as \"ID administrador\", \n". "concat(a.nombre,\" \", a.apellido) as \"Nombre\" \n" . "from obra_x_admin oa \n ". "inner join administrador a on (oa.id_admin=a.id_administrador) \n". "where id_obra = '$id'";
   $sql_admin = "SELECT * FROM administrador WHERE id_administrador='$session'";

   $query_administradores = mysqli_query($con,$sql_administradores);
   $query_administrador = mysqli_query($con,$sql_admin);
   $datos_admin = mysqli_fetch_row($query_administrador);

    $pdf = new PDF();
    $pdf->AddPage('P','Letter');
    $pdf->Cell(40,40,'Listado de Administradores',0, 1 , ' L ');
    $pdf->get_content($query_administradores);
    $pdf->ln(25);
    // $pdf->Cell(40,20,'Total Salarios: '.$dato[0],0,1,'L');
    $pdf->ln(10);
    $pdf->Cell(40,20,'Atentamente',0,1,'L');
    $pdf->Cell(40,5,'Nombre: '.$datos_admin[1].' '.$datos_admin[2],0,1,'L');
    $pdf->Cell(30,5,'Cedula: '.$datos_admin[3],0,1,'L');
    $pdf->Cell(30,5,'Email: '.$datos_admin[5],0,1,'L');
    $pdf->Output();

?>
