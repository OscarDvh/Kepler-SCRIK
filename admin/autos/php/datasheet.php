<?php
session_start();
if (@!$_SESSION['email']) {
	echo '<script>alert("Inicie sesion para acceder")</script> ';
			echo "<script>location.href='/scrik/index.html '</script>";
	die();
}
require('../../../fpdf/fpdf.php');
require_once "../../../conexion.php";
                    $obj = new conectar();
                    $conexion = $obj->conexion();
$ideditar = $_GET[ 'id_data' ];
$sql = "SELECT autos.*,
CONCAT(personal.nombre,' ',personal.a_paterno,' ',personal.a_materno) AS nombre,
case transmision when 1 then 'Automática' when 2 then 'Manual' END AS tra,
case estatus when 1 then 'Alta' when 2 then 'Baja' END AS est,
case EstatusVerificacion when 1 then 'Realizado' when 2 then 'Pendiente' END AS ev,
propietarios.nombre AS propietario
FROM `autos` 
left join personal on personal_id_personal = id_personal 
left join propietarios on autos.id_propietario = propietarios.id_propietario 
where id_autos=$ideditar  ";
mysqli_select_db( $conexion, $bd );
$query = mysqli_query( $conexion, $sql );
$resultado = mysqli_fetch_array( $query );
$no_vehiculo=$resultado['codigo'];
$marca= $resultado['marca'];
$tipo=$resultado['tipo'];

$pdf = new FPDF('P', 'mm', 'Letter');
$pdf->SetMargins(30, 25 , 30);
$pdf->AddPage('PORTRAIT','letter');
$pdf->SetAutoPageBreak(true,25); 
class pdf extends FPDF
{
   //Cabecera de página
   public function header()
   {
	   
 $this->SetFont('Arial','B',12);
       $this->Image('../../../img/logokepler.jpg' ,10,1,40);
	   
}
	function Footer()
   {
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
   $this->Image('../../../img/SOLGISTIKA_Logotipo-01.jpg' ,137,275,15);
   $this->Image('../../../img/INNOVET_Logotipo-01.jpg' ,155,275,15);
   $this->Image('../../../img/Logo BE-ExEn.png' ,175,278,8);
   }
}


$pdf = new pdf();
$pdf->AddPage();
$pdf->SetFillColor(129, 129, 129);
$pdf->Ln(4);
$pdf->Cell(120);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(60,10,'No. De Vehiculo',1,1,'C',1);
$pdf->Cell(120);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(60,10,$no_vehiculo,1,1,'C');

$v_doc="SELECT rutas.* from rutas left join autos on codigo_ruta = codigo where id_autos= $ideditar";
					$ma = mysqli_query( $conexion, $v_doc );

					  $ruta = mysqli_fetch_array( $ma );  
					  
					  $c1=$ruta['codigo_ruta'];

					$direc=$c1. '/' .$ruta['r_imagen'];
							   if($ruta['r_imagen'] == NULL){
							  $pdf->Cell(60,10,'',2,0,'R');
						  }else if(empty($ruta['r_imagen'])){
							$pdf->Cell(60,10,'',2,0,'R');
						  }else {
							 $pdf->Image('../../../assets/doc/'.$direc ,145,35,35);
						  }
						  


$pdf->Ln(10);
$pdf->SetFont('Arial','',22);
$pdf->SetFillColor(255, 255, 255);
$pdf->MultiCell(90,10,$marca.' '.$tipo,0,1,'C');

$pdf->Ln(10);
$pdf->SetFont('Arial','B',11);
$pdf->SetFillColor(129, 129, 129);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(60,10,'PROPIETARIO',2,0,'R',1);
$pdf->Cell(0,10,$resultado['propietario'],2,1,'C',1);

$pdf->SetFont('Arial','B',11);
$pdf->SetFillColor(190,204,213);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(60,10,'CLAVE VEHICULAR',2,0,'R',1);
$pdf->Cell(0,10,$resultado['claveVehicular'],2,1,'C',1);

$pdf->SetFont('Arial','B',11);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(60,10,'VIN',2,0,'R',1);
$pdf->Cell(0,10,$resultado['vin'],2,1,'C',1);

$pdf->SetFont('Arial','B',11);
$pdf->SetFillColor(190,204,213);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(60,10,'MODELO',2,0,'R',1);
$pdf->Cell(0,10,$resultado['modelo'],2,1,'C',1);

$pdf->SetFont('Arial','B',11);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(60,10,'NO.MOTOR',2,0,'R',1);
$pdf->Cell(0,10,$resultado['no_motor'],2,1,'C',1);

$pdf->SetFont('Arial','B',11);
$pdf->SetFillColor(190,204,213);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(60,10,'COMBUSTIBLE',2,0,'R',1);
$pdf->Cell(0,10,$resultado['combustible'],2,1,'C',1);

$pdf->SetFont('Arial','B',11);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(60,10,'COLOR',2,0,'R',1);
$pdf->Cell(0,10,$resultado['color'],2,1,'C',1);

$pdf->SetFont('Arial','B',11);
$pdf->SetFillColor(190,204,213);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(60,10,utf8_decode('TRANSMISIÓN'),2,0,'R',1);
$pdf->Cell(0,10,utf8_decode($resultado['tra']),2,1,'C',1);

$pdf->SetFont('Arial','B',11);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(60,10,utf8_decode('PÓLIZA DE SEGURO'),2,0,'R',1);
$pdf->Cell(0,10,$resultado['poliza_seguro'],2,1,'C',1);

$pdf->SetFont('Arial','B',11);
$pdf->SetFillColor(190,204,213);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(60,10,utf8_decode('PLACAS'),2,0,'R',1);
$pdf->Cell(0,10,utf8_decode($resultado['placas']),2,1,'C',1);

$pdf->SetFont('Arial','B',11);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(60,10,utf8_decode('USUARIO'),2,0,'R',1);
$pdf->Cell(0,10,utf8_decode($resultado['nombre']),2,1,'C',1);

$pdf->SetFont('Arial','B',11);
$pdf->SetFillColor(190,204,213);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(60,10,utf8_decode('TARJETA DE CIRCULACIÓN'),2,0,'R',1);
$pdf->Cell(0,10,$resultado['tarjeta'],2,1,'C',1);

$pdf->SetFont('Arial','B',11);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(60,10,utf8_decode('ESTADO DE CIRCULACIÓN'),2,0,'R',1);
$pdf->Cell(0,10,utf8_decode($resultado['estado_placa']),2,1,'C',1);

$pdf->SetFont('Arial','B',11);
$pdf->SetFillColor(190,204,213);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(60,10,'FACTURA',2,0,'R',1);
$pdf->Cell(0,10,$resultado['factura'],2,1,'C',1);

$pdf->SetFont('Arial','B',11);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(60,10,'TIPO',2,0,'R',1);
$pdf->Cell(0,10,$resultado['tipo'],2,1,'C',1);

$pdf->SetFont('Arial','B',11);
$pdf->SetFillColor(190,204,213);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(60,10,'MARCA',2,0,'R',1);
$pdf->Cell(0,10,utf8_decode($resultado['marca']),2,1,'C',1);

$pdf->SetFont('Arial','B',11);
$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(60,10,'Estado',2,0,'R',1);
$pdf->Cell(0,10,$resultado['est'],2,1,'C',1);

$nombrepdf="Ficha_Tecnica_".$no_vehiculo.".pdf";
// output file
$pdf->Output('', $nombrepdf);
?>