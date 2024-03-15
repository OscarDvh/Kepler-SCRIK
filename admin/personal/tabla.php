<?php
if (@!$_SESSION['email']) {
	echo '<script>alert("Inicie sesion para acceder")</script> ';
			echo "<script>location.href='../../'</script>";
}
?>
<html>
	<!-- End of Topbar -->
	<!-- Contenido de la pagina -->
	<!-- Tabla -->
	<div id="layoutSidenav_content">
		<main>
			<div class="card mb-4">
				<div class="card-header">
					<h3> REGISTRO DE COLABORADORES</h3>
					<a class="btn btn-danger fa fa-user-plus" type="button" href="nuevo.php" >
						Añadir colaborador
					</a>
				</div>
				<div class="card-body">
					<table id="datatablesSimple">
						<?php 
						require_once "../../conexion.php";
						$obj= new conectar();
						$conexion=$obj->conexion();
						$sql="SELECT `id_personal`, `no_empleado`,personal.nombre  AS personal, `a_materno`, `a_paterno`,  `email`, `phone`, `id_depar`, `id_depa`, departamentos.nombre  AS departamentos, 
						case empresa_id_empresa when 1 then 'KEPLER UI' when 2 then 'KEPLER LAB'  when 3 then 'ACE ENGINEERING' when 4 then 'ENERGY TRAINING CENTER' when 5 then 'SOFOIL' when 6 then 'PROYECTOS' when 7 then 'GRUPO KEPLER' END AS empresa_id_empresa
						FROM personal left join departamentos
								on id_depar = id_depa";
						$result=mysqli_query($conexion,$sql);
						?>
						<thead>
							<tr>
								<th>#</th>
								<th>Colaborador</th>
								<th>Correo electrónico</th>
								<th>Teléfono</th>
								<th>Empresa</th>
								<th>Departamento</th>
								<th >Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php
							while ($mostrar=mysqli_fetch_array($result))
							{
								print '
								<tr>
								<td>'.$mostrar["no_empleado"].'</td>
								<td>'.$mostrar["personal"].' '.' '.$mostrar["a_paterno"].''.' '.$mostrar["a_materno"].'</td>
								<td>'.$mostrar['email'].'</td>
								<td>'.$mostrar['phone'].'</td>
								<td>'.$mostrar['empresa_id_empresa'].'</td>
								<td>'.$mostrar['departamentos'].'</td>
								<td align="center">
								<acronym title="Editar ">
								<a href="vermas.php?ideditar='.$mostrar['id_personal'].'" class="btn btn-success  btn-lg" >
								<i class="fas fa fa-edit">
								</i>
								</a>
								</acronym>
								</td>
								<td align="center">
								<acronym title="ELIMINAR  ">
								<a href="../../admin/personal/php/eliminar_doc.php?ideliminar='.$mostrar['id_personal'].'" class="btn btn-danger  btn-lg" onclick="return confirmarAccesoURL()">
								<i class="fas fa-trash">
								</i>
								</a>
								</acronym>
								</td>
								';
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

<span>Copyright &copy; 2023. GRUPO KEPLER</span>
                    </div>
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
        
</body>

</html>


