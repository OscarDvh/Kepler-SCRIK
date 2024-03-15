<?php 	
 	
		require_once "../../../conexion.php";
$obj= new conectar();
$conectar=$obj->conexion();
$ideditar=$_GET['ideditar'];

$tipo = $_POST['tipo'];
$descripcion = $_POST['caracteristicas'];
$usuario= $_POST['usuario-email'];
$password= $_POST['password'];








	$sql="UPDATE `pass` SET `tipo`='$tipo',`descripcion`='$descripcion',`usuario-email`='$usuario',`password`='$password' WHERE id_pass=$ideditar";
	mysqli_select_db($conectar, $bd);
	if (mysqli_query($conectar, $sql))
	header("Location:../");
	else
	echo ' <script language="javascript">alert("No se pudo Guardar la informcación."); history.go(-1)</script> ';
	
?>