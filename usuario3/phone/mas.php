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
          <b>DATOS GENERALES</b>
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
                  <p type="text" class="form-control" ><?php echo $resultado['propietario'] ?></p>
                </div>
				  
				   <div class="col">
                  <label for="no_telefono">Número telefónico</label>
                  <p type="text" class="form-control" ><?php echo $resultado['numero_tel'] ?></p>
                </div>
                <div class="col">
                  <label for="region">Región</label>
                  <p type="text" class="form-control" ><?php echo $resultado['region'] ?></p>
                </div>
                
              </div>
              <div class="row">
		  <div class="col">
                  <label for="marca">Marca</label>
                  <p type="text" class="form-control" ><?php echo $resultado['marca'] ?></p>
                </div>
		  <div class="col">
                  <label for="modelo">Modelo</label>
                  <p type="text" class="form-control" ><?php echo $resultado['modelo'] ?></p>
                </div>
		  <div class="col">
                  <label for="imei">IMEI</label>
                  <p type="text" class="form-control" ><?php echo $resultado['imei'] ?></p>
                </div>
				  <div class="col">
                  <label for="color">Color</label>
                  <p type="text" class="form-control" ><?php echo $resultado['color'] ?></p>
                </div>
		  
		  </div>
		  <div class="row">
			  <div class="col">
                  <label for="no_serie">Número de serie</label>
                  <p type="text" class="form-control" ><?php echo $resultado['no_serie'] ?></p>
                </div>
		    
		  <div class="col">
                  <label for="no_cargador">Número de serie del cargador</label>
                  <p type="text" class="form-control" ><?php echo $resultado['no_cargador'] ?></p>
                </div>
			  
		  </div>
       
              <div class="row">
                <div class="col-5">
                  <label for="usuarioAsignado">Colaborador Asignado</label>
					<p type="text" class="form-control" ><?php echo $resultado["nombre"] ?></p>
                </div>
				  <div class="col">
                  <label for="disponible">Disponibilidad</label>
                 <p type="text" class="form-control" ><?php echo $resultado["est"] ?></p>
                </div> </div>
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