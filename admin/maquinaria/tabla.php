<?php
    $hoy = getdate();
    if ( @!$_SESSION[ 'email' ] ) {
        echo '<script>alert("Inicie sesion para acceder")</script> ';
        echo "<script>location.href='../../'</script>";
    }
    ?>
<!DOCTYPE html>
<html lang="en">
                <!-- End of Topbar -->

                <!-- Contenido de la pagina -->
               <!-- Tabla -->
				<div id="layoutSidenav_content">
                <main>
				
					    <div class="card mb-4">
                            <div class="card-header">
                               
                                <h3>MAQUINARIA</h3>
								     
								    <a class="btn btn-danger fa  fa-cogs" type="button" href="nuevo.php">
                                       Agregar nuevo registro
										</a>
                            
                            </div>
                            <div class="card-body"><table id="datatablesSimple"><?php 

require_once "../../conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();

$sql="SELECT maquinaria.*,id_empresa,empresa.nombre as empresa, case area_resp when 1 then 'Mantenimiento' when 2 then 'Maquinados' when 3 then 'Producción' END AS area,
case estado when 1 then 'Operación' when 2 then 'Fuera de operación' when 3 then 'En reparación' when 4 then 'Inservible' END AS est
FROM `maquinaria`
left join empresa on `empresa_id` = id_empresa 
where activo=1;";
$result=mysqli_query($conexion,$sql);
?>
                                   
                                    <thead>
                                        <tr>
                                            <th>Registro</th>
                                            <th>Descripción</th>
                                            <th>Marca</th>
											<th>Modelo</th>
                                            <th>Serie</th>
											   <th>No.Factura</th>
										<th>Estado</th>
										<th>Empresa</th>
										<th>Área responsable</th>
											<th >Acciones</th>
									
                                        </tr>
                                    </thead>
                                      <tbody><?php 
			while ($mostrar=mysqli_fetch_array($result)) {
	
				print '
                                        <tr>
                                            <td>'.$mostrar['codigo'].'</td>
                                           
                                            <td>'.$mostrar['descripcion'].'</td>
                                            <td>'.$mostrar['marca'].'</td>
                                            <td>'.$mostrar['modelo'].'</td>
                                           <td>'.$mostrar['serie'].'</td>
                                           <td>'.$mostrar['no_factura'].'</td>
										   <td>'.$mostrar['est'].'</td>
										   <td>'.$mostrar['empresa'].'</td>
										   <td>'.$mostrar['area'].'</td>
                                           
											 <td align="center">
											 	<acronym title="Editar ">
					<a href="vermas.php?ideditar='.$mostrar['id_cogs'].'" class="btn btn-success  btn-lg" >
					
						<i class="fas fa fa-edit"></i></a></acronym>
                                   </td>
				<td align="center">
			    <acronym title="ELIMINAR  ">
					<a href="../../admin/maquinaria/php/delete.php?ideliminar='.$mostrar['id_cogs'].'" class="btn btn-danger  btn-lg" onclick="return confirmarAccesoURL()">
						
 							<i class="fas fa-trash"></i>
 						
 					</a></acronym>
				</td>';
		}
	
	


	?>
                                      
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div> </main>
                
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
       
              


</body>

</html>