<?php
require_once "../../../conexion.php";
$obj=new conectar();
$conectar=$obj->conexion();
$id_km=$_GET['id_auto'];

mysqli_select_db($conectar,$bd);

$year=$_POST['año'];
$quincena=$_POST['quincena'];
$km=$_POST['km'];

$sql="INSERT INTO `kilometraje`(`id_km`,`año`,`quincena`,`km`,`autos_id`)VALUES(NULL,'$year','$quincena','$km','$id_km')";

if(mysqli_query($conectar,$sql)){
	header("Location:".$_SERVER["HTTP_REFERER"]);
	}
else{
	print 'NO SE PUDO GUARDAR LA INFORMACION ';echo mysqli_error($conectar);
}
