<?php

if ( @!$_SESSION[ 'email' ] ) {
    echo '<script>alert("Inicie sesion para acceder")</script> ';
    echo "<script>location.href='../../'</script>";
}
require_once "../../conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();
$ideditar = $_GET[ 'ideditar' ];
$sql="SELECT maquinaria.*,id_empresa,empresa.nombre as empresa,propietarios.nombre as 'Npropietario', case area_resp when 1 then 'Mantenimiento' when 2 then 'Maquinados' when 3 then 'Producción' END AS 'area', case estado when 1 then 'En operación' when 2 then 'Fuera de operación' when 3 then 'En reparación' when 4 then 'Inservible' END AS est
FROM `maquinaria`
left join empresa on `empresa_id` = id_empresa 
left join propietarios on `propietario_id` = id_propietario
where id_cogs='$ideditar'";
mysqli_select_db( $conexion, $bd );
$query = mysqli_query( $conexion, $sql );
$result = mysqli_fetch_array( $query );
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
      <h3>MAQUINARIA</h3>
      <b>DATOS GENERALES</b>
      <hr>
      <form action="../../admin/maquinaria/php/edit_save.php?ideditar=<?php echo $ideditar;?>&cr=<?php echo $result['codigo'] ?>" method="post" onsubmit="return valida(this)" enctype="multipart/form-data">
        <div class="form-group">
			  <div class="row">
				 
                <div class="col">
                   <b>Código de registro: </b>
					<b><?php echo $result['codigo'] ?></b>
					
                </div>
               </div>
			<br>
          <div class="row">
            <div class="col-4">
              <label for="descripcion">Descripción</label>
              <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $result['descripcion'] ?>" >
            </div>
            <div class="col">
              <label for="marca">Marca</label>
              <input type="text" class="form-control" id="marca" name="marca" value="<?php echo $result['marca'] ?>" >
            </div>
            <div class="col">
              <label for="serie">Serie</label>
              <input type="text" class="form-control" id="serie" name="serie" value="<?php echo $result['serie'] ?>"  >
            </div>
            <div class="col">
              <label for="modelo">Modelo</label>
              <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo $result['modelo'] ?>"  >
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="estado">Estado</label>
              <select  class="form-control" id="estado" name="estado">
				  <option id="estado" name="estado" value="<?php echo $result['estado'] ?>"><?php echo $result['est'] ?></option>
                <option id="estado" name="estado" value="1">En operación</option>
                <option id="estado" name="estado" value="2">Fuera de operación</option>
                <option id="estado" name="estado" value="3">En reparación</option>
                <option id="estado" name="estado" value="4">Inservible</option>
              </select>
            </div>
            <div class="col">
              <label for="no_factura">Número Factura</label>
              <input type="text" class="form-control" id="no_factura" name="no_factura" value="<?php echo $result['no_factura'] ?>" >
            </div>
            <div class="col">
              <label for="val_factura">Valor factura</label>
              <input type="text" class="form-control" id="val_factura" name="val_factura" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $result['valor_factura'] ?>">
            </div>
            </div>
          <div class="row">
			  <div class="col-5">
			    <label for="propietario">Propietario</label>
                  <select class="form-control" id="propietario" name="propietario" required >
					  <option name="propietario" id="propietario"  value="<?php echo $result['propietario_id'] ?>"><?php echo $result['Npropietario'] ?></option>
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
              <label for="empresa">Empresa</label>
              <select class="form-control" id="empresa" name="empresa" required >
				 <option    id="empresa" name="empresa"  value="<?php echo $result['empresa_id'] ?>"><?php echo $result['empresa'] ?></option>
                <?php
                $consulta = "SELECT `id_empresa`, `nombre` FROM `empresa`";
                $valores = mysqli_query( $conexion, $consulta );
                while ( $ver = mysqli_fetch_array( $valores ) ) {
                    print '
            <option  name="empresa" id="empresa" value="' . $ver[ "id_empresa" ] . '">' . $ver[ "nombre" ] . '</option>
            ';
                }
                ?>
              </select>
            </div>
            <div class="col">
              <label for="area">Área responsable </label>
              <select class="form-control" id="area" name="area" required >
				<option   id="area" name="area" required value="<?php echo $result['area_resp'] ?>"><?php echo $result["area"] ?></option>
                <option id="area" name="area" value="1">Mantenimiento</option>
                <option id="area" name="area" value="2">Maquinados</option>
                <option id="area" name="area" value="3">Producción</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="observaciones">Observaciones</label>
              <textarea class="form-control" id="observaciones" name="observaciones" rows="3"><?php echo $result['obs'] ?></textarea>
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
                  $archivos = mysqli_query( $conexion, "Select codigo FROM maquinaria WHERE id_cogs='$ideditar'" );
                  list( $doc ) = mysqli_fetch_row( $archivos );
                  $directorio = $_SERVER[ 'DOCUMENT_ROOT' ] . "/scrik/admin/maquinaria/php/doc/$doc";
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
							<a href="../../admin/maquinaria/php/doc/<?php echo $ruta;?>" target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" >
							<i class="fas fa fa-eye"> 
							</i> 
							</a>
							<a href="../../admin/maquinaria/php/doc/<?php echo $ruta;?>" download="<?php echo $archivos[$i]; ?>" class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" >
								<i class="fas fa fa-download"> 
								</i> 
							</a> 
							<acronym title="Eliminar"> 
								<a href="../../admin/maquinaria/php/deletedoc.php?ideliminar=<?php echo $ruta;?>" class="btn btn-danger  btn-lg" onclick="return confirmarAccesoURL()"> 
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
			
          <div align="right"> <a class="btn btn-danger" type="button" href="javascript: history.go(-1)" >Volver </a>
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