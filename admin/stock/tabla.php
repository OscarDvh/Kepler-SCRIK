<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>
</head>

<!-- Contenido de la pagina -->
<!-- Tabla -->
<div id="layoutSidenav_content">
  <main>
    <div class="card mb-4">
      <div class="card-header">
        <h3>MOBILIARIO</h3>
        <a class="btn btn-danger fa fa-list-alt" type="button" href="nuevo.php"> Agregar nuevo registro</a></div>
      <div class="card-body">
        <table id="datatablesSimple">
          <?php

          require_once "../../conexion.php";
          $obj = new conectar();
          $conexion = $obj->conexion();

          $sql = "SELECT stock.* ,
		  case estado 
		  when 1 then 'Excelente' 
		  when 2 then 'Regular' 
		  when 3 then 'Deteriorado' 
		  when 4 then 'Mal estado' 
		  END AS est, 
		  case almacenado 
		  when 1 then 'Almacenado'
		  when 2 then 'No almacenado'
		  END AS almacen,
		  CONCAT(personal.nombre,' ',personal.a_paterno,' ',personal.a_materno) AS nombre,id_depar,
		  departamentos.nombre as nombre_departamento
		  FROM `stock`
		  left join personal on personal_id = id_personal 
		  left join departamentos
								on id_depar = id_depa
		  where activo=1";
          $result = mysqli_query( $conexion, $sql );
          ?>
          <thead>
            <tr>
              <th >Registro</th>
              <th>Tipo</th>
             
              <th>Estado</th>
              <th>Cantidad</th>
              <th>Almacenado</th>
              <th>Departamento</th>
              <th>Usuario</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            while ( $mostrar = mysqli_fetch_array( $result ) ) {

                print '
			<tr>
				<td>' . $mostrar[ 'codigo' ] . '</td>
				<td>' . $mostrar[ 'tipo' ] . '</td>
				
				<td>' . $mostrar[ 'est' ] . '</td>
			    <td>' . $mostrar[ 'cantidad' ] . '</td>
			    <td>' . $mostrar[ 'almacen' ] . '</td>
			    <td>' . $mostrar[ 'nombre_departamento' ] . '</td>
			    <td>' . $mostrar[ "nombre" ] . '</td>
				
                                                              
											
                                         <td align="center">
										 <acronym title="Editar ">
					<a href="vermas.php?ideditar=' . $mostrar[ 'id_stock' ] . '" class="btn btn-success  btn-lg" >
						
						<i class="fas fa fa-edit"></i></a></acronym>
                                   </td>
				<td align="center">
			               <acronym title="ELIMINAR">
					<a href="php/delete.php?ideliminar=' . $mostrar[ 'id_stock' ] . '" class="btn btn-danger  btn-lg" onclick="return confirmarAccesoURL()">
						
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
        
        <span>Copyright &copy; 2023. GRUPO KEPLER</span></div>
    </div>
  </footer>
  <!-- End of Footer -->
</div>
</div>
<body>
</body>
</html>