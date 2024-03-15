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
          <h3>EQUIPO DE CÓMPUTO</h3>
          <b>DATOS GENERALES</b>
          <hr>
          <form action="../../admin/computo/php/savenew.php" method="post" onsubmit="return valida(this)" enctype="multipart/form-data">
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
                  <label for="tipo">Tipo </label>
                  <select class="form-control" id="tipo" name="tipo" required>
                    <option id="tipo" name="tipo" value="0">Seleccione</option>
                    <option id="tipo" name="tipo" value="1">Escritorio</option>
                    <option id="tipo" name="tipo" value="2">Laptop</option>
                    <option id="tipo" name="tipo" value="4">Otro</option>
                  </select>
                </div>
				  <div class="col">
                  <label for="costo">Costo</label>
                  <input type="text" class="form-control" id="costo" name="costo"   onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                </div>
				  <div class="col">
                  <label for="fecha_compra">Fecha de compra</label>
                  <input type="date" class="form-control" id="fecha_compra" name="fecha_compra">
                </div>
				</div>
				
				<div class="row">
                <div class="col-3">
                  <label for="cpu">Procesador</label>
                  <input type="text" class="form-control" id="cpu" name="cpu"  >
                </div>
                <div class="col">
                  <label for="ram">Memoria RAM </label>
                  <input type="text" class="form-control" id="ram" name="ram"  >
                </div>
                <div class="col">
                  <label for="almacenamiento">Almacenamiento</label>
                  <input type="text" class="form-control" id="almacenamiento" name="almacenamiento"  >
                </div>
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
                  <label for="no_serie">Cargador</label>
                  <input type="text" class="form-control" id="cargador" name="cargador"  >
                </div>
                
              
                <div class="col">
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
              <div class="row">
               
				  <div class="col-4">
                  <label for="accesorios">Accesorios</label>
                  <textarea type="text" class="form-control" id="accesorios" name="accesorios" rows="3"></textarea>
                </div> 
				  <div class="col">
                  <label for="observaciones">Observaciones</label>
                  <textarea class="form-control" id="observaciones" name="observaciones" rows="3"></textarea>
                </div>
				  
              </div>
				  <br>
              <b>LICENCIAS</b>
              <hr>
              	<div class="row">
                <div class="col">
                  <label for="so">Sistema Operativo</label>
                  <select type="text" class="form-control" id="so" name="so" >
					   <option name="so" id="so" >Seleccione</option>
					  <?php
                    $sistema= "SELECT `id_licencias`,`nombre_licencias` FROM `licencias` WHERE `tipo` =3" ;
                     $valso = mysqli_query( $conexion, $sistema );
                    while ( $mostrarSO = mysqli_fetch_array( $valso ) ) {
                        print '
                <option  name="so" id="so" value="' . $mostrarSO[ "id_licencias" ] . '">' . $mostrarSO[ "nombre_licencias" ] . '</option>
                ';
                    }
                    ?>
					  
					  
					    </select>
                </div>
                <div class="col">
                  <label for="office">Office </label>
                  <select type="text" class="form-control" id="office" name="office"  >
					   <option name="office" id="office" >Seleccione</option>
					    <?php
                    $office= "SELECT `id_licencias`,`nombre_licencias` FROM `licencias` WHERE `tipo` =2" ;
                     $valoffice = mysqli_query( $conexion, $office );
                    while ( $mostraroffice = mysqli_fetch_array( $valoffice ) ) {
                        print '
                <option  name="office" id="office" value="' . $mostraroffice[ "id_licencias" ] . '">' . $mostraroffice[ "nombre_licencias" ] . '</option>
                ';
                    }
                    ?>
					  </select>
                </div>
                <div class="col">
                  <label for="antivirus">Antivirus</label>
                  <select type="text" class="form-control" id="antivirus" name="antivirus"  >
					    <option name="antivirus" id="antivirus" >Seleccione</option>
					    <?php
                    $antivirus= mysqli_query( $conexion, "SELECT `id_licencias`,`nombre_licencias` FROM `licencias` WHERE `tipo` =1" );
                     
                    while ( $mostrarantivirus = mysqli_fetch_array( $antivirus ) ) {
                        print '
                <option  name="antivirus" id="antivirus" value="' . $mostrarantivirus[ "id_licencias" ] . '">' . $mostrarantivirus[ "nombre_licencias" ] . '</option>
                ';
                    }
                    ?>
					  </select>
                </div>
					<div class="col">
                  <label for="adicional">Software adicional</label>
                  <textarea class="form-control" id="adicional" name="adicional" rows="1"></textarea>
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
    </body>
    </html>