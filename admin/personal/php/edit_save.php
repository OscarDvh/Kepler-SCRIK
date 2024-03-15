<?php
require_once "../../../conexion.php";
$obj= new conectar();
$conectar=$obj->conexion();
$ideditar=$_GET['ideditar'];
// Recibo los datos de la imagen
$nombre = $_POST['nombre'];
$apaterno = $_POST['aPaterno'];
$amaterno = $_POST['aMaterno'];
 
$direccion= $nombre. ' ' .$apaterno. ' ' .$amaterno;
$archivos=mysqli_query($conectar,"Select CONCAT(nombre,' ',a_paterno,' ',a_materno) FROM personal WHERE id_personal='$ideditar'");
list($doc)= mysqli_fetch_row($archivos);

$dire = $_SERVER['DOCUMENT_ROOT']."/scrik/admin/personal/php/doc";

		if($direccion != $archivos)
		{
			$result=rename("$dire/$doc","$dire/$direccion"); 

		}

	//Declaramos un  variable con la ruta donde guardaremos los archivos
$directorio = $_SERVER['DOCUMENT_ROOT']."/scrik/admin/personal/php/doc/$direccion";

foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
	{
		//Validamos que el archivo exista
		if($_FILES["archivo"]["name"][$key]) {
			$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
			$source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
			
			$dir=opendir($directorio); //Abrimos el directorio de destino
			$target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
			
			//Movemos y validamos que el archivo se haya cargado correctamente
			//El primer campo es el origen y el segundo el destino
			if(move_uploaded_file($source, $target_path)) {	
				echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
				} else {	
				echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
			}
			closedir($dir); //Cerramos el directorio de destino
		}
	}

$numero= $_POST['numColaborador'];
$email= $_POST['email'];
$phone = $_POST['telefono'];
$exte = $_POST['ext'];
$depart = $_POST['departamento'];




	$sql="UPDATE `personal` SET `no_empleado`='$numero', `nombre`='$nombre',`a_materno`='$amaterno',`a_paterno`='$apaterno', `email`='$email', `phone`='$phone',`extension`='$exte',`id_depar`='$depart' WHERE id_personal=$ideditar";
	mysqli_select_db($conectar, $bd);
	if (mysqli_query($conectar, $sql))
	header("Location:".$_SERVER["HTTP_REFERER"]);
	else
	print 'NO SE PUDO GUARDAR LA INFORMACIÓN';
	
?>