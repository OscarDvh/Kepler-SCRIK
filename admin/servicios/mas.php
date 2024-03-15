    <?php

    if ( @!$_SESSION[ 'email' ] ) {
        echo '<script>alert("Inicie sesion para acceder")</script> ';
        echo "<script>location.href='../../'</script>";
    }
    require_once "../../conexion.php";
    $obj = new conectar();
    $conexion = $obj->conexion();

    $ideditar = $_GET[ 'ideditar' ];
    $sql = "SELECT servicios.*,case centro_trabajo 
								when 1 then 'INNOVET'
								when 2 then 'BE EX EN'
								when 3 then 'CVA'
								when 4 then 'INGRAM GUADALAJARA'
								when 5 then 'PIA'
								when 6 then 'CEDIC'
								when 7 then 'CEDIM'
								when 8 then 'CEVA'
								WHEN 9 THEN 'CVA TULTITLAN' END AS  centro,
								`provedores_id`, `id_provedores`, `nombre`
									FROM servicios
										left join provedores
											on provedores_id= id_provedores
											where id_servicios=$ideditar  ";
    mysqli_select_db( $conexion, $bd );
    $query = mysqli_query( $conexion, $sql );
    $resultado = mysqli_fetch_array( $query );

//$opt1=array("","","","");
$str=$resultado['extra'];
$op1='1';
$op2='2';
$op3='3';
$pas1=strpos($str,$op1);
$pas2=strpos($str,$op2);
$pas3=strpos($str,$op3);


if ($pas1 ===false) {
    $mtr=0;
} else {
   $mtr=1;
}

if ($pas2 === false) {
    $mtr2=0;
} else {
   $mtr2=2;
}
if ($pas3 ===FALSE) {
    $mtr3='0';
} else {
   $mtr3='3';
}

	
	$opt=array("","");
	     $opt[$mtr]="checked"; 
$opt2=array("","","");
	     $opt2[$mtr2]="checked";
$opt3=array("","","","");
	     $opt3[$mtr3]="checked";     


			
    ?>
    <html>
    <head>
    </head>

    <div class="container">
      <div class="form">
        <div class="form-group">
          <h3>SERVICIO DE COMUNICACIÓN </h3>
          <form action="../../admin/servicios/php/edit_save.php?ideditar=<?php echo $ideditar;?>" method="post" onsubmit="return valida(this)" enctype="multipart/form-data">
            <div class="form-group"> <b>DATOS GENERALES</b>
              <hr>
              <div class="row">
                <div class="col">
                  <label for="no_cuenta">Numero de cuenta</label>
                  <input type="text" class="form-control" id="no_cuenta" name="no_cuenta" required value="<?php echo $resultado['no_cuenta'] ?>">
                </div>
                <div class="col">
                  <label for="provedores_id">Proveedor</label>
                  <select class="form-control js-example-basic-single" id="provedores_id" name="provedores_id">
                    <option name="provedores_id" id="provedores_id"value="<?php echo $resultado['provedores_id'] ?>"><?php echo $resultado["nombre"] ?></option>
                    <?php

                    require_once "../../conexion.php";
                    $obj = new conectar();
                    $conexion = $obj->conexion();

                    $sql = "SELECT * FROM `provedores` ";
                    $val = mysqli_query( $conexion, $sql );
                    while ( $mostrar = mysqli_fetch_array( $val ) ) {
                        print '
                <option  name="provedores_id" id="provedores_id" value="' . $mostrar[ "id_provedores" ] . '">' . $mostrar[ "nombre" ] . ' </option>
                ';
                    }
                    ?>
                  </select>
                </div>
                <div class="col">
                  <label for="fecha_inicio">Fecha de contratación del servicio</label>
                  <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="<?php echo $resultado['fecha_inicio'] ?>">
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label for="fecha_fin">Fecha (Día) de ronavación</label>
                  <input type="text" class="form-control" id="fecha_fin" name="fecha_fin" value="<?php echo $resultado['fecha_renova'] ?>">
                </div>
                <div class="col">
                  <label for="costo">Costo de renovación</label>
                  <input type="text" class="form-control" id="costo" name="costo" required  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" value="<?php echo $resultado['costo_renova'] ?>">
                </div>
                <div class="col">
                  <label for="centro_trabajo">Centro de trabajo </label>
                  <select class="form-control" id="centro_trabajo" name="centro_trabajo" required>
					  <option id="centro_trabajo" name="centro_trabajo"value="<?php echo $resultado['centro_trabajo'] ?>"><?php echo $resultado['centro'] ?></option>
                    <option id="centro_trabajo" name="centro_trabajo" value="0">Seleccione</option>
                    <option id="centro_trabajo" name="centro_trabajo" value="1">INNOVET</option>
                    <option id="centro_trabajo" name="centro_trabajo" value="2">BE EX EN</option>
                    <option id="centro_trabajo" name="centro_trabajo" value="3">CVA</option>
                    <option id="centro_trabajo" name="centro_trabajo" value="4">INGRAM GUADALAJARA</option>
                    <option id="centro_trabajo" name="centro_trabajo" value="5">PIA</option>
                    <option id="centro_trabajo" name="centro_trabajo" value="6">CEDIC</option>
                    <option id="centro_trabajo" name="centro_trabajo" value="7">CEDIM</option>
                    <option id="centro_trabajo" name="centro_trabajo" value="8">CEVA</option>
                    <option id="centro_trabajo" name="centro_trabajo" value="9">CVA TULTITLAN</option>
                  </select>
                </div>
              </div>
              <div class="row"> </div>
              <div class="row">
                <div class="col">
                  <label for="caracteristicas">Caracteristicas generales</label>
                  <textarea class="form-control" id="caracteristicas" name="caracteristicas" rows="4"><?php echo $resultado['detalles'] ?></textarea>
                </div>
                <div class="col-4">
                  <label for="extra[]">Servicios extra</label>
                  <br>
                  <input  name="extra[]" id="extra" type="checkbox" value="1" <?php echo $opt['1']?>>
                  Telefonia <br>
                  <input name="extra[]" id="extra" type="checkbox" value="2"<?php echo $opt2['2'] ?>>
                  IP fija <br>
                  <input name="extra[]" id="extra" type="checkbox" value="3"<?php echo $opt3['3'] ?>>
                  Velocidad simétrica <br>
                  <label for="costo">Otro:</label>
                  <input type="text"  id="otro" name="otro" value="<?php echo $resultado['otro'] ?>">
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
                  $archivos = mysqli_query( $conexion, "Select no_cuenta FROM servicios WHERE id_servicios='$ideditar'" );
                  list( $doc ) = mysqli_fetch_row( $archivos );
                  $directorio = $_SERVER[ 'DOCUMENT_ROOT' ] . "/scrik/admin/servicios/php/doc/$doc";
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
							<a href="../../admin/servicios/php/doc/<?php echo $ruta;?>" target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" >
							<i class="fas fa fa-eye"> 
							</i> 
							</a>
							<a href="../../admin/servicios/php/doc/<?php echo $ruta;?>" download="<?php echo $archivos[$i]; ?>" class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" >
								<i class="fas fa fa-download"> 
								</i> 
							</a> 
							<acronym title="Eliminar"> 
								<a href="../../admin/servicios/php/deletedoc.php?ideliminar=<?php echo $ruta;?>" class="btn btn-danger  btn-lg" onclick="return confirmarAccesoURL()"> 
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
    </body></html>