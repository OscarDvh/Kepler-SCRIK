<?php

if ( @!$_SESSION[ 'email' ] ) {
    echo '<script>alert("Inicie sesion para acceder")</script> ';
    echo "<script>location.href='../../'</script>";
}
require_once "../../conexion.php";
$obj = new conectar();
$conexion = $obj->conexion();

$ideditar = $_GET[ 'ideditar' ];
$sql = "SELECT *, case tipo when 1 then 'Antivirus' when 2 then 'Office' when 3 then 'Sistema operativo' when 4 then 'Otro' END AS tipol
FROM `licencias` 
left join provedores on provedores_id = id_provedores
WHERE  id_licencias=$ideditar  ";
mysqli_select_db( $conexion, $bd );
$query = mysqli_query( $conexion, $sql );
$resultado = mysqli_fetch_array( $query );

?>
   <html>
    <head>
    </head>

    <div class="container">
      <div class="form">
        <div class="form-group">
          <h3>LICENCIA DE SOFTWARE</h3>
          <form action="../../admin/licencias/php/edit_save.php?ideditar=<?php echo $ideditar;?>" method="post" onsubmit="return valida(this)" enctype="multipart/form-data">
            <div class="form-group"> <b>DATOS GENERALES</b>
              <hr>
              <div class="row">
               
                <div class="col">
                  <label for="nombre_licencias">Nombre de la licencia</label>
                  <p type="text" class="form-control" ><?php echo $resultado['nombre_licencias'] ?></p>
                </div>
				  <div class="col">
                  <label for="costo">Costo</label>
                   <p type="text" class="form-control" ><?php echo $resultado['costo'] ?></p>
                </div>
				  <div class="col">
                  <label for="fecha_inicio">Fecha de compra</label>
                  <p type="text" class="form-control" ><?php echo $resultado['fecha_inicio'] ?></p>
                </div>
				  <div class="col">
                  <label for="fecha_fin">Fecha de vencimiento</label>
                  <p type="text" class="form-control" ><?php echo $resultado['fecha_fin'] ?></p>
                </div> 
                </div>

              <div class="row">
				  <div class="col">
                  <label for="clave">Clave(Serial)</label>
                  <p type="text" class="form-control" ><?php echo $resultado['clave'] ?></p>
                </div> 
				 <div class="col">
                  <label for="tipo">Tipo </label>
                  <p type="text" class="form-control" ><?php echo $resultado['tipol'] ?></p>
                </div>
				<div class="col">
                  <label for="limite_usuarios">Límite de usuarios</label>
                   <p type="text" class="form-control" ><?php echo $resultado['limite_usuarios'] ?></p>
                </div> 
				  <div class="col">
                  <?php 
					 $has=mysqli_query( $conexion, "SELECT COUNT(licencias_id_licencias)FROM computadora_has_licencias  where licencias_id_licencias='$ideditar' " );
						 list( $dep ) = mysqli_fetch_row( $has );
							 $d1=$resultado['limite_usuarios'];
							 $disponibles=$d1-$dep;
						
					  ?>
                   <label >Usuarios disponibles</label><br>
                   <label><?php echo $disponibles ?> </label>
                </div> 
				</div>
				              <div class="row">
                <div class="col-4">
                  <label for="provedores_id">Proveedor</label>
					<p type="text" class="form-control" ><?php echo $resultado["nombre"] ?></p>
                
                </div>
				</div>
              <div class="row">
				   <div class="col">
                  <label for="observaciones">Observaciones</label>
                  <p type="text" class="form-control" ><?php echo $resultado['observaciones'] ?></p>
                </div>
			  </div>
			  
              <br>
              <b>DOCUMENTACIÓN</b>
              <hr>
           
				
				<!-- Tabla de archivos-->
          <div >
            <main>
              <div class="card mb-4">
                <div >
                  <?php
                  $archivos = mysqli_query( $conexion, "Select nombre_licencias FROM licencias WHERE id_licencias='$ideditar'" );
                  list( $doc ) = mysqli_fetch_row( $archivos );
                  $directorio = $_SERVER[ 'DOCUMENT_ROOT' ] . "/scrik/admin/licencias/php/doc/$doc";
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
							<a href="../../admin/licencias/php/doc/<?php echo $ruta;?>" target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" >
							<i class="fas fa fa-eye"> 
							</i> 
							</a>
							<a href="../../admin/licencias/php/doc/<?php echo $ruta;?>" download="<?php echo $archivos[$i]; ?>" class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" >
								<i class="fas fa fa-download"> 
								</i> 
							</a> 
						
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
              <div align="right"> <a class="btn btn-danger" type="button" href="index.php">Volver </a>
              
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
    </body></html>