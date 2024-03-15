<?php

if ( @!$_SESSION[ 'email' ] ) {
    echo '<script>alert("Inicie sesion para acceder")</script> ';
    echo "<script>location.href='../../'</script>";
}

?>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="/scrik/js/jquery-3.1.1.min.js"></script> 
<script src="/scrik/js/select2.js"></script>
</head>

<div class="container">
  <div class="form">
    <div class="form-group">
      <h3>MAQUINARIA</h3>
      <b>DATOS GENERALES</b>
      <hr>
      <form action="/scrik/admin/maquinaria/php/savenew.php" method="post" onsubmit="return valida(this)" enctype="multipart/form-data">
        <div class="form-group">
          <div class="row">
            <div class="col">
              <label for="descripcion">Descripción</label>
              <input type="text" class="form-control" id="descripcion" name="descripcion" >
            </div>
            <div class="col">
              <label for="marca">Marca</label>
              <input type="text" class="form-control" id="marca" name="marca" >
            </div>
            <div class="col">
              <label for="serie">Serie</label>
              <input type="text" class="form-control" id="serie" name="serie" >
            </div>
            <div class="col">
              <label for="modelo">Modelo</label>
              <input type="text" class="form-control" id="modelo" name="modelo" >
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="estado">Estado</label>
              <select  class="form-control" id="estado" name="estado"  >
                <option id="estado" name="estado" value="0">Seleccione</option>
                <option id="estado" name="estado" value="1">En operación</option>
                <option id="estado" name="estado" value="2">Fuera de operación</option>
                <option id="estado" name="estado" value="3">En reparación</option>
                <option id="estado" name="estado" value="4">Inservible</option>
              </select>
            </div>
            <div class="col">
              <label for="no_factura">Número Factura</label>
              <input type="text" class="form-control" id="no_factura" name="no_factura" >
            </div>
            <div class="col">
              <label for="val_factura">Valor factura</label>
              <input type="text" class="form-control" id="val_factura" name="val_factura" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
            </div>
            </div>
          <div class="row">
			  <div class="col-5">
			    <label for="propietario">Propietario</label>
                  <select class="form-control" id="propietario" name="propietario" required>
                    <option name="propietario" id="propietario" value="" >SELECCIONE </option>
                    <?php

                    require_once "../../conexion.php";
                    $obj = new conectar();
                    $conexion = $obj->conexion();

                    $sql = "SELECT `id_propietario`, `nombre` FROM `propietarios`";
                    $val = mysqli_query( $conexion, $sql );
                    while ( $mostrar = mysqli_fetch_array( $val) ) {
                        print '
                        <option  id="propietario" name="propietario" value="' . $mostrar[ "id_propietario" ] . '">' . $mostrar[ "nombre" ] . '</option>
                        ';
                    }
                    ?>
                  </select>
                </div>
            <div class="col">
              <label for="empresa">Empresa</label>
              <select class="form-control" id="empresa" name="empresa" required>
                <option name="empresa" id="empresa" value="">SELECCIONE</option>
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
              <select class="form-control" id="area" name="area" required>
                <option id="area" name="area" value="0">Seleccione</option>
                <option id="area" name="area" value="1">Mantenimiento</option>
                <option id="area" name="area" value="2">Maquinados</option>
                <option id="area" name="area" value="3">Producción</option>
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