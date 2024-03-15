    <?php

    if ( @!$_SESSION[ 'email' ] ) {
        echo '<script>alert("Inicie sesion para acceder")</script> ';
        echo "<script>location.href='../../'</script>";
    }
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
          <form action="../../admin/stock/php/savenew.php" method="post" onsubmit="return valida(this)" enctype="multipart/form-data">
            <div class="form-group"> <b>DATOS GENERALES</b>
              <hr>
              <div class="row"> 
				  <div class="col-3">
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
                </div>
                <div class="col">
                  <label for="tipo">Tipo</label>
                  <input type="text" class="form-control" id="tipo" name="tipo" required>
                </div>
                <div class="col-2">
                  <label for="estado">Estado</label>
                  <select  class="form-control" id="estado" name="estado"  >
					<option id="estado" name="estado" value="0">Seleccione</option>
                    <option id="estado" name="estado" value="1">Exelente</option>
                    <option id="estado" name="estado" value="2">Regular</option>
                    <option id="estado" name="estado" value="3">Deteriorado</option>
                    <option id="estado" name="estado" value="4">Mal estado</option>
                  </select>
                </div>
               <div class="col-2">
                  <label for="cantidad">Cantidad</label>
                  <input type="text" class="form-control" id="cantidad" name="cantidad"  maxlength="12" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                </div> 
              </div>
             
              <div class="row">
				  <div class="col-3">
                  <label for="usuarioAsignado">Colaborador Asignado</label>
                  <select class="form-control js-example-basic-single" id="usuarioAsignado" name="usuarioAsignado">
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
                  <input required name="opt" id="opt" type="radio" value="1"> Almacenado
					<br>
			        <input name="opt" id="opt" type="radio" value="2"> No almacenado
					
					    

                </div>
                
            
                <div class="col">
                  <label for="caracteristicas">Caracteristicas generales</label>
                  <textarea class="form-control" id="caracteristicas" name="caracteristicas" rows="4"></textarea>
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

  <script type="text/javascript">
        // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
        </script> 

    </body></html>