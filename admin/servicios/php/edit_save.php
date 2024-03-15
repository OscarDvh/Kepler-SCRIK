<?php 	
 	
		require_once "../../../conexion.php";
$obj= new conectar();
$conectar=$obj->conexion();
$ideditar=$_GET['ideditar'];

$no_cuenta= $_POST['no_cuenta'];
$provedores_id = $_POST['provedores_id'];
$fecha_inicio= $_POST['fecha_inicio'];
$fecha_fin= $_POST['fecha_fin'];
$costo= $_POST['costo'];
$centro_trabajo= $_POST['centro_trabajo'];
$caracteristicas= $_POST['caracteristicas'];
$extra= $_POST['extra'];
$otro= $_POST['otro'];
$direccion= $no_cuenta;
$string_extra= implode('', $extra);

//guardar documentos
$directorio = $_SERVER['DOCUMENT_ROOT']."/scrik/admin/servicios/php/doc/$direccion"; //Declaramos un  variable con la ruta donde guardaremos los archivos
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


	$sql="UPDATE `servicios` SET `no_cuenta`='$no_cuenta',`detalles`='$caracteristicas',`fecha_inicio`='$fecha_inicio',`fecha_renova`='$fecha_fin',`centro_trabajo`='$centro_trabajo',`costo_renova`='$costo',`provedores_id`='$provedores_id',`extra`='$string_extra',`otro`='$otro'  WHERE id_servicios=$ideditar";
	mysqli_select_db($conectar, $bd);
	if (mysqli_query($conectar, $sql))
		header("Location:".$_SERVER["HTTP_REFERER"]);
	else
	print 'NO SE PUDO GUARDAR LA INFORMACIÓN (╯°□°）╯︵ ┻━┻';
	
?>