<?php

if ( @!$_SESSION[ 'email' ] ) {
    echo '<script>alert("Inicie sesion para acceder")</script> ';
    echo "<script>location.href='../../'</script>";
}
require_once "../../conexion.php";
$obj = new conectar();
$conexion = $obj->conexion();

$ideditar = $_GET[ 'ideditar' ];
$sql = "SELECT autos.*,
    CONCAT(personal.nombre,' ',personal.a_paterno,' ',personal.a_materno) AS nombre,DAY(prox_servicio) as dia,MONTH(prox_servicio) AS mes,YEAR(prox_servicio) AS año,
    case transmision when 1 then 'Automática' when 2 then 'Manual' END AS tra,
    case estatus when 1 then 'Alta' when 2 then 'Baja' END AS est,
    case EstatusVerificacion when 1 then 'Realizado' when 2 then 'Pendiente' END AS ev,
    propietarios.nombre AS propietario
    FROM `autos` 
    left join personal on personal_id_personal = id_personal 
    left join propietarios on autos.id_propietario = propietarios.id_propietario 
    where id_autos=$ideditar  ";
mysqli_select_db( $conexion, $bd );
$query = mysqli_query( $conexion, $sql );
$resultado = mysqli_fetch_array( $query );


?>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="../../js/jquery-3.1.1.min.js"></script> 
<script src="../../js/select2.js"></script>
<link href="../../img/styles.css" rel="stylesheet" />
</head>

<div class="col-xl-3  mb-4" style="float: right;">
  <div class="card border-left-success  ">
    <div class="btn "  data-toggle="modal" data-target="#ModalSERV" >
      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> PRÓXIMO MANTENIMIENTO </div>
      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $resultado[ 'dia' ] . '-' .$resultado[ 'mes' ] . '-' . $resultado[ 'año' ]?> </div>
    </div>
  </div>
