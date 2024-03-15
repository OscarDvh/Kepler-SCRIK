<?php  
include ("../../../conexion.php");
// Recibo los datos de la imagen

$nombre_licencias= $_POST['nombre_licencias'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin= $_POST['fecha_fin'];
$clave = $_POST['clave'];
$limite_usuarios = $_POST['limite_usuarios'];
$costo = $_POST['costo'];
$tipo = $_POST['tipo'];
$observaciones = $_POST['observaciones'];

$provedores_id = $_POST['provedores_id'];

$direccion= $nombre_licencias;
$directorio = $_SERVER['DOCUMENT_ROOT']."/scrik/admin/licencias/php/doc/$direccion"; //Declaramos un  variable con la ruta donde guardaremos los archivos
				
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

$sql = "INSERT INTO `licencias`(`id_licencias`, `nombre_licencias`, `fecha_inicio`, `fecha_fin`, `clave`, `limite_usuarios`, `costo`, `tipo`,  `observaciones`, `provedores_id`) VALUES(NULL,'$nombre_licencias','$fecha_inicio','$fecha_fin','$clave','$limite_usuarios','$costo','$tipo','$observaciones','$provedores_id');";

mysqli_select_db($conectar, $bd);
	if (mysqli_query($conectar, $sql))
	header("Location:../index.php");
	else
	print 'NO SE PUDO GUARDAR LA INFORMACIÓN...';echo mysqli_error($conectar);







?>