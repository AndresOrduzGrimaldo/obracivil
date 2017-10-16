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
        $this->Cell(61,25,'Reporte de Pedidos - Constructora',0,0,'R',$this->Image('../images/log.png',170,11,19));
        //$this->Cell(40,25,'',0,0,'C',$this->Image('images/logoDerecha.png', 175, 12, 19));
        //Se da un salto de línea de 25
        $this->Ln(25);
    }

    function get_content($txt)
    {
       $this->SetFont('Arial','',12);
       $total=0;
     while($row = mysqli_fetch_row($txt))
     {
       $total = $total + (int)$row[4];
        $fila='Pedido: '. $row[0] .' Proveedor: '.$row[2].' Suministro: '.$row[3]. ' Costo: $ '. $row[4];
        $this->MultiCell(0,5,$fila);
     }
     $this->Cell(40,15,'El total de gastos de suministros es: $' . $total);

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

  $id = $_GET['idobrapedido'];
  $session = $_SESSION['id_administrador'];

  $sql_pedidos = "SELECT p.id_pedido, o.nombre,  pr.nombre, s.nombre, ps.precio_suministro*p.cantidad FROM pedido p left join obra o on(p.id_obra = o.id_obra) left join proveedor pr on (p.id_proveedor = pr.id_proveedor) left join suministro s on (p.id_suministro = s.id_suministro) left join proveedor_x_suministro ps on(p.id_suministro = ps.id_suministro) WHERE p.id_obra = '$id'";
  $sql_admin = "SELECT * FROM administrador WHERE id_administrador='$session'";

  $query_pedidos = mysqli_query($con,$sql_pedidos);
  $query_administrador = mysqli_query($con,$sql_admin);
  $datos_admin = mysqli_fetch_row($query_administrador);

   $pdf = new PDF();
   $pdf->AddPage('P','Letter');
   $pdf->Cell(40,10,'Listado de pedidos',0, 1 , ' L ');
   $pdf->get_content($query_pedidos);
   $pdf->ln(40);
   // $pdf->Cell(40,20,'Total Salarios: '.$dato[0],0,1,'L');
   $pdf->ln(10);
   $pdf->Cell(40,20,'Atentamente',0,1,'L');
   $pdf->Cell(40,5,'Nombre: '.$datos_admin[1].' '.$datos_admin[2],0,1,'L');
   $pdf->Cell(30,5,'Cedula: '.$datos_admin[3],0,1,'L');
   $pdf->Cell(30,5,'Email: '.$datos_admin[5],0,1,'L');
   $pdf->Output();





?>
