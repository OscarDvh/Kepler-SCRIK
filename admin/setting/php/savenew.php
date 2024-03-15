<?php  
include ("../../../conexion.php");
// Recibo los datos de la imagen


$nombre = $_POST['nombre'];
$opt= $_POST['tipo'];
$email = $_POST['usuario-email'];
$departamento = $_POST['departamento'];
$password= $_POST['password'];
$rpassword= $_POST['rpass'];


$obj= new conectar();
$conectar=$obj->conexion();

if($password==$rpassword){ 
$sql = "INSERT INTO `usuarios`(`id_usuarios`, `nombre`, `email`, `departamento`, `tipo`, `password`) VALUES (NULL,'$nombre','$email','$departamento','$opt','$password');";

mysqli_select_db($conectar, $bd);
	if (mysqli_query($conectar, $sql))
	header("Location:../index.php");
	else
	print 'NO SE PUDO GUARDAR LA INFORMACIÓN...';echo mysqli_error($conectar);


}else{
			
			
			echo ' <script language="javascript">alert("Las contraseñas son incorrectas. Deben ser similares"); history.go(-1)</script> ';
		}




?>