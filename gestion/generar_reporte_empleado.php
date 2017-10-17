<?php

session_start();
require('../fpdf181/fpdf.php');
class PDF extends FPDF
{
    function Footer()
    {
        $this->SetY(-40);
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,'Universidad Francisco de Paula Santander','T',0,'L',$this->Image('../images/ufps.png',150,243,50));
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
        $this->Cell(70,25,'Reporte de Empleados - Constructora',0,0,'R',$this->Image('../images/log.png',175,11,19));
        //$this->Cell(40,25,'',0,0,'C',$this->Image('images/logoDerecha.png', 175, 12, 19));
        //Se da un salto de línea de 25
        $this->Ln(25);
    }

    function get_content($txt)
    {
       $this->SetFont('Arial','',12);

       while($row = mysqli_fetch_row($txt))
       {
            $fila = $row[1] . '  ' . $row[2] . ' '. $row[3] . ' '. $row[4] . ' ' .$row[5] . '  ' .$row[6];
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

  $var = $_GET['idobraempleados'];
  $session = $_SESSION['id_administrador'];

  $sql_empleados = "select id_obra, id_personal, nombre, apellido,cedula,correo, salario from personal \n". "where id_obra = '$var'";
  $sql_suma_salarios = "select SUM(salario) from personal where id_obra ='$var'";

  $sql_admin = "SELECT * FROM administrador WHERE id_administrador='$session'";

  $query_administrador = mysqli_query($con,$sql_admin);
  $quey_emp = mysqli_query($con,$sql_empleados);
  $total = mysqli_query($con,$sql_suma_salarios);
  $dato = mysqli_fetch_row($total);
  $datos_admin = mysqli_fetch_row($query_administrador);


  $pdf = new PDF();
  $pdf->AddPage('P','Letter');
  $pdf->Cell(40,40,'Listado de Empleados',0, 1 , ' L ');
  $pdf->get_content($quey_emp);
  $pdf->ln(25);
  $pdf->Cell(40,20,'Total Salarios: '.$dato[0],0,1,'L');
  $pdf->ln(10);
  $pdf->Cell(40,20,'Atentamente',0,1,'L');
  $pdf->Cell(40,5,'Nombre: '.$datos_admin[1].' '.$datos_admin[2],0,1,'L');
  $pdf->Cell(30,5,'Cedula: '.$datos_admin[3],0,1,'L');
  $pdf->Cell(30,5,'Email: '.$datos_admin[5],0,1,'L');
  $pdf->Output();

  ?>
