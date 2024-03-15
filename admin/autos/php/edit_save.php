<?php
require_once "../../../conexion.php";
$obj= new conectar();
$conectar=$obj->conexion();
$ideditar=$_GET['ideditar'];
$cr=$_GET['cr'];
mysqli_select_db($conectar, $bd);
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
if($usuarioAsignado==0){
	
	$usuario="NULL";
}else {
	$usuario = $_POST[ 'usuarioAsignado' ];
}
    
    $observaciones = $_POST[ 'observaciones' ];

 //consulta para tener el codigo del propietario
    $consulta = mysqli_query( $conectar, "SELECT `codigo` FROM `propietarios` where id_propietario=$propietario" );
    list( $pro ) = mysqli_fetch_row( $consulta );

    //consulta para obtener el numero de la empresa
    $empresa = mysqli_query( $conectar, "SELECT `empresa_id_empresa` FROM personal left join departamentos on id_depar = id_depa where id_personal=$usuarioAsignado " );
    list( $dep ) = mysqli_fetch_row( $empresa );

$id_ruta=mysqli_query($conectar,"SELECT id_ruta from rutas where codigo_ruta = $cr");

    //complermentos del para codigo de registro
    $ceros = "0";
    $trasnporte = "TRA";

    //obtencion del valor continuo 
    $max =mysqli_query( $conectar, "select cons from autos where `id_autos`=$ideditar");
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
 
    $codigo = $pro . $ceros . $dep . $trasnporte . $cons;
    
// guardar archivos
    $archivos= mysqli_query($conectar,"SELECT codigo from autos where `id_autos`=$ideditar");
	list($doc)= mysqli_fetch_row($archivos);
	$dire = $_SERVER['DOCUMENT_ROOT']."/scrik/assets/doc";
		if($codigo != $archivos)
		{
			$result=rename("$dire/$doc","$dire/$codigo"); 

		}

//Declaramos un  variable con la ruta donde guardaremos los archivos
$directorio = $_SERVER[ 'DOCUMENT_ROOT' ] . "/scrik/assets/doc/$codigo"; 
$id_ruta=mysqli_query($conectar,"SELECT id_ruta from rutas where codigo_ruta = $codigo");
    
  $v_doc="SELECT * from rutas  where codigo_ruta = '$cr'";
					$ma = mysqli_query( $conectar, $v_doc );

					  $archivoAntiguo = mysqli_fetch_array( $ma );              

    $dir = opendir( $directorio ); //Abrimos el directorio de destino

	
	foreach ( $_FILES[ "imagen" ][ 'tmp_name' ] as $key => $tmp_name ) {
        if ( $_FILES[ "imagen" ][ "name" ][ $key ] ) {
            $filename = $_FILES[ "imagen" ][ "name" ][ $key ];
            $sourcei = $_FILES[ "imagen" ][ "tmp_name" ][ $key ];

            $imagen = $directorio . '/' . $filename;
            $r_imagen =  $filename;
			
			if(isset($_FILES["imagen"])){
            move_uploaded_file( $sourcei, $imagen );}
			 mysqli_query($conectar,"UPDATE `rutas` SET `r_imagen`='$r_imagen' where codigo_ruta = '$cr'");
	
	 unlink($directorio.'/'.$archivoAntiguo['r_imagen']);                                                                                                                                                                       
		}
    }
	foreach ( $_FILES[ "tarjeta" ][ 'tmp_name' ] as $key => $tmp_name ) {
        if ( $_FILES[ "tarjeta" ][ "name" ][ $key ] ) {
            $filename = $_FILES[ "tarjeta" ][ "name" ][ $key ];
            $source1 = $_FILES[ "tarjeta" ][ "tmp_name" ][ $key ];

            $tarjeta = $directorio . '/' . $filename;
            $r_tarjeta =  $filename;
			
			if(isset($_FILES["tarjeta"])){
            move_uploaded_file( $source1, $tarjeta );}
			 mysqli_query($conectar,"UPDATE `rutas` SET `r_tarjeta`='$r_tarjeta' where codigo_ruta = '$cr'");
	                                                                                                                                                                     
		}
    }
	
	 

