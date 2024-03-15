    <?php

    if ( @!$_SESSION[ 'email' ] ) {
        echo '<script>alert("Inicie sesion para acceder")</script> ';
        echo "<script>location.href='../../'</script>";
    }
require_once "../../conexion.php";
$obj = new conectar();
$conexion = $obj->conexion();

$ideditar = $_GET[ 'ideditar' ];
$sql = " SELECT stock.* ,
		  case estado 
		  when 1 then 'Excelente' 
		  when 2 then 'Regular' 
		  when 3 then 'Deteriorado' 
		  when 4 then 'Mal estado' 
		  END AS est,
		  CONCAT(personal.nombre,' ',personal.a_paterno,' ',personal.a_materno) AS nombre,propietarios.nombre AS propietario
		  FROM `stock`
		  left join personal on personal_id = id_personal 
		 left join propietarios on stock.id_propietario = propietarios.id_propietario 
		  where  id_stock=$ideditar  ";
mysqli_select_db( $conexion, $bd );
$query = mysqli_query( $conexion, $sql );
$resultado = mysqli_fetch_array( $query );
$opt=array("","","");
	     $opt[$resultado['almacenado']]="checked";

    ?>
    <html>
     <head>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="../../js/jquery-3.1.1.min.js"></script> 
    <script src="../../js/select2.js"></script>
    </head>

    <div class="container">
      <div class="form">
        <div class="form-group">
          <h3>MOBILIARIO</h3>
          <form action="../../admin/stock/php/edit_save.php?ideditar=<?php echo $ideditar;?>" method="post" onsubmit="return valida(this)" enctype="multipart/form-data">
            <div class="form-group"> <b>DATOS GENERALES</b>
              <hr>
				     <div class="row">
				 
                <div class="col">
                   <b>Código de registro: </b>
					<b><?php echo $resultado['codigo'] ?></b>
					
                </div>
               </div>
			  <br>
            <div class="row"> 
				  <div class="col-3">
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
                  <label for="tipo">Tipo</label>
                  <input type="text" class="form-control" id="tipo" name="tipo" required value="<?php echo $resultado['tipo'] ?>">
                </div>
                <div class="col-2">
                  <label for="estado">Estado</label>
                  <select  class="form-control" id="estado" name="estado"  >
					<option id="estado" name="estado" value="<?php echo $resultado['estado'] ?>"><?php echo $resultado['est'] ?></option>
					<option id="estado" name="estado" value="0">Seleccione</option>
                    <option id="estado" name="estado" value="1">Exelente</option>
                    <option id="estado" name="estado" value="2">Regular</option>
                    <option id="estado" name="estado" value="3">Deteriorado</option>
                    <option id="estado" name="estado" value="4">Mal estado</option>
                  </select>
                </div>
               <div class="col-2">
                  <label for="cantidad">Cantidad</label>
                  <input type="text" class="form-control" id="cantidad" name="cantidad"  maxlength="12" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $resultado['cantidad'] ?>">
                </div> 
              </div>
             
              <div class="row">
				  <div class="col-3">
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
                <div class="col-3">
                  <label for="opt">Estado de almacenamiento</label>
					<br>
                  <input  name="opt" id="opt" type="radio" value="1"<?php echo $opt['1'] ?>> Almacenado
					<br>
			        <input name="opt" id="opt" type="radio" value="2"<?php echo $opt['2'] ?>> No almacenado
					
					    

                </div>
                
            
                <div class="col">
                  <label for="caracteristicas">Caracteristicas generales</label>
                  <textarea class="form-control" id="caracteristicas" name="caracteristicas" rows="4"><?php echo $resultado["caracteristicas"] ?></textarea>
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
                  $archivos = mysqli_query( $conexion, "Select codigo FROM stock WHERE id_stock='$ideditar'" );
                  list( $doc ) = mysqli_fetch_row( $archivos );
                  $directorio = $_SERVER[ 'DOCUMENT_ROOT' ] . "/scrik/admin/stock/php/doc/$doc";
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
							<a href="../../admin/stock/php/doc/<?php echo $ruta;?>" target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" >
							<i class="fas fa fa-eye"> 
							</i> 
							</a>
							<a href="../../admin/stock/php/doc/<?php echo $ruta;?>" download="<?php echo $archivos[$i]; ?>" class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" >
								<i class="fas fa fa-download"> 
								</i> 
							</a> 
							<acronym title="Eliminar"> 
								<a href="../../admin/stock/php/deletedoc.php?ideliminar=<?php echo $ruta;?>" class="btn btn-danger  btn-lg" onclick="return confirmarAccesoURL()"> 
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

    <!--confimacion js.--> 
   <script type="text/javascript">
        // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
        </script> 

    </body></html>