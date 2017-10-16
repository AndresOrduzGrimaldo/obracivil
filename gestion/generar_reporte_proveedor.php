<?php

  session_start();
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
        $this->Cell(76,25,'Reporte de Proveedores - Constructora',0,0,'R',$this->Image('../images/log.png',170,11,19));
        //$this->Cell(40,25,'',0,0,'C',$this->Image('images/logoDerecha.png', 175, 12, 19));
        //Se da un salto de línea de 25
        $this->Ln(25);
    }

    function get_content($txt)
    {
       $this->SetFont('Arial','',12);

       while($row = mysqli_fetch_row($txt))
       {
            $fila = $row[1] . '  ' . $row[2] . '  '. $row[3] . '  '. $row[4] ;
            $this->MultiCell(0,5,$fila);
       }

    }

}
   $id = $_GET['idobraproveedores'];
   $session = $_SESSION['id_administrador'];

   $sql_admin = "SELECT * FROM administrador WHERE id_administrador='$session'";
   $sql_proveedores = "SELECT obra_x_proveedor.id_obra, obra_x_proveedor.id_proveedor, proveedor.nombre, proveedor.telefono,proveedor.direccion FROM obra_x_proveedor INNER JOIN proveedor ON proveedor.id_proveedor=obra_x_proveedor.id_proveedor WHERE obra_x_proveedor.id_obra='$id'";

   $query_administrador = mysqli_query($con,$sql_admin);
   $datos_admin = mysqli_fetch_row($query_administrador);
   $query_proveedores = mysqli_query($con,$sql_proveedores);



   $pdf = new PDF();
   $pdf->AddPage('P','Letter');
   $pdf->Cell(40,40,'Listado de Proveedores',0, 1 , ' L ');
   $pdf->get_content($query_proveedores);
   $pdf->ln(25);
    // $pdf->Cell(40,20,'Total Salarios: '.$dato[0],0,1,'L');
   $pdf->ln(10);
   $pdf->Cell(40,20,'Atentamente',0,1,'L');
   $pdf->Cell(40,5,'Nombre: '.$datos_admin[1].' '.$datos_admin[2],0,1,'L');
   $pdf->Cell(30,5,'Cedula: '.$datos_admin[3],0,1,'L');
   $pdf->Cell(30,5,'Email: '.$datos_admin[5],0,1,'L');
   $pdf->Output();

?>
