<?php
require_once "../../../conexion.php";
$obj= new conectar();
$conectar=$obj->conexion();
$id_servicio=$_GET['id_auto'];

mysqli_select_db($conectar, $bd);
//recibo datos de los campos
    $km = $_POST[ 'km' ];
    $fecha=$_POST[ 'fecha' ];
   
$sql="INSERT INTO `servicio_autos`(`id_servicio`, `km`, `ultimo_servicio`, `autos_id`) VALUES (NULL,'$km','$fecha','$id_servicio')";

	$prox_servicio=date("Y-m-d",strtotime($fecha."+ 6 months"));
	if (mysqli_query($conectar, $sql)){
		
	mysqli_query($conectar,"UPDATE `autos` SET `prox_servicio`='$prox_servicio' where id_autos = '$id_servicio'");
		header("Location:".$_SERVER["HTTP_REFERER"]);
	
	}
	else{
	print 'NO SE PUDO GUARDAR LA INFORMACIÓN';echo mysqli_error($conectar);}
?>