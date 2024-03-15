<?php
    $hoy = getdate();
    if ( @!$_SESSION[ 'email' ] ) {
        echo '<script>alert("Inicie sesion para acceder")</script> ';
        echo "<script>location.href='../../'</script>";
    }
    ?>
<!DOCTYPE html>
<html lang="en">
                <!-- Contenido de la pagina -->
               <!-- Tabla -->
				<div id="layoutSidenav_content">
                <main>
				
					    <div class="card mb-4">
                            <div class="card-header">

                               <h3> PERIFÉRICOS Y OTROS COMPONENTES</h3>
								  
								    <a class="btn btn-danger fa fa-keyboard-o" type="button" href="nuevo.php">
                                       Agregar nuevo registro
										</a>
                            
                            </div>
                            <div class="card-body"><table id="datatablesSimple"><?php 

require_once "../../conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();

$sql="SELECT perifericos.* ,CONCAT(personal.nombre,' ',personal.a_paterno,' ',personal.a_materno) AS nombre,
case Estado when 1 then 'Nuevo' when 2 then 'Usado' when 3 then 'Con fallas' when 4 then 'Inservible' END AS Estado FROM perifericos left join personal
on id_personal= personal_id where activo=1 ";
$result=mysqli_query($conexion,$sql);
?>
            <thead>
                                        <tr>
                                            <th >Registro</th>
                                            <th>Características generales</th>
											<th>Colaborador</th>
                                            
											<th>Fecha de asignación</th>
											<th>Costo</th>
											<th >Estado</th>
											<th >Acciones</th>
											

                                        </tr>
                                    </thead>
                                      <tbody>
                                      <?php 
			while ($mostrar=mysqli_fetch_array($result)) {
			
				print '
			<tr>
				<td>'.$mostrar['codigo'].'</td>
				<td> '.$mostrar["caracteristicas"].' </td>
				<td>'.$mostrar['nombre'].'</td>
				
				
				<td>'.$mostrar['fecha'].'</td>
				<td>$'.$mostrar['costo'].'</td>
				<td>'.$mostrar['Estado'].'</td>
			
				           
				
                                            <td align="center"><acronym title="Editar ">
					<a href="vermas.php?ideditar='.$mostrar['id_perifericos'].'" class="btn btn-success  btn-lg" >
						
                            <i class="fas fa fa-edit"></i></a></acronym>
                                       </td>
                    <td align="center">
			
					<a href="php/delete.php?ideliminar='.$mostrar['id_perifericos'].'" class="btn btn-danger  btn-lg" onclick="return confirmarAccesoURL()">
						<acronym title="ELIMINAR ">
 							<i class="fas fa-trash"></i>
 						
 					</a></acronym>
				</td>';
		}
	
	


	?>
                       
                                    </tbody>
                                </table>
                            </div>
                        </div></div> </main>
                
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