<?php

require("../header.php");
      ?>
                <!-- End of Topbar -->

                <!-- Contenido de la pagina -->
               <!-- Tabla -->
				<div id="layoutSidenav_content">
                <main>
				
					    <div class="card mb-4">
                            <div class="card-header">
                               <h3>Equipos de transporte</h3>
             </div>
          <div class="card-body">
            <table id="datatablesSimple">
              <?php

              require_once "../../conexion.php";
              $obj = new conectar();
              $conexion = $obj->conexion();

              $sql = "SELECT `id_autos`,codigo, `marca`,`modelo`, `color`,`placas`,'activo', `personal_id_personal`,`id_personal`, `nombre`,`a_materno`, `a_paterno`
                                        FROM autos
                                            left join personal
                                                on personal_id_personal = id_personal where activo=1";
              $result = mysqli_query( $conexion, $sql );
              ?>
              <thead>
                <tr>
                  <th>Registro</th>
                  <th>Marca</th>
                  
                  <th>Modelo</th>
                  <th>Placas</th>
                  <th>Usuario Asignado</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ( $mostrar = mysqli_fetch_array( $result ) ) {

                    print '
                                            <tr>
                                                <td>' . $mostrar[ 'codigo' ] . '</td>

                                                <td>' . $mostrar[ 'marca' ] . '</td>

                                                <td>' . $mostrar[ 'modelo' ] . '</td>
                                               
                                                <td>' . $mostrar[ 'placas' ] . '</td>

                                                <td>'.$mostrar["nombre"].' '.' '.$mostrar["a_paterno"].''.' '.$mostrar["a_materno"].'</td>

                                       
                                           
                                           
									<td align="center"><acronym title="Editar ">
									<a class="btn btn-success  btn-lg" type="button" href="vermas.php?ideditar='.$mostrar['id_autos'].'" >
									<i <i class="fas fa fa-edit"></i></a></acronym>
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