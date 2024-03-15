<?php

if ( @!$_SESSION[ 'email' ] ) {
    echo '<script>alert("Inicie sesion para acceder")</script> ';
    echo "<script>location.href='../../'</script>";
}
require_once "../../conexion.php";
                    $obj = new conectar();
                    $conexion = $obj->conexion();
$ideditar = $_GET[ 'ideditar' ];
$sql = "SELECT computadora.*,CONCAT(personal.nombre,' ',personal.a_paterno,' ',personal.a_materno) AS nombre,
propietarios.nombre AS propietario,case tipo when 1 then 'Escritorio' when 2 then 'Laptop'  when 3 then 'Otro' END AS tipol,
case estado when 1 then 'Nuevo' when 2 then 'Usado' when 3 then 'Con fallas' when 4 then 'Inservible' END AS est
FROM `computadora` 
left join personal on personal_id = id_personal 
left join propietarios on computadora.id_propietario = propietarios.id_propietario 
where id_compu=$ideditar  ";
mysqli_select_db( $conexion, $bd );
$query = mysqli_query( $conexion, $sql );
$resultado = mysqli_fetch_array( $query );


?>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="../../js/jquery-3.1.1.min.js"></script> 
    <script src="../../js/select2.js"></script>
    </head>
    <body>
    <div class="container">
      <div class="form">
        <div class="form-group">
          <h3>EQUIPO DE CÓMPUTO</h3>
				<div class="row">
			<div class="col">
          <b>DATOS GENERALES</b></div><div align="right" class="col">
			<a href="../../admin/computo/php/datasheet.php?id_data=<?php echo  $ideditar;?>" class="btn btn-success  " target="_blank" data-toggle="tooltip" data-placement="top"  >
								  <i class="fa fa-file-text-o "></i> Generar Responsiva
								 
							</a> </div>
				</div>
          <hr>
          <form action="../../admin/computo/php/edit_save.php?ideditar=<?php echo $ideditar;?>&cr=<?php echo $resultado['codigo'] ?>" method="post" onsubmit="return valida(this)" enctype="multipart/form-data">
            <div class="form-group">
				 <div class="row">
				 
                <div class="col">
                   <b>Código de registro: </b>
					<b><?php echo $resultado['codigo'] ?></b>
					
                </div>
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
                  <label for="tipo">Tipo </label>
                  <select class="form-control" id="tipo" name="tipo" required>
                   <option id="tipo" name="tipo"value="<?php echo $resultado['tipo'] ?>"><?php echo $resultado['tipol'] ?></option>
                    <option id="tipo" name="tipo" value="1">Escritorio</option>
                    <option id="tipo" name="tipo" value="2">Laptop</option>
                    <option id="tipo" name="tipo" value="4">Otro</option>
                  </select>
                </div>
				  <div class="col">
                  <label for="costo">Costo</label>
                  <input type="text" class="form-control" id="costo" name="costo"   onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $resultado['costo'] ?>">
                </div>
				  <div class="col">
                  <label for="fecha_compra">Fecha de compra</label>
                  <input type="date" class="form-control" id="fecha_compra" name="fecha_compra" value="<?php echo $resultado['fecha_compra'] ?>">
                </div>
				</div>
				
				<div class="row" >
                <div class="col-3">
                  <label for="cpu">Procesador</label>
                  <input type="text" class="form-control" id="cpu" name="cpu" value="<?php echo $resultado['cpu'] ?>">
                </div>
                <div class="col">
                  <label for="ram">Memoria RAM</label>
                  <input type="text" class="form-control" id="ram" name="ram" value="<?php echo $resultado['ram'] ?>"  >
                </div>
                <div class="col">
                  <label for="almacenamiento">Almacenamiento</label>
                  <input type="text" class="form-control" id="almacenamiento" name="almacenamiento" value="<?php echo $resultado['almacenamiento'] ?>"  >
                </div>
					<div class="col">
                  <label for="estado">Estado</label>
                  <select  class="form-control" id="estado" name="estado"  >
					<option id="estado" name="estado" value="<?php echo $resultado['estado'] ?>"><?php echo $resultado['est'] ?></option>
                    <option id="estado" name="estado" value="1">Nuevo</option>
                    <option id="estado" name="estado" value="2">Usado</option>
                    <option id="estado" name="estado" value="3">Con fallas</option>
                    <option id="estado" name="estado" value="4">Inservible</option>
                  </select>
                </div>
              </div>
				
				<div class="row">
                <div class="col">
                  <label for="marca">Marca</label>
                  <input type="text" class="form-control" id="marca" name="marca" value="<?php echo $resultado['marca'] ?>"  >
                </div>
                <div class="col">
                  <label for="modelo">Modelo</label>
                  <input type="text" class="form-control" id="modelo" name="modelo"  value="<?php echo $resultado['modelo'] ?>"  >
                </div>
               
                <div class="col">
                  <label for="color">Color</label>
                  <input type="text" class="form-control" id="color" name="color"  value="<?php echo $resultado['color'] ?>"  >
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label for="no_serie">Número de serie</label>
                  <input type="text" class="form-control" id="no_serie" name="no_serie" value="<?php echo $resultado['no_serie'] ?>"  >
                </div>
                <div class="col">
                  <label for="no_serie">Cargador</label>
                  <input type="text" class="form-control" id="cargador" name="cargador"  value="<?php echo $resultado['cargador'] ?>" >
                </div>
              
                <div class="col">
                  <label for="usuarioAsignado">Colaborador Asignado</label>
                  <select class="form-control js-example-basic-single" id="usuarioAsignado" name="usuarioAsignado">
                  <option name="usuarioAsignado" id="usuarioAsignado" value="<?php echo $resultado['personal_id'] ?>"><?php echo $resultado["nombre"] ?></option>
                      <option name="usuarioAsignado" id="usuarioAsignado" value="0">Sin colaborador</option>
                    <?php

               

                    $personal = "SELECT `id_personal`, `nombre`,`a_paterno`, `a_materno` FROM `personal`";
                    $ver_personal = mysqli_query( $conexion, $personal );
                    while ( $vp = mysqli_fetch_array( $ver_personal ) ) {
                        print '
            <option  name="usuarioAsignado" id="usuarioAsignado" value="' . $vp[ "id_personal" ] . '">'.$vp["nombre"].' '.' '.$vp["a_paterno"].''.' '.$vp["a_materno"].'</option>
            ';
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class="row">
               
				  <div class="col-4">
                  <label for="accesorios">Accesorios</label>
                  <textarea type="text" class="form-control" id="accesorios" name="accesorios" rows="3"><?php echo $resultado['accesorios'] ?></textarea>
                </div> 
				  <div class="col">
                  <label for="observaciones">Observaciones</label>
                  <textarea class="form-control" id="observaciones" name="observaciones" rows="3"><?php echo $resultado['observaciones'] ?></textarea>
                </div>
				  
              </div>
				  <br>
				
              <b>LICENCIAS</b>
              <hr>
              	<div class="row">
                <div class="col">
                  <label for="so">Sistema Operativo</label>
                  <select type="text" class="form-control" id="so" name="so" >
					  <?php 
					   $so= mysqli_query( $conexion,"SELECT id_licencias,nombre_licencias FROM licencias LEFT JOIN computadora_has_licencias ON id_licencias = licencias_id_licencias LEFT JOIN computadora ON computadora_id_compu = id_compu where computadora_has_licencias.computadora_id_compu = $ideditar and licencias.tipo =3" );
					  $rer = mysqli_fetch_array( $so );
					  
					   if(empty($rer)){
						  $rer['nombre_licencias']="Seleccione";
					  }
					  ?>
					   <option name="so" id="so"  value="<?php echo $rer['id_licencias'] ?>"><?php echo $rer['nombre_licencias'] ?></option>
					  <option name="so" id="so"  value="999">Quitar licencia</option>
					
					  <?php
                    $sistema= "SELECT `id_licencias`,`nombre_licencias` FROM `licencias` WHERE `tipo` =3" ;
                     $valso = mysqli_query( $conexion, $sistema );
                    while ( $mostrarSO = mysqli_fetch_array( $valso ) ) {
                        print '
                <option  name="so" id="so" value="' . $mostrarSO[ "id_licencias" ] . '">' . $mostrarSO[ "nombre_licencias" ] . '</option>
                ';
                    }
                    ?>
					  
					  
					    </select>
                </div>
                <div class="col">
                  <label for="office">Office </label>
                  <select type="text" class="form-control" id="office" name="office"  >
					    <?php 
					   $offi= mysqli_query( $conexion,"SELECT id_licencias,nombre_licencias FROM licencias LEFT JOIN computadora_has_licencias ON id_licencias = licencias_id_licencias LEFT JOIN computadora ON computadora_id_compu = id_compu where computadora_has_licencias.computadora_id_compu = $ideditar and licencias.tipo =2" );
					  $rer1 = mysqli_fetch_array( $offi );
					  if(empty($rer1)){
						  $rer1['nombre_licencias']="Seleccione";
					  }
					  ?>
					   <option name="office" id="office"value="<?php echo $rer1['id_licencias'] ?>"><?php echo $rer1['nombre_licencias'] ?></option>
					   <option name="so" id="so"  value="999">Quitar licencia</option>
					    <?php
                    $office= "SELECT `id_licencias`,`nombre_licencias` FROM `licencias` WHERE `tipo` =2" ;
                     $valoffice = mysqli_query( $conexion, $office );
                    while ( $mostraroffice = mysqli_fetch_array( $valoffice ) ) {
                        print '
                <option  name="office" id="office" value="' . $mostraroffice[ "id_licencias" ] . '">' . $mostraroffice[ "nombre_licencias" ] . '</option>
                ';
                    }
                    ?>
					  </select>
                </div>
                <div class="col">
                  <label for="antivirus">Antivirus</label>
                  <select type="text" class="form-control" id="antivirus" name="antivirus"  >
					  <?php 
					   $anti= mysqli_query( $conexion,"SELECT id_licencias,nombre_licencias FROM licencias LEFT JOIN computadora_has_licencias ON id_licencias = licencias_id_licencias LEFT JOIN computadora ON computadora_id_compu = id_compu where computadora_has_licencias.computadora_id_compu = $ideditar and licencias.tipo =1" );
					  $rer2 = mysqli_fetch_array( $anti );
					   if(empty($rer2)){
						  $rer2['nombre_licencias']="Seleccione";
					  }
					  ?>
					    <option name="antivirus" id="antivirus" value="<?php echo $rer2['id_licencias'] ?>"><?php echo $rer2['nombre_licencias'] ?></option>
					   <option name="so" id="so"  value="999">Quitar licencia</option>
					    <?php
                    $antivirus= mysqli_query( $conexion, "SELECT `id_licencias`,`nombre_licencias` FROM `licencias` WHERE `tipo` =1" );
                     
                    while ( $mostrarantivirus = mysqli_fetch_array( $antivirus ) ) {
                        print '
                <option  name="antivirus" id="antivirus" value="' . $mostrarantivirus[ "id_licencias" ] . '">' . $mostrarantivirus[ "nombre_licencias" ] . '</option>
                ';
                    }
                    ?>
					  </select>
                </div>
					<div class="col">
                  <label for="adicional">Software adicional</label>
                  <textarea class="form-control" id="adicional" name="adicional" rows="1"><?php echo $resultado['adicional'] ?></textarea>
                </div>
              </div>
              <br>
              <b>DOCUMENTACIÓN</b>
              <hr>
              <div align="left">
                <tr  align="left">
                  <td><div class="row">
                      <div class="col-6" >
                        <input type="file" name="archivo[]" id="archivo" class="form-control btn  " data-multiple-caption="{count} files selected" multiple>
                      </div>
                    </div></td>
                </tr>
              </div>
				<!-- Tabla de archivos-->
          <div >
            <main>
              <div class="card mb-4">
                <div >
                  <?php
                  $archivos = mysqli_query( $conexion, "Select codigo FROM computadora WHERE id_compu='$ideditar'" );
                  list( $doc ) = mysqli_fetch_row( $archivos );
                  $directorio = $_SERVER[ 'DOCUMENT_ROOT' ] . "/scrik/admin/computo/php/doc/$doc";
                  ?>
                </div>
                <div class="card-body ">
                  <table class="table">
                    <thead>
                      <tr align="center">
                        <th>Nombre del archivo</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $archivos = scandir( "$directorio" );
                      $num = 0;
                      for ( $i = 2; $i < count( $archivos ); $i++ ) {
                          $num++;
                          ?>
                      <tr align="center">
                        <td><?php echo $archivos[$i]; $ruta="$doc/$archivos[$i]" ?></td>
                        <td align="center">
							<a href="../../admin/computo/php/doc/<?php echo $ruta;?>" target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" >
							<i class="fas fa fa-eye"> 
							</i> 
							</a>
							<a href="../../admin/computo/php/doc/<?php echo $ruta;?>" download="<?php echo $archivos[$i]; ?>" class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" >
								<i class="fas fa fa-download"> 
								</i> 
							</a> 
							<acronym title="Eliminar"> 
								<a href="../../admin/computo/php/deletedoc.php?ideliminar=<?php echo $ruta;?>" class="btn btn-danger  btn-lg" onclick="return confirmarAccesoURL()"> 
									<i class="fas fa-trash"> 
									</i> 
								</a> 
							</acronym>
						  </td>
                        <?php
                        }
                        ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </main>
          </div>
              <div align="right"> <a class="btn btn-danger" type="button" href="index.php" >Volver </a>
                <input type="Submit" class="btn btn-danger" name="Submit" value="Guardar "  />
              </div>
            </div>
          </form>
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
    </div>
    </div>
    <script type="text/javascript">
            // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
            </script>
    </body>
    </html>