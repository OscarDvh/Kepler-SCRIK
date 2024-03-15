<?php
$hoy = getdate();
if ( @!$_SESSION[ 'email' ] ) {
    echo '<script>alert("Inicie sesion para acceder")</script> ';
    echo "<script>location.href='../../'</script>";
}


?>
<html>
<head>
<?php
require_once "../../conexion.php";
$obj = new conectar();
$conexion = $obj->conexion();
//contar vencimiento de verificaciones
$VV = mysqli_query( $conexion, "select COUNT(id_autos) from autos where VencVerificacion between curdate() and date_add(curdate(), interval 30 day) and activo=1 and estatus=1" );
list( $venVer ) = mysqli_fetch_row( $VV );
//contar vencimiento de polizas
$VP = mysqli_query( $conexion, "select COUNT(id_autos) from autos where fin_poliza between curdate() and date_add(curdate(), interval 30 day) and activo=1 and estatus=1" );
list( $venPoli ) = mysqli_fetch_row( $VP );
//contar proximos servicios
$VS= mysqli_query( $conexion, "select COUNT(id_autos) from autos where prox_servicio between curdate() and date_add(curdate(), interval 30 day) and activo=1 and estatus=1;");
	list( $Servicio ) = mysqli_fetch_row( $VS );

?>
</head>
<!-- End of Topbar -->
<!-- Contenido de la pagina -->

