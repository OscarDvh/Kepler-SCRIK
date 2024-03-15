<?php
session_start();
if (@!$_SESSION['email']) {
	echo '<script>alert("Inicie sesion para acceder")</script> ';
			echo "<script>location.href='../'</script>";
}else
	if ($_SESSION['rol']==1) {
	header("Location:../admin/");
}
else
	if ($_SESSION['rol']==2) {
	header("Location:../usuario2/");
}
else
	if ($_SESSION['rol']==4) {
	header("Location:../usuario4/");
}?>
<!DOCTYPE html>
<html lang="en">
<!--INDEX PRINCIPAL-->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SCRIK - SISTEMA DE CONTROL DE RECURSOS E INVENTARIOS KEPLER</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;800&display=swap" rel="stylesheet">
	
 <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">    
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body id="sb-nav-fixed "  >

    <!-- Page Wrapper -->
    <div id="wrapper" class="bg-dark">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                 <img src="../img/logoblanco.png" width="100%">
                
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
                        <a class="collapse-item" href="computo/index.php"   style="font-size: 90%" >Computadoras y laptops</a>
                        <a class="collapse-item" href="phone/index.php"  style="font-size: 90%">Equipos telefónicos</a>
						<a class="collapse-item" href="perifericos/" style="font-size: 90%">Periféricos y otros </a>
                    </div>
                </div>
            </li>
			<!-- Nav Item - personal -->
           
            <li class="nav-item menu2">
                <a class="nav-link" href="personal/index.php">
                    <i class="fas fa-fw fa-group"></i>
                    <span>Colaboradores</span></a>
            </li>

           <!-- Nav Item - licencias  -->
            <li class="nav-item menu2">
                <a class="nav-link" href="../licencias/index.php">
                    <i class="fas fa-fw fa-certificate"></i>
                    <span>Licencias de software</span></a>
            </li>
			<!-- Nav Item - servicios -->
                       <li class="nav-item menu2">
                <a class="nav-link" href="servicios/index.php">
                    <i class="fas fa-fw fa-globe"></i>
                    <span>Servicios de comunicación</span></a>
            </li>
			<!-- Nav Item - servicios -->
                       <li class="nav-item menu2">
                <a class="nav-link" href="proveedores/">
                    <i class="fas fa-fw fa-handshake-o"></i>
                    <span>Proveedores</span></a>
            </li>
			
			
			
			
			<!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
              Registro de autos
            </div>
			
			<!-- Nav Item - autos -->
                                <li class="nav-item menu2">
                <a class="nav-link" href="autos/"> <i class="fas fa-fw fa-car"></i>
                    <span>Autos</span></a>
            </li>
          

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            
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

                    <!-- Topbar Search -->
                    

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
                                    src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="perfil.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../logout.php" >
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

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
						
						
						
						<table width="50%">
							<tr height="100px" align="center"><td><h1><?php echo $resultado['nombre'] ?></h1></td></tr>
					 <!--<tr><td>
						      <palign="justify">Eres un usuario con los privilegios de <?php echo $resultado['tipo'] ?> dentro del SCRIK - SISTEMA DE CONTROL DE RECURSOS E INVENTARIOS KEPLER y perteneces al area de  <b><?php echo $resultado['departamento'] ?></b></h4>
				            </td></tr>
					<tr height="40px"><td >
						     <p align="justify">Tu usuario para acceder al sistema es: <b><?php echo $resultado['email'] ?> </b> </h4>
								</td></tr>
							
					<tr height="40px"><td >
							<p align="justify">Tu contraseña para acceder al sistema es: <b><?php echo $resultado['password'] ?> </b> </h4>
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

<span>Copyright &copy; 2023. GRUPO KEPLER</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>