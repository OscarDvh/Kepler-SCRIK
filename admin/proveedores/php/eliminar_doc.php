<?php
include ("../../../conexion.php");
$obj= new conectar();
$conectar=$obj->conexion();
	$ID=$_GET['ideliminar'];
	$sql=mysqli_query($conectar,"Select nombre FROM provedores WHERE id_provedores='$ID'");


list($doc) = mysqli_fetch_row($sql);

	$folder = $_SERVER['DOCUMENT_ROOT']."/scrik/admin/proveedores/php/doc/$doc";
	

    // Carpeta que contine archivos y queremos eliminar 

foreach(glob($folder."/*.*") as $archivos_carpeta) 
{ 
 unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
} 
rmdir($folder);  

   

	
		header("Location:delete.php?ideliminar='$ID'");
	
?>