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
	if ($_SESSION['rol']==3) {
	header("Location:../usuario3/");
}
else
	if ($_SESSION['rol']==4) {
	header("Location:../usuario4/");
}
	?>
<!DOCTYPE html>
<html lang="en">
<!--INDEX PRINCIPAL usuario 2-->
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

<body id="sb-nav-fixed ">

    <!-- Page Wrapper -->
    <div id="wrapper" class="bg-dark">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
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
                 informática
            </div>

          <!--Nav Item - Equipos--> 
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
            </li>
			 <!-- Nav Item - personal -->
           
            <li class="nav-item menu2">
                <a class="nav-link" href="personal/index.php">
                    <i class="fas fa-fw fa-group"></i>
                    <span>Colaboradores</span></a>
            </li>
<!--
            <!-- Nav Item - licencias 
            <li class="nav-item menu2">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#licencias"
                    aria-expanded="true" aria-controls="licencias">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Licencias</span>
                </a>
                <div id="licencias" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Licencias y registros :</h6>
                        <a class="collapse-item" href="licencias/">Software</a>
                      
                    </div>
                </div>
            </li>
			
			
			
			<!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading sb-sidenav-menu-heading">administración
            </div>
			
			<!-- Nav Item - autos -->
                                <li class="nav-item menu2">
                <a class="nav-link" href="autos/"> <i class="fas fa-fw fa-car"></i>
                    <span>Autos</span></a>
            </li>
         <!-- Nav Item - stock -->
                                   <li class="nav-item menu2">
                <a class="nav-link" href="stock/">
                    <i class="fas fa-fw fa-archive"></i>
                    <span>Mobiliario</span></a>
            </li>
			<!-- Nav Item - Maquinaria -->
  <li class="nav-item menu2"> <a class="nav-link" href="/scrik/usuario2/maquinaria/"> <i class="fas fa-fw fa-cogs"></i> <span>Maquinaria</span></a> </li>
			

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
                                aria-labelledby="userDropdown"> <a class="dropdown-item" href="perfil.php">
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
<style type="text/css">
            .tarjetas {
                font-size: 24px; color:#FFFFFF; font-family: 'Bebas Neue', cursive;
            }
        </style>
                <!-- Contenido de la pagina -->
                <div id="layoutSidenav_content">
                <main><div class="container"> 
                                                <!-- Color System -->
					
                         <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-warning text-white shadow">
                                        <div class="card-body"> <img  src="../img/computadora.png" width="30px" class="img-negative">
                                            <a class="small tarjetas  stretched-link" href="computo/index.php">equipos de cómputo</a>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                    <div class="card bg-warning text-white shadow">
                                        <div class="card-body"><img  src="../img/celular.png" width="30px" class="img-negative">
                                            <a class="small tarjetas stretched-link" href="phone/index.php">Equipos de telefónicos</a>
                                            
                                        </div>
                                    </div>
                               
								</div>
								<div class="col-lg-6 mb-4">
                                   <div class="card bg-warning text-white shadow">
                                        <div class="card-body"><img  src="../img/impresora.png" width="30px" class="img-negative">
                                            <a class="small tarjetas stretched-link" href="perifericos/">Perifericos y otros componetes informaticos</a>
                                            
                                        </div>
									</div> </div>

                             <div class="col-lg-6 mb-4">
            <div class="card bg-warning text-white shadow">
              <div class="card-body"><img  src="../img/worker.png" width="30px" class="img-negative"> <a class="small tarjetas stretched-link " href="personal/index.php" > Registros de colaboradores</a>
                <div class="text-white-50 small"></div>
              </div>
            </div>
          </div>
                                
                             <!--  <div class="col-lg-6 mb-4"><img  src="../img/worker.png" width="30px" class="img-negative">
                                    <div class="card bg-warning text-white shadow">
                                        <div class="card-body"><img  src="../img/certificate.png" width="30px" class="img-negative">
                                            <a class="small tarjetas stretched-link" href="licencias/index.php">Licencias de la empresa</a>
                                            
                                        </div>
                                    </div>
                                </div> -->
                                
                                <div class="col-lg-6 mb-4">
                                  <div class="card bg-warning text-white shadow">
                                        <div class="card-body"> <img  src="../img/list.png" width="30px" class="img-negative">
                                            <a class="small tarjetas stretched-link" href="stock/">Mobiliario</a>
                                            
                                        </div>
                                    </div>
                                </div>
                               
                               
								   <div class="col-lg-6 mb-4">
            <div class="card bg-warning text-white shadow">
              <div class="card-body "><img  src="../img/coche.png" width="30px" class="img-negative"> <a class="small tarjetas stretched-link" href="autos/" > Automóviles de la empresa</a>
                <div class="text-white-50 small"></div>
              </div>
            </div>
          </div>
                            <div class="col-lg-6 mb-4">
            <div class="card bg-warning text-white shadow">
              <div class="card-body "><img  src="../img/cogs.png" width="30px" class="img-negative"> <a class="small tarjetas stretched-link" href="maquinaria/" > Maquinaria</a>
                <div class="text-white-50 small"></div>
              </div>
            </div>
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