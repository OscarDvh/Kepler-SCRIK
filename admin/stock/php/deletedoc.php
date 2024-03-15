<?php
include ("../../../conexion.php");
$obj= new conectar();
$conectar=$obj->conexion();
	$ID=$_GET['ideliminar'];
	
		
	unlink($_SERVER['DOCUMENT_ROOT']."/scrik/admin/stock/php/doc/$ID");  

		header("Location: ". $_SERVER["HTTP_REFERER"]);
	
?>