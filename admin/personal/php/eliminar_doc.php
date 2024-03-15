<?php
include ("../../../conexion.php");
$obj= new conectar();
$conectar=$obj->conexion();
	$ID=$_GET['ideliminar'];
	$sql=mysqli_query($conectar,"Select CONCAT(nombre,' ',a_paterno,' ',a_materno) As nombre FROM personal WHERE id_personal='$ID'");


list($doc) = mysqli_fetch_row($sql);

	$folder = $_SERVER['DOCUMENT_ROOT']."/scrik/admin/personal/php/doc/$doc";
	

    // Carpeta que contine archivos y queremos eliminar 

foreach(glob($folder."/*.*") as $archivos_carpeta) 
{ 
 unlink($archivos_carpeta);     // Eliminamos todos los archivos de la carpeta hasta dejarla vacia 
} 
rmdir($folder);  

   

	
		header("Location:delete.php?ideliminar='$ID'");
	
?>