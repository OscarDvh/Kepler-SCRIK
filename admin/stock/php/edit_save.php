    <?php
    require_once "../../../conexion.php";
    $obj = new conectar();
    $conectar = $obj->conexion();
    $ideditar = $_GET[ 'ideditar' ];

    $propietario = $_POST[ 'propietario' ];
    $tipo = $_POST[ 'tipo' ];
    $caracteristicas = $_POST[ 'caracteristicas' ];
    $estado = $_POST[ 'estado' ];
    $cantidad = $_POST[ 'cantidad' ];
    $almacenamiento = $_POST[ 'opt' ];
    $usuarioAsignado = $_POST[ 'usuarioAsignado' ];
    if ( $usuarioAsignado == 0 ) {

        $usuario = "NULL";

    } else {
        $usuario = $_POST[ 'usuarioAsignado' ];

    }

//consulta para tener el codigo del propietario
    $consulta = mysqli_query( $conectar, "SELECT `codigo` FROM `propietarios` where id_propietario=$propietario" );
    list( $pro ) = mysqli_fetch_row( $consulta );

    //consulta para obtener el numero de la empresa
    $empresa = mysqli_query( $conectar, "SELECT `empresa_id_empresa` FROM personal left join departamentos on id_depar = id_depa where id_personal=$usuarioAsignado " );
    list( $dep ) = mysqli_fetch_row( $empresa );

    //complermentos del para codigo de registro
    $ceros = "0";
    $mobiliario = "MOB";

    //obtencion del valor continuo 
   $max = mysqli_query( $conectar, "select cons from stock where `id_stock`=$ideditar" );
    list( $num ) = mysqli_fetch_row( $max );
    if ( $num < 9 ) {
        $mas = $num ;
        $cons = "000" . $mas;
    } else if ( $num >=9 AND $num < 99 ) {
        $mas = $num ;
        $cons = "00" . $mas;
    } else if ( $num >= 99 AND $num < 999 ) {
        $mas = $num ;
        $cons = "0" . $mas;
    } else if ( $num >= 999 AND $num < 9999 ) {
        $mas = $num ;
        $cons = $mas;
    }

    $codigo = $pro . $ceros . $dep . $mobiliario . $cons;
$archivos=mysqli_query($conectar,"Select codigo FROM stock WHERE id_stock ='$ideditar'");
list($doc)= mysqli_fetch_row($archivos);

$dire = $_SERVER['DOCUMENT_ROOT']."/scrik/admin/stock/php/doc";

		if($codigo != $archivos)
		{
			$result=rename("$dire/$doc","$dire/$codigo"); 

		}

  // aguardar archivos
   $directorio = $_SERVER['DOCUMENT_ROOT']."/scrik/admin/stock/php/doc/$codigo";//Declaramos un  variable con la ruta donde guardaremos los archivos


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

    $sql = "UPDATE stock SET `codigo`='$codigo',`tipo`='$tipo',`caracteristicas`='$caracteristicas',`estado`='$estado',`cantidad`='$cantidad',`almacenado`='$almacenamiento',`id_propietario`='$propietario',`personal_id`=$usuario WHERE id_stock='$ideditar'";
    mysqli_select_db( $conectar, $bd );
    if ( mysqli_query( $conectar, $sql ) )
        header( "Location:" . $_SERVER[ "HTTP_REFERER" ] );
    else
        print 'NO SE PUDO GUARDAR LA INFORMACIÓN';

    ?>