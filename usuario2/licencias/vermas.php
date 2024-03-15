<?php
session_start();
if (@!$_SESSION['email']) {
	echo '<script>alert("Inicie sesion para acceder")</script> ';
			echo "<script>location.href='../../'</script>";
}else
	if ($_SESSION['rol']==1) {
	header("Location:../admin/");
}
else
	if ($_SESSION['rol']==3) {
	header("Location:../usuario3/");
}
else
	if ($_SESSION['rol']==4) {
	header("Location:../usuario4/");
}

$hoy=getdate(); 
?>
<!DOCTYPE html>
<html lang="en"><head>
<!--Nuevo software-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SCRIK - SISTEMA DE CONTROL DE RECURSOS E INVENTARIOS KEPLER
</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
	<link href="../../css/sb-admin-2.min.css" rel="stylesheet">
	<link href="../../img/styles.css" rel="stylesheet" />
    
   
    <!-- Custom styles for this template-->
    
	<script> 
          //Cuadro de diálogo de confirmación en JavaScript
          function confirmarAccesoURL()
          {
	    return confirm("¿Está seguro que desea eliminar este registro?");
          }
	</script>
        
       
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;800&display=swap" rel="stylesheet">
	
 <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">    
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            
	</head>

<body id="sb-nav-fixed ">

    <!-- Page Wrapper -->
    <div id="wrapper" class="bg-dark">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
               <img src="../../img/logoblanco.png" width="100%">
            </a>

            

            <!-- Divider -->
            <hr class="sidebar-divider">
<style type="text/css">
            .menu2 {
                 color:#111136; font-family: 'Montserrat', sans-serif;
            }
        </style>
            <!-- Heading -->
            <div class="sidebar-heading sb-sidenav-menu-heading">
                Registros
            </div>

            <!-- Nav Item - Equipos -->
            <li class="nav-item menu2">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Equipos</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Equipos de informática:</h6>
                        <a class="collapse-item" href="../computo/index.php"   style="font-size: 90%" >Computadoras y laptops</a>
                        <a class="collapse-item" href="../phone"  style="font-size: 90%">Teléfonos y celulares</a>
						<a class="collapse-item" href="../perifericos" style="font-size: 90%">Periféricos y otros </a>
                    </div>
                </div>
            </li>
			<!-- Nav Item - personal -->
                       
            <li class="nav-item menu2">
                <a class="nav-link" href="../personal">
                    <i class="fas fa-fw fa-group"></i>
                    <span>Colaboradores</span></a>
            </li>
            <!-- Nav Item - licencias -->
            <li class="nav-item menu2">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#licencias"
                    aria-expanded="true" aria-controls="licencias">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Licencias</span>
                </a>
                <div id="licencias" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Licencias y registros :</h6>
                        <a class="collapse-item" href="index.php">Software</a>
                        
                    </div>
                </div>
            </li>
			

			<!-- Nav Item - stock -->
                                   <li class="nav-item menu2">
                <a class="nav-link" href="../stock">
                    <i class="fas fa-fw fa-archive"></i>
                    <span>Stock</span></a>
            </li>
			
			<!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
              Registro de autos
            </div>
			
			<!-- Nav Item - autos -->
                                <li class="nav-item menu2">
                <a class="nav-link" href="../autos"> <i class="fas fa-fw fa-car"></i>
                    <span>Autos</span></a>
            </li>
         
            
           
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

           
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                           
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="font-size: 16px; "><?php echo $_SESSION['user'];?></span>
                                <img class="img-profile rounded-circle"
                                    src="../../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown"> <a class="dropdown-item" href="../perfil.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                               
                                <div class="dropdown-divider"></div>
                                              <a class="dropdown-item" href="../../logout.php" >
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar Sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                 <!-- Contenido de la pagina -->
               <!-- Tabla -->
				<div id="tabledes">
                <main><?php
	    require_once "../../conexion.php";
                   $obj= new conectar();
                $conectar=$obj->conexion();

            	$ideditar=$_GET['ideditar'];
	      $sql="SELECT `id_licencias`, `detalles`, `fecha_inicio`, `fecha_renova`, `clave`, `costo_inicial`, `costo_renova`, `provedores_id` , id_provedores, nombre, phone
									FROM licencias
										left join provedores
											on provedores_id= id_provedores 
		  
		  where id_licencias=$ideditar";
	              mysqli_select_db($conectar, $bd);
	              $query=mysqli_query($conectar, $sql);
	               $resultado=mysqli_fetch_array($query);  
								
				
											
         	?>	
					    <div class="card mb-4" >
                            <div class="card-header" align="center">
                                <i class="fas fa-table me-1"></i>
                                Datos de registro con ID: <?php echo $resultado['id_licencias'] ?>
                            </div>
                            <div class="card-body">
							<form action="" method="post" onsubmit="return valida(this)" enctype="multipart/form-data">
								<div class="hack1"><div class="hack2">
		<table  border="0" align="center" width="500px">
        <style type="text/css">
            .Estilo2 {
                color: #000;
				font-weight: bold;
				text-align:right;
				
            }
        </style>
			
			
			<tr height="30px" align="left">
				  <td ><span class="Estilo2" >Nombre de la licencia:</span></td>
			
				  <td>
			      <?php echo $resultado['detalles'] ?>
			    </td>
			</tr>
			
			
			<tr height="30px" align="left">
				  <td ><span class="Estilo2" >Clave (Serial)</span></td>
			
				  <td>
			  <?php echo $resultado['clave'] ?>
			    </td>
			</tr>
			<tr height="30px" align="left">
				  <td ><span class="Estilo2" >Fecha de adquisición</span></td>
			
				  <td >
			      <?php echo $resultado['fecha_inicio'] ?>
			    </td>
			</tr>
			
			<tr height="30px" align="left">
				  <td ><span class="Estilo2" >Costo de compra</span></td>
			
				  <td>
			      <?php echo $resultado['costo_inicial'] ?>
			    </td>
			</tr>
			
			<tr height="30px" align="left">
				  <td ><span class="Estilo2" >próxima fecha de renovación</span></td>
			
				  <td >
			   <?php echo $resultado['fecha_renova'] ?>
			    </td>
			</tr>
			
			
			<tr height="30px" align="left">
				  <td ><span class="Estilo2" >Costo de renovación</span></td>
			
				  <td>
			     <?php echo $resultado['costo_renova'] ?>
			    </td>
			</tr>
			
			<tr height="30px" align="left">
				  <td ><span class="Estilo2" >Id del Proveedor</span></td>
		
				  <td>
			      <?php echo $resultado['provedores_id'] ?>
			    </td>
			</tr>
			
			<tr height="30px" align="left">
				  <td ><span class="Estilo2" >Proveedor</span></td>
			
				  <td>
			      <?php echo $resultado['nombre'] ?>
			    </td>
			</tr>
			<tr height="30px" align="left">
				  <td ><span class="Estilo2" >Teléfono del proveedor</span></td>
		
				  <td>
			      <?php echo $resultado['phone'] ?>
			    </td>
			    </td>
			</tr>

								
			<tr>
		  <td height="58"  align="center" colspan="2">
			  <div ><a class="btn btn-danger" href="javascript: history.go(-1)">Volver</a></div>
		   </td>
			
			
		</tr> 

  </table></div></div>
	</form>
							
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
        <script src="../../js/simple-datatables@latest.js" crossorigin="anonymous"></script>
        <script src="../../js/datatables-simple-demo.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../js/demo/chart-area-demo.js"></script>
    <script src="../../js/demo/chart-pie-demo.js"></script>


</body>

</html>