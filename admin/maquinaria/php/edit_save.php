<?php 	
 	
		require_once "../../../conexion.php";
$obj= new conectar();
$conectar=$obj->conexion();
$ideditar=$_GET['ideditar'];
$cr=$_GET['cr'];

$propietario =$_POST['propietario'];
$desc =$_POST['descripcion'];
$marca =$_POST['marca'];
$modelo =$_POST['modelo'];
$serie =$_POST['serie'];
$estado=$_POST['estado'];
$no_factura =$_POST['no_factura'];
$val_factura =$_POST['val_factura'];
$empresa =$_POST['empresa'];
$area =$_POST['area'];
$observaciones =$_POST['observaciones'];

//consulta para tener el codigo del propietario
    $consulta = mysqli_query( $conectar, "SELECT `codigo` FROM `propietarios` where id_propietario=$propietario" );
    list( $pro ) = mysqli_fetch_row( $consulta );


    //complermentos del para codigo de registro
    $ceros = "0";
    $MAQ = "MAQ";

    //obtencion del valor continuo 
    $max =mysqli_query( $conectar, "select cons from maquinaria where `id_cogs`=$ideditar");
  list( $num ) = mysqli_fetch_row( $max );
    if ( $num < 9 ) {
        $mas = $num ;
        $cons = "000" . $mas;
    } else if ( $num >= 9 AND $num < 99 ) {
        $mas = $num ;
        $cons = "00" . $mas;
    } else if ( $num >= 99 AND $num < 999 ) {
        $mas = $num ;
        $cons = "0" . $mas;
    } else if ( $num >= 999 AND $num < 9999 ) {
        $mas = $num ;
        $cons = $mas;
    }
 
    $codigo = $pro . $ceros . $empresa . $MAQ. $cons;

$archivos=mysqli_query($conectar,"Select codigo FROM maquinaria WHERE id_cogs ='$ideditar'");
list($doc)= mysqli_fetch_row($archivos);

$dire = $_SERVER['DOCUMENT_ROOT']."/scrik/admin/maquinaria/php/doc";

		if($codigo != $archivos)
		{
			$result=rename("$dire/$doc","$dire/$codigo"); 

		}

	//Declaramos un  variable con la ruta donde guardaremos los archivos
$directorio = $_SERVER['DOCUMENT_ROOT']."/scrik/admin/maquinaria/php/doc/$codigo";

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

	$sql="UPDATE `maquinaria` SET `codigo`='$codigo',`propietario_id`='$propietario',`modelo`='$modelo',`descripcion`='$desc',`marca`='$marca',`serie`='$serie',`no_factura`='$no_factura',`valor_factura`='$val_factura',`empresa_id`='$empresa',`area_resp`='$area',`estado`='$estado',`obs`='$observaciones'WHERE id_cogs='$ideditar'";


	mysqli_select_db($conectar, $bd);
	if (mysqli_query($conectar, $sql))
	header("Location:".$_SERVER["HTTP_REFERER"]);
	else
	print 'NO SE PUDO GUARDAR LA INFORMACIÓN';
	
?>