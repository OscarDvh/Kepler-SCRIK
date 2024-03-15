<?php  
include ("../../../conexion.php");
// Recibo los datos de la imagen

$id = $_POST['id'];
$equipo = $_POST['equipo'];
$modelo = $_POST['modelo'];
$usuario = $_POST['usuario'];
$placas = $_POST['placas'];
$estado_placa = $_POST['estado_placa'];
$engomado_color = $_POST['engomado_color'];
$no_serie = $_POST['no_serie'];
$tarjeta = $_POST['tarjeta'];
$no_poliza = $_POST['no_poliza'];
$fin_poliza = $_POST['fin_poliza'];
$opt = $_POST['opt'];


$PrimeraVerificacion= $_POST['PrimeraVerificacion'];
$Venc1raVerificacion= $_POST['Venc1raVerificacion'];
$SegundaVerificacion= $_POST['SegundaVerificacion'];
$Venc2daVerificacion = $_POST['Venc2daVerificacion'];

$obj= new conectar();
$conectar=$obj->conexion();
	
	$sql = "INSERT INTO `autos`(`id_autos`, `descripcion`, `modelo`, `placas`, `estado_placa`, `engomado_color`, `no_serie`, `tarjeta`, `no_poliza`, `fin_poliza`, `EstatusVerificacion`, `PrimeraVerificacion`, `Venc1raVerificacion`, `SegundaVerificacion`, `Venc2daVerificacion`, `personal_id_personal`) 
	
	VALUES
	
	('$id','$equipo','$modelo','$placas','$estado_placa','$engomado_color','$no_serie','$tarjeta','$no_poliza','$fin_poliza','$opt ','$PrimeraVerificacion','$Venc1raVerificacion','$SegundaVerificacion','$Venc2daVerificacion ','$usuario')";

mysqli_select_db($conectar, $bd);
	if (mysqli_query($conectar, $sql))
	header("Location:../index.php");
	else
	print 'NO SE PUDO GUARDAR LA INFORMACIÓN...';echo mysqli_error($conectar);



?>