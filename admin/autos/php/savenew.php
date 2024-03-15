    <?php
    include( "../../../conexion.php" );
    $obj = new conectar();
    $conectar = $obj->conexion();

    //recibo datos de los campos
    $propietario = $_POST[ 'propietario' ];
    $claveVehicular = $_POST[ 'claveVehicular' ];
    $vin = $_POST[ 'vin' ];
    $cod_factura = $_POST[ 'factura' ];
    $marca = $_POST[ 'marca' ];
    $modelo = $_POST[ 'modelo' ];
    $tipo = $_POST[ 'tipo' ];
    $transmision = $_POST[ 'transmision' ];
    $color = $_POST[ 'color' ];
    $combustible = $_POST[ 'combustible' ];
    $numMotor = $_POST[ 'numMotor' ];
    $placas = $_POST[ 'placas' ];
    $polizaSeguro = $_POST[ 'polizaSeguro' ];
    $vencimientoPoliza = $_POST[ 'vencimientoPoliza' ];
    $tarjetaCirculacion = $_POST[ 'tarjetaCirculacion' ];
    $vencimientoTarjeta = $_POST[ 'vencimientoTarjeta' ];
    $estadoCirculacion = $_POST[ 'estadoCirculacion' ];
    $estatus = $_POST[ 'estatus' ];
    $estatusVerificacion = $_POST[ 'estatusVerificacion' ];
    $vencimientoVerificacion = $_POST[ 'vencimientoVerificacion' ];
    $usuarioAsignado = $_POST[ 'usuarioAsignado' ];
    $observaciones = $_POST[ 'observaciones' ];

    //consulta para tener el codigo del propietario
    $consulta = mysqli_query( $conectar, "SELECT `codigo` FROM `propietarios` where id_propietario=$propietario" );
    list( $pro ) = mysqli_fetch_row( $consulta );

    //consulta para obtener el numero de la empresa
    $empresa = mysqli_query( $conectar, "SELECT `empresa_id_empresa` FROM personal left join departamentos on id_depar = id_depa where id_personal=$usuarioAsignado " );
    list( $dep ) = mysqli_fetch_row( $empresa );

    //complermentos del para codigo de registro
    $ceros = "0";
    $trasnporte = "TRA";

    //obtencion del valor continuo 
    $max = mysqli_query( $conectar, "select MAX(cons) as cons from autos LIMIT 1" );
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

    $codigo = $pro . $ceros . $dep . $trasnporte . $cons;
    // aguardar archivos
    $directorio = $_SERVER[ 'DOCUMENT_ROOT' ] . "/scrik/assets/doc/$codigo"; //Declaramos un  variable con la ruta donde guardaremos los archivos

    //Validamos si la ruta de destino existe, en caso de no existir la creamos
    if ( !file_exists( $directorio ) ) {
        mkdir( $directorio, 0777 )or die( "No se puede crear el directorio de extracci&oacute;n" );
    }


    $dir = opendir( $directorio ); //Abrimos el directorio de destino

    foreach ( $_FILES[ "imagen" ][ 'tmp_name' ] as $key => $tmp_name ) {
        if ( $_FILES[ "imagen" ][ "name" ][ $key ] ) {
            $filename = $_FILES[ "imagen" ][ "name" ][ $key ];
            $sourcei= $_FILES[ "imagen" ][ "tmp_name" ][ $key ];

            $imagen = $directorio . '/' . $filename;
            $r_imagen =  $filename;
            move_uploaded_file( $sourcei, $imagen );

        }
    } 
