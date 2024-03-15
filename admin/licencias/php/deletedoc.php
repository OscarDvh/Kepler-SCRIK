<?php
include ("../../../conexion.php");
$obj= new conectar();
$conectar=$obj->conexion();
	$ID=$_GET['ideliminar'];
	
		
	unlink($_SERVER['DOCUMENT_ROOT']."/scrik/admin/licencias/php/doc/$ID");  

		header("Location: ". $_SERVER["HTTP_REFERER"]);
	
?>