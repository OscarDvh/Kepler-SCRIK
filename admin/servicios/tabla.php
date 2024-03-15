    <!doctype html>
    <html>
    <head>
    </head>

    <body>
    <!-- Contenido de la pagina --> 
    <!-- Tabla -->
    <div id="layoutSidenav_content">
      <main>
        <div class="card mb-4">
          <div class="card-header">
            <h3>SERVICIOS DE COMUNICACIÓN</h3>
            <a class="btn btn-danger fa fa-rss" type="button" aria-hidden="true" href="nuevo.php"> Agregar nuevo registro </a> </div>
          <div class="card-body">
            <table id="datatablesSimple">
              <?php

              require_once "../../conexion.php";
              $obj = new conectar();
              $conexion = $obj->conexion();

              $sql = "SELECT servicios.*,CASE extra
                                        when  '1' then 'Telefonia' 
                                        when  '2' then 'IP fija' 
                                        when  '3' then 'Velocidad simétrica' 
                                        when  '123' then 'Telefonia, IP fija, Velocidad simétrica' 
                                        when  '23' then 'IP fija,Velocidad simétrica'  
                                        when  '12' then 'Telefonia,IP fija'   
                                        when  '13' then 'Telefonia, Velocidad simétrica' 
                                        END AS extras,
                                    `provedores_id`, `id_provedores`, `nombre`
                                        FROM servicios
                                            left join provedores
                                                on provedores_id= id_provedores
                                                where activo = 1";
              $result = mysqli_query( $conexion, $sql );
              ?>
              <thead>
                <tr>
                  <th >ID</th>
                  <th>Proveedor </th>
                  <th>Numero de cuenta </th>
                  <th>Descripción </th>
                  <th>Costo de renovación</th>
                  <th>Dia de renovación</th>
                  <th>Servicios extras</th>
                  <th>Centro de trabajo </th>
                  <th >Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                while ( $mostrar = mysqli_fetch_array( $result ) ) {

                    print '<tr>
                    <td>' . $mostrar[ 'id_servicios' ] . '</td>
                    <td>' . $mostrar[ 'nombre' ] . ' </a></td>
                    <td>' . $mostrar[ 'no_cuenta' ] . '</td>
                    <td>' . $mostrar[ 'detalles' ] . '</td>
                    <td>$' . $mostrar[ 'costo_renova' ] . '</td>
                    <td>' . $mostrar[ 'fecha_renova' ] . '</td>
                    <td>' . $mostrar[ 'extras' ] . ', ' . ' ' . $mostrar[ 'otro' ] . '</td>




                     <td align="center">
                        <acronym title="Editar ">
                        <a href="vermas.php?ideditar=' . $mostrar[ 'id_servicios' ] . '" class="btn btn-success  btn-lg" >

                            <i class="fas fa fa-edit"></i></a></acronym>
                                       </td>
                    <td align="center">
                    <acronym title="ELIMINAR ">
                        <a href="php/delete.php?ideliminar=' . $mostrar[ 'id_servicios' ] . '" class="btn btn-danger  btn-lg" onclick="return confirmarAccesoURL()">

                                <i class="fas fa-trash"></i>

                        </a></acronym>
                    </td>';
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

            <span>Copyright &copy; 2023. GRUPO KEPLER</span> </div>
        </div>
      </footer>
      <!-- End of Footer --> 
    </div>
    </div>
    </body>
    </html>