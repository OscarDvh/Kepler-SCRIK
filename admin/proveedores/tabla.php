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
                             
                               <h3> PROVEEDORES</h3>
								   
								    <a class="btn btn-danger fa fa-handshake-o" type="button" href="nuevo.php">
                                       Agregar nuevo registro
										</a>
                         
                            </div>
                            <div class="card-body"><table id="datatablesSimple"><?php 

								require_once "../../conexion.php";
								$obj= new conectar();
								$conexion=$obj->conexion();

								$sql="SELECT * FROM `provedores`";
								$result=mysqli_query($conexion,$sql);
								?>
                                    <thead>
                                        <tr>
                                            <th >ID</th>
                                            <th>Nombre </th>
											
                                            <th>Teléfono</th>
											<th>Correo electrónico</th>
											<th>Descripción de los servicios que ofrece</th>
											<th>Acciones</th>
                                        </tr>
                                    </thead>
                                      <tbody>
                                        <?php 
			while ($mostrar=mysqli_fetch_array($result)) {
				
				print '<tr>
				<td>'.$mostrar['id_provedores'].'</td>
				<td>'.$mostrar['nombre'].'</td>
				
				<td>'.$mostrar['phone'].'</td>
				<td>'.$mostrar['email'].'</td>
				<td>'.$mostrar['descripcion'].'</td>
			   <td align="center">
			    <acronym title="Editar ">
					<a href="vermas.php?ideditar='.$mostrar['id_provedores'].'" class="btn btn-success  btn-lg" >
						
						<i class="fas fa fa-edit">
						
						</i></a></acronym>
						
                                   </td>
								   
				<td align="center">
			        <acronym title="ELIMINAR">
					<a href="../../admin/proveedores/php/eliminar_doc.php?ideliminar='.$mostrar['id_provedores'].'" class="btn btn-danger  btn-lg" onclick="return confirmarAccesoURL()">
						
 							<i class="fas fa-trash"></i>
 						
 					</a></acronym>
				</td>';
		}
	
	


	?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div> </main>
					
					</body>
</html>