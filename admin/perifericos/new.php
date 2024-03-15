    <?php

    if ( @!$_SESSION[ 'email' ] ) {
        echo '<script>alert("Inicie sesion para acceder")</script> ';
        echo "<script>location.href='../../'</script>";
    }
    ?>

 <html>
    <head>
    </head>

    <div class="container">
      <div class="form">
        <div class="form-group">
          <h3>PERIFÉRICOS</h3>
          <form action="../../admin/perifericos/php/savenew.php" method="post" onsubmit="return valida(this)" enctype="multipart/form-data">
            <div class="form-group"> <b>DATOS GENERALES</b>
              <hr>
              <div class="row">
               <div class="col">
                  <label for="propietario">Propietario</label>
                  <select class="form-control" id="propietario" name="propietario" required>
                    <option name="propietario" id="propietario" value="" >SELECCIONE </option>
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
                  <input type="text" class="form-control" id="no_serie" name="no_serie"  >
                </div>
                <div class="col-6">
                   <label for="descripcion">Características generales</label>
					<textarea class="form-control" rows="2" d="caracteristicas" name="caracteristicas">
					</textarea>
                </div> 
				
                
              
				</div>
               <div class="row">
				  	<div class="col">
                  <label for="estado">Estado</label>
                  <select  class="form-control" id="estado" name="estado"  >
					<option id="estado" name="estado" value="0">Seleccione</option>
                    <option id="estado" name="estado" value="1">Nuevo</option>
                    <option id="estado" name="estado" value="2">Usado</option>
                    <option id="estado" name="estado" value="3">Con fallas</option>
                    <option id="estado" name="estado" value="4">Inservible</option>
                  </select>
                </div>
								  <div class="col">
                  <label for="costo">Costo</label>
                  <input type="text" class="form-control" id="costo" name="costo"   onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                </div>
				    <div class="col">
                  <label for="fecha_compra">Fecha de asignación</label>
                  <input type="date" class="form-control" id="fecha" name="fecha">
                </div>
				</div>
                
             <div class="row">
               
                <div class="col-5">
                  <label for="usuarioAsignado">Colaborador Asignado</label>
                  <select class="form-control js-example-basic-single" id="usuarioAsignado" name="usuarioAsignado">
                    <option name="usuarioAsignado" id="usuarioAsignado"  value="0">Sin colaborador</option>
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