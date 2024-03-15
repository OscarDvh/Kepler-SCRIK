<?php
require("../header.php");

?><!DOCTYPE html>
<html lang="en">
                <!-- End of Topbar -->

                <!-- Contenido de la pagina -->
               <!-- Tabla -->
				<div id="layoutSidenav_content">
                <main>
				
					    <div class="card mb-4">
                            <div class="card-header">
                               
                                <h3>EQUIPOS TELEFÓNICOS</h3>
								     
								 
                            </div>
                            <div class="card-body"><table id="datatablesSimple"><?php 

require_once "../../conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();

$sql="SELECT *,case disponible when 1 then 'Disponible' when 2 then 'No disponible' END AS est
FROM celular
left join personal
on id_personal= personal_id where activo=1";
$result=mysqli_query($conexion,$sql);
?>
                                   
                                    <thead>
                                        <tr>
                                            <th>Registro</th>
                                            <th>Número telefónico</th>
											
                                            <th>Usuario Asignado</th>
										<th>Disponibilidad</th>
											<th >Acciones</th>
									
                                        </tr>
                                    </thead>
                                      <tbody><?php 
			while ($mostrar=mysqli_fetch_array($result)) {
	
				print '
                                        <tr>
                                            <td>'.$mostrar['codigo'].'</td>
                                           
                                            <td>'.$mostrar['numero_tel'].'</td>
                                           <td>'.$mostrar['nombre'].''.' '.$mostrar["a_paterno"].''.' '.$mostrar["a_materno"].' </td>
										   <td>'.$mostrar['est'].'</td>
                                           
											 <td align="center">
											 	<acronym title="Editar ">
					<a href="vermas.php?ideditar='.$mostrar['id_celular'].'" class="btn btn-success  btn-lg" >
					
						<i class="fas fa fa-edit"></i></a></acronym>
                                   </td>
				';
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