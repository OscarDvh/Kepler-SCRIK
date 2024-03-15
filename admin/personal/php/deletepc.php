<?php  
include ("../../../conexion.php");
$obj= new conectar();
$conectar=$obj->conexion();
$ideliminar=$_GET['ideliminar'];
$IDP= $ideliminar;


$sql="UPDATE `computadora` SET `personal_id`= NULL  WHERE id_compu='$IDP'";

mysqli_select_db($conectar, $bd);
	if (mysqli_query($conectar, $sql))
	header('Location:' . getenv('HTTP_REFERER'));
	else
	print 'NO SE PUDO GUARDAR LA INFORMACIÓN...';echo mysqli_error($conectar);

?>