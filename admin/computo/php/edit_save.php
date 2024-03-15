    <?php
session_start();
    require_once "../../../conexion.php";
    $obj = new conectar();
    $conectar = $obj->conexion();
    $ideditar = $_GET[ 'ideditar' ];
    $propietario = $_POST[ 'propietario' ];
    $tipo = $_POST[ 'tipo' ];
    $costo = $_POST[ 'costo' ];
    $fecha_compra = $_POST[ 'fecha_compra' ];
    $cpu = $_POST[ 'cpu' ];
    $ram = $_POST[ 'ram' ];
    $almacenamiento = $_POST[ 'almacenamiento' ];
    $marca = $_POST[ 'marca' ];
    $modelo = $_POST[ 'modelo' ];
    $color = $_POST[ 'color' ];
    $no_serie = $_POST[ 'no_serie' ];
    $cargador =$_POST['cargador'];
    $usuarioAsignado = $_POST[ 'usuarioAsignado' ];
    if ( $usuarioAsignado == 0 ) {

        $usuario = "NULL";

    } else {
        $usuario = $_POST[ 'usuarioAsignado' ];

    }
    $accesorios = $_POST[ 'accesorios' ];
    $observaciones = $_POST[ 'observaciones' ];
    $estado = $_POST[ 'estado' ];
    $so = $_POST[ 'so' ];
    $office = $_POST[ 'office' ];
    $antivirus = $_POST[ 'antivirus' ];
    $adicional = $_POST[ 'adicional' ];

