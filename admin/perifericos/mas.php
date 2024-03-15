<?php

if ( @!$_SESSION[ 'email' ] ) {
    echo '<script>alert("Inicie sesion para acceder")</script> ';
    echo "<script>location.href='../../'</script>";
}
require_once "../../conexion.php";
                    $obj = new conectar();
                    $conexion = $obj->conexion();
$ideditar = $_GET[ 'ideditar' ];
$sql = "SELECT perifericos.*,
CONCAT(personal.nombre,' ',personal.a_paterno,' ',personal.a_materno) AS nombre,
case estado when 1 then 'Nuevo' when 2 then 'Usado' when 3 then 'Con fallas' when 4 then 'Inservible' END AS est,
propietarios.nombre AS propietario
FROM `perifericos` 
left join personal on personal_id = id_personal 
left join propietarios on perifericos.id_propietario = propietarios.id_propietario 
where id_perifericos=$ideditar  ";
mysqli_select_db( $conexion, $bd );
$query = mysqli_query( $conexion, $sql );
$resultado = mysqli_fetch_array( $query );
?>
<html>
   <head>
    <div class="container">
      <div class="form">
        <div class="form-group">
          <h3>PERIFÉRICOS</h3> <b>DATOS GENERALES</b>
              <hr>
          <form action="../../admin/perifericos/php/edit_save.php?ideditar=<?php echo $ideditar;?>&cr=<?php echo $resultado['codigo'] ?>" method="post" onsubmit="return valida(this)" enctype="multipart/form-data">
            <div class="form-group">
				    <div class="row">
				 
                <div class="col">
                   <b>Código de registro: </b>
					<b><?php echo $resultado['codigo'] ?></b>
					
                </div>	
                </div>
				<br>
              <div class="row">
               <div class="col">
                  <label for="propietario">Propietario</label>
                  <select class="form-control" id="propietario" name="propietario" required>
                    <option name="propietario" id="propietario" value="<?php echo $resultado['id_propietario'] ?>"><?php echo $resultado['propietario'] ?></option>
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
                </div> <div class="col">
                  <label for="no_serie">Número de serie</label>
                  <input type="text" class="form-control" id="no_serie" name="no_serie" value ="<?php echo $resultado['no_serie'] ?>" >
                </div>
                <div class="col-6">
                   <label for="descripcion">Características generales</label>
					<textarea class="form-control" rows="2" d="caracteristicas" name="caracteristicas"><?php echo $resultado['caracteristicas'] ?>
					</textarea>
                </div> 
				
                
              
				</div>
               <div class="row">
				  	<div class="col">
                  <label for="estado">Estado</label>
                  <select  class="form-control" id="estado" name="estado"  >
						<option id="estado" name="estado" value="<?php echo $resultado['Estado'] ?>"><?php echo $resultado['est'] ?></option>
                    <option id="estado" name="estado" value="1">Nuevo</option>
                    <option id="estado" name="estado" value="2">Usado</option>
                    <option id="estado" name="estado" value="3">Con fallas</option>
                    <option id="estado" name="estado" value="4">Inservible</option>
                  </select>
                </div>
								  <div class="col">
                  <label for="costo">Costo</label>
                  <input type="text" class="form-control" id="costo" name="costo"   onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $resultado['costo'] ?>"  >
                </div>
				    <div class="col">
                  <label for="fecha_compra">Fecha de asignación</label>
                  <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $resultado['fecha'] ?>"  >
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
                    while ( $mostrar = mysqli_fetch_array( $val ) ) {
                        print '
                <option  name="usuarioAsignado" id="usuarioAsignado" value="' . $mostrar[ "id_personal" ] . '">' . $mostrar[ "nombre" ] . ' ' . ' ' . $mostrar[ "a_paterno" ] . '' . ' ' . $mostrar[ "a_materno" ] . '</option>
                ';
                    }
                    ?>
                  </select>
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
                  $archivos = mysqli_query( $conexion, "Select codigo FROM perifericos WHERE id_perifericos='$ideditar'" );
                  list( $doc ) = mysqli_fetch_row( $archivos );
                  $directorio = $_SERVER[ 'DOCUMENT_ROOT' ] . "/scrik/admin/perifericos/php/doc/$doc";
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
							<a href="../../admin/perifericos/php/doc/<?php echo $ruta;?>" target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" >
							<i class="fas fa fa-eye"> 
							</i> 
							</a>
							<a href="../../admin/perifericos/php/doc/<?php echo $ruta;?>" download="<?php echo $archivos[$i]; ?>" class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" >
								<i class="fas fa fa-download"> 
								</i> 
							</a> 
							<acronym title="Eliminar"> 
								<a href="../../admin/perifericos/php/deletedoc.php?ideliminar=<?php echo $ruta;?>" class="btn btn-danger  btn-lg" onclick="return confirmarAccesoURL()"> 
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
	
</body>
</html>