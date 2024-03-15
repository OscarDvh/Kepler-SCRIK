<?php

require("../header.php");
      ?>
           
                <!-- End of Topbar -->

                 <!-- Contenido de la pagina -->
               <!-- Tabla -->
			<?php
	require_once "../../conexion.php";
                    $obj = new conectar();
                    $conexion = $obj->conexion();
$ideditar = $_GET[ 'ideditar' ];
$sql = "SELECT autos.*,
CONCAT(personal.nombre,' ',personal.a_paterno,' ',personal.a_materno) AS nombre,
case transmision when 1 then 'Automática' when 2 then 'Manual' END AS tra,
case estatus when 1 then 'Alta' when 2 then 'Baja' END AS est,
case EstatusVerificacion when 1 then 'Realizado' when 2 then 'Pendiente' END AS ev,
propietarios.nombre AS propietario
FROM `autos` 
left join personal on personal_id_personal = id_personal 
left join propietarios on autos.id_propietario = propietarios.id_propietario 
where id_autos=$ideditar  ";
mysqli_select_db( $conexion, $bd );
$query = mysqli_query( $conexion, $sql );
$resultado = mysqli_fetch_array( $query );

									
         	?>	
					   <div class="container">
      <div class="form">
        <div class="form-group">
          <h3>EQUIPO DE TRANSPORTE</h3>
          <b>DATOS GENERALES</b>
          <hr>
          <form action="../../admin/autos/php/edit_save.php?ideditar=<?php echo $ideditar;?>&cr=<?php echo $resultado['codigo'] ?>" method="post" onsubmit="return valida(this)" enctype="multipart/form-data">
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
					 
					  

                   
                  </select>
                </div>
                <div class="col">
                  <label for="claveVehicular">Clave Vehicular</label>
                   <p type="text" class="form-control"><?php echo $resultado['claveVehicular'] ?></p>
                </div>
                <div class="col">
                  <label for="vin">VIN</label>
                  <p type="text" class="form-control"><?php echo $resultado['vin'] ?></p>
                </div>
                <div class="col">
                  <label for="factura">Factura</label>
                 <p type="text" class="form-control"><?php echo $resultado['factura'] ?></p>
                  </input>
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
                  <label for="tipo">Tipo</label>
                  <p type="text" class="form-control"><?php echo $resultado['tipo'] ?></p>
                </div>
                <div class="col">
                  <label for="transmision">Transmisión</label>
                 <p type="text" class="form-control"><?php echo $resultado['tra'] ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label for="color">Color</label>
                <p type="text" class="form-control"><?php echo $resultado['color'] ?></p>
                </div>
                <div class="col">
                  <label for="combustible">Combustible</label>
                  <p type="text" class="form-control"><?php echo $resultado['combustible'] ?></p>
                </div>
                <div class="col">
                  <label for="numMotor">Número de Motor</label>
                  <p type="text" class="form-control"><?php echo $resultado['no_motor'] ?></p>
                </div>
                <div class="col">
                  <label for="placas">Placas</label>
                 <p type="text" class="form-control"><?php echo $resultado['placas'] ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label for="polizaSeguro">Póliza de Seguro</label>
                  <p type="text" class="form-control"><?php echo $resultado['poliza_seguro'] ?></p>
                </div>
                <div class="col">
                  <label for="vencimientoPoliza">Vencimiento de Póliza</label>
                  <p type="text" class="form-control"><?php echo $resultado['fin_poliza'] ?></p>
                </div>
                <div class="col">
                  <label for="tarjetaCirculacion">Tarjeta de Circulación</label>
               <p type="text" class="form-control"><?php echo $resultado['tarjeta'] ?></p>
                </div>
                <div class="col">
                  <label for="vencimientoTarjeta">Vencimiento Tarjeta de Circulación</label>
                  <p type="text" class="form-control"><?php echo $resultado['fin_tarjeta'] ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label for="estadoCirculacion">Estado de Circulación</label>
                  <p type="text" class="form-control"><?php echo $resultado['estado_placa'] ?></p>
                </div>
                <div class="col">
                  <label for="estatus">Estatus del Vehiculo</label>
                  <p type="text" class="form-control"><?php echo $resultado['est'] ?></p>
                </div>
                <div class="col">
                  <label for="estatusVerificacion">Estatus de Verificación</label>
                  <p type="text" class="form-control"><?php echo $resultado['EstatusVerificacion'] ?></p>
                </div>
                <div class="col">
                  <label for="vencimientoVerificacion">Vencimiento de Verificación</label>
                  <p type="text" class="form-control"><?php echo $resultado['VencVerificacion'] ?></p>
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <label for="usuarioAsignado">Colaborador Asignado</label>
                  <p type="text" class="form-control"><?php echo $resultado["nombre"] ?></p>
                </div>
                <div class="col">
                  <label for="observaciones">Observaciones</label>
                  <p type="text" class="form-control"><?php echo $resultado['obs'] ?></p>
                </div>
              </div>
			  
              <b>DOCUMENTACIÓN</b>
			  <?php
	        $v_doc="SELECT rutas.* from rutas left join autos on codigo_ruta = codigo where id_autos= $ideditar";
					$ma = mysqli_query( $conexion, $v_doc );

					  $ruta = mysqli_fetch_array( $ma );  
					  
					  $c1=$ruta['codigo_ruta'];
					  
					  
	?>
                <hr>
			  <div class="table-responsive">
              <table class="table  table-hover">
                <thead>
                  <tr>
                    <th scope="col">Documento</th>
                    <th scope="col">Archivo actual</th>
                   
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
				    <tbody>
                  <tr>
                    <th scope="row">Tarjeta de Circulación  </th>
					  <td><?php echo $ruta['r_tarjeta'] ;
						  if($ruta['r_tarjeta'] == NULL){
							  $direc= "ver.php";
						  }else if(empty($ruta['r_tarjeta'])){
							  $direc= "ver.php";
						  }else {
							  $direc=$c1. '/' .$ruta['r_tarjeta'];
						  }
						  
						  ?></td>
                  
                     <td align="center">
							<a href="../../assets/doc/<?php echo $direc;?>" target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" >
							<i class="fas fa fa-eye"> 
							</i> 
							</a>
							<a href="../../admin/autos/php/download.php?file=<?php echo $ruta['r_tarjeta'];?>&ruta=<?php echo $c1;?>" class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" >
								<i class="fas fa fa-download"> 
								</i> 
							</a> 
						
						  </td>
                  </tr>
                  <tr>
                    <th scope="row">Factura</th>
					   <td><?php echo $ruta['r_factura'] ; 
						   if($ruta['r_factura'] == NULL){
							  $direc= "ver.php";
						  }else if(empty($ruta['r_factura'])){
							  $direc= "ver.php";
						  }else {
							  $direc=$c1. '/' .$ruta['r_factura'];
						  }
						  
						   ?></td>
                   
					   <td align="center">
							<a href="../../assets/doc/<?php echo $direc;?>" target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" >
							<i class="fas fa fa-eye"> 
							</i> 
							</a>
							<a href="../../admin/autos/php/download.php?file=<?php echo $ruta['r_factura'];?>&ruta=<?php echo $c1;?>"  class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" >
								<i class="fas fa fa-download"> 
								</i> 
							</a> 
							
						  </td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Identificacion</th>
					   <td><?php echo $ruta['r_identificacion'] ; 
						    if($ruta['r_identificacion'] == NULL){
							  $direc= "ver.php";
						  }else if(empty($ruta['r_identificacion'])){
							  $direc= "ver.php";
						  }else {
							  $direc=$c1. '/' .$ruta['r_identificacion'];
						  }
						   ?></td>
                   
					   <td align="center">
							<a href="../../assets/doc/<?php echo $direc;?>" target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" >
							<i class="fas fa fa-eye"> 
							</i> 
							</a>
							<a href="../../admin/autos/php/download.php?file=<?php echo $ruta['r_identificacion'];?>&ruta=<?php echo $c1;?>"   class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" >
								<i class="fas fa fa-download"> 
								</i> 
							</a> 
						
						  </td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Pagos de tenencia</th>
					   <td><?php echo $ruta['r_tenencia'] ;
						   if($ruta['r_tenencia'] == NULL){
							  $direc= "ver.php";
						  }else if(empty($ruta['r_tenencia'])){
							  $direc= "ver.php";
						  }else {
							  $direc=$c1. '/' .$ruta['r_tenencia'];
						  }
						   ?></td>
                    
					   <td align="center">
							<a href="../../assets/doc/<?php echo $direc;?>" target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" >
							<i class="fas fa fa-eye"> 
							</i> 
							</a>
							<a href="../../admin/autos/php/download.php?file=<?php echo $ruta['r_tenencia'];?>&ruta=<?php echo $c1;?>" class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" >
								<i class="fas fa fa-download"> 
								</i> 
							</a> 
							
						  </td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Certificado de verificación</th>
					   <td><?php echo $ruta['r_verificacion'] ; 
						    if($ruta['r_verificacion'] == NULL){
							  $direc= "ver.php";
						  }else if(empty($ruta['r_verificacion'])){
							  $direc= "ver.php";
						  }else {
							  $direc=$c1. '/' .$ruta['r_verificacion'];
						  }
						   ?></td>
                    
					   <td align="center">
							<a href="../../assets/doc/<?php echo $direc;?>"  target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" >
							<i class="fas fa fa-eye"> 
							</i> 
							</a>
							<a href="../../admin/autos/php/download.php?file=<?php echo $ruta['r_verificacion'];?>&ruta=<?php echo $c1;?>"  class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" >
								<i class="fas fa fa-download"> 
								</i> 
							</a> 
							
						  </td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Licencia de Conducir</th>
					   <td><?php echo $ruta['r_licencia'] ; 
						   if($ruta['r_licencia'] == NULL){
							  $direc= "ver.php";
						  }else if(empty($ruta['r_licencia'])){
							  $direc= "ver.php";
						  }else {
							  $direc=$c1. '/' .$ruta['r_licencia'];
						  }
						   ?></td>
                  
					   <td align="center">
							<a href="../../assets/doc/<?php echo $direc;?>" target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" >
							<i class="fas fa fa-eye"> 
							</i> 
							</a>
							<a href="../../admin/autos/php/download.php?file=<?php echo $ruta['r_licencia'];?>&ruta=<?php echo $c1;?>"  class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" >
								<i class="fas fa fa-download"> 
								</i> 
							</a> 
						
						  </td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Póliza de seguro</th>
					   <td><?php echo $ruta['r_seguro'] ; 
						    if($ruta['r_seguro'] == NULL){
							  $direc= "ver.php";
						  }else if(empty($ruta['r_seguro'])){
							  $direc= "ver.php";
						  }else {
							  $direc=$c1. '/' .$ruta['r_seguro'];
						  }
						   ?></td>
                   
					   <td align="center">
							<a href="../../assets/doc/<?php echo $direc;?>" target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" >
							<i class="fas fa fa-eye"> 
							</i> 
							</a>
							<a href="../../admin/autos/php/download.php?file=<?php echo $ruta['r_seguro'];?>&ruta=<?php echo $c1;?>"  class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" >
								<i class="fas fa fa-download"> 
								</i> 
							</a> 
							
						  </td>
                    
                  </tr>
                  <tr>
                    <th scope="row">Evidencia de servicio</th>
					   <td><?php echo $ruta['r_servcicio'] ; 
						   if($ruta['r_servcicio'] == NULL){
							  $direc= "ver.php";
						  }else if(empty($ruta['r_servcicio'])){
							  $direc= "ver.php";
						  }else {
							  $direc=$c1. '/' .$ruta['r_servcicio'];
						  }
						   ?></td>
                    
					   <td align="center">
							<a  href="../../assets/doc/<?php echo $direc;?>" target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" >
							<i class="fas fa fa-eye"> 
							</i> 
							</a>
							<a href="../../admin/autos/php/download.php?file=<?php echo $ruta['r_servcicio'];?>&ruta=<?php echo $c1;?>"  class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" >
								<i class="fas fa fa-download"> 
								</i> 
							</a> 
						
						  </td>
                   
                  </tr>
                  <tr>
                    <th scope="row">Politicas de uso</th>
					   <td><?php echo $ruta['r_politicas'] ; 
						   if($ruta['r_politicas'] == NULL){
							  $direc= "ver.php";
						  }else if(empty($ruta['r_politicas'])){
							  $direc= "ver.php";
						  }else {
							  $direc=$c1. '/' .$ruta['r_politicas'];
						  }
						   ?></td>
                  
                    
					   <td align="center">
							<a href="../../assets/doc/<?php echo $direc;?>" target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" >
							<i class="fas fa fa-eye"> 
							</i> 
							</a>
							<a href="../../admin/autos/php/download.php?file=<?php echo $ruta['r_politicas'];?>&ruta=<?php echo $c1;?>"  class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" >
								<i class="fas fa fa-download"> 
								</i> 
							</a> 
							
						  </td>
                  </tr>
                  <tr>
                    <th scope="row">Responsiva</th>
					   <td><?php echo $ruta['r_responsiva'] ; 
						    if($ruta['r_responsiva'] == NULL){
							  $direc= "ver.php";
						  }else if(empty($ruta['r_responsiva'])){
							  $direc= "ver.php";
						  }else {
							  $direc=$c1. '/' .$ruta['r_responsiva'];
						  }
						   ?></td>
                   
					   <td align="center">
							<a href="../../assets/doc/<?php echo $direc;?>" target="_blank" class="btn btn-primary  btn-lg"  data-toggle="tooltip" data-placement="top" title="Ver archivo" >
							<i class="fas fa fa-eye"> 
							</i> 
							</a>
							<a href="../../admin/autos/php/download.php?file=<?php echo $ruta['r_responsiva'];?>&ruta=<?php echo $c1;?>"  class="btn btn-success  btn-lg"  data-toggle="tooltip" data-placement="top" title="Descargar" >
								<i class="fas fa fa-download"> 
								</i> 
							</a> 
						
						  </td>
                    
                  </tr>
                </tbody>
              </table>
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