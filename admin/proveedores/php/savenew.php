<?php  
include ("../../../conexion.php");
// Recibo los datos de la imagen

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$telefono = $_POST['telefono'];
$email= $_POST['email'];

$direccion= $nombre;
$directorio = $_SERVER['DOCUMENT_ROOT']."/scrik/admin/proveedores/php/doc/$direccion"; //Declaramos un  variable con la ruta donde guardaremos los archivos
				
			//Validamos si la ruta de destino existe, en caso de no existir la creamos
			if(!file_exists($directorio)){
				mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
			}
	foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
	{
		//Validamos que el archivo exista
		if($_FILES["archivo"]["name"][$key]) {
			$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
			$source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
			
			$dia = date("d-m-y");
			
			
			
			$dir=opendir($directorio); //Abrimos el directorio de destino
			$target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
			
			//Movemos y validamos que el archivo se haya cargado correctamente
			//El primer campo es el origen y el segundo el destino
			if(move_uploaded_file($source, $target_path)) {	
				print "El archivo $filename se ha almacenado en forma exitosa.<br>";
				} else {	
				echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
			}
			closedir($dir); //Cerramos el directorio de destino
		}
	}


$obj= new conectar();
$conectar=$obj->conexion();

$sql = "INSERT INTO `provedores`(`id_provedores`, `nombre`, `descripcion`, `phone`, `email`) VALUES (NULL,'$nombre','$descripcion','$telefono','$email');";

mysqli_select_db($conectar, $bd);
	if (mysqli_query($conectar, $sql))
	echo "<script>window.history.go(-2)</script>";
	else
	print 'NO SE PUDO GUARDAR LA INFORMACIÓN...';echo mysqli_error($conectar);







?>