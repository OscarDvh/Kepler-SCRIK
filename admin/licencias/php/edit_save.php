<?php 	
 	
		require_once "../../../conexion.php";
$obj= new conectar();
$conectar=$obj->conexion();
$ideditar=$_GET['ideditar'];
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
$archivos=mysqli_query($conectar,"Select nombre_licencias FROM licencias WHERE id_licencias='$ideditar'");
list($doc)= mysqli_fetch_row($archivos);

$dire = $_SERVER['DOCUMENT_ROOT']."/scrik/admin/licencias/php/doc";

		if($direccion != $archivos)
		{
			$result=rename("$dire/$doc","$dire/$direccion"); 

		}

	//Declaramos un  variable con la ruta donde guardaremos los archivos
$directorio = $_SERVER['DOCUMENT_ROOT']."/scrik/admin/licencias/php/doc/$direccion";

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


	$sql="UPDATE `licencias` SET `nombre_licencias`='$nombre_licencias',`fecha_inicio`='$fecha_inicio',`fecha_fin`='$fecha_fin',`clave`='$clave',`limite_usuarios`='$limite_usuarios',`costo`='$costo',`tipo`='$tipo',`observaciones`='$observaciones',`provedores_id`='$provedores_id' WHERE id_licencias=$ideditar";
	mysqli_select_db($conectar, $bd);
	if (mysqli_query($conectar, $sql))
	header("Location:".$_SERVER["HTTP_REFERER"]);
	else
	print 'NO SE PUDO GUARDAR LA INFORMACIÓN';
	
?>