<?php
require("../header.php");

?><html>
		 <!-- Contenido de la pagina -->
               <!-- Tabla -->
				<div id="layoutSidenav_content">
                <main>
				
					    <div class="card mb-4">
                            <div class="card-header">
                             
                               <h3> PROVEEDORES</h3>
								
                         
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
			  
								   
				';
		}
	
	


	?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div> </main>
					
					</body>
</html>