<div id="layoutSidenav_content">
  <div class="card mb-4">
  <main>
    <div class="card-header">
      <div class="col-xl-3  mb-4" style="float: right;">
        <div class="card border-left-danger  h-100 ">
          <div class="btn " style="float: right;" data-toggle="modal" data-target="#ModalVERE" >
            <div class="text-xs font-weight-bold  text-uppercase mb-1">VERIFICACIONES POR VENCER </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $venVer ?> </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3  mb-4" style="float: right;">
        <div class="card border-left-primary  ">
          <div class="btn " style="float: right;" data-toggle="modal" data-target="#ModalPOLI" >
            <div class="text-xs font-weight-bold  text-uppercase mb-1"> POLIZAS POR VENCER </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $venPoli ?> </div>
          </div>
        </div>
      </div> 
		<div class="col-xl-3  mb-4" style="float: right;">
        <div class="card border-left-success  ">
          <div class="btn " style="float: right;" data-toggle="modal" data-target="#ModalSERV" >
            <div class="text-xs font-weight-bold  text-uppercase mb-1"> PROXIMOS MANTENIMIENTOS </div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $Servicio ?> </div>
          </div>
        </div>
      </div>
      <h3 >EQUIPOS DE TRANSPORTE</h3>
      <a class="btn btn-danger fa fa-car" type="button" href="nuevo.php" > Agregar nuevo registro </a> 
      <!--modal polizas-->
      <div class="modal fade" id="ModalPOLI">
        <div class="modal-dialog modal-lg">
          <div class="modal-content"> 
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">PÓLIZAS PRÓXIMAS A VENCER</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
              <table  class=" table table-hover" width="50%">
                <?php

                $TVP = mysqli_query( $conexion, "select id_autos,codigo, CONCAT(nombre,' ',a_paterno,' ',a_materno) as nombre, fin_poliza from autos left join personal on personal_id_personal = id_personal where fin_poliza between curdate() and date_add(curdate(), interval 30 day) and activo=1 and estatus=1;" );
                ?>
                <thead>
                  <tr >
                    <th >Ver</th>
                    <th >Registro</th>
                    <th>Fecha de vencimiento</th>
                    <th>Usuario Asignado</th>
                  </tr>
                </thead>
                <?php
                while ( $ver = mysqli_fetch_array( $TVP ) ) {
                    print '
                      <tr >
						  <td > <a  type="button" href="vermas.php?ideditar=' . $ver[ 'id_autos' ] . '" >
                              <i class="fas fa fa-search  ">
								 </i>
									 </a>
                                       </td>
                          <td >' . $ver[ 'codigo' ] . '</td>
                          <td>' . $ver[ 'fin_poliza' ] . '</td>
                           <td>' . $ver[ 'nombre' ] . '</td>
					  </tr>';
                }
                ?>
                </tbody>
                
              </table>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
	  
      <!--modal verificacion-->
      <div class="modal fade" id="ModalVERE">
        <div class="modal-dialog modal-lg">
          <div class="modal-content"> 
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">VERIFICACIONES PRÓXIMAS A VENCER</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
              <table  class=" table table-hover" width="50%">
                <?php

                $TVV = mysqli_query( $conexion, "select id_autos,codigo, CONCAT(nombre,' ',a_paterno,' ',a_materno) as nombre, VencVerificacion from autos left join personal on personal_id_personal = id_personal where VencVerificacion between curdate() and date_add(curdate(), interval 30 day) and activo=1 and estatus=1 ;" );
                ?>
                <thead>
                  <tr >
                    <th >Ver</th>
                    <th >Registro</th>
                    <th>Fecha de vencimiento</th>
                    <th>Usuario Asignado</th>
                  </tr>
                </thead>
                <?php
                while ( $ver2 = mysqli_fetch_array( $TVV ) ) {
                    print '
                      <tr >
						  <td > <a type="button" href="vermas.php?ideditar=' . $ver2[ 'id_autos' ] . '" >
                              <i class="fas fa-search ">
								 </i>
									 </a>
                                       </td>
                          <td >' . $ver2[ 'codigo' ] . '</td>
                          <td>' . $ver2[ 'VencVerificacion' ] . '</td>
                           <td>' . $ver2[ 'nombre' ] . '</td>
					  </tr>';
                }
                ?>
                </tbody>
                
              </table>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
	   <!--modal servicio-->
      <div class="modal fade" id="ModalSERV">
        <div class="modal-dialog modal-lg">
          <div class="modal-content"> 
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">PROXIMOS MANTENIMIENTOS</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
              <table  class=" table table-hover" width="50%">
                <?php

                $TVS = mysqli_query( $conexion, "select servicio_autos.*,id_autos,codigo,CONCAT(nombre,' ',a_paterno,' ',a_materno) as nombre, prox_servicio
from servicio_autos 
left join autos on autos_id = id_autos 
left join personal on personal_id_personal = id_personal 
where prox_servicio between curdate() and date_add(curdate(), interval 30 day) and activo=1 and estatus=1 " );
                ?>
                <thead>
                  <tr >
                    <th >Ver</th>
                    <th >Registro</th>
                    <th>Ultimo servicio</th>
                    <th>Proximo servicio</th>
					   <th>Usuario Asignado</th>
                  </tr>
                </thead>
                <?php
                while ( $veS = mysqli_fetch_array( $TVS ) ) {
                    print '
                      <tr >
						  <td > <a  type="button" href="vermas.php?ideditar=' . $veS[ 'id_autos' ] . '" >
                              <i class="fa fa-search  " with="10px">
								 </i>
									 </a>
                                       </td>
                          <td >' . $veS[ 'codigo' ] . '</td>
                          <td>' . $veS[ 'ultimo_servicio' ] . '</td>
                          <td>' . $veS[ 'prox_servicio' ] . '</td>
                           <td>' . $veS[ 'nombre' ] . '</td>
					  </tr>';
                }
                ?>
                </tbody>
                
              </table>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body">
      <table id="datatablesSimple">
        <?php


        $sql = "SELECT `id_autos`,codigo, `marca`,`modelo`,`tipo`, `color`,`placas`,
case estatus when 1 then 'Alta' when 2 then 'Baja' END AS est,'activo', `personal_id_personal`,`id_personal`, `nombre`,`a_materno`, `a_paterno`
                                        FROM autos
                                            left join personal
                                                on personal_id_personal = id_personal where activo=1";
        $result = mysqli_query( $conexion, $sql );
        ?>
        <thead>
          <tr>
            <th>Registro</th>
            <th>Marca</th>
            <th>Modelo</th>
			<th>Tipo</th>
            <th>Placas</th>
            <th>Estatus del Vehiculo</th>
            <th>Usuario Asignado</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
          while ( $mostrar = mysqli_fetch_array( $result ) ) {

              print '
                                            <tr>
                                                <td>' . $mostrar[ 'codigo' ] . '</td>

                                                <td>' . $mostrar[ 'marca' ] . '</td>

                                                <td>' . $mostrar[ 'modelo' ] . '</td>
												
                                                <td>' . $mostrar[ 'tipo' ] . '</td>

                                                <td>' . $mostrar[ 'placas' ] . '</td>

                                                <td>' . $mostrar[ 'est' ] . '</td>

                                                <td>' . $mostrar[ "nombre" ] . ' ' . ' ' . $mostrar[ "a_paterno" ] . '' . ' ' . $mostrar[ "a_materno" ] . '</td>



                                        <td align="center"><acronym title="Editar ">
                                        <a class="btn btn-success  btn-lg" type="button" href="vermas.php?ideditar=' . $mostrar[ 'id_autos' ] . '" >
                                        <i class="fas fa fa-edit"></i></a></acronym>
                                       </td>
                    <td align="center"><acronym title="ELIMINAR ">
                        <a href="../../admin/autos/php/delete.php?ideliminar=' . $mostrar[ 'id_autos' ] . '"  class="btn btn-danger  btn-lg" onclick="return confirmarAccesoURL()">

                                <i class="fas fa-trash"></i>
                            </a></acronym>
                    </td>
                                            </tr>';
          }


          ?>
        </tbody>
      </table>
    </div>
    </div>
  </main>
  
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