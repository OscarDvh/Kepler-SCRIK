<?php  
include ("../../../conexion.php");
$obj= new conectar();
$conectar=$obj->conexion();
$ideditar=$_GET['idnew'];
$IDP= $ideditar;
$newphone = $_POST['new'];

$sql="UPDATE `celular` SET `personal_id`='$IDP'  WHERE id_celular='$newphone'";

mysqli_select_db($conectar, $bd);
	if (mysqli_query($conectar, $sql))
	header("Location:../equipoA.php?ver=$ideditar");
	else
	print 'NO SE PUDO GUARDAR LA INFORMACIÓN...';echo mysqli_error($conectar);

?>