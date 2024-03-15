<?php
include( "../../../conexion.php" );
$obj = new conectar();
$conectar = $obj->conexion();

if ( isset( $_GET[ 'ideliminar' ] ) )
    $ID = $_GET[ 'ideliminar' ];
else
    $ID = NULL;

$sql = "UPDATE `autos` SET `activo`='0' WHERE id_autos = '$ID'";
mysqli_select_db( $conectar, $bd );
if ( mysqli_query( $conectar, $sql ) )
    echo "<script>window.history.go(-1)</script>";
else
    print 'NO SE PUDO ELIMINAR EL REGISTRO';



if ( isset( $_GET[ 'delete_servicio' ] ) )
    $id_servicio = $_GET[ 'delete_servicio' ];
else
	$id_servicio=NULL;

$sqlS = "DELETE FROM servicio_autos WHERE `servicio_autos`.`id_servicio` = '$id_servicio'";
mysqli_select_db( $conectar, $bd );
if ( mysqli_query( $conectar, $sqlS ) )
	    echo "<script>window.history.go(-1)</script>";
else
    print 'NO SE PUDO ELIMINAR EL REGISTRO';
	

if ( isset( $_GET[ 'delete_km' ] ) )
    $id_km = $_GET[ 'delete_km' ];
else
	$id_km=NULL;

$sqlS = "DELETE FROM kilometraje WHERE `kilometraje`.`id_km` ='$id_km'";
mysqli_select_db( $conectar, $bd );
if ( mysqli_query( $conectar, $sqlS ) )
	    echo "<script>window.history.go(-1)</script>";
else
    print 'NO SE PUDO ELIMINAR EL REGISTRO';

    ?>