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
          <h3>PROVEEDOR</h3>
          <form action="../../admin/proveedores/php/savenew.php" method="post" onsubmit="return valida(this)" enctype="multipart/form-data">
            <div class="form-group"> <b>DATOS GENERALES</b>
              <hr>
              <div class="row">
               
                <div class="col-6">
                  <label for="nombre">Nombre(s)</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="col">
                  <label for="telefono">Teléfono</label>
                  <input type="text" class="form-control" id="telefono" name="telefono" maxlength="12" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                </div>
				  <div class="col">
                  <label for="email">Correo electrónico</label>
                  <input type="email" class="form-control" id="email" name="email">
                </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <label for="descripcion">Descripción de los servicios que ofrece</label>
					<textarea class="form-control" rows="2" d="descripcion" name="descripcion">
					</textarea>
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