foreach ( $_FILES[ "tarjeta" ][ 'tmp_name' ] as $key => $tmp_name ) {
        if ( $_FILES[ "tarjeta" ][ "name" ][ $key ] ) {
            $filename = $_FILES[ "tarjeta" ][ "name" ][ $key ];
            $source1 = $_FILES[ "tarjeta" ][ "tmp_name" ][ $key ];

            $tarjeta = $directorio . '/' . $filename;
            $r_tarjeta =  $filename;
            move_uploaded_file( $source1, $tarjeta );

        }
    }

    foreach ( $_FILES[ "factura" ][ 'tmp_name' ] as $key => $tmp_name ) {
        if ( $_FILES[ "factura" ][ "name" ][ $key ] ) {
            $filename = $_FILES[ "factura" ][ "name" ][ $key ];
            $source2 = $_FILES[ "factura" ][ "tmp_name" ][ $key ];

            $factura = $directorio . '/' . $filename;
            $r_factura =  $filename;
            move_uploaded_file( $source2, $factura );

        }
    }
    foreach ( $_FILES[ "identificacion" ][ 'tmp_name' ] as $key => $tmp_name ) {
        if ( $_FILES[ "identificacion" ][ "name" ][ $key ] ) {
            $filename = $_FILES[ "identificacion" ][ "name" ][ $key ];
            $source3 = $_FILES[ "identificacion" ][ "tmp_name" ][ $key ];

            $identificacion = $directorio . '/' . $filename;
            $r_identificacion =  $filename;
            move_uploaded_file( $source3, $identificacion );

        }
    }
    foreach ( $_FILES[ "tenencia" ][ 'tmp_name' ] as $key => $tmp_name ) {
        if ( $_FILES[ "tenencia" ][ "name" ][ $key ] ) {
            $filename = $_FILES[ "tenencia" ][ "name" ][ $key ];
            $source4 = $_FILES[ "tenencia" ][ "tmp_name" ][ $key ];

            $tenencia = $directorio . '/' . $filename;
            $r_tenencia =  $filename;
            move_uploaded_file( $source4, $tenencia );

        }
    }
    foreach ( $_FILES[ "verificacion" ][ 'tmp_name' ] as $key => $tmp_name ) {
        if ( $_FILES[ "verificacion" ][ "name" ][ $key ] ) {
            $filename = $_FILES[ "verificacion" ][ "name" ][ $key ];
            $source5 = $_FILES[ "verificacion" ][ "tmp_name" ][ $key ];

            $verificacion = $directorio . '/' . $filename;
            $r_verificacion =  $filename;
            move_uploaded_file( $source5, $verificacion );

        }
    }
    foreach ( $_FILES[ "licencia" ][ 'tmp_name' ] as $key => $tmp_name ) {
        if ( $_FILES[ "licencia" ][ "name" ][ $key ] ) {
            $filename = $_FILES[ "licencia" ][ "name" ][ $key ];
            $source6 = $_FILES[ "licencia" ][ "tmp_name" ][ $key ];

            $licencia = $directorio . '/' . $filename;
            $r_licencia =  $filename;
            move_uploaded_file( $source6, $licencia );

        }
    }
    foreach ( $_FILES[ "seguro" ][ 'tmp_name' ] as $key => $tmp_name ) {
        if ( $_FILES[ "seguro" ][ "name" ][ $key ] ) {
            $filename = $_FILES[ "seguro" ][ "name" ][ $key ];
            $source7 = $_FILES[ "seguro" ][ "tmp_name" ][ $key ];

            $seguro = $directorio . '/' . $filename;
            $r_seguro =  $filename;
            move_uploaded_file( $source7, $seguro );

        }
    }
    foreach ( $_FILES[ "servicio" ][ 'tmp_name' ] as $key => $tmp_name ) {
        if ( $_FILES[ "servicio" ][ "name" ][ $key ] ) {
            $filename = $_FILES[ "servicio" ][ "name" ][ $key ];
            $source8 = $_FILES[ "servicio" ][ "tmp_name" ][ $key ];

            $servicio = $directorio . '/' . $filename;
            $r_servicio =  $filename;
            move_uploaded_file( $source8, $servicio );

        }
    }
    foreach ( $_FILES[ "politicas" ][ 'tmp_name' ] as $key => $tmp_name ) {
        if ( $_FILES[ "politicas" ][ "name" ][ $key ] ) {
            $filename = $_FILES[ "politicas" ][ "name" ][ $key ];
            $source9 = $_FILES[ "politicas" ][ "tmp_name" ][ $key ];

            $politicas = $directorio . '/' . $filename;
            $r_politicas =  $filename;
            move_uploaded_file( $source9, $politicas );

        }
    }
    foreach ( $_FILES[ "responsiva" ][ 'tmp_name' ] as $key => $tmp_name ) {
        if ( $_FILES[ "responsiva" ][ "name" ][ $key ] ) {
            $filename = $_FILES[ "responsiva" ][ "name" ][ $key ];
            $source10 = $_FILES[ "responsiva" ][ "tmp_name" ][ $key ];

            $responsiva = $directorio . '/' . $filename;
            $r_responsiva =  $filename;
            move_uploaded_file( $source10, $responsiva );

        }
    }


    closedir( $dir ); //Cerramos el directorio de destino

if($usuarioAsignado==0){
	
	$usuarioAsignado="NULL";
}

    $sql = "INSERT INTO `autos`(`id_autos`, `id_propietario`, `codigo`, `claveVehicular`, `vin`, `factura`, `marca`, `modelo`, `tipo`, `transmision`, `color`, `combustible`, `no_motor`, `placas`, `poliza_seguro`, `fin_poliza`, `tarjeta`, `fin_tarjeta`, `estado_placa`, `estatus`, `EstatusVerificacion`, `VencVerificacion`, `personal_id_personal`, `obs`,`cons`,`activo`) VALUES  (NULL,'$propietario','$codigo','$claveVehicular','$vin','$cod_factura','$marca','$modelo','$tipo','$transmision','$color','$combustible','$numMotor','$placas','$polizaSeguro','$vencimientoPoliza','$tarjetaCirculacion','$vencimientoTarjeta','$estadoCirculacion','$estatus','$estatusVerificacion','$vencimientoVerificacion',$usuarioAsignado,
             '$observaciones','$cons',1)";
    mysqli_select_db( $conectar, $bd );
    if ( mysqli_query( $conectar, $sql ) ) {
        mysqli_query( $conectar, "INSERT INTO `rutas`(`id_ruta`, `codigo_ruta`, `r_imagen`,`r_tarjeta`, `r_factura`, `r_identificacion`, `r_tenencia`, `r_verificacion`, `r_licencia`, `r_seguro`, `r_servcicio`, `r_politicas`, `r_responsiva`) VALUES (NULL,'$codigo','$r_imagen','$r_tarjeta','$r_factura','$r_identificacion','$r_tenencia','$r_verificacion','$r_licencia','$r_seguro','$r_servicio','$r_politicas','$r_responsiva') " );
        echo "<script>window.history.go(-2)</script>";
    } else {
        print 'NO SE PUDO GUARDAR LA INFORMACIÓN...';
        echo mysqli_error( $conectar );
    }

    ?>