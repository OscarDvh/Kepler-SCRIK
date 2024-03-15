    <?php

    if ( @!$_SESSION[ 'email' ] ) {
        echo '<script>alert("Inicie sesion para acceder")</script> ';
        echo "<script>location.href='../../'</script>";
    }
 require_once "../../conexion.php";
    $obj = new conectar();
    $conexion = $obj->conexion();

    $ideditar = $_GET[ 'ideditar' ];
    $sql = "SELECT *,case tipo 
							  when 1 then 'Correo electrónico'
							  when 2 then 'Usuario de dominio'
							  when 3 then 'Wi-fi'
							  when 4 then 'Otro'
							  END AS tipos
							  FROM `pass`where id_pass=$ideditar  ";
    mysqli_select_db( $conexion, $bd );
    $query = mysqli_query( $conexion, $sql );
    $resultado = mysqli_fetch_array( $query );
$opt=array("","");
	     $opt[$resultado['tipos']]="checked"; 
    ?>



    <html>
    <head>
    </head>

    <div class="container">
      <div class="form">
        <div class="form-group">
          <h3>REGISTRO DE CONTRASEÑA </h3>
          <form action="../../admin/passw/php/edit_save.php?ideditar=<?php echo $ideditar;?>" method="post" onsubmit="return valida(this)" enctype="multipart/form-data">
            <div class="form-group"> <b>DATOS GENERALES</b>
              <hr>
              <div class="row">
                 <div class="col">
                  <label for="tipo">Tipo</label>
                  <select class="form-control" id="tipo" name="tipo" required>
					  <option id="tipo" name="tipo"value="<?php echo $resultado['tipo'] ?>"><?php echo $resultado['tipos'] ?></option>
                    <option id="tipo" name="tipo" value="0">Seleccione</option>
                    <option id="tipo" name="tipo" value="1">Correo electrónico</option>
                    <option id="tipo" name="tipo" value="2">Usuario de Dominio</option>
                    <option id="tipo" name="tipo" value="3">Wi-fi</option>
                    <option id="tipo" name="tipo" value="4">Otros</option>
					 </select>
                </div>
              
                <div class="col">
                  <label for="usuario-email">Usuario o direccion de correo</label>
                  <input type="text" class="form-control" id="usuario-email	" name="usuario-email" value="<?php echo $resultado['usuario-email'] ?>">
                </div>
				  <div class="col">
                  <label for="password">Contraseña</label>
                  <input type="text" class="form-control" id="password" name="password" value="<?php echo $resultado['password'] ?>">
                </div>
				
              </div>
           
              <div class="row">
                <div class="col">
                  <label for="caracteristicas">Descripción general</label>
                  <textarea class="form-control" id="caracteristicas" name="caracteristicas" rows="4"> <?php echo $resultado['descripcion'] ?></textarea>
                </div>
                
              </div>
              <br>
             
              <div align="right"> <a class="btn btn-danger" type="button" href="index.php" >Volver </a>
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