<?php 	


require_once "../../../conexion.php";
$obj= new conectar();
$conectar=$obj->conexion();
$ideditar=$_GET['ideditar'];


$nombre = $_POST['nombre'];
$opt= $_POST['tipo'];
$email = $_POST['usuario-email'];
$departamento = $_POST['departamento'];
$password= $_POST['password'];
$rpassword= $_POST['rpass'];




if($password==$rpassword){ 
	$sql="UPDATE `usuarios` SET 
	`nombre`='$nombre',`email`='$email',`departamento`='$departamento',`tipo`='$opt',`password`='$password'   WHERE id_usuarios=$ideditar";
	mysqli_select_db($conectar, $bd);
	if (mysqli_query($conectar, $sql))
	header("Location:../");
	else
	echo ' <script language="javascript">alert("No se pudo Guardar la informcación."); history.go(-1)</script> ';
	}else{
			
			
			echo ' <script language="javascript">alert("Las contraseñas son incorrectas. Deben ser similares"); history.go(-1)</script> ';
		}
?>