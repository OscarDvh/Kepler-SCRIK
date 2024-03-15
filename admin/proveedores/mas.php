<?php

if ( @!$_SESSION[ 'email' ] ) {
    echo '<script>alert("Inicie sesion para acceder")</script> ';
    echo "<script>location.href='../../'</script>";
}
require_once "../../conexion.php";
$obj = new conectar();
$conexion = $obj->conexion();

$ideditar = $_GET[ 'ideditar' ];
$sql = "SELECT * FROM `provedores` WHERE  id_provedores=$ideditar  ";
mysqli_select_db( $conexion, $bd );
$query = mysqli_query( $conexion, $sql );
$resultado = mysqli_fetch_array( $query );

?><html>
<div class="container">
      <div class="form">
        <div class="form-group">
          <h3>PROVEEDOR</h3>
          <form action="../../admin/proveedores/php/edit_save.php?ideditar=<?php echo $ideditar;?>" method="post" onsubmit="return valida(this)" enctype="multipart/form-data">
            <div class="form-group"> <b>DATOS GENERALES</b>
              <hr>
              <div class="row">
               
                <div class="col-6">
                  <label for="nombre">Nombre(s)</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" required value="<?php echo $resultado['nombre'] ?>">
                </div>
                <div class="col">
                  <label for="telefono">Teléfono</label>
                  <input type="text" class="form-control" id="telefono" name="telefono" maxlength="12" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $resultado['phone'] ?>">
                </div>
				  <div class="col">
                  <label for="email">Correo electrónico</label>
                  <input type="email" class="form-control" id="email" name="email" value="<?php echo $resultado['email'] ?>">
                </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <label for="descripcion">Descripción de los servicios que ofrece</label>
					<textarea class="form-control" rows="2" d="descripcion" name="descripcion" ><?php echo $resultado['descripcion'] ?>
					</textarea>
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
                  $archivos = mysqli_query( $conexion, "Select nombre FROM provedores WHERE id_provedores='$ideditar'" );
                  list( $doc ) = mysqli_fetch_row( $archivos );
                  $directorio = $_SERVER[ 'DOCUMENT_ROOT' ] . "/scrik/admin/proveedores/php/doc/$doc";
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
							<a href="../../admin/proveedores/php/doc/<?php echo $ruta;?>" target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" >
							<i class="fas fa fa-eye"> 
							</i> 
							</a>
							<a href="../../admin/proveedores/php/doc/<?php echo $ruta;?>" download="<?php echo $archivos[$i]; ?>" class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" >
								<i class="fas fa fa-download"> 
								</i> 
							</a> 
							<acronym title="Eliminar"> 
								<a href="../../admin/proveedores/php/deletedoc.php?ideliminar=<?php echo $ruta;?>" class="btn btn-danger  btn-lg" onclick="return confirmarAccesoURL()"> 
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
          <div align="right"> <a class="btn btn-danger" type="button" href="index.php" >Volver</a>
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

</body></html>