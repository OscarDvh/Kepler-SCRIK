<?php

if ( @!$_SESSION[ 'email' ] ) {
    echo '<script>alert("Inicie sesion para acceder")</script> ';
    echo "<script>location.href='../../'</script>";
}
require_once "../../conexion.php";
$obj = new conectar();
$conexion = $obj->conexion();

$ideditar = $_GET[ 'ideditar' ];
$sql = "SELECT `id_personal`, `no_empleado`,personal.nombre  AS personal, `a_materno`, `a_paterno`,  `email`,`extension`, `phone`,
		  id_depar, id_depa,empresa_id_empresa AS no_empresa,
		  	departamentos.nombre  AS departamentos,
				case empresa_id_empresa when 1 then 'INNOVET' 
					when 2 then 'SOLGISTIKA'  
						when 3 then 'BE EX EN' 
								END AS empresa_id_empresa
		           FROM personal 
				 left join departamentos	on id_depar = id_depa where id_personal=$ideditar  ";
mysqli_select_db( $conexion, $bd );
$query = mysqli_query( $conexion, $sql );
$resultado = mysqli_fetch_array( $query );

?><head>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script> 
<script language="javascript">
		$(document).ready(function()
						  {
			$("#empresa").on('change', function () 
							 {
				$("#empresa option:selected").each(function ()
												   {
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
      <form action="../../admin/personal/php/edit_save.php?ideditar=<?php echo $ideditar;?>" method="post" onsubmit="return valida(this)" enctype="multipart/form-data">
        <div class="form-group"> <b>DATOS GENERALES</b>
          <hr>
          <div class="row">
            <div class="col-3">
              <label for="numColaborador">Número de Colaborador</label>
              <p type="text" class="form-control" ><?php echo $resultado['no_empleado'] ?></p>
              </input>
            </div>
            <div class="col-3">
              <label for="nombre">Nombre(s)</label>
              <p type="text" class="form-control" ><?php echo $resultado['personal'] ?></p>
            </div>
            <div class="col-3">
              <label for="aPaterno">Apellido Paterno</label>
              <p type="text" class="form-control" ><?php echo $resultado['a_paterno'] ?></p>
            </div>
            <div class="col-3">
              <label for="aMaterno">Apellido Materno</label>
              <p type="text" class="form-control" ><?php echo $resultado['a_materno'] ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="email">Correo Electrónico</label>
              <p type="text" class="form-control" ><?php echo $resultado['email'] ?></p>
            </div>
            <div class="col">
              <label for="telefono">Teléfono</label>
              <p type="text" class="form-control" ><?php echo $resultado['phone'] ?></p>
            </div>
            <div class="col">
              <label for="ext">Extensión</label>
              <p type="text" class="form-control" ><?php echo $resultado['extension'] ?></p>
          </div>
          <div class="row">
            <div class="col">
              <label for="empresa">Empresa</label>
              <p type="text" class="form-control" ><?php echo $resultado['empresa_id_empresa'] ?></p>
            </div>
            <div class="col">
              <label for="departamento">Departamento</label>
              <p type="text" class="form-control" ><?php echo $resultado['departamentos'] ?> </p>
              
            </div>
          </div>
          <br>
          <b>DOCUMENTACIÓN</b>
          <hr>
       
          <!-- Tabla de archivos-->
          <div >
            <main>
              <div class="card mb-4">
                <div >
                  <?php
                  $archivos = mysqli_query( $conexion, "Select CONCAT(nombre,' ',a_paterno,' ',a_materno) FROM personal WHERE id_personal='$ideditar'" );
                  list( $doc ) = mysqli_fetch_row( $archivos );
                  $directorio = $_SERVER[ 'DOCUMENT_ROOT' ] . "/scrik/admin/personal/php/doc/$doc";
                  ?>
                </div>
                <div class="card-body ">
                  <table class="table">
                    <thead>
                      <tr align="center">
                        <th>Nombre del archivo</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $archivos = scandir( "$directorio" );
                      $num = 0;
                      for ( $i = 2; $i < count( $archivos ); $i++ ) {
                          $num++;
                          ?>
                      <tr align="center">
                        <td><?php echo $archivos[$i]; $ruta="$doc/$archivos[$i]" ?></td>
                        <td align="center">
							<a href="../../admin/personal/php/doc/<?php echo $ruta;?>" target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" >
							<i class="fas fa fa-eye"> 
							</i> 
							</a>
							<a href="../../admin/personal/php/doc/<?php echo $ruta;?>" download="<?php echo $archivos[$i]; ?>" class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" >
								<i class="fas fa fa-download"> 
								</i> 
							</a> 
						
						  </td>
                        <?php
                        }
                        ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </main>
          </div>
          <div align="right"> <a class="btn btn-danger" type="button" href="index.php" >Volver</a>
           
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