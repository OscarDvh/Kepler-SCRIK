<?php  
include ("../../../conexion.php");
// Recibo los datos de la imagen


$tipo = $_POST['tipo'];
$descripcion = $_POST['caracteristicas'];
$usuario= $_POST['usuario-email'];
$password= $_POST['password'];
$rpass = $_POST['rpass'];



$obj= new conectar();
$conectar=$obj->conexion();


if($password==$rpass){
	
	$sql = "INSERT INTO `pass`(`id_pass`, `tipo`, `descripcion`, `usuario-email`, `password`) VALUES(NULL,'$tipo','$descripcion','$usuario','$password');";

mysqli_select_db($conectar, $bd);
	//echo $tipo.$descripcion.$usuario.$password;
	if (mysqli_query($conectar, $sql))
	header("Location:../index.php");
	else
	print 'NO SE PUDO GUARDAR LA INFORMACIÓN... (╯°□°）╯︵ ┻━┻';echo mysqli_error($conectar);
	
}else{
			
			
			echo ' <script language="javascript">alert("Las contraseñas son incorrectas. Deben ser similares (╯°□°）╯︵ ┻━┻"); history.go(-1)</script> ';
		}








?>