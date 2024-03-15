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
          <h3>REGISTRO DE USUARIO</h3>
          <form action="../../admin/setting/php/savenew.php" method="post" onsubmit="return valida(this)" enctype="multipart/form-data">
            <div class="form-group"> <b>DATOS GENERALES</b>
              <hr>
              <div class="row">
				   <div class="col">
                  <label for="nombre">Nombre completo</label>
                  <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
				    <div class="col">
                  <label for="departamento">Departamento </label>
                  <select class="form-control" id="departamento" name="departamento" required>
                    <option name="departamento" id="departamento" value="" >SELECCIONE </option>
	<?php
					  require_once "../../conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();
	$sql="SELECT `id_depa`, `nombre`, `empresa_id_empresa` FROM `departamentos` 
";
$result=mysqli_query($conexion,$sql);
					  
					  while ($mostrar=mysqli_fetch_array($result)) {
				
				print '
                                                                                
                                             <option  name="departamento" id="departamento" value="'.$mostrar["id_depa"].'">'.$mostrar["nombre"].'</option>
                                ';
		}?>
                  </select>
                </div>
           
               <div class="col">
                  <label for="tipo">Tipo</label>
                  <select class="form-control" id="tipo" name="tipo" required>
                    <option id="tipo" name="tipo" value="0">Seleccione</option>
                    <option id="tipo" name="tipo" value="1">Administrador</option>
                    <option id="tipo" name="tipo" value="2">Control</option>
                    <option id="tipo" name="tipo" value="3">Vizualizador</option>
                    <option id="tipo" name="tipo" value="4">Control Administrador</option>
					 </select>
                </div>
                
              </div>
           
              <div class="row">
               <div class="col">
                  <label for="usuario-email">Usuario o direccion de correo</label>
                  <input type="text" class="form-control" id="usuario-email	" name="usuario-email">
                </div>
				  <div class="col">
                  <label for="password">Contraseña</label>
                  <input type="text" class="form-control" id="password" name="password">
                </div>
				  <div class="col">
                  <label for="rpass">Confirma contraseña</label>
                  <input type="password" class="form-control" id="rpass" name="rpass">
                </div>
                
              </div>
              <br>
             
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