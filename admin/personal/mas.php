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
				case empresa_id_empresa when 1 then 'KEPLER UI' 
					when 2 then 'KEPLER LAB'  
						when 3 then 'ACE ENGINEERING'
              when 4 then 'ENERGY TRAINING CENTER'
                when 5 then 'SOFOIL'
                  when 6 then 'PROYECTOS' 
                    when 7 then 'GRUPO KEPLER'
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
              <input class="form-control" type="text" id="numColaborador" name="numColaborador" value="<?php echo $resultado['no_empleado'] ?>">
              </input>
            </div>
            <div class="col-3">
              <label for="nombre">Nombre(s)</label>
              <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $resultado['personal'] ?>">
            </div>
            <div class="col-3">
              <label for="aPaterno">Apellido Paterno</label>
              <input type="text" class="form-control" id="aPaterno" name="aPaterno"  value="<?php echo $resultado['a_paterno'] ?>">
            </div>
            <div class="col-3">
              <label for="aMaterno">Apellido Materno</label>
              <input type="text" class="form-control" id="aMaterno" name="aMaterno" value="<?php echo $resultado['a_materno'] ?>">
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="email">Correo Electrónico</label>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo $resultado['email'] ?>">
            </div>
            <div class="col">
              <label for="telefono">Teléfono</label>
              <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $resultado['phone'] ?>">
            </div>
            <div class="col">
              <label for="ext">Extensión</label>
              <input type="text" class="form-control" id="ext" name="ext" value="<?php echo $resultado['extension'] ?>">
            </div>
          </div>
          <div class="row">
            <div class="col">
              <label for="empresa">Empresa</label>
              <select class="form-control" id="empresa" name="empresa">
                <option name="empresa" id="empresa" value="<?php echo $resultado['no_empresa'] ;?>"><?php echo $resultado['empresa_id_empresa'] ?></option>
                <?php
                $consulta = "SELECT `id_empresa`, `nombre` FROM `empresa`";
                $valores = mysqli_query( $conexion, $consulta );
                while ( $ver = mysqli_fetch_array( $valores ) ) {
                    print '<option  name="empresa" id="empresa" value="' . $ver[ "id_empresa" ] . '">' . $ver[ "nombre" ] . '</option>';
                }

                ?>
              </select>
            </div>
            <div class="col">
              <label for="departamento">Departamento</label>
              <select class="form-control" id="departamento" name="departamento">
                <option name="departamento" id="departamento" value="<?php  echo $resultado['id_depar'] ?>"><?php echo $resultado['departamentos'] ?> </option>
              </select>
            </div>
          </div>
          <br>
              <b>ASIGNACIONES</b>
              <hr> 
              <div align="left"><table class="table col-5">
                <tr  align="left">
                  
           
                     <?php
                $SQLCOMPUTO = "SELECT id_compu,codigo  FROM `computadora` 
                left join personal on personal_id = id_personal where personal_id = $ideditar";
                $relacion1 = mysqli_query( $conexion, $SQLCOMPUTO );
                while ( $mostrar1 = mysqli_fetch_array( $relacion1 ) ) {
                    print '
          <tr>
          <td>Equipo de computo:  </td>
                                 

                    <td align="center">
                <acronym title="Editar ">
                        <a href="../computo/vermas.php?ideditar=' . $mostrar1[ 'id_compu' ] . '"  >' . $mostrar1[ "codigo" ] . '

                                       </td>
          ';
                }
             
                ?></tr>   
                <tr  align="left">
                  
           
                     <?php
                $SQLcelular = "SELECT id_celular,codigo  FROM `celular` 
                left join personal on personal_id = id_personal where personal_id = $ideditar";
                $relacion2 = mysqli_query( $conexion, $SQLcelular);
                while ( $mostrar2 = mysqli_fetch_array( $relacion2 ) ) {
                    print '
          <tr>
          <td>Equipo telefónico:  </td>
                                 

                    <td align="center">
                <acronym title="Editar ">
                        <a href="../phone/vermas.php?ideditar=' . $mostrar2[ 'id_celular' ] . '"  >' . $mostrar2[ "codigo" ] . '

                                       </td>
          ';
                }
             
                ?></tr>   
                <tr  align="left">
                  
           
                     <?php
                $SQLautos = "SELECT id_autos,codigo  FROM `autos` 
                left join personal on personal_id_personal = id_personal where personal_id_personal = $ideditar";
                $relacion3 = mysqli_query( $conexion, $SQLautos);
                while ( $mostrar3 = mysqli_fetch_array( $relacion3 ) ) {
                    print '
          <tr>
          <td>Automovil:  </td>
                                 

                    <td align="center">
                <acronym title="Editar ">
                        <a href="../autos/vermas.php?ideditar=' . $mostrar3[ 'id_autos' ] . '"  >' . $mostrar3[ "codigo" ] . '

                                       </td>
          ';
                }
             
                ?></tr>   </table>
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
							<acronym title="Eliminar"> 
								<a href="../../admin/personal/php/deletedoc.php?ideliminar=<?php echo $ruta;?>" class="btn btn-danger  btn-lg" onclick="return confirmarAccesoURL()"> 
									<i class="fas fa-trash"> 
									</i> 
								</a> 
							</acronym>
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