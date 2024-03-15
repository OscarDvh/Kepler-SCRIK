<?php

require("../header.php");
     require_once "../../conexion.php";
                    $obj = new conectar();
                    $conexion = $obj->conexion();
$ideditar = $_GET[ 'ideditar' ];
$sql = "SELECT computadora.*,CONCAT(personal.nombre,' ',personal.a_paterno,' ',personal.a_materno) AS nombre,
propietarios.nombre AS propietario,case tipo when 1 then 'Escritorio' when 2 then 'Laptop'  when 3 then 'Otro' END AS tipol,
case estado when 1 then 'Nuevo' when 2 then 'Usado' when 3 then 'Con fallas' when 4 then 'Inservible' END AS est
FROM `computadora` 
left join personal on personal_id = id_personal 
left join propietarios on computadora.id_propietario = propietarios.id_propietario 
where id_compu=$ideditar  ";
mysqli_select_db( $conexion, $bd );
$query = mysqli_query( $conexion, $sql );
$resultado = mysqli_fetch_array( $query );


?>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="../../js/jquery-3.1.1.min.js"></script> 
    <script src="../../js/select2.js"></script>
    </head>
    <body>
    <div class="container">
      <div class="form">
        <div class="form-group">
          <h3>EQUIPO DE CÓMPUTO</h3>
          <b>DATOS GENERALES</b>
          <hr>
          <form action="../../admin/computo/php/edit_save.php?ideditar=<?php echo $ideditar;?>&cr=<?php echo $resultado['codigo'] ?>" method="post" onsubmit="return valida(this)" enctype="multipart/form-data">
            <div class="form-group">
				 <div class="row">
				 
                <div class="col">
                   <b>Código de registro: </b>
					<b><?php echo $resultado['codigo'] ?></b>
					
                </div>
               </div>
			  <br>
              <div class="row">
                <div class="col-5">
                  <label for="propietario">Propietario</label>
                 <p type="text" class="form-control"><?php echo $resultado['propietario'] ?></p>
                </div>
				  <div class="col">
                  <label for="tipo">Tipo </label>
                  <p type="text" class="form-control"><?php echo $resultado['tipol'] ?></p>
                </div>
				  <div class="col">
                  <label for="costo">Costo</label>
                  <p type="text" class="form-control"><?php echo $resultado['costo'] ?></p>
                </div>
				  <div class="col">
                  <label for="fecha_compra">Fecha de compra</label>
                  <p type="text" class="form-control"><?php echo $resultado['fecha_compra'] ?></p>
                </div>
				</div>
				
				<div class="row">
                <div class="col-3">
                  <label for="cpu">Procesador</label>
                  <p type="text" class="form-control"><?php echo $resultado['cpu'] ?></p>
                </div>
                <div class="col">
                  <label for="ram">Memoria RAM</label>
                  <p type="text" class="form-control"><?php echo $resultado['ram'] ?></p>
                </div>
                <div class="col">
                  <label for="almacenamiento">Almacenamiento</label>
                  <p type="text" class="form-control"><?php echo $resultado['almacenamiento'] ?></p>
                </div>
					<div class="col">
                  <label for="estado">Estado</label>
                  
					<p type="text" class="form-control"><?php echo $resultado['est'] ?></p>
                </div>
              </div>
				
				<div class="row">
                <div class="col">
                  <label for="marca">Marca</label>
                  <p type="text" class="form-control"><?php echo $resultado['marca'] ?></p>
                </div>
                <div class="col">
                  <label for="modelo">Modelo</label>
                  <p type="text" class="form-control"><?php echo $resultado['modelo'] ?></p>
                </div>
               
                <div class="col">
                  <label for="color">Color</label>
                 <p type="text" class="form-control"><?php echo $resultado['color'] ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label for="no_serie">Número de serie</label>
                  <p type="text" class="form-control"><?php echo $resultado['no_serie'] ?></p>
                </div>
                
              
                <div class="col">
                  <label for="usuarioAsignado">Colaborador Asignado</label>
                <p type="text" class="form-control"><?php echo $resultado["nombre"] ?></p>
                </div>
              </div>
              <div class="row">
               
				  <div class="col-4">
                  <label for="accesorios">Accesorios</label>
                  <p type="text" class="form-control"><?php echo $resultado['accesorios'] ?></p>
                </div> 
				  <div class="col">
                  <label for="observaciones">Observaciones</label>
                  <p type="text" class="form-control"><?php echo $resultado['observaciones'] ?></p>
                </div>
				  
              </div>
				  <br>
				
              <b>LICENCIAS</b>
              <hr>
              	<div class="row">
                <div class="col">
                  <label for="so">Sistema Operativo</label>
                 
					  <?php 
					   $so= mysqli_query( $conexion,"SELECT id_licencias,nombre_licencias FROM licencias LEFT JOIN computadora_has_licencias ON id_licencias = licencias_id_licencias LEFT JOIN computadora ON computadora_id_compu = id_compu where computadora_has_licencias.computadora_id_compu = $ideditar and licencias.tipo =3" );
					  $rer = mysqli_fetch_array( $so );
					  
					   if(empty($rer)){
						  $rer['nombre_licencias']="";
					  }
					  ?>
					   <p type="text" class="form-control"><?php echo $rer['nombre_licencias'] ?></p>
                </div>
                <div class="col">
                  <label for="office">Office </label>
                 
					    <?php 
					   $offi= mysqli_query( $conexion,"SELECT id_licencias,nombre_licencias FROM licencias LEFT JOIN computadora_has_licencias ON id_licencias = licencias_id_licencias LEFT JOIN computadora ON computadora_id_compu = id_compu where computadora_has_licencias.computadora_id_compu = $ideditar and licencias.tipo =2" );
					  $rer1 = mysqli_fetch_array( $offi );
					  if(empty($rer1)){
						  $rer1['nombre_licencias']="";
					  }
					  ?>
					   <p type="text" class="form-control"><?php echo $rer1['nombre_licencias'] ?></p>
                </div>
                <div class="col">
                  <label for="antivirus">Antivirus</label>
                  
					  <?php 
					   $anti= mysqli_query( $conexion,"SELECT id_licencias,nombre_licencias FROM licencias LEFT JOIN computadora_has_licencias ON id_licencias = licencias_id_licencias LEFT JOIN computadora ON computadora_id_compu = id_compu where computadora_has_licencias.computadora_id_compu = $ideditar and licencias.tipo =1" );
					  $rer2 = mysqli_fetch_array( $anti );
					   if(empty($rer2)){
						  $rer2['nombre_licencias']="";
					  }
					  ?>
					   <p type="text" class="form-control"><?php echo $rer2['nombre_licencias'] ?></p>
                </div>
					<div class="col">
                  <label for="adicional">Software adicional</label>
						<p type="text" class="form-control"><?php echo $resultado['adicional'] ?></p>
                </div>
              </div>
              <br>
              <b>DOCUMENTACIÓN</b>
              <hr>
              <div align="left">
                <tr  align="left">
                  <td><div class="row">
                      <div class="col-6" >
                        <input type="file" name="archivo[]" id="archivo" class="form-control btn  " data-multiple-caption="{count} files selected" multiple>
                      </div>
                    </div></td>
                </tr>
              </div>
				<!-- Tabla de archivos-->
          <div >
            <main>
              <div class="card mb-4">
                <div >
                  <?php
                  $archivos = mysqli_query( $conexion, "Select codigo FROM computadora WHERE id_compu='$ideditar'" );
                  list( $doc ) = mysqli_fetch_row( $archivos );
                  $directorio = $_SERVER[ 'DOCUMENT_ROOT' ] . "/scrik/admin/computo/php/doc/$doc";
                  ?>
                </div>
                <div class="card-body ">
                  <table class="table">
                    <thead>
                      <tr align="center">
                        <th>Nombre del archivo</th>
                        <th>Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $archivos = scandir( "$directorio" );
                      $num = 0;
                      for ( $i = 2; $i < count( $archivos ); $i++ ) {
                          $num++;
                          ?>
                      <tr align="center">
                        <td><?php echo $archivos[$i]; $ruta="$doc/$archivos[$i]" ?></td>
                        <td align="center">
							<a href="../../admin/computo/php/doc/<?php echo $ruta;?>" target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" >
							<i class="fas fa fa-eye"> 
							</i> 
							</a>
							<a href="../../admin/computo/php/doc/<?php echo $ruta;?>" download="<?php echo $archivos[$i]; ?>" class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" >
								<i class="fas fa fa-download"> 
								</i> 
							</a> 
							
						  </td>
                        <?php
                        }
                        ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </main>
          </div>
              <div align="right"> <a class="btn btn-danger" type="button" href="index.php" >Volver </a>
          
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
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