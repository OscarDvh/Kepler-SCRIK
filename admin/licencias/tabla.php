    <?php
    $hoy = getdate();
    if ( @!$_SESSION[ 'email' ] ) {
        echo '<script>alert("Inicie sesion para acceder")</script> ';
        echo "<script>location.href='../../'</script>";
    }
    ?>
    <html>
		    <!-- Contenido de la pagina -->
               <!-- Tabla -->
				<div id="layoutSidenav_content">
                <main>
				
					    <div class="card mb-4">
                            <div class="card-header">
                               
                                <h3>LICENCIAS DE SOFTWARE </h3>
								  
								    <a class="btn btn-danger fa fa-certificate" type="button" href="nuevo.php">
                                       Agregar nuevo registro
										</a>
                           
                            </div>
                            <div class="card-body"><table id="datatablesSimple">
								<?php 

								require_once "../../conexion.php";
								$obj= new conectar();
								$conexion=$obj->conexion();

								$sql="SELECT licencias.*,case tipo when 1 then 'Antivirus' when 2 then 'Office' when 3 then 'Sistema operativo' when 4 then 'Otro' END AS tipol, id_provedores, nombre
									FROM licencias
										left join provedores
											on provedores_id= id_provedores";
								$result=mysqli_query($conexion,$sql);
								?>
								 <thead>
                                        <tr>
                                            <th >ID</th>
                                            <th>Nombre</th>
                                            <th>Clave (Serial)</th>
                                            <th>Tipo</th>
                                            <th>Costo</th>
											<th>Fecha de compra</th>
											<th>Fecha de vencimiento</th>
											
											<th>Proveedor</th>
                                          
											<th >Acciones</th>
									
                                        </tr>
                                    </thead>
                                      <tbody>
										  <?php 
			while ($mostrar=mysqli_fetch_array($result)) {
				
				print '
                                        <tr>
                                            <td>'.$mostrar['id_licencias'].'</td>
                                           
                                            <td>'.$mostrar['nombre_licencias'].'</td>
                                            <td>'.$mostrar['clave'].'</td>
											<td>'.$mostrar['tipol'].'</td>
											<td>'.$mostrar['costo'].'</td>
                                           <td>'.$mostrar['fecha_inicio'].'</td>
										   <td>'.$mostrar['fecha_fin'].'</td>
                                           
										   <td>'.$mostrar['nombre'].' </td>
                                           
									<td align="center"><acronym title="Editar">
									<a class="btn btn-success  btn-lg" type="button" href="vermas.php?ideditar='.$mostrar['id_licencias'].'" >
									
									<i class="fas fa fa-edit"></i></a><acronym>
                                   </td>
				<td align="center"><acronym title="ELIMINAR">
					<a href="../../admin/licencias/php/eliminar_doc.php?ideliminar='.$mostrar['id_licencias'].'"  class="btn btn-danger  btn-lg" onclick="return confirmarAccesoURL()">
						
 							<i class="fas fa-trash"></i>
 						
 					</a><acronym>
				</td>
                                        </tr>';
                                       }
	
	


	?>
                                    </tbody>
                                </table>
                            </div>
                        </div> </main>
		
		
				</body>
</html>