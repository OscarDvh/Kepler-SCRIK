<?php
include ("../../../conexion.php");
$obj= new conectar();
$conectar=$obj->conexion();
	$ID=$_GET['ideliminar'];

    $sql2="UPDATE `perifericos` SET `activo`='0' WHERE id_perifericos = '$ID'";

	mysqli_select_db($conectar, $bd);
	if (mysqli_query($conectar,$sql2))
		echo "<script>window.history.go(-1)</script>";
	else
		print 'NO SE PUDO ELIMINAR EL REGISTRO';
?>