$name=$_SESSION[ 'user' ] ;
date_default_timezone_set('America/Mexico_City');
$DateAndTime = date('m-d-Y h:i:s a', time());  

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
        $mas = $num;
        $cons = "000" . $mas;
    } else if ( $num >= 9 AND $num < 99 ) {
        $mas = $num;
        $cons = "00" . $mas;
    } else if ( $num >= 99 AND $num < 999 ) {
        $mas = $num;
        $cons = "0" . $mas;
    } else if ( $num >= 999 AND $num < 9999 ) {
        $mas = $num;
        $cons = $mas;
    }

    $codigo = $pro . $ceros . $dep . $computo . $cons;
    // aguardar archivos
    $archivos = mysqli_query( $conectar, "Select codigo FROM computadora WHERE id_compu ='$ideditar'" );
    list( $doc ) = mysqli_fetch_row( $archivos );

    $dire = $_SERVER[ 'DOCUMENT_ROOT' ] . "/scrik/admin/computo/php/doc";

    if ( $codigo != $archivos ) {
        $result = rename( "$dire/$doc", "$dire/$codigo" );

    }
    $directorio = $_SERVER[ 'DOCUMENT_ROOT' ] . "/scrik/admin/computo/php/doc/$codigo"; //Declaramos un  variable con la ruta donde guardaremos los archivos

    foreach ( $_FILES[ "archivo" ][ 'tmp_name' ] as $key => $tmp_name ) {
        //Validamos que el archivo exista
        if ( $_FILES[ "archivo" ][ "name" ][ $key ] ) {
            $filename = $_FILES[ "archivo" ][ "name" ][ $key ]; //Obtenemos el nombre original del archivo
            $source = $_FILES[ "archivo" ][ "tmp_name" ][ $key ]; //Obtenemos un nombre temporal del archivo

            $dir = opendir( $directorio ); //Abrimos el directorio de destino
            $target_path = $directorio . '/' . $filename; //Indicamos la ruta de destino, así como el nombre del archivo

            //Movemos y validamos que el archivo se haya cargado correctamente
            //El primer campo es el origen y el segundo el destino
            if ( move_uploaded_file( $source, $target_path ) ) {
                print "El archivo $filename se ha almacenado en forma exitosa.<br>";
            } else {
                echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
            }
            closedir( $dir ); //Cerramos el directorio de destino
        }
    }

    $A = mysqli_query( $conectar, "SELECT id_relacion FROM computadora_has_licencias LEFT JOIN licencias ON id_licencias = licencias_id_licencias LEFT JOIN computadora ON computadora_id_compu = id_compu where computadora_has_licencias.computadora_id_compu = $ideditar and licencias.tipo =3;" );
    list( $ab ) = mysqli_fetch_row( $A );
    if ( isset( $ab ) ) {
        mysqli_query( $conectar, "UPDATE `computadora_has_licencias` SET `licencias_id_licencias` = '$so' WHERE `computadora_has_licencias`.`id_relacion` ='$ab'" );

    } else {
        mysqli_query( $conectar, "INSERT INTO `computadora_has_licencias`(`computadora_id_compu`, `licencias_id_licencias`) VALUES ('$ideditar','$so')" );
    }

    $B = mysqli_query( $conectar, "SELECT id_relacion FROM computadora_has_licencias LEFT JOIN licencias ON id_licencias = licencias_id_licencias LEFT JOIN computadora ON computadora_id_compu = id_compu where computadora_has_licencias.computadora_id_compu = $ideditar and licencias.tipo =2;" );
    list( $ABC ) = mysqli_fetch_row( $B );
    if ( isset( $ABC ) ) {
        mysqli_query( $conectar, "UPDATE `computadora_has_licencias` SET `licencias_id_licencias` = '$office' WHERE `computadora_has_licencias`.`id_relacion` ='$ABC'" );
    } else {
        mysqli_query( $conectar, "INSERT INTO `computadora_has_licencias`(`computadora_id_compu`, `licencias_id_licencias`) VALUES ('$ideditar','$office')" );
    }


    $C = mysqli_query( $conectar, "SELECT id_relacion FROM computadora_has_licencias LEFT JOIN licencias ON id_licencias = licencias_id_licencias LEFT JOIN computadora ON computadora_id_compu = id_compu where computadora_has_licencias.computadora_id_compu = $ideditar and licencias.tipo =1;" );
    list( $ABCD ) = mysqli_fetch_row( $C );
    if ( isset( $ABCD ) ) {
        mysqli_query( $conectar, "UPDATE `computadora_has_licencias` SET `licencias_id_licencias` = '$antivirus' WHERE `computadora_has_licencias`.`id_relacion` ='$ABCD'" );
    } else {
        mysqli_query( $conectar, "INSERT INTO `computadora_has_licencias`(`computadora_id_compu`, `licencias_id_licencias`) VALUES ('$ideditar','$antivirus')" );
    }

    if ( $so == 999 ) {
        mysqli_query( $conectar, "DELETE FROM `computadora_has_licencias` WHERE `computadora_has_licencias`.`id_relacion` ='$ab'" );
    }
    if ( $office == 999 ) {
        mysqli_query( $conectar, "DELETE FROM `computadora_has_licencias` WHERE `computadora_has_licencias`.`id_relacion` ='$ABC'" );
    }
    if ( $antivirus == 999 ) {
        mysqli_query( $conectar, "DELETE FROM `computadora_has_licencias` WHERE `computadora_has_licencias`.`id_relacion` ='$ABCD'" );
    }


    $sql = "UPDATE `computadora` SET `codigo`='$codigo',`id_propietario`='$propietario',`tipo`='$tipo',`cpu`='$cpu',`ram`='$ram',`almacenamiento`='$almacenamiento',`marca`='$marca',`modelo`='$modelo',`color`='$color',`no_serie`='$no_serie',`cargador`='$cargador',`costo`='$costo',`fecha_compra`='$fecha_compra',`estado`='$estado',`accesorios`='$accesorios',`adicional`='$adicional',`observaciones`='$observaciones',`personal_id`=$usuario WHERE id_compu='$ideditar'";
    mysqli_select_db( $conectar, $bd );
    if ( mysqli_query( $conectar, $sql ) ){
		 mysqli_query($mysqli,"INSERT INTO `historial`(`id_historial`, `usuario`, `fecha`, `accion`) VALUES (null,'$name','$DateAndTime','UPDATE en computadoras con id= $ideditar');");
        header( "Location:" . $_SERVER[ "HTTP_REFERER" ] );}
    else
        print 'NO SE PUDO GUARDAR LA INFORMACIÓN';
    echo mysqli_error( $conectar );

    ?>