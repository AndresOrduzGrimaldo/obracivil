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
        $this->Cell(55,25,' Reporte General - Constructora',0,0,'R',$this->Image('../images/log.png',170,11,19));
        //$this->Cell(40,25,'',0,0,'C',$this->Image('images/logoDerecha.png', 175, 12, 19));
        //Se da un salto de línea de 25
        $this->Ln(25);
    }

    function get_content($txt,$all)
    {
       $this->SetFont('Arial','',12);

       $row = mysqli_fetch_row($txt);

       $this->Cell(40,5,'Codigo de Obra :  '.$row[0],0,1,'L');
       while($f = mysqli_fetch_row($all))
       {
         $fila='Nombre Administrador: '. $f[2] .' - codigo: '. $f[1] . ' Salario: '. $f[3];
         $this->MultiCell(0,5,$fila);
       }
       $this->Cell(40,5,'Fecha Inicio:  '.$row[2],0,1,'L');
       $this->Cell(40,5,'Fecha Fin:  '.$row[3],0,1,'L');
       $this->Cell(40,5,'ID proveedor :  '.$row[8],0,1,'L');
       $this->Cell(40,5,'Contrato :  '.$row[9],0,1,'L');

    }
 }


  $id = $_GET['idobraadmin'];
  $session = $_SESSION['id_administrador'];

  $sql = "select o.id_obra as \"ID obra\", o.nombre as \"Nombre de la obra\", o.fecha_inicio as \"Fecha de inicio\", o.fecha_fin as \"Fecha de finalización\", oa.id_admin as \"ID administrador\", concat(a.nombre, \" \",a.apellido) as \"Nombre del administrador\", oa.salario_admin as \"Salario del administrador\", concat(pe.nombre, pe.apellido) as \"Nombre del empleado\", op.id_proveedor as \"ID del proveedor\", op.contrato as \"Contrato\", p.nombre as \"Nombre del proveedor\" from obra o left join obra_x_admin oa on (o.id_obra = oa.id_obra) left join administrador a on (oa.id_admin = a.id_administrador) left join personal pe on (o.id_obra = pe.id_obra) left join obra_x_proveedor op on (o.id_obra = op.id_obra) left join proveedor p on (op.id_proveedor = p.id_proveedor) where o.id_obra='$id'";

  $sql_administradores = "select oa.id_obra as \"ID obra\", oa.id_admin as \"ID administrador\", \n". "concat(a.nombre,\" \", a.apellido) as \"Nombre\", oa.salario_admin \n" . "from obra_x_admin oa \n". "inner join administrador a on (oa.id_admin=a.id_administrador) \n". "where id_obra = '$id'";

  $sql_admin = "SELECT * FROM administrador WHERE id_administrador='$session'";

  $all_admin = mysqli_query($con,$sql_administradores);
  $query_administrador = mysqli_query($con,$sql_admin);
  $datos_admin = mysqli_fetch_row($query_administrador);
  $query_general = mysqli_query($con,$sql);

    $pdf = new PDF();
    $pdf->AddPage('P','Letter');
    $pdf->Cell(40,20,'Reporte General',0, 1 , ' L ');
    $pdf->get_content($query_general,$all_admin);
    $pdf->ln(25);
    // $pdf->Cell(40,20,'Total Salarios: '.$dato[0],0,1,'L');
    $pdf->ln(10);
    $pdf->Cell(40,20,'Atentamente',0,1,'L');
    $pdf->Cell(40,5,'Nombre: '.$datos_admin[1].' '.$datos_admin[2],0,1,'L');
    $pdf->Cell(30,5,'Cedula: '.$datos_admin[3],0,1,'L');
    $pdf->Cell(30,5,'Email: '.$datos_admin[5],0,1,'L');
    $pdf->Output();

?>
