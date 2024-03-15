<?php

if ( @!$_SESSION[ 'email' ] ) {
    echo '<script>alert("Inicie sesion para acceder")</script> ';
    echo "<script>location.href='../../'</script>";
}
require_once "../../conexion.php";
                    $obj = new conectar();
                    $conexion = $obj->conexion();
$ideditar = $_GET[ 'ideditar' ];
$sql = "SELECT celular.*,
CONCAT(personal.nombre,' ',personal.a_paterno,' ',personal.a_materno) AS nombre,
case disponible when 1 then 'Disponible' when 2 then 'No disponible' END AS est,
propietarios.nombre AS propietario
FROM `celular` 
left join personal on personal_id = id_personal 
left join propietarios on celular.id_propietario = propietarios.id_propietario 
where id_celular=$ideditar  ";
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
          <h3>EQUIPO TELEFÓNICO</h3>
        <div class="row">
			<div class="col">
          <b>DATOS GENERALES</b></div><div align="right" class="col">
			<a href="../../admin/phone/php/datasheet.php?id_data=<?php echo  $ideditar;?>" class="btn btn-success  " target="_blank" data-toggle="tooltip" data-placement="top"  >
								  <i class="fa fa-file-text-o "></i> Generar Responsiva
								 
							</a> </div>
				</div>
          <hr>
          <form action="../../admin/phone/php/edit_save.php?ideditar=<?php echo $ideditar;?>&cr=<?php echo $resultado['codigo'] ?>" method="post" onsubmit="return valida(this)" enctype="multipart/form-data">
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
                    <option name="propietario" id="propietario"value="<?php echo $resultado['id_propietario'] ?>"><?php echo $resultado['propietario'] ?></option>
                    <?php

                    require_once "../../conexion.php";
                    $obj = new conectar();
                    $conexion = $obj->conexion();

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
                  <label for="no_telefono">Número telefónico</label>
                  <input type="text" class="form-control" id="no_telefono" name="no_telefono"  maxlength="12" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $resultado['numero_tel'] ?>">
                </div>
                <div class="col">
                  <label for="region">Región</label>
                  <input type="text" class="form-control" id="region" name="region" value="<?php echo $resultado['region'] ?>" >
                </div>
                
              </div>
              <div class="row">
		  <div class="col">
                  <label for="marca">Marca</label>
                  <input type="text" class="form-control" id="marca" name="marca" value="<?php echo $resultado['marca'] ?>">
                </div>
		  <div class="col">
                  <label for="modelo">Modelo</label>
                  <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo $resultado['modelo'] ?>" >
                </div>
		  <div class="col">
                  <label for="imei">IMEI</label>
                  <input type="text" class="form-control" id="imei" name="imei" value="<?php echo $resultado['imei'] ?>" >
                </div>
				  <div class="col">
                  <label for="color">Color</label>
                  <input type="text" class="form-control" id="color" name="color" value="<?php echo $resultado['color'] ?>" >
                </div>
		  
		  </div>
		  <div class="row">
			  <div class="col">
                  <label for="no_serie">Número de serie</label>
                  <input type="text" class="form-control" id="no_serie" name="no_serie" value="<?php echo $resultado['no_serie'] ?>"   >
                </div>
		    
		  <div class="col">
                  <label for="no_cargador">Número de serie del cargador</label>
                  <input type="text" class="form-control" id="no_cargador" name="no_cargador" value="<?php echo $resultado['no_cargador'] ?>" >
                </div>
			  
		  </div>
       
              <div class="row">
                <div class="col-5">
                  <label for="usuarioAsignado">Colaborador Asignado</label>
                  <select class="form-control js-example-basic-single" id="usuarioAsignado" name="usuarioAsignado">
                      <option name="usuarioAsignado" id="usuarioAsignado"  value="<?php echo $resultado['personal_id'] ?>"><?php echo $resultado["nombre"] ?></option>
					   <option name="usuarioAsignado" id="usuarioAsignado" value="0">Sin colaborador</option>
                    <?php

               

                    $sql = "SELECT `id_personal`, `nombre`,`a_paterno`, `a_materno` FROM `personal`";
                    $val = mysqli_query( $conexion, $sql );
                    while ( $mostrar = mysqli_fetch_array( $val) ) {
                        print '
            <option  name="usuarioAsignado" id="usuarioAsignado" value="' . $mostrar[ "id_personal" ] . '">'.$mostrar["nombre"].' '.' '.$mostrar["a_paterno"].''.' '.$mostrar["a_materno"].'</option>
            ';
                    }
                    ?>
                  </select>
                </div>
				  <div class="col">
                  <label for="disponible">Disponibilidad</label>
                  <select class="form-control" id="disponible" name="disponible" required>
                    <option id="disponible" name="disponible"  value="<?php echo $resultado['disponible'] ?>"><?php echo $resultado["est"] ?></option>
                    <option id="disponible" name="disponible" value="1">Disponible</option>
                    <option id="disponible" name="disponible" value="2">No disponible</option>
                  </select>
                </div> </div>
		  <div class="row">
                <div class="col">
                  <label for="observaciones">Observaciones</label>
                  <textarea class="form-control" id="observaciones" name="observaciones" rows="3" ><?php echo $resultado['observaciones'] ?></textarea>
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
                  $archivos = mysqli_query( $conexion, "Select codigo FROM celular WHERE id_celular='$ideditar'" );
                  list( $doc ) = mysqli_fetch_row( $archivos );
                  $directorio = $_SERVER[ 'DOCUMENT_ROOT' ] . "/scrik/admin/phone/php/doc/$doc";
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
							<a href="../../admin/phone/php/doc/<?php echo $ruta;?>" target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" >
							<i class="fas fa fa-eye"> 
							</i> 
							</a>
							<a href="../../admin/phone/php/doc/<?php echo $ruta;?>" download="<?php echo $archivos[$i]; ?>" class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" >
								<i class="fas fa fa-download"> 
								</i> 
							</a> 
							<acronym title="Eliminar"> 
								<a href="../../admin/phone/php/deletedoc.php?ideliminar=<?php echo $ruta;?>" class="btn btn-danger  btn-lg" onclick="return confirmarAccesoURL()"> 
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

<span>Copyright &copy; 2023. GRUPO KEPLER</span>
                    </div>
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