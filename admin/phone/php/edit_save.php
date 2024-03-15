<?php 	
 	
		require_once "../../../conexion.php";
$obj= new conectar();
$conectar=$obj->conexion();
$ideditar=$_GET['ideditar'];
$cr=$_GET['cr'];
$propietario = $_POST[ 'propietario' ];
$no_telefono = $_POST['no_telefono'];
$region= $_POST['region'];
$modelo = $_POST['modelo'];
$marca = $_POST['marca'];
$imei = $_POST['imei'];
$color = $_POST['color'];
$no_serie = $_POST['no_serie'];
$disponible = $_POST['disponible'];
$no_cargador = $_POST['no_cargador'];
$usuarioAsignado = $_POST[ 'usuarioAsignado' ];
if($usuarioAsignado==0){
	
	$usuario="NULL";
	
}else {
	$usuario = $_POST[ 'usuarioAsignado' ];

}
$obs = $_POST['observaciones'];

//consulta para tener el codigo del propietario
    $consulta = mysqli_query( $conectar, "SELECT `codigo` FROM `propietarios` where id_propietario=$propietario" );
    list( $pro ) = mysqli_fetch_row( $consulta );

    //consulta para obtener el numero de la empresa
    $empresa = mysqli_query( $conectar, "SELECT `empresa_id_empresa` FROM personal left join departamentos on id_depar = id_depa where id_personal=$usuarioAsignado " );
    list( $dep ) = mysqli_fetch_row( $empresa );

    //complermentos del para codigo de registro
    $ceros = "0";
    $celular = "CEL";

    //obtencion del valor continuo 
    $max =mysqli_query( $conectar, "select cons from celular where `id_celular`=$ideditar");
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
 
    $codigo = $pro . $ceros . $dep . $celular . $cons;

$archivos=mysqli_query($conectar,"Select codigo FROM celular WHERE id_celular ='$ideditar'");
list($doc)= mysqli_fetch_row($archivos);

$dire = $_SERVER['DOCUMENT_ROOT']."/scrik/admin/phone/php/doc";

		if($codigo != $archivos)
		{
			$result=rename("$dire/$doc","$dire/$codigo"); 

		}

	//Declaramos un  variable con la ruta donde guardaremos los archivos
$directorio = $_SERVER['DOCUMENT_ROOT']."/scrik/admin/phone/php/doc/$codigo";

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

	$sql="UPDATE `celular` SET `codigo`='$codigo',`id_propietario`='$propietario',`numero_tel`='$no_telefono',`region`='$region',`marca`='$marca',`modelo`='$modelo',`imei`='$imei',`no_serie`='$no_serie',`color`='$color',`no_cargador`='$no_cargador',`disponible`=$disponible,`observaciones`='$obs',`personal_id`=$usuario WHERE id_celular='$ideditar'";


	mysqli_select_db($conectar, $bd);
	if (mysqli_query($conectar, $sql))
	header("Location:".$_SERVER["HTTP_REFERER"]);
	else
	print 'NO SE PUDO GUARDAR LA INFORMACIÓN';
	
?>