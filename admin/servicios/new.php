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
          <h3>SERVICIO DE COMUNICACIÓN </h3>
          <form action="../../admin/servicios/php/savenew.php" method="post" onsubmit="return valida(this)" enctype="multipart/form-data">
            <div class="form-group"> <b>DATOS GENERALES</b>
              <hr>
              <div class="row">
                <div class="col">
                  <label for="no_cuenta">Numero de cuenta</label>
                  <input type="text" class="form-control" id="no_cuenta" name="no_cuenta" required>
                </div>
                <div class="col">
                  <label for="provedores_id">Proveedor</label>
                  <select class="form-control js-example-basic-single" id="provedores_id" name="provedores_id">
                    <option name="provedores_id" id="provedores_id" value="0">Seleccione</option>
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
                  <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio">
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label for="fecha_fin">Fecha (Día) de ronavación</label>
                  <input type="text" class="form-control" id="fecha_fin" name="fecha_fin">
                </div>
                <div class="col">
                  <label for="costo">Costo de renovación</label>
                  <input type="text" class="form-control" id="costo" name="costo" required  onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                </div>
                <div class="col">
                  <label for="centro_trabajo">Centro de trabajo </label>
                  <select class="form-control" id="centro_trabajo" name="centro_trabajo" required>
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
                  <textarea class="form-control" id="caracteristicas" name="caracteristicas" rows="4"></textarea>
                </div>
                <div class="col-4">
                  <label for="extra">Servicios extra</label>
                  <br>
                  <input  name="extra[]" id="extra" type="checkbox" value="1">
                  Telefonia <br>
                  <input name="extra[]" id="extra" type="checkbox" value="2">
                  IP fija <br>
                  <input name="extra[]" id="extra" type="checkbox" value="3">
                  Velocidad simétrica <br>
                  <label for="costo">Otro:</label>
                  <input type="text"  id="otro" name="otro">
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