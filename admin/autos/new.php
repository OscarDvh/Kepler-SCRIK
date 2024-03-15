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
          <h3>EQUIPO DE TRANSPORTE</h3>
          <b>DATOS GENERALES</b>
          <hr>
          <form action="../../admin/autos/php/savenew.php" method="post" onsubmit="return valida(this)" enctype="multipart/form-data">
            <div class="form-group">
              <div class="row">
                <div class="col-5">
                  <label for="propietario">Propietario</label>
                  <select class="form-control" id="propietario" name="propietario" required>
                    <option name="departamento" id="departamento" value="" >SELECCIONE </option>
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
                  <label for="claveVehicular">Clave Vehicular</label>
                  <input type="text" class="form-control" id="claveVehicular" name="claveVehicular" required>
                </div>
                <div class="col">
                  <label for="vin">VIN</label>
                  <input type="text" class="form-control" id="vin" name="vin" required>
                </div>
                <div class="col">
                  <label for="factura">Factura</label>
                  <input class="form-control" type="text" id="factura"  name="factura">
                  </input>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label for="marca">Marca</label>
                  <input type="text" class="form-control" id="marca" name="marca" required>
                </div>
                <div class="col">
                  <label for="modelo">Modelo</label>
                  <input type="text" class="form-control" id="modelo" name="modelo" required>
                </div>
                <div class="col">
                  <label for="tipo">Tipo</label>
                  <input type="text" class="form-control" id="tipo" name="tipo" required>
                </div>
                <div class="col">
                  <label for="transmision">Transmisión</label>
                  <select class="form-control" id="transmision" name="transmision" required>
                    <option id="transmision" name="transmision" value="0">Seleccione</option>
                    <option id="transmision" name="transmision" value="1">Automática</option>
                    <option id="transmision" name="transmision" value="2">Manual</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label for="color">Color</label>
                  <input type="text" class="form-control" id="color" name="color">
                </div>
                <div class="col">
                  <label for="combustible">Combustible</label>
                  <input type="text" class="form-control" id="combustible" name="combustible">
                </div>
                <div class="col">
                  <label for="numMotor">Número de Motor</label>
                  <input type="text" class="form-control" id="numMotor" name="numMotor">
                </div>
                <div class="col">
                  <label for="placas">Placas</label>
                  <input type="text" class="form-control" id="placas"name="placas">
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label for="polizaSeguro">Póliza de Seguro</label>
                  <input type="text" class="form-control" id="polizaSeguro"  name="polizaSeguro">
                </div>
                <div class="col">
                  <label for="vencimientoPoliza">Vencimiento de Póliza</label>
                  <input type="date" id="vencimientoPoliza" name="vencimientoPoliza" class="form-control">
                </div>
                <div class="col">
                  <label for="tarjetaCirculacion">Tarjeta de Circulación</label>
                  <input type="text" class="form-control" id="tarjetaCirculacion" name="tarjetaCirculacion">
                </div>
                <div class="col">
                  <label for="vencimientoTarjeta">Vencimiento Tarjeta de Circulación</label>
                  <input type="date" class="form-control" id="vencimientoTarjeta" name="vencimientoTarjeta">
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label for="estadoCirculacion">Estado de Circulación</label>
                  <input type="text" class="form-control" id="estadoCirculacion" name="estadoCirculacion">
                </div>
                <div class="col">
                  <label for="estatus">Estatus del Vehiculo</label>
                  <select class="form-control" id="estatus" name="estatus" required>
                    <option id="estatus" name="estatus">Seleccione</option>
                    <option id="estatus" name="estatus" value="1">Alta</option>
                    <option id="estatus" name="estatus" value="2">Baja</option>
                  </select>
                </div>
                <div class="col">
                  <label for="estatusVerificacion">Estatus de Verificación</label>
                  <select class="form-control" id="estatusVerificacion" name="estatusVerificacion">
                    <option id="estatus" name="estatus">Seleccione</option>
                    <option id="estatus" name="estatus" value="1">Realizado</option>
                    <option id="estatus" name="estatus" value="2">Pendiente</option>
                  </select>
                </div>
                <div class="col">
                  <label for="vencimientoVerificacion">Vencimiento de Verificación</label>
                  <input type="date" class="form-control" id="vencimientoVerificacion" name="vencimientoVerificacion">
                </div>
              </div>
              <div class="row">
                <div class="col">
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
                <div class="col">
                  <label for="observaciones">Observaciones</label>
                  <textarea class="form-control" id="observaciones" name="observaciones" rows="3"></textarea>
                </div>
              </div>
			  
              <b>DOCUMENTACIÓN</b>
                <hr>
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">Documento</th>
                    <th scope="col">Selccionar</th>
                    
                  </tr>
                </thead>
				    <tbody>
                  <tr>
                    <th scope="row">Imagen del Vehiculo</th>
                    <td><input type="file" name="imagen[]" id="imagen" class="form-control btn  "  ></td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Tarjeta de Circulación</th>
                    <td><input type="file" name="tarjeta[]" id="tarjeta" class="form-control btn  " data-multiple-caption="{count} files selected"  ></td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Factura</th>
                    <td><input type="file" name="factura[]" id="factura[]" class="form-control btn  " data-multiple-caption="{count} files selected"  ></td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Identificacion</th>
                    <td><input type="file" name="identificacion[]" id="identificacion" class="form-control btn  " data-multiple-caption="{count} files selected"  ></td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Pagos de tenencia</th>
                    <td><input type="file" name="tenencia[]" id="tenencia" class="form-control btn  " data-multiple-caption="{count} files selected"  ></td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Certificado de verificación</th>
                    <td><input type="file" name="verificacion[]" id="verificacion" class="form-control btn  " data-multiple-caption="{count} files selected"  ></td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Licencia de Conducir</th>
                    <td><input type="file" name="licencia[]" id="licencia" class="form-control btn  " data-multiple-caption="{count} files selected"  ></td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Póliza de seguro</th>
                    <td><input type="file" name="seguro[]" id="seguro" class="form-control btn  " data-multiple-caption="{count} files selected"  ></td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Evidencia de servicio</th>
                    <td><input type="file" name="servicio[]" id="servicio" class="form-control btn  " data-multiple-caption="{count} files selected"  ></td>
                   
                  </tr>
                  <tr>
                    <th scope="row">Politicas de uso</th>
                    <td><input type="file" name="politicas[]" id="politicas" class="form-control btn  " data-multiple-caption="{count} files selected"  ></td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Responsiva</th>
                    <td><input type="file" name="responsiva[]" id="responsiva" class="form-control btn  " data-multiple-caption="{count} files selected"  ></td>
                    
                  </tr>
                </tbody>
              </table>
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
    <script type="text/javascript">
        // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
        </script> 
    
    </body></html>