foreach ( $_FILES[ "factura" ][ 'tmp_name' ] as $key => $tmp_name ) {
        if ( $_FILES[ "factura" ][ "name" ][ $key ] ) {
            $filename = $_FILES[ "factura" ][ "name" ][ $key ];
            $source2 = $_FILES[ "factura" ][ "tmp_name" ][ $key ];

            $factura = $directorio . '/' . $filename;
            $r_factura =  $filename;
			if(isset($_FILES["factura"])){
            move_uploaded_file( $source2, $factura );}
				mysqli_query($conectar,"UPDATE `rutas` SET `r_factura`='$r_factura' where codigo_ruta = '$cr'");
	
	      

        }
    }
    foreach ( $_FILES[ "identificacion" ][ 'tmp_name' ] as $key => $tmp_name ) {
        if ( $_FILES[ "identificacion" ][ "name" ][ $key ] ) {
            $filename = $_FILES[ "identificacion" ][ "name" ][ $key ];
            $source3 = $_FILES[ "identificacion" ][ "tmp_name" ][ $key ];

            $identificacion = $directorio . '/' . $filename;
            $r_identificacion =  $filename;
			if(isset($_FILES["identificacion"])){
            move_uploaded_file( $source3, $identificacion );}
				mysqli_query($conectar,"UPDATE `rutas` SET `r_identificacion`='$r_identificacion' where codigo_ruta = '$cr'");
	 

        }
    }
    foreach ( $_FILES[ "tenencia" ][ 'tmp_name' ] as $key => $tmp_name ) {
        if ( $_FILES[ "tenencia" ][ "name" ][ $key ] ) {
            $filename = $_FILES[ "tenencia" ][ "name" ][ $key ];
            $source4 = $_FILES[ "tenencia" ][ "tmp_name" ][ $key ];

            $tenencia = $directorio . '/' . $filename;
            $r_tenencia =  $filename;
			if(isset($_FILES["tenencia"])){
            move_uploaded_file( $source4, $tenencia );}
				mysqli_query($conectar,"UPDATE `rutas` SET `r_tenencia`='$r_tenencia' where codigo_ruta = '$cr'");
	


        }
    }
    foreach ( $_FILES[ "verificacion" ][ 'tmp_name' ] as $key => $tmp_name ) {
        if ( $_FILES[ "verificacion" ][ "name" ][ $key ] ) {
            $filename = $_FILES[ "verificacion" ][ "name" ][ $key ];
            $source5 = $_FILES[ "verificacion" ][ "tmp_name" ][ $key ];

            $verificacion = $directorio . '/' . $filename;
            $r_verificacion =  $filename;
			if(isset($_FILES["verificacion"])){
            move_uploaded_file( $source5, $verificacion );}
				mysqli_query($conectar,"UPDATE `rutas` SET `r_verificacion`='$r_verificacion' where codigo_ruta = '$cr'");
	
	


        }
    }
    foreach ( $_FILES[ "licencia" ][ 'tmp_name' ] as $key => $tmp_name ) {
        if ( $_FILES[ "licencia" ][ "name" ][ $key ] ) {
            $filename = $_FILES[ "licencia" ][ "name" ][ $key ];
            $source6 = $_FILES[ "licencia" ][ "tmp_name" ][ $key ];

            $licencia = $directorio . '/' . $filename;
            $r_licencia =  $filename;
			if(isset($_FILES["licencia"])){
            move_uploaded_file( $source6, $licencia );}
				mysqli_query($conectar,"UPDATE `rutas` SET `r_licencia`='$r_licencia' where codigo_ruta = '$cr'");
	
	
        }
    }
    foreach ( $_FILES[ "seguro" ][ 'tmp_name' ] as $key => $tmp_name ) {
        if ( $_FILES[ "seguro" ][ "name" ][ $key ] ) {
            $filename = $_FILES[ "seguro" ][ "name" ][ $key ];
            $source7 = $_FILES[ "seguro" ][ "tmp_name" ][ $key ];

            $seguro = $directorio . '/' . $filename;
            $r_seguro =  $filename;
			if(isset($_FILES["seguro"])){
            move_uploaded_file( $source7, $seguro );}
				mysqli_query($conectar,"UPDATE `rutas` SET `r_seguro`='$r_seguro' where codigo_ruta = '$cr'");
	
	
        }
    }
    foreach ( $_FILES[ "servicio" ][ 'tmp_name' ] as $key => $tmp_name ) {
        if ( $_FILES[ "servicio" ][ "name" ][ $key ] ) {
            $filename = $_FILES[ "servicio" ][ "name" ][ $key ];
            $source8 = $_FILES[ "servicio" ][ "tmp_name" ][ $key ];

            $servicio = $directorio . '/' . $filename;
            $r_servicio =  $filename;
				if(isset($_FILES["servicio"])){
            move_uploaded_file( $source8, $servicio );}
				mysqli_query($conectar,"UPDATE `rutas` SET `r_servcicio`='$r_servicio' where codigo_ruta = '$cr'");
	
	

        }
    }
    foreach ( $_FILES[ "politicas" ][ 'tmp_name' ] as $key => $tmp_name ) {
        if ( $_FILES[ "politicas" ][ "name" ][ $key ] ) {
            $filename = $_FILES[ "politicas" ][ "name" ][ $key ];
            $source9 = $_FILES[ "politicas" ][ "tmp_name" ][ $key ];

            $politicas = $directorio . '/' . $filename;
            $r_politicas =  $filename;
			if(isset($_FILES["politicas"])){
            move_uploaded_file( $source9, $politicas );}
				mysqli_query($conectar,"UPDATE `rutas` SET `r_politicas`='$r_politicas' where codigo_ruta = '$cr'");
	
	 
        }
    }
    foreach ( $_FILES[ "responsiva" ][ 'tmp_name' ] as $key => $tmp_name ) {
        if ( $_FILES[ "responsiva" ][ "name" ][ $key ] ) {
            $filename = $_FILES[ "responsiva" ][ "name" ][ $key ];
            $source10 = $_FILES[ "responsiva" ][ "tmp_name" ][ $key ];

            $responsiva = $directorio . '/' . $filename;
            $r_responsiva =  $filename;
			if(isset($_FILES["responsiva"])){
            move_uploaded_file( $source10, $responsiva );}
				mysqli_query($conectar,"UPDATE `rutas` SET `r_responsiva`='$r_responsiva' where codigo_ruta = '$cr'");
	
	

        }
    }

