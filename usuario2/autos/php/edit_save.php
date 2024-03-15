<?php 	
 	
		require_once "../../../conexion.php";
$obj= new conectar();
$conectar=$obj->conexion();
$ideditar=$_GET['ideditar'];

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






	$sql="UPDATE `autos` SET 
	
	`id_autos`='$id',
	`descripcion`='$equipo',
	`modelo`='$modelo',
	`placas`='$placas',
	`estado_placa`='$estado_placa',
	`engomado_color`='$engomado_color',
	`no_serie`='$no_serie',
	`tarjeta`='$tarjeta',
	`no_poliza`='$no_poliza',
	`fin_poliza`='$fin_poliza',
	`EstatusVerificacion`='$opt',
	`PrimeraVerificacion`='$PrimeraVerificacion',
	`Venc1raVerificacion`='$Venc1raVerificacion',
	`SegundaVerificacion`='$SegundaVerificacion',
	`Venc2daVerificacion`='$Venc2daVerificacion',
	`personal_id_personal`='$usuario'
	
	WHERE id_autos='$ideditar'";

	mysqli_select_db($conectar, $bd);
	if (mysqli_query($conectar, $sql))
	header("Location:../vermas.php?ideditar=$id");
	else
	print 'NO SE PUDO GUARDAR LA INFORMACIÓN';echo mysqli_error($conectar);
	
?>