<?php

require("../header.php");
      ?>
           <div id="layoutSidenav_content">
    <main>
      <div class="card mb-4">
        <div class="card-header">
          <h3> EQUIPOS DE COMPUTO</h3>
         </div>
        <div class="card-body">
          <table id="datatablesSimple">
            <?php

            require_once "../../conexion.php";
            $obj = new conectar();
            $conexion = $obj->conexion();

            $sql = "SELECT *, case tipo when 1 then 'Escritorio' when 2 then 'Portátil' END AS tipo FROM `computadora` left join personal
                                                    on personal_id = id_personal where activo=1";
            $result = mysqli_query( $conexion, $sql );
            ?>
            <thead>
              <tr>
                <th >Registro</th>
                <th>Tipo</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Usuario Asignado</th>
                <th >Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ( $mostrar = mysqli_fetch_array( $result ) ) {
                
                  print '
                <tr>
                    <td>' . $mostrar[ 'codigo' ] . '</td>

                    <td>' . $mostrar[ 'tipo' ] . '</td>
                    <td>' . $mostrar[ 'marca' ] . '</td>

                    <td>' . $mostrar[ 'modelo' ] . '</td>
                    <td>' . $mostrar[ "nombre" ] . ' ' . ' ' . $mostrar[ "a_paterno" ] . '' . ' ' . $mostrar[ "a_materno" ] . '</td>
                                
					
				</a></acronym></td>
			<td align="center">
			<acronym title="Ver más ">
					<a href="editar.php?ideditar='.$mostrar['id_compu'].'" class="btn btn-success  btn-lg" >
						<i class="fas fa fa-external-link"></i></a></acronym>
                                   </td>
				

				</tr>';
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