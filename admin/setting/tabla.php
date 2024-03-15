<?php
    $hoy = getdate();
    if ( @!$_SESSION[ 'email' ] ) {
        echo '<script>alert("Inicie sesion para acceder")</script> ';
        echo "<script>location.href='../../'</script>";
    }
    ?>
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
					    <div class="card mb-4" >
                            <div class="card-header">
                            
                                <h3>USUARIOS</h3>
							
							 <a class="btn btn-danger fa fa-plus" type="button" href="nuevo.php">
                                    Agregar nuevo usuario
                                </a></div>
							
                            <div class="card-body"><table id="datatablesSimple">
								<?php 

                 require_once "../../conexion.php";
                   $obj= new conectar();
                           $conexion=$obj->conexion();

                     $sql="SELECT usuarios.*, case tipo when 1 then 'Administrador' when 2 then 'Control' when 3 then 'Vizualizador' when 4 then 'Control Administrador' END AS tipo,departamentos.nombre as depa FROM `usuarios` left join departamentos
								on departamento = id_depa";
                               $result=mysqli_query($conexion,$sql);
                                    ?>
                                    <thead>
                                        <tr>
                                            <th >ID</th>
                                            <th>Nombre  </th>
											
                                            <th>Correo electrónico</th>
											
											<th>Departamento</th>
											<th>Tipo de usuario</th>
											<th>Contraseña</th>
											<th >Acciones</th>
											
                                        </tr>
                                    </thead>
                                      <tbody>
                                        <?php 
			while ($mostrar=mysqli_fetch_array($result)) {
				
				print '<tr>
				<td>'.$mostrar['id_usuarios'].'</td>
			
				
				<td>'.$mostrar['nombre'].'</td>
				<td>'.$mostrar['email'].'</td>
			
				<td>'.$mostrar['depa'].'</td>
				<td>'.$mostrar['tipo'].'</td>
				<td >'.$mostrar['password'].' </td>
				
				
			
			     <td align="center">
				   <acronym title="Editar ">
					<a href="vermas.php?ideditar='.$mostrar['id_usuarios'].'" class="btn btn-success  btn-lg" >
						
						<i class="fas fa fa-edit"></i></a></acronym>
                                   </td>
				<td align="center">
			       <acronym title="ELIMINAR ">
					<a href="php/delete.php?ideliminar='.$mostrar['id_usuarios'].'" class="btn btn-danger  btn-lg" onclick="return confirmarAccesoURL()">
						
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