</div>
<div class="container-fluid">
<div class="form">
  <div class="form-group">
    <h3>EQUIPO DE TRANSPORTE</h3>
    <div class="row">
      <div class="col"> <b>DATOS GENERALES</b> </div>
    </div>
    
 <!------------------------------------------- Generar documentos--------------------------------------------------------------------------------------->
    
    <div align="right" class="col"> 
      <!------------------------------------------- Ficha tecnica---------------------------------------------------------------------------------------> 
      
      <a href="../../admin/autos/php/datasheet.php?id_data=<?php echo  $ideditar;?>" class="btn btn-success  " target="_blank" data-toggle="tooltip" data-placement="top" title="Descargar" > Ficha Técnica </a> 
      
      <!------------------------------------------- Responsiva ---------------------------------------------------------------------------------------> 
      
      <a href="../../admin/autos/php/responsiva.php?id_data=<?php echo  $ideditar;?>" class="btn btn-success  " target="_blank" data-toggle="tooltip" data-placement="top" title="Descargar" > Generar Responsiva </a>
	  
	  
	  </div>
	 <!------------------------------------------- fin--------------------------------------------------------------------------------------->
    <hr>
    <form action="../../admin/autos/php/edit_save.php?ideditar=<?php echo $ideditar;?>&cr=<?php echo $resultado['codigo'] ?>" method="post" onsubmit="return valida(this)" enctype="multipart/form-data">
      <div class="form-group">
        <div class="row">
          <div class="col"> <b>Código de registro: </b> <b><?php echo $resultado['codigo'] ?></b> </div>
        </div>
        <br>
        <div class="row">
          <div class="col-5">
            <label for="propietario">Propietario</label>
            <select class="form-control" id="propietario" name="propietario" required>
              <option name="propietario" id="propietario"  value="<?php echo $resultado['id_propietario'] ?>"><?php echo $resultado['propietario'] ?></option>
              <?php

              $consulta = "SELECT `id_propietario`, `nombre` FROM `propietarios`";
              $valores = mysqli_query( $conexion, $consulta );
              while ( $ver = mysqli_fetch_array( $valores ) ) {
                  print '
                        <option  id="propietario" name="propietario" value="' . $ver[ "id_propietario" ] . '">' . $ver[ "nombre" ] . '</option>
                        ';
              }
              ?>
            </select>
          </div>
          <div class="col">
            <label for="claveVehicular">Clave Vehicular</label>
            <input type="text" class="form-control" id="claveVehicular" name="claveVehicular" required value="<?php echo $resultado['claveVehicular'] ?>">
          </div>
          <div class="col">
            <label for="vin">VIN</label>
            <input type="text" class="form-control" id="vin" name="vin" required  value="<?php echo $resultado['vin'] ?>">
          </div>
          <div class="col">
            <label for="factura">Factura</label>
            <input class="form-control" type="text" id="factura"  name="factura" required value="<?php echo $resultado['factura'] ?>">
            </input>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="marca">Marca</label>
            <input type="text" class="form-control" id="marca" name="marca" required  value="<?php echo $resultado['marca'] ?>">
          </div>
          <div class="col">
            <label for="modelo">Modelo</label>
            <input type="text" class="form-control" id="modelo" name="modelo" required  value="<?php echo $resultado['modelo'] ?>">
          </div>
          <div class="col">
            <label for="tipo">Tipo</label>
            <input type="text" class="form-control" id="tipo" name="tipo" required value="<?php echo $resultado['tipo'] ?>">
          </div>
          <div class="col">
            <label for="transmision">Transmisión</label>
            <select class="form-control" id="transmision" name="transmision" required >
              <option id="transmision" name="transmision" value="<?php echo $resultado['transmision'] ?>"><?php echo $resultado['tra'] ?></option>
              <option id="transmision" name="transmision" value="0">Seleccione</option>
              <option id="transmision" name="transmision" value="1">Automática</option>
              <option id="transmision" name="transmision" value="2">Manual</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="color">Color</label>
            <input type="text" class="form-control" id="color" name="color" value="<?php echo $resultado['color'] ?>">
          </div>
          <div class="col">
            <label for="combustible">Combustible</label>
            <input type="text" class="form-control" id="combustible" name="combustible" value="<?php echo $resultado['combustible'] ?>">
          </div>
          <div class="col">
            <label for="numMotor">Número de Motor</label>
            <input type="text" class="form-control" id="numMotor" name="numMotor" value="<?php echo $resultado['no_motor'] ?>">
          </div>
          <div class="col">
            <label for="placas">Placas</label>
            <input type="text" class="form-control" id="placas"name="placas" value="<?php echo $resultado['placas'] ?>">
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="polizaSeguro">Póliza de Seguro</label>
            <input type="text" class="form-control" id="polizaSeguro"  name="polizaSeguro" value="<?php echo $resultado['poliza_seguro'] ?>">
          </div>
          <div class="col">
            <label for="vencimientoPoliza">Vencimiento de Póliza</label>
            <input type="date" id="vencimientoPoliza" name="vencimientoPoliza" class="form-control" value="<?php echo $resultado['fin_poliza'] ?>">
          </div>
          <div class="col">
            <label for="tarjetaCirculacion">Tarjeta de Circulación</label>
            <input type="text" class="form-control" id="tarjetaCirculacion" name="tarjetaCirculacion" value="<?php echo $resultado['tarjeta'] ?>">
          </div>
          <div class="col" >
            <label for="vencimientoTarjeta">Vencimiento Tarjeta de Circulación</label>
            <input type="date" class="form-control" id="vencimientoTarjeta" name="vencimientoTarjeta" value="<?php echo $resultado['fin_tarjeta'] ?>">
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="estadoCirculacion">Estado de Circulación</label>
            <input type="text" class="form-control" id="estadoCirculacion" name="estadoCirculacion" value="<?php echo $resultado['estado_placa'] ?>">
          </div>
          <div class="col">
            <label for="estatus">Estatus del Vehiculo</label>
            <select class="form-control" id="estatus" name="estatus" required>
              <option id="transmision" name="transmision" value="<?php echo $resultado['estatus'] ?>"><?php echo $resultado['est'] ?></option>
              <option id="estatus" name="estatus">Seleccione</option>
              <option id="estatus" name="estatus" value="1">Alta</option>
              <option id="estatus" name="estatus" value="2">Baja</option>
            </select>
          </div>
          <div class="col">
            <label for="estatusVerificacion">Estatus de Verificación</label>
            <select class="form-control" id="estatusVerificacion" name="estatusVerificacion">
              <option id="transmision" name="transmision" value="<?php echo $resultado['EstatusVerificacion'] ?>"><?php echo $resultado['ev'] ?></option>
              <option id="estatus" name="estatus">Seleccione</option>
              <option id="estatus" name="estatus" value="1">Realizado</option>
              <option id="estatus" name="estatus" value="2">Pendiente</option>
            </select>
          </div>
          <div class="col">
            <label for="vencimientoVerificacion">Vencimiento de Verificación</label>
            <input type="date" class="form-control" id="vencimientoVerificacion" name="vencimientoVerificacion" value="<?php echo $resultado['VencVerificacion'] ?>">
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="usuarioAsignado">Colaborador Asignado</label>
            <select class="form-control js-example-basic-single" id="usuarioAsignado" name="usuarioAsignado">
              <option name="usuarioAsignado" id="usuarioAsignado" value="<?php echo $resultado['personal_id_personal'] ?>"><?php echo $resultado["nombre"] ?></option>
              <option name="usuarioAsignado" id="usuarioAsignado" value="0">Sin colaborador</option>
              <?php


              $personal = "SELECT `id_personal`, `nombre`,`a_paterno`, `a_materno` FROM `personal`";
              $ver_personal = mysqli_query( $conexion, $personal );
              while ( $vp = mysqli_fetch_array( $ver_personal ) ) {
                  print '
                <option  name="usuarioAsignado" id="usuarioAsignado" value="' . $vp[ "id_personal" ] . '">' . $vp[ "nombre" ] . ' ' . ' ' . $vp[ "a_paterno" ] . '' . ' ' . $vp[ "a_materno" ] . '</option>
                ';
              }
              ?>
            </select>
          </div>
          <div class="col">
            <label for="observaciones">Observaciones</label>
            <textarea class="form-control" id="observaciones" name="observaciones" rows="3" ><?php echo $resultado['obs'] ?></textarea>
          </div>
        </div>
		
