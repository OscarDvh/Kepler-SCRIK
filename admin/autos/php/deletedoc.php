    <?php
    include( "../../../conexion.php" );
    $obj = new conectar();
    $conectar = $obj->conexion();
    $codigo = $_GET[ 'ruta' ];
    $ID = $_GET[ 'file' ];
    $val = $_GET[ 'val' ];
 if ( $val == 1 ) {
        $sql = "UPDATE `rutas` SET `r_tarjeta`=NULL WHERE `codigo_ruta`='$codigo'";
    }
else if( $val == 2 ) {
        $sql = "UPDATE `rutas` SET `r_factura`=NULL WHERE `codigo_ruta`='$codigo'";
    }
else if( $val == 3 ) {
        $sql = "UPDATE `rutas` SET `r_identificacion`=NULL WHERE `codigo_ruta`='$codigo'";
    }
else if( $val == 4) {
        $sql = "UPDATE `rutas` SET `r_tenencia`=NULL WHERE `codigo_ruta`='$codigo'";
    }
else if( $val == 5 ) {
        $sql = "UPDATE `rutas` SET `r_verificacion`=NULL WHERE `codigo_ruta`='$codigo'";
    }
else if( $val == 6 ) {
        $sql = "UPDATE `rutas` SET `r_licencia`=NULL WHERE `codigo_ruta`='$codigo'";
    }
else if( $val == 7 ) {
        $sql = "UPDATE `rutas` SET `r_seguro`=NULL WHERE `codigo_ruta`='$codigo'";
    }
else if( $val == 8 ) {
        $sql = "UPDATE `rutas` SET `r_servcicio`=NULL WHERE `codigo_ruta`='$codigo'";
    }
else if( $val == 9 ) {
        $sql = "UPDATE `rutas` SET `r_politicas`=NULL WHERE `codigo_ruta`='$codigo'";
    }
else if( $val == 10 ) {
        $sql = "UPDATE `rutas` SET `r_responsiva`=NULL WHERE `codigo_ruta`='$codigo'";
    }
else if( $val == 11 ) {
        $sql = "UPDATE `rutas` SET `r_imagen`=NULL WHERE `codigo_ruta`='$codigo'";
    }
else {
       print( '<script>alert("ERROR NO SE PUDO ELIMINAR EL ARCHIVO "  )
  </script> ');
    }

    mysqli_select_db( $conectar, $bd );
    if ( mysqli_query( $conectar, $sql ) ) {
        unlink( $_SERVER[ 'DOCUMENT_ROOT' ] . "/scrik/assets/doc/$codigo/$ID" );

        header( "Location: " . $_SERVER[ "HTTP_REFERER" ] );
    } else {
        print 'NO SE PUDO ELIMINAR EL ACRHIVO..';
        echo mysqli_error( $conectar );
    }


    ?>