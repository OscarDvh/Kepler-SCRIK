<?php  
include ("../../../conexion.php");

$obj= new conectar();
$conectar=$obj->conexion();

$propietario =$_POST['propietario'];
$tipo =$_POST['tipo'];
$costo =$_POST['costo'];
$fecha_compra =$_POST['fecha_compra'];
$cpu =$_POST['cpu'];
$ram =$_POST['ram'];
$almacenamiento =$_POST['almacenamiento'];
$marca =$_POST['marca'];
$modelo =$_POST['modelo'];
$color =$_POST['color'];
$no_serie =$_POST['no_serie'];
$cargador =$_POST['cargador'];
$usuarioAsignado =$_POST['usuarioAsignado'];
$accesorios =$_POST['accesorios'];
$observaciones =$_POST['observaciones'];
$estado=$_POST['estado'];
$so =$_POST['so'];
$office =$_POST['office'];
$antivirus =$_POST['antivirus'];
$adicional =$_POST['adicional'];

//consulta para tener el codigo del propietario
    $consulta = mysqli_query( $conectar, "SELECT `codigo` FROM `propietarios` where id_propietario=$propietario" );
    list( $pro ) = mysqli_fetch_row( $consulta );

    //consulta para obtener el numero de la empresa
    $empresa = mysqli_query( $conectar, "SELECT `empresa_id_empresa` FROM personal left join departamentos on id_depar = id_depa where id_personal=$usuarioAsignado " );
    list( $dep ) = mysqli_fetch_row( $empresa );

    //complermentos del para codigo de registro
    $ceros = "0";
    $computo = "COM";

    //obtencion del valor continuo 
    $max = mysqli_query( $conectar, "select MAX(cons) as cons from computadora LIMIT 1" );
    list( $num ) = mysqli_fetch_row( $max );
    if ( $num < 9 ) {
        $mas = $num + 1;
        $cons = "000" . $mas;
    } else if ( $num >=9 AND $num < 99 ) {
        $mas = $num + 1;
        $cons = "00" . $mas;
    } else if ( $num >= 99 AND $num < 999 ) {
        $mas = $num + 1;
        $cons = "0" . $mas;
    } else if ( $num >= 999 AND $num < 9999 ) {
        $mas = $num + 1;
        $cons = $mas;
    }

    $codigo = $pro . $ceros . $dep . $computo . $cons;
    // aguardar archivos
   $directorio = $_SERVER['DOCUMENT_ROOT']."/scrik/admin/computo/php/doc/$codigo";//Declaramos un  variable con la ruta donde guardaremos los archivos

    //Validamos si la ruta de destino existe, en caso de no existir la creamos
    if ( !file_exists( $directorio ) ) {
        mkdir( $directorio, 0777 )or die( "No se puede crear el directorio de extracci&oacute;n" );
    }

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
				print "El archivo $filename se ha almacenado en forma exitosa.<br>";
				} else {	
				echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
			}
			closedir($dir); //Cerramos el directorio de destino
		}
	}


if($usuarioAsignado==0){
	
	$usuario="NULL";
	$dispo=1;
}else{
	$usuario=$usuarioAsignado;
	$dispo=2;
}



$sql = "INSERT INTO `computadora`(`id_compu`, `codigo`, `id_propietario`, `tipo`, `cpu`, `ram`, `almacenamiento`, `marca`, `modelo`, `color`, `no_serie`, `cargador`, `costo`, `fecha_compra`, `estado`, `accesorios`, `adicional`, `observaciones`, `personal_id`, `cons`, `activo`) VALUES  (NULL,'$codigo','$propietario','$tipo','$cpu','$ram','$almacenamiento','$marca','$modelo','$color','$no_serie','$cargador','$costo','$fecha_compra','$estado','$accesorios','$adicional','$observaciones',$usuario,'$cons',1);";

mysqli_select_db($conectar, $bd);
	if (mysqli_query($conectar, $sql)){
		
		
		
		
	header("Location:relacion_licencias.php?so=$so&office=$office&antivirus=$antivirus&codigo=$codigo");}
	else{
	print 'NO SE PUDO GUARDAR LA INFORMACIÓN...';echo mysqli_error($conectar);}







?>