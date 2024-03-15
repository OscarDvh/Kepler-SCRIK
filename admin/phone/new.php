
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
<body>
	
	<div class="container">
      <div class="form">
        <div class="form-group">
          <h3>EQUIPO TELEFÓNICO</h3>
          <b>DATOS GENERALES</b>
          <hr>
          <form action="../../admin/phone/php/savenew.php" method="post" onsubmit="return valida(this)" enctype="multipart/form-data">
	  <div class="form-group">
              <div class="row">
                <div class="col-5">
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
                  <label for="no_telefono">Número telefónico</label>
                  <input type="text" class="form-control" id="no_telefono" name="no_telefono"   maxlength="12" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                </div>
                <div class="col">
                  <label for="region">Región</label>
                  <input type="text" class="form-control" id="region" name="region"  >
                </div>
                
              </div>
              <div class="row">
		  <div class="col">
                  <label for="marca">Marca</label>
                  <input type="text" class="form-control" id="marca" name="marca"  >
                </div>
		  <div class="col">
                  <label for="modelo">Modelo</label>
                  <input type="text" class="form-control" id="modelo" name="modelo"  >
                </div>
		  <div class="col">
                  <label for="imei">IMEI</label>
                  <input type="text" class="form-control" id="imei" name="imei"  >
                </div>
				  <div class="col">
                  <label for="color">Color</label>
                  <input type="text" class="form-control" id="color" name="color"  >
                </div>
		  
		  </div>
		  <div class="row">
			  <div class="col">
                  <label for="no_serie">Número de serie</label>
                  <input type="text" class="form-control" id="no_serie" name="no_serie"  >
                </div>
		<div class="col">
                  <label for="disponible">Disponibilidad</label>
                  <select class="form-control" id="disponible" name="disponible" required>
                    <option id="disponible" name="disponible" value="0">Seleccione</option>
                    <option id="disponible" name="disponible" value="1">Disponible</option>
                    <option id="disponible" name="disponible" value="2">No disponible</option>
                  </select>
                </div>
		  <div class="col">
                  <label for="no_cargador">Número de serie del cargador</label>
                  <input type="text" class="form-control" id="no_cargador" name="no_cargador"  >
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
                    while ( $mostrar = mysqli_fetch_array( $val) ) {
                        print '
            <option  name="usuarioAsignado" id="usuarioAsignado" value="' . $mostrar[ "id_personal" ] . '">'.$mostrar["nombre"].' '.' '.$mostrar["a_paterno"].''.' '.$mostrar["a_materno"].'</option>
            ';
                    }
                    ?>
                  </select>
                </div> </div>
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