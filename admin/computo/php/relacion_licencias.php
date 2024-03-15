<?php
session_start();
include ("../../../conexion.php");
$obj= new conectar();
$conectar=$obj->conexion();
$codigo=$_GET['codigo'];
$so =$_GET['so'];
$office =$_GET['office'];
$antivirus =$_GET['antivirus'];
$name=$_SESSION[ 'user' ] ;
date_default_timezone_set('America/Mexico_City');
$DateAndTime = date('m-d-Y h:i:s a', time());  

$id_compu = mysqli_query( $conectar, "select id_compu from computadora where codigo='$codigo'" );
   list( $pro ) = mysqli_fetch_row( $id_compu  );
if(isset($so)){
	mysqli_query($conectar,"INSERT INTO `computadora_has_licencias`(`computadora_id_compu`, `licencias_id_licencias`) VALUES ('$pro','$so')");


   }else{
		exit();
	
	}

if(isset($office)){
	 mysqli_query($conectar,"INSERT INTO `computadora_has_licencias`(`computadora_id_compu`, `licencias_id_licencias`) VALUES ('$pro','$office')");
	 }
else{
		exit();
	
	}

if(isset($antivirus)){
	mysqli_query($conectar,"INSERT INTO `computadora_has_licencias`(`computadora_id_compu`, `licencias_id_licencias`) VALUES ($pro,$antivirus)");
}

else{
		exit();
	
	}

 mysqli_query($mysqli,"INSERT INTO `historial`(`id_historial`, `usuario`, `fecha`, `accion`) VALUES (null,'$name','$DateAndTime','INSERT en computadoras');");
header("Location:../index.php");

?>