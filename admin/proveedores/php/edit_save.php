<?php 	
 	
		require_once "../../../conexion.php";
$obj= new conectar();
$conectar=$obj->conexion();
$ideditar=$_GET['ideditar'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$telefono = $_POST['telefono'];
$email= $_POST['email'];
$direccion= $nombre;
$archivos=mysqli_query($conectar,"Select nombre FROM provedores WHERE id_provedores='$ideditar'");
list($doc)= mysqli_fetch_row($archivos);

$dire = $_SERVER['DOCUMENT_ROOT']."/scrik/admin/proveedores/php/doc";

		if($direccion != $archivos)
		{
			$result=rename("$dire/$doc","$dire/$direccion"); 

		}

	//Declaramos un  variable con la ruta donde guardaremos los archivos
$directorio = $_SERVER['DOCUMENT_ROOT']."/scrik/admin/proveedores/php/doc/$direccion";

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


	$sql="UPDATE `provedores` SET `nombre`='$nombre',`descripcion`='$descripcion',`phone`='$telefono',`email`='$email' WHERE id_provedores=$ideditar";
	mysqli_select_db($conectar, $bd);
	if (mysqli_query($conectar, $sql))
	header("Location:".$_SERVER["HTTP_REFERER"]);
	else
	print 'NO SE PUDO GUARDAR LA INFORMACIÓN';
	
?>