<!---------------------------------------------------------------------Tabla Documentos--------------------------------------------------------------------------------------------->		
        <b>DOCUMENTACIÓN</b>
        <?php
        $v_doc = "SELECT rutas.* from rutas left join autos on codigo_ruta = codigo where id_autos= $ideditar";
        $ma = mysqli_query( $conexion, $v_doc );

        $ruta = mysqli_fetch_array( $ma );

        $c1 = $ruta[ 'codigo_ruta' ];


        ?>
        <hr>
        <div class="table-responsive">
          <table class="table  table-hover">
            <thead>
              <tr>
                <th scope="col">Documento</th>
                <th scope="col">Archivo actual</th>
                <th scope="col-lg-2">Remplazar archivo</th>
                <th width="20%">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Imagen del Vehiculo </th>
                <td><?php echo $ruta['r_imagen'];
                if ( $ruta[ 'r_imagen' ] == NULL ) {
                    $direc = "ver.php";
                } else if ( empty( $ruta[ 'r_imagen' ] ) ) {
                    $direc = "ver.php";
                } else {
                    $direc = $c1 . '/' . $ruta[ 'r_imagen' ];
                }

                ?></td>
                <td><input type="file" name="imagen[]" id="imagen" class="form-control btn  " ></td>
                <td align="center"><a href="../../assets/doc/<?php echo $direc;?>" target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" > <i class="fas fa fa-eye"> </i> </a> <a href="../../admin/autos/php/download.php?file=<?php echo $ruta['r_imagen'];?>&ruta=<?php echo $c1;?>" class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" > <i class="fas fa fa-download"> </i> </a> <acronym title="Eliminar"> <a href="../../admin/autos/php/deletedoc.php?val=11&file=<?php echo $ruta['r_imagen'];?>&ruta=<?php echo $c1;?>" class="btn btn-danger  btn-lg" onclick="return confirmarAccesoURL()"> <i class="fas fa-trash"> </i> </a> </acronym></td>
              </tr>
              <tr>
                <th scope="row">Tarjeta de Circulación </th>
                <td><?php echo $ruta['r_tarjeta'];
                if ( $ruta[ 'r_tarjeta' ] == NULL ) {
                    $direc = "ver.php";
                } else if ( empty( $ruta[ 'r_tarjeta' ] ) ) {
                    $direc = "ver.php";
                } else {
                    $direc = $c1 . '/' . $ruta[ 'r_tarjeta' ];
                }

                ?></td>
                <td><input type="file" name="tarjeta[]" id="tarjeta" class="form-control btn  " data-multiple-caption="{count} files selected"></td>
                <td align="center"><a href="../../assets/doc/<?php echo $direc;?>" target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" > <i class="fas fa fa-eye"> </i> </a> <a href="../../admin/autos/php/download.php?file=<?php echo $ruta['r_tarjeta'];?>&ruta=<?php echo $c1;?>" class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" > <i class="fas fa fa-download"> </i> </a> <acronym title="Eliminar"> <a href="../../admin/autos/php/deletedoc.php?val=1&file=<?php echo $ruta['r_tarjeta'];?>&ruta=<?php echo $c1;?>" class="btn btn-danger  btn-lg" onclick="return confirmarAccesoURL()"> <i class="fas fa-trash"> </i> </a> </acronym></td>
              </tr>
              <tr>
                <th scope="row">Factura</th>
                <td><?php echo $ruta['r_factura'];
                if ( $ruta[ 'r_factura' ] == NULL ) {
                    $direc = "ver.php";
                } else if ( empty( $ruta[ 'r_factura' ] ) ) {
                    $direc = "ver.php";
                } else {
                    $direc = $c1 . '/' . $ruta[ 'r_factura' ];
                }

                ?></td>
                <td><input type="file" name="factura[]" id="factura[]" class="form-control btn  " data-multiple-caption="{count} files selected"  ></td>
                <td align="center"><a href="../../assets/doc/<?php echo $direc;?>" target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" > <i class="fas fa fa-eye"> </i> </a> <a href="../../admin/autos/php/download.php?file=<?php echo $ruta['r_factura'];?>&ruta=<?php echo $c1;?>"  class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" > <i class="fas fa fa-download"> </i> </a> <acronym title="Eliminar"> <a href="../../admin/autos/php/deletedoc.php?val=2&file=<?php echo $ruta['r_factura'];?>&ruta=<?php echo $c1;?>"  class="btn btn-danger  btn-lg" onclick="return confirmarAccesoURL()"> <i class="fas fa-trash"> </i> </a> </acronym></td>
              </tr>
              <tr>
                <th scope="row">Identificacion</th>
                <td><?php echo $ruta['r_identificacion'];
                if ( $ruta[ 'r_identificacion' ] == NULL ) {
                    $direc = "ver.php";
                } else if ( empty( $ruta[ 'r_identificacion' ] ) ) {
                    $direc = "ver.php";
                } else {
                    $direc = $c1 . '/' . $ruta[ 'r_identificacion' ];
                }
                ?></td>
                <td><input type="file" name="identificacion[]" id="identificacion" class="form-control btn  " data-multiple-caption="{count} files selected"  ></td>
                <td align="center"><a href="../../assets/doc/<?php echo $direc;?>" target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" > <i class="fas fa fa-eye"> </i> </a> <a href="../../admin/autos/php/download.php?file=<?php echo $ruta['r_identificacion'];?>&ruta=<?php echo $c1;?>"   class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" > <i class="fas fa fa-download"> </i> </a> <acronym title="Eliminar"> <a  href="../../admin/autos/php/deletedoc.php?val=3&file=<?php echo $ruta['r_identificacion'];?>&ruta=<?php echo $c1;?>" class="btn btn-danger  btn-lg" onclick="return confirmarAccesoURL()"> <i class="fas fa-trash"> </i> </a> </acronym></td>
              </tr>
              <tr>
                <th scope="row">Pagos de tenencia</th>
                <td><?php echo $ruta['r_tenencia'];
                if ( $ruta[ 'r_tenencia' ] == NULL ) {
                    $direc = "ver.php";
                } else if ( empty( $ruta[ 'r_tenencia' ] ) ) {
                    $direc = "ver.php";
                } else {
                    $direc = $c1 . '/' . $ruta[ 'r_tenencia' ];
                }
                ?></td>
                <td><input type="file" name="tenencia[]" id="tenencia" class="form-control btn  " data-multiple-caption="{count} files selected"  ></td>
                <td align="center"><a href="../../assets/doc/<?php echo $direc;?>" target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" > <i class="fas fa fa-eye"> </i> </a> <a href="../../admin/autos/php/download.php?file=<?php echo $ruta['r_tenencia'];?>&ruta=<?php echo $c1;?>" class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" > <i class="fas fa fa-download"> </i> </a> <acronym title="Eliminar"> <a  href="../../admin/autos/php/deletedoc.php?val=4&file=<?php echo $ruta['r_tenencia'];?>&ruta=<?php echo $c1;?>" class="btn btn-danger  btn-lg" onclick="return confirmarAccesoURL()"> <i class="fas fa-trash"> </i> </a> </acronym></td>
              </tr>
              <tr>
                <th scope="row">Certificado de verificación</th>
                <td><?php echo $ruta['r_verificacion'];
                if ( $ruta[ 'r_verificacion' ] == NULL ) {
                    $direc = "ver.php";
                } else if ( empty( $ruta[ 'r_verificacion' ] ) ) {
                    $direc = "ver.php";
                } else {
                    $direc = $c1 . '/' . $ruta[ 'r_verificacion' ];
                }
                ?></td>
                <td><input type="file" name="verificacion[]" id="verificacion" class="form-control btn  " data-multiple-caption="{count} files selected"  ></td>
                <td align="center"><a href="../../assets/doc/<?php echo $direc;?>"  target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" > <i class="fas fa fa-eye"> </i> </a> <a href="../../admin/autos/php/download.php?file=<?php echo $ruta['r_verificacion'];?>&ruta=<?php echo $c1;?>"  class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" > <i class="fas fa fa-download"> </i> </a> <acronym title="Eliminar"> <a href="../../admin/autos/php/deletedoc.php?val=5&file=<?php echo $ruta['r_verificacion'];?>&ruta=<?php echo $c1;?>" class="btn btn-danger  btn-lg" onclick="return confirmarAccesoURL()"> <i class="fas fa-trash"> </i> </a> </acronym></td>
              </tr>
              <tr>
                <th scope="row">Licencia de Conducir</th>
                <td><?php echo $ruta['r_licencia'];
                if ( $ruta[ 'r_licencia' ] == NULL ) {
                    $direc = "ver.php";
                } else if ( empty( $ruta[ 'r_licencia' ] ) ) {
                    $direc = "ver.php";
                } else {
                    $direc = $c1 . '/' . $ruta[ 'r_licencia' ];
                }
                ?></td>
                <td><input type="file" name="licencia[]" id="licencia" class="form-control btn  " data-multiple-caption="{count} files selected"  ></td>
                <td align="center"><a href="../../assets/doc/<?php echo $direc;?>" target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" > <i class="fas fa fa-eye"> </i> </a> <a href="../../admin/autos/php/download.php?file=<?php echo $ruta['r_licencia'];?>&ruta=<?php echo $c1;?>"  class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" > <i class="fas fa fa-download"> </i> </a> <acronym title="Eliminar"> <a href="../../admin/autos/php/deletedoc.php?val=6&file=<?php echo $ruta['r_licencia'];?>&ruta=<?php echo $c1;?>" class="btn btn-danger  btn-lg" onclick="return confirmarAccesoURL()"> <i class="fas fa-trash"> </i> </a> </acronym></td>
              </tr>
              <tr>
                <th scope="row">Póliza de seguro</th>
                <td><?php echo $ruta['r_seguro'];
                if ( $ruta[ 'r_seguro' ] == NULL ) {
                    $direc = "ver.php";
                } else if ( empty( $ruta[ 'r_seguro' ] ) ) {
                    $direc = "ver.php";
                } else {
                    $direc = $c1 . '/' . $ruta[ 'r_seguro' ];
                }
                ?></td>
                <td><input type="file" name="seguro[]" id="seguro" class="form-control btn  " data-multiple-caption="{count} files selected"  ></td>
                <td align="center"><a href="../../assets/doc/<?php echo $direc;?>" target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" > <i class="fas fa fa-eye"> </i> </a> <a href="../../admin/autos/php/download.php?file=<?php echo $ruta['r_seguro'];?>&ruta=<?php echo $c1;?>"  class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" > <i class="fas fa fa-download"> </i> </a> <acronym title="Eliminar"> <a href="../../admin/autos/php/deletedoc.php?val=7&file=<?php echo $ruta['r_seguro'];?>&ruta=<?php echo $c1;?>" class="btn btn-danger  btn-lg" onclick="return confirmarAccesoURL()"> <i class="fas fa-trash"> </i> </a> </acronym></td>
              </tr>
              <tr>
                <th scope="row">Evidencia de servicio</th>
                <td><?php echo $ruta['r_servcicio'];
                if ( $ruta[ 'r_servcicio' ] == NULL ) {
                    $direc = "ver.php";
                } else if ( empty( $ruta[ 'r_servcicio' ] ) ) {
                    $direc = "ver.php";
                } else {
                    $direc = $c1 . '/' . $ruta[ 'r_servcicio' ];
                }
                ?></td>
                <td><input type="file" name="servicio[]" id="servicio" class="form-control btn  " data-multiple-caption="{count} files selected"  ></td>
                <td align="center"><a  href="../../assets/doc/<?php echo $direc;?>" target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" > <i class="fas fa fa-eye"> </i> </a> <a href="../../admin/autos/php/download.php?file=<?php echo $ruta['r_servcicio'];?>&ruta=<?php echo $c1;?>"  class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" > <i class="fas fa fa-download"> </i> </a> <acronym title="Eliminar"> <a href="../../admin/autos/php/deletedoc.php?val=8&file=<?php echo $ruta['r_servcicio'];?>&ruta=<?php echo $c1;?>" class="btn btn-danger  btn-lg" onclick="return confirmarAccesoURL()"> <i class="fas fa-trash"> </i> </a> </acronym></td>
              </tr>
              <tr>
                <th scope="row">Politicas de uso</th>
                <td><?php echo $ruta['r_politicas'];
                if ( $ruta[ 'r_politicas' ] == NULL ) {
                    $direc = "ver.php";
                } else if ( empty( $ruta[ 'r_politicas' ] ) ) {
                    $direc = "ver.php";
                } else {
                    $direc = $c1 . '/' . $ruta[ 'r_politicas' ];
                }
                ?></td>
                <td><input type="file" name="politicas[]" id="politicas" class="form-control btn  " data-multiple-caption="{count} files selected"  ></td>
                <td align="center"><a href="../../assets/doc/<?php echo $direc;?>" target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" > <i class="fas fa fa-eye"> </i> </a> <a href="../../admin/autos/php/download.php?file=<?php echo $ruta['r_politicas'];?>&ruta=<?php echo $c1;?>"  class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" > <i class="fas fa fa-download"> </i> </a> <acronym title="Eliminar"> <a href="../../admin/autos/php/deletedoc.php?val=9&file=<?php echo $ruta['r_politicas'];?>&ruta=<?php echo $c1;?>" class="btn btn-danger  btn-lg" onclick="return confirmarAccesoURL()"> <i class="fas fa-trash"> </i> </a> </acronym></td>
              </tr>
              <tr>
                <th scope="row">Responsiva</th>
                <td><?php echo $ruta['r_responsiva'];
                if ( $ruta[ 'r_responsiva' ] == NULL ) {
                    $direc = "ver.php";
                } else if ( empty( $ruta[ 'r_responsiva' ] ) ) {
                    $direc = "ver.php";
                } else {
                    $direc = $c1 . '/' . $ruta[ 'r_responsiva' ];
                }
                ?></td>
                <td><input type="file" name="responsiva[]" id="responsiva" class="form-control btn  " data-multiple-caption="{count} files selected"  ></td>
                <td align="center"><a href="../../assets/doc/<?php echo $direc;?>" target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" > <i class="fas fa fa-eye"> </i> </a> <a href="../../admin/autos/php/download.php?file=<?php echo $ruta['r_responsiva'];?>&ruta=<?php echo $c1;?>"  class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" > <i class="fas fa fa-download"> </i> </a> <acronym title="Eliminar"> <a href="../../admin/autos/php/deletedoc.php?val=10&file=<?php echo $ruta['r_responsiva'];?>&ruta=<?php echo $c1;?>" class="btn btn-danger  btn-lg" onclick="return confirmarAccesoURL()"> <i class="fas fa-trash"> </i> </a> </acronym></td>
              </tr>
            </tbody>
          </table>
        </div>
        <div align="right"> <a class="btn btn-danger" type="button" href="index.php" >Volver </a>
          <input type="Submit" class="btn btn-danger" name="Submit" value="Guardar "  />
        </div>
        <hr>
      </div>
    </form>
    <div class="row">
      <div style="width:35%">
      <form action="../../admin/autos/php/servicio.php?id_auto=<?php echo $ideditar;?>" method="post" >
        <table class="table dataTable-table table-hover" style=”width: 100px” border="1" >
          <?php

          $servicio = mysqli_query( $conexion, "SELECT id_servicio,km,DAY(ultimo_servicio) as dia,MONTH(ultimo_servicio) AS mes,YEAR(ultimo_servicio) AS año FROM `servicio_autos` WHERE autos_id=$ideditar order by km ASC " );


          ?>
          <thead>
            <tr align="center">
              <th width="25%">SERVICIO DE MANTENIMIENTO</th>
              <th scope="col" >FECHA</th>
              <th scope="col" ></th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ( $ver = mysqli_fetch_array( $servicio ) ) {
                print '
                          <tr >
                              <td>' . $ver[ 'km' ] . ' KM</td>
                               <td>' . $ver[ 'dia' ] . '-' . $ver[ 'mes' ] . '-' . $ver[ 'año' ] . '</td>
							           <td align="center">
                <acronym title="ELIMINAR ">
                        <a href="../../admin/autos/php/delete.php?delete_servicio='. $ver[ 'id_servicio' ] . '" class="btn btn-danger  btn-sm" onclick="return confirmarAccesoURL()">

                                <i class="fas fa-trash"></i>

                        </a></acronym>
                    </td>
                          </tr>';
            }

            $maxkm = mysqli_query( $conexion, "SELECT MAX(km) FROM `servicio_autos` WHERE autos_id=$ideditar" );
            list( $km ) = mysqli_fetch_row( $maxkm );

            $kilometraje = $km + 10000;


            ?>
          </tbody>
        </table>
        <div class="row">
          <div class="col">
            <label for="km">Kilometraje</label>
            <input type="text" class="form-control" id="km" name="km" value="<?php echo $kilometraje ?>" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
          </div>
          <div class="col">
            <label for="fecha">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha" >
          </div>
        </div>
        <br>
        <div align="center">
          <input type="Submit" class="btn btn-danger" name="Submit" value="Agregar"  />
        </div>
        </div>
      </form>
      <div style="width:65%">
        <form action="../../admin/autos/php/km.php?id_auto=<?php echo $ideditar;?>" method="post">
          <table class="table dataTable-table table-hover" style=”width: 100px” border="1" >
            <?php

            $kilometraje = mysqli_query( $conexion, "SELECT * FROM `kilometraje` WHERE autos_id=$ideditar " );


            ?>
            <thead>
              <tr align="center">
                <th colspan="3" align="center">KILOMETRAJE UTILIZADO PARA ACTIVIDADES EMPRESARIALES</th>
              </tr>
              <tr>
                <th width="20%">AÑO</th>
                <th width="40%">QUINCENA</th>
                <th width="20%">KILOMETRO</th>
                <th ></th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ( $verkm = mysqli_fetch_array( $kilometraje ) ) {
                  print '
                          <tr >
                              <td>' . $verkm[ 'año' ] . ' </td>
                               <td>' . $verkm[ 'quincena' ] . '</td>
                               <td>' . $verkm[ 'km' ] . ' KM</td>
							   <td align="center">
                <acronym title="ELIMINAR ">
                        <a href="../../admin/autos/php/delete.php?delete_km='. $verkm[ 'id_km' ] . '" class="btn btn-danger  btn-sm" onclick="return confirmarAccesoURL()">

                                <i class="fas fa-trash"></i>

                        </a></acronym>
                    </td>
                          </tr>';
              }

              ?>
            </tbody>
          </table>
          <div class="row">
            <div class="col">
              <label for="año">Año</label>
              <input type="text" class="form-control" id="año" name="año" >
            </div>
            <div class="col">
              <label for="quincena">Quincena</label>
              <input type="text" class="form-control" id="quincena" name="quincena" >
            </div>
            <div class="col">
              <label for="km">Kilometraje</label>
              <input type="text" class="form-control" id="km" name="km" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
            </div>
          </div>
          <br>
          <div align="center">
            <input type="Submit" class="btn btn-danger" name="Submit" value="Agregar"  />
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto"> 
      <!--Desarrollado por Diego Camacho Martinez --> 
      
      <span>Copyright &copy; 2023. GRUPO KEPLER</span> </div>
  </div>
</footer>
<!-- End of Footer --> 

<!--confimacion js.--> 
<script type="text/javascript">
                     function confirmation() 
                     {
                        if(confirm("Desea seguir?"))
                    {
                       return true;
                    }
                    else
                    {
                       return false;
                    }
                     }

        </script> 
<script type="text/javascript">
            // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
            </script>
</body>
</html>