 <?php

require('header.php');

?>

                <!-- Contenido de la pagina -->
                <div id="layoutSidenav_content">
                <main>
					<?php
	require_once "../conexion.php";
                   $obj= new conectar();
                $conectar=$obj->conexion();

            	$usuario=$_SESSION['user'];
	      $sql="SELECT *, case tipo when 1 then 'Administrador' when 2 then 'Control' when 3 then 'Vizualizador' when 4 then 'Control Administrador' END AS tipo FROM `usuarios` where nombre='$usuario'";
	              mysqli_select_db($conectar, $bd);
	              $query=mysqli_query($conectar, $sql);
	               $resultado=mysqli_fetch_array($query);  
				
													
								
	   
         	?>	
					<div align="center">
					
					
                                  <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg" width="150px"> 
						
						
						
						<table width="70%">
							<tr height="100px" align="center"><td><h1><?php echo $resultado['nombre'] ?></h1></td></tr>
					<!--<tr><td>
						      <p  align="justify">Eres un usuario con los privilegios de <?php echo $resultado['tipo'] ?> dentro del SCRIK - SISTEMA DE CONTROL DE RECURSOS E INVENTARIOS KEPLER y perteneces al area de  <b><?php echo $resultado['departamento'] ?></b></p>
				            </td></tr>
					<tr height="40px"><td >
						     <p  align="justify">Tu usuario para acceder al sistema es: <b><?php echo $resultado['email'] ?> </b> </p>
								</td></tr>
							
					<tr height="40px"><td >
							<p  align="justify">Tu contraseña para acceder al sistema es: <b><?php echo $resultado['password'] ?> </b> </p>
								</td></tr>
							
							<tr><td height="200">
								<p align="justify">En caso de que tu información sea incorrecta comunicate con el area de informática y comunicaciones por el siguiente Correo electrónico: <b >soportetics@termoformadosyblister.com</b></p>
								</td></tr>-->
							</table>
                    </div> </main>
                
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