closedir( $dir ); //Cerramos el directorio de destino

$sql="UPDATE `autos` SET `id_propietario`='$propietario',`codigo`='$codigo',`claveVehicular`='$claveVehicular',`vin`='$vin',`factura`='$cod_factura',`marca`='$marca',`modelo`='$modelo',`tipo`='$tipo',`transmision`='$transmision',`color`='$color',`combustible`='$combustible',`no_motor`='$numMotor',`placas`='$placas',`poliza_seguro`='$polizaSeguro',`fin_poliza`='$vencimientoPoliza',`tarjeta`='$tarjetaCirculacion',`fin_tarjeta`='$vencimientoTarjeta',`estado_placa`='$estadoCirculacion',`estatus`='$estatus',`EstatusVerificacion`='$estatusVerificacion',`VencVerificacion`='$vencimientoVerificacion',`personal_id_personal`=$usuario,`obs`= '$observaciones' WHERE `id_autos`= '$ideditar'; ";
	
	if (mysqli_query($conectar, $sql)){
		  mysqli_query($conectar,"UPDATE `rutas` SET `codigo_ruta`='$codigo' where codigo_ruta = '$cr'");
	
		header("Location:".$_SERVER["HTTP_REFERER"]);
	
	}
	else{
	print 'NO SE PUDO GUARDAR LA INFORMACIÓN';echo mysqli_error($conectar);}
?>