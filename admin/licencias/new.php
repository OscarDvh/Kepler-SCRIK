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
          <h3>LICENCIA DE SOFTWARE</h3>
          <form action="../../admin/licencias/php/savenew.php" method="post" onsubmit="return valida(this)" enctype="multipart/form-data">
            <div class="form-group"> <b>DATOS GENERALES</b>
              <hr>
              <div class="row">
               
                <div class="col">
                  <label for="nombre_licencias">Nombre de la licencia</label>
                  <input type="text" class="form-control" id="nombre_licencias" name="nombre_licencias" required>
                </div>
				  <div class="col">
                  <label for="costo">Costo</label>
                  <input type="text" class="form-control" id="costo" name="costo" required  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                </div>
				  <div class="col">
                  <label for="fecha_inicio">Fecha de compra</label>
                  <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio">
                </div>
				  <div class="col">
                  <label for="fecha_fin">Fecha de renovación</label>
                  <input type="text" class="form-control" id="fecha_fin" name="fecha_fin">
                </div> 
                </div>

              <div class="row">
				  <div class="col">
                  <label for="clave">Clave(Serial)</label>
                  <input type="text" class="form-control" id="clave" name="clave" >
                </div> 
				 <div class="col">
                  <label for="tipo">Tipo </label>
                  <select class="form-control" id="tipo" name="tipo" required>
                    <option id="tipo" name="tipo" value="0">Seleccione</option>
                    <option id="tipo" name="tipo" value="1">Antivirus</option>
                    <option id="tipo" name="tipo" value="2">Office</option>
                    <option id="tipo" name="tipo" value="3">Sistema operativo</option>
                    <option id="tipo" name="tipo" value="4">Otro</option>
                  </select>
                </div>
				<div class="col">
                  <label for="limite_usuarios">Límite de usuarios</label>
                  <input type="text" class="form-control" id="limite_usuarios" name="limite_usuarios"  maxlength="12" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                </div> 
				</div>
				              <div class="row">
                <div class="col-4">
                  <label for="provedores_id">Proveedor</label>
                  <select class="form-control js-example-basic-single" id="provedores_id" name="provedores_id">
                      <option name="provedores_id" id="provedores_id" value="0">Seleccione</option>
                    <?php

                require_once "../../conexion.php";
                    $obj = new conectar();
                    $conexion = $obj->conexion();

                    $sql = "SELECT * FROM `provedores` ";
                    $val = mysqli_query( $conexion, $sql );
                    while ( $mostrar = mysqli_fetch_array( $val) ) {
                        print '
            <option  name="provedores_id" id="provedores_id" value="' . $mostrar[ "id_provedores" ] . '">'.$mostrar["nombre"].' </option>
            ';
                    }
                    ?>
                  </select>
                </div>
				</div>
              <div class="row">
				   <div class="col">
                  <label for="observaciones">Observaciones</label>
                  <textarea class="form-control" id="observaciones" name="observaciones" rows="3"></textarea>
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