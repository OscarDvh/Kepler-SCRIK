    <?php

    if ( @!$_SESSION[ 'email' ] ) {
        echo '<script>alert("Inicie sesion para acceder")</script> ';
        echo "<script>location.href='../../'</script>";
    }
    ?><head>
    <script src="https://code.jquery.com/jquery-3.2.1.js">
        </script> 
    <script language="javascript">
    $(document).ready(function(){
        $("#empresa").on('change', function () {
            $("#empresa option:selected").each(function () {
                elegido=$(this).val();
                $.post("../../others/datos.php", { elegido: elegido }, function(data){
                    $("#departamento").html(data);
                });			
            });
       });
    });
    </script>
    </head>


    
    <div class="container">
      <div class="form">
        <div class="form-group">
          <h3>COLABORADOR</h3>
          <form action="../../admin/personal/php/savenew.php" method="post" onsubmit="return valida(this)" enctype="multipart/form-data">
            <div class="form-group"> <b>DATOS GENERALES</b>
              <hr>
              <div class="row">
                <div class="col-3">
                  <label for="numColaborador">Número de Colaborador</label>
                  <input class="form-control" type="text" id="numColaborador" name="numColaborador">
                  </input>
                </div>
                <div class="col-3">
                  <label for="nombre">Nombre(s)</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="col-3">
                  <label for="aPaterno">Apellido Paterno</label>
                  <input type="text" class="form-control" id="aPaterno" name="aPaterno" >
                </div>
                <div class="col-3">
                  <label for="aMaterno">Apellido Materno</label>
                  <input type="text" class="form-control" id="aMaterno" name="aMaterno" >
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label for="email">Correo Electrónico</label>
                  <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="col">
                  <label for="telefono">Teléfono</label>
                  <input type="text" class="form-control" id="telefono" name="telefono" maxlength="12" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                </div>
                <div class="col">
                  <label for="ext">Extensión</label>
                  <input type="text" class="form-control" id="ext" name="ext">
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label for="empresa">Empresa</label>
                  <select class="form-control" id="empresa" name="empresa" required>
                    <option name="empresa" id="empresa" value="">SELECCIONE</option>
                    <?php

                    require_once "../../conexion.php";
                    $obj = new conectar();
                    $conexion = $obj->conexion();

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
                  <label for="departamento">Departamento </label>
                  <select class="form-control" id="departamento" name="departamento" required>
                    <option name="departamento" id="departamento" value="" >SELECCIONE </option>
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