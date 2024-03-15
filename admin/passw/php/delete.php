<?php
include ("../../../conexion.php");
$obj= new conectar();
$conectar=$obj->conexion();
	$ID=$_GET['ideliminar'];

    $sql2="DELETE FROM pass WHERE id_pass = $ID";

	mysqli_select_db($conectar, $bd);
	if (mysqli_query($conectar,$sql2))
		header("Location:../");
	else
		print 'NO SE PUDO ELIMINAR EL REGISTRO';
?>