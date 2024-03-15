<?php
session_start();
if (@!$_SESSION['email']) {
	echo '<script>alert("Inicie sesion para acceder")</script> ';
			echo "<script>location.href='../../index.html '</script>";
	die();
}
else
	if ($_SESSION['rol']==2) {
	header("Location:/scrik/usuario2/");
}
else
	if ($_SESSION['rol']==3) {
	header("Location:/scrik/usuario3/");
}
else
	if ($_SESSION['rol']==4) {
	header("Location:/scrik/usuario4/");
}
?>
<!DOCTYPE html>
<html lang="en"><head>
<!--index personal-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Creado para el corporativo ABFORTI">
    <meta name="author" content="Diego Camacho Martinez ">

    <title>SCRIK - SISTEMA DE CONTROL DE RECURSOS E INVENTARIOS KEPLER
</title>

    <!-- Custom fonts for this template-->
    <link href="/scrik/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
	<link href="/scrik/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="/scrik/img/styles.css" rel="stylesheet" />

    <!-- Custom styles for this template-->
    
	<script> 
          //Cuadro de diálogo de confirmación en JavaScript
          function confirmarAccesoURL()
          {
	    return confirm("¿Está seguro que desea eliminar este registro?");
          }
	</script>
        
   
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Page level plugins --> 
<script src="/scrik/admin/chart.min.js"></script> 

            
	</head>

<body id="sb-nav-fixed ">

    <!-- Page Wrapper -->
    <div id="wrapper" class="bg-dark">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/scrik/admin/index.php">
                 <img src="/scrik/img/logoblanco.png" width="100%">
            </a>

            

            <!-- Divider -->
           
<style type="text/css">
            .menu2 {
                 color:#111136; font-family: 'Montserrat', sans-serif;
            }
        </style>
	
	<li class="nav-item ">
                <a class="nav-link" href="/scrik/admin/dashboard.php">
                    <i class="fas fa-fw fa fa-tachometer" aria-hidden="true"></i>
                    <span>Dashboard</span></a>
            </li>
  <!-- Heading --><hr class="sidebar-divider">
  <div class="sidebar-heading sb-sidenav-menu-heading"> informática </div>

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
                        <a class="collapse-item" href="/scrik/admin/computo/"   style="font-size: 90%" >Computadoras y laptops</a>
                        <a class="collapse-item" href="/scrik/admin/phone/"  style="font-size: 90%">Equipos telefónicos</a>
						<a class="collapse-item" href="/scrik/admin/perifericos/" style="font-size: 90%">Periféricos y otros </a>
                    </div>
                </div>
            </li>
			<!-- Nav Item - personal -->
                       
            <li class="nav-item menu2">
                <a class="nav-link" href="/scrik/admin/personal/">
                    <i class="fas fa-fw fa-group"></i>
                    <span>Colaboradores</span></a>
            </li>
      
			
				<!-- Nav Item - licencias  -->
            <li class="nav-item menu2">
                <a class="nav-link" href="/scrik/admin/licencias/index.php">
                    <i class="fas fa-fw fa-certificate"></i>
                    <span>Licencias de software</span></a>
            </li>
			<!-- Nav Item - servicios -->
            <li class="nav-item menu2">
                <a class="nav-link" href="/scrik/admin/servicios/index.php">
                    <i class="fas fa-fw fa-globe"></i>
                    <span>Servicios de comunicación</span></a>
            </li>
			
			<!-- Nav Item - proveedores -->
                       <li class="nav-item menu2">
                <a class="nav-link" href="/scrik/admin/proveedores/">
                    <i class="fas fa-fw fa-handshake-o"></i>
                    <span>Proveedores</span></a>
            </li>
			
			
			<!-- Nav Item - Contraseñas -->
            <li class="nav-item menu2">
                <a class="nav-link" href="/scrik/admin/passw/">
                    <i class="fas fa-fw fa-lock"></i>
                    <span>Contraseñas</span></a>
            </li>
			<!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
         
               <div class="sidebar-heading sb-sidenav-menu-heading">administración
            </div>
			
			<!-- Nav Item - autos -->
                                <li class="nav-item menu2">
                <a class="nav-link" href="/scrik/admin/autos/"> <i class="fas fa-fw fa-car"></i>
                    <span>Autos</span></a>
            </li>
			<!-- Nav Item - stock -->
                            <li class="nav-item menu2">
                <a class="nav-link" href="/scrik/admin/stock/">
                    <i class="fas fa-fw fa-archive"></i>
                    <span>Mobiliario</span></a>
            </li>
			
			<!-- Nav Item - Maquinaria -->
  <li class="nav-item menu2"> <a class="nav-link" href="/scrik/admin/maquinaria/"> <i class="fas fa-fw fa-cogs"></i> <span>Maquinaria</span></a> </li>
	
			
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
              Configuración
            </div>

            
            <!-- Nav Item - Tables -->
            <li class="nav-item menu2">
                <a class="nav-link" href="/scrik/admin/setting/"> <i class="fas fa-fw fa-key"></i>
                    <span>Usuarios</span></a>
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
                                    src="/scrik/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/scrik/admin/perfil.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/scrik/logout.php" >
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar Sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
				
				
			    <script src="/scrik/js/simple-datatables@latest.js" crossorigin="anonymous"></script> 
    <script src="/scrik/js/datatables-simple-demo.js"></script> 

    <!-- Bootstrap core JavaScript--> 
    <script src="/scrik/vendor/jquery/jquery.min.js"></script> 
    <script src="/scrik/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 

    <!-- Core plugin JavaScript--> 
    <script src="/scrik/vendor/jquery-easing/jquery.easing.min.js"></script> 

    <!-- Custom scripts for all pages--> 
    <script src="/scrik/js/sb-admin-2.min.js"></script> 

    <!-- Page level plugins --> 
    <script src="/scrik/vendor/chart.js/Chart.min.js"></script> 

    <!-- Page level custom scripts --> 
    <script src="/scrik/js/demo/chart-area-demo.js"></script> 
    <script src="/scrik/js/demo/chart-pie-demo.js"></script>

		
				
				
				</body>

</html>
				
				
				