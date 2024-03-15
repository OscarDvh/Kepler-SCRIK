<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<body>
	
                <!-- Contenido de la pagina -->
               <!-- Tabla -->
				<div id="layoutSidenav_content">
                <main>
				
					    <div class="card mb-4">
                            <div class="card-header">
                            
                             <h3>USUARIOS, CORREOS Y CONTRASEÑAS  </h3>
								     
								    <a class="btn btn-danger fa fa-key" type="button" href="nuevo.php">
                                       Agregar nuevo registro
										</a>
                     
                            </div>
                            <div class="card-body"><table id="datatablesSimple">	<?php 

								require_once "../../conexion.php";
								$obj= new conectar();
								$conexion=$obj->conexion();

								$sql="SELECT *,case tipo when 1 then 'Correo Electrónico' when 2 then 'Usuario de dominio' when 3 then 'Wi-fi' when 4 then 'Otros' END AS tipo FROM `pass`";
								$result=mysqli_query($conexion,$sql);
								?>
                                    <thead>
                                        <tr>
                                            <th >ID</th>
                                            <th>Tipo de contraseña</th>
											
                                            <th>Descripción</th>
											<th>Usuario/ dirección de correo</th>
											<th>Contraseña</th>
											
											
											<th>Acciones</th>
                                        </tr>
                                    </thead>
                                      <tbody>
                                         <?php 
			while ($mostrar=mysqli_fetch_array($result)) {
				
				print '
			<tr>
				<td>'.$mostrar['id_pass'].'</td>
				
				<td>'.$mostrar['tipo'].'</td>
				<td>'.$mostrar['descripcion'].'</td>
				<td>'.$mostrar['usuario-email'].'</td>
				<td>'.$mostrar['password'].'</td>
			
                                                              
											
                                         <td align="center">
										 <acronym title="Editar ">
					<a href="vermas.php?ideditar='.$mostrar['id_pass'].'" class="btn btn-success  btn-lg" >
						
						<i class="fas fa fa-edit"></i>
						</a>
							</acronym>
                                   </td>
				<td align="center">
			      <acronym title="ELIMINAR">
					<a href="php/delete.php?ideliminar='.$mostrar['id_pass'].'" class="btn btn-danger  btn-lg" onclick="return confirmarAccesoURL()">
						
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