<?php  
include ("../../../conexion.php");

$obj= new conectar();
$conectar=$obj->conexion();

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
    $max = mysqli_query( $conectar, "select MAX(cons) as cons from maquinaria LIMIT 1" );
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

    $codigo = $pro . $ceros . $empresa . $MAQ . $cons;
    // aguardar archivos
   $directorio = $_SERVER['DOCUMENT_ROOT']."/scrik/admin/maquinaria/php/doc/$codigo";//Declaramos un  variable con la ruta donde guardaremos los archivos

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






$sql = "INSERT INTO `maquinaria`(`id_cogs`, `codigo`,`propietario_id`, `modelo`, `descripcion`, `marca`, `serie`, `no_factura`, `valor_factura`, `empresa_id`, `area_resp`, `estado`, `obs`, `cons`, `activo`) VALUES (NULL,'$codigo','$propietario','$modelo','$desc','$marca','$serie','$no_factura',$val_factura,$empresa,$area,$estado,'$observaciones',$cons,1);";

mysqli_select_db($conectar, $bd);
	if (mysqli_query($conectar, $sql)){
		echo "<script>window.history.go(-2)</script>";}
else{
		print 'NO SE PUDO GUARDAR LA INFORMACIÓN...';echo mysqli_error($conectar);
		
	
	}







?>