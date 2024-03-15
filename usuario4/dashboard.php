<?php
session_start();
if ( @!$_SESSION[ 'email' ] ) {
    echo '<script>alert("Inicie sesion para acceder")</script> ';
    echo "<script>location.href='../'</script>";
} elseif ( $_SESSION[ 'rol' ] == 2 ) {
    header( "Location:../control/" );
}
?>
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
	<!-- Page level plugins --> 
<script src="chart.min.js"></script> 

</head>

<body id="sb-nav-fixed ">

<!-- Page Wrapper -->
<div id="wrapper" class="bg-dark">

<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
  
  <!-- Sidebar - Brand --> 
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php"> <img src="../img/logoblanco.png" width="100%"> </a> 
  
  <!-- Divider -->
 
  <style type="text/css">
            .menu2 {
                 color:#111136; font-family: 'Montserrat', sans-serif;
            }
        </style>
	
	<li class="nav-item ">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa fa-tachometer" aria-hidden="true"></i>
                    <span>Dashboard</span></a>
            </li>
  <!-- Heading --><hr class="sidebar-divider">
  <div class="sidebar-heading sb-sidenav-menu-heading"> Registros </div>
  
  <!-- Nav Item - Equipos -->
  <li class="nav-item menu2"> <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo"> <i class="fas fa-fw fa-folder"></i> <span >Equipos</span> </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Equipos de informática:</h6>
        <a class="collapse-item" href="computo/index.php"  style="font-size: 90%" >Computadoras y laptops</a> <a class="collapse-item" href="phone/index.php"   style="font-size: 90%">Equipos telefónicos</a> <a class="collapse-item" href="perifericos/"  style="font-size: 90%">Periféricos y otros </a> </div>
    </div>
  </li>
  <!-- Nav Item - personal -->
  <li class="nav-item menu2"> <a class="nav-link" href="personal/index.php"> <i class="fas fa-fw fa-group"></i> <span>Colaboradores</span></a> </li>
  
  <!-- Nav Item - licencias  -->
  <li class="nav-item menu2"> <a class="nav-link" href="licencias/index.php"> <i class="fas fa-fw fa-certificate"></i> <span>Licencias de software</span></a> </li>
  
  <!-- Nav Item - servicios -->
  <li class="nav-item menu2"> <a class="nav-link" href="servicios/index.php"> <i class="fas fa-fw fa-globe"></i> <span >Servicios de comunicación</span></a> </li>
  <!-- Nav Item - servicios -->
  <li class="nav-item menu2"> <a class="nav-link" href="proveedores/"> <i class="fas fa-fw fa-handshake-o"></i> <span>Proveedores</span></a> </li>
  
  <!-- Nav Item - stock -->
  <li class="nav-item menu2"> <a class="nav-link" href="stock/"> <i class="fas fa-fw fa-archive"></i> <span>Mobiliario</span></a> </li>
  <!-- Nav Item - Contraseñas -->
  <li class="nav-item menu2"> <a class="nav-link" href="passw/"> <i class="fas fa-fw fa-lock"></i> <span>Contraseñas</span></a> </li>
  
  <!-- Divider -->
  <hr class="sidebar-divider">
  
  <!-- Heading -->
  <div class="sidebar-heading"> Registro de autos </div>
  
  <!-- Nav Item - autos -->
  <li class="nav-item menu2"> <a class="nav-link" href="autos/"> <i class="fas fa-fw fa-car"></i> <span>Autos</span></a> </li>
  <!-- Divider -->
  <hr class="sidebar-divider">
  
  <!-- Heading -->
  <div class="sidebar-heading"> Configuración </div>
  
  <!-- Nav Item - Tables -->
  <li class="nav-item menu2"> <a class="nav-link" href="setting/"> <i class="fas fa-fw fa-key"></i> <span>Usuarios</span></a> </li>
  
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
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"> <i class="fa fa-bars"></i> </button>
    
    <!-- Topbar Search --> 
    
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Nav Item - Search Dropdown (Visible Only XS) -->
      <li class="nav-item dropdown no-arrow d-sm-none"> <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-search fa-fw"></i> </a>
        <div class="topbar-divider d-none d-sm-block"></div>
        
        <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow"> <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="mr-2 d-none d-lg-inline text-gray-600 small" style="font-size: 16px; "><?php echo $_SESSION['user'];?></span> <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg"> </a> 
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown"> <a class="dropdown-item" href="perfil.php"> <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Perfil </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../logout.php" > <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Cerrar sesión </a> </div>
      </li>
    </ul>
  </nav>
  <!-- End of Topbar -->
  <?php 
				include ("../conexion.php");
$obj= new conectar();
$conectar=$obj->conexion();
				
				//CUENTAS DE TOTALES
				//contar equipos de computo		
				$EC=mysqli_query($conectar,"SELECT COUNT(id_compu) FROM computadora");
				list( $Ecomputo ) = mysqli_fetch_row( $EC );
			    //contar equipos telefonicos
				$ET=mysqli_query($conectar,"SELECT COUNT(id_celular) FROM celular");
				list( $Etelefonicos ) = mysqli_fetch_row( $ET );
				//contar autos
				$CA=mysqli_query($conectar,"SELECT COUNT(id_autos) FROM autos where estatus=1 ");
				list( $autos ) = mysqli_fetch_row( $CA );
				//contar mobiliario
				$CS=mysqli_query($conectar,"SELECT COUNT(id_stock) FROM stock");
				list( $stock ) = mysqli_fetch_row( $CS );
				
				//CUENTAS DE dISPONIBLES
				//contar equipos de computo	
				$DC=mysqli_query($conectar,"SELECT COUNT(personal_id) FROM computadora ");
				list( $A1 ) = mysqli_fetch_row( $DC );
				$disponiblesC=$Ecomputo-$A1 ;
				//contar equipos telefonicos
				$DT=mysqli_query($conectar,"SELECT COUNT(id_celular) FROM celular WHERE disponible = 1 and activo = 1");
				list( $A2 ) = mysqli_fetch_row( $DT );
				//contar autos
				$DA=mysqli_query($conectar,"SELECT COUNT(personal_id_personal ) FROM autos ");
				list( $A3 ) = mysqli_fetch_row( $DA );
				$disponiblesA=$autos-$A3 ;
				//contar mobiliario
				$DS=mysqli_query($conectar,"SELECT COUNT(personal_id ) FROM stock");
				list( $A4 ) = mysqli_fetch_row( $DS );
				$disponiblesS=$stock-$A4 ;
				?>
  <style type="text/css">
            .tarjetas {
                font-size: 24px; color:#FFFFFF; font-family: 'Bebas Neue', cursive;
            }
        </style>
  <!-- Contenido de la pagina -->
  <div id="layoutSidenav_content">
    <main>
      <div class="container">
        <div class="row"> 
          <!-- Contenido de dasboard --> 
          <!-- Equipos de computo -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> EQUIPOS DE CÓMPUTO</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $Ecomputo ?></div>
                  </div>
                  <div class="col-auto"> <i class="fas fa-laptop  fa-2x text-gray-300"></i> </div>
                </div>
              </div>
            </div>
          </div>
          <!--  EQUIPOS DE TELEFÓNICOS -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> EQUIPOS TELEFÓNICOS</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $Etelefonicos ?></div>
                  </div>
                  <div class="col-auto"> <i class="fas fa-mobile   fa-2x text-gray-300"></i> </div>
                </div>
              </div>
            </div>
          </div>
          <!--  autos -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> AUTOMÓVILES</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $autos ?></div>
                  </div>
                  <div class="col-auto"> <i class="fas fa-car    fa-2x text-gray-300"></i> </div>
                </div>
              </div>
            </div>
          </div>
          <!--  mobiliario -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> MOBILIARIO</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stock ?></div>
                  </div>
                  <div class="col-auto"> <i class="fas fa-archive   fa-2x text-gray-300"></i> </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row"> 
          <!-- dISPONIBLES --> 
          <!-- Equipos de computo -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> EQUIPOS DE CÓMPUTO DISPONIBLES</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $disponiblesC ?></div>
                  </div>
                  <div class="col-auto"> <i class="fas fa-laptop  fa-2x text-gray-300"></i> </div>
                </div>
              </div>
            </div>
          </div>
          <!--  EQUIPOS DE TELEFÓNICOS -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> EQUIPOS TELEFÓNICOS DISPONIBLES</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $A2 ?></div>
                  </div>
                  <div class="col-auto"> <i class="fas fa-mobile   fa-2x text-gray-300"></i> </div>
                </div>
              </div>
            </div>
          </div>
          <!--  autos -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> AUTOMÓVILES DISPONIBLES</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $disponiblesA ?></div>
                  </div>
                  <div class="col-auto"> <i class="fas fa-car    fa-2x text-gray-300"></i> </div>
                </div>
              </div>
            </div>
          </div>
			<!--  mobiliario-->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> MOBILIARIO DISPONIBLE</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $disponiblesS ?></div>
                  </div>
                  <div class="col-auto"> <i class="fas fa-archive    fa-2x text-gray-300"></i> </div>
                </div>
              </div>
            </div>
          </div>
        </div>
		  <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-danger">EQUIPOS DE CÓMPUTO </h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="">
										<div class="chartjs-size-monitor">
										<div class="chartjs-size-monitor-expand">
											
											</div>
											<div class="chartjs-size-monitor-shrink">
												
											</div>
										</div>
                                        <canvas id="chart1"  ></canvas><?php
	
	
$sql = mysqli_query($conectar,"SELECT COUNT(id_compu) FROM computadora WHERE codigo LIKE '___01%' and activo=1"); // Consulta SQL
list( $inno ) = mysqli_fetch_row( $sql );

$sql1 = mysqli_query($conectar,"SELECT COUNT(id_compu) FROM computadora WHERE codigo LIKE '___02%' and activo=1"); // Consulta SQL
list( $sol ) = mysqli_fetch_row( $sql1 );

$sql2 = mysqli_query($conectar,"SELECT COUNT(id_compu) FROM computadora WHERE codigo LIKE '___03%' and activo=1"); // Consulta SQL
list( $beex ) = mysqli_fetch_row( $sql2 );

$sql3 = mysqli_query($conectar,"SELECT COUNT(id_compu) FROM computadora WHERE codigo LIKE '___0C%' and activo=1"); // Consulta SQL
list( $NA ) = mysqli_fetch_row( $sql3 );
	
	
	?>
										<script >
												
									
										// Bar Chart Example
										
			var ctx = document.getElementById("chart1");
var data = {
    labels: ["INNOVET", "SOLGISTIKA", "BE EX EN","Sin asignar"],
    datasets: [{
      label: "Equipos",
      backgroundColor: "#e74a3b",
      hoverBackgroundColor: "#c31f24",
      borderColor: "#e74a3b",
      data: [<?php echo $inno; ?>, <?php echo $sol; ?>,<?php echo $beex; ?>,<?php echo $NA; ?>,],
    }],
    };
var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    };
var chart1 = new Chart(ctx, {
    type: 'bar',
    data: data,
    options: options
});
										</script>
										
										
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        
			   <div class="col-xl-6 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">EQUIPOS TELEFÓNICOS</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="">
										<div class="chartjs-size-monitor">
										<div class="chartjs-size-monitor-expand">
											
											</div>
											<div class="chartjs-size-monitor-shrink">
												
											</div>
										</div>
                                        <canvas id="chart2"  ></canvas><?php
	
	
$sqlT = mysqli_query($conectar,"SELECT COUNT(id_celular) FROM celular WHERE codigo LIKE '___01%' and activo=1 "); // Consulta SQL
list( $inno2 ) = mysqli_fetch_row( $sqlT );

$sql1T = mysqli_query($conectar,"SELECT COUNT(id_celular) FROM celular WHERE codigo LIKE '___02%' and activo=1 "); // Consulta SQL
list( $sol2) = mysqli_fetch_row( $sql1T );

$sql2T = mysqli_query($conectar,"SELECT COUNT(id_celular) FROM celular WHERE codigo LIKE '___03%' and activo=1 "); // Consulta SQL
list( $beex2 ) = mysqli_fetch_row( $sql2T );

$sql3T = mysqli_query($conectar,"SELECT COUNT(id_celular) FROM celular WHERE codigo LIKE '___0C%' and activo=1 and disponible = 1 "); // Consulta SQL
list( $NA2 ) = mysqli_fetch_row( $sql3T );
	
	
	?>
										<script >
												
									
										// Bar Chart Example
										
			var ctx2 = document.getElementById("chart2");


var chart2 = new Chart(ctx2, {
    type: 'bar',
    data:  {
    labels: ["INNOVET", "SOLGISTIKA", "BE EX EN","Sin asignar"],
    datasets: [{
      label: "Equipos",
      backgroundColor: "#1cc88a",
      hoverBackgroundColor: "#009627",
      borderColor: "#1cc88a",
      data: [<?php echo $inno2; ?>, <?php echo $sol2; ?>,<?php echo $beex2; ?>,<?php echo $NA2; ?>,],
    }],
    },
    options: options
});
										</script>
										
										
                                    </div>
                                </div>
                            </div>
                        </div>
   <!-- Pie Chart -->
                        
			   <div class="col-xl-6 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">AUTOMÓVILES</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="">
										<div class="chartjs-size-monitor">
										<div class="chartjs-size-monitor-expand">
											
											</div>
											<div class="chartjs-size-monitor-shrink">
												
											</div>
										</div>
                                        <canvas id="chart3"  ></canvas><?php
	
	
$sqlA = mysqli_query($conectar,"SELECT COUNT(id_autos) FROM autos WHERE codigo LIKE '___01%' and activo=1 and estatus=1 "); // Consulta SQL
list( $inno3 ) = mysqli_fetch_row( $sqlA );

$sql1A = mysqli_query($conectar,"SELECT COUNT(id_autos) FROM autos WHERE codigo LIKE '___02%' and activo=1 and estatus=1  "); // Consulta SQL
list( $sol3) = mysqli_fetch_row( $sql1A );

$sql2A = mysqli_query($conectar,"SELECT COUNT(id_autos) FROM autos WHERE codigo LIKE '___03%' and activo=1 and estatus=1 "); // Consulta SQL
list( $beex3 ) = mysqli_fetch_row( $sql2A );

$sql3A = mysqli_query($conectar,"SELECT COUNT(id_autos) FROM autos WHERE codigo LIKE '___0T%' and activo=1  and estatus=1 "); // Consulta SQL
list( $NA3 ) = mysqli_fetch_row( $sql3A );
	
	
	?>
										<script >
												
									
										// Bar Chart Example
										
			var ctx3 = document.getElementById("chart3");


var chart3 = new Chart(ctx3, {
    type: 'bar',
    data:  {
    labels: ["INNOVET", "SOLGISTIKA", "BE EX EN","Sin asignar"],
    datasets: [{
      label: "Autos",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#0133d4",
      borderColor: "#4e73df",
      data: [<?php echo $inno3; ?>, <?php echo $sol3; ?>,<?php echo $beex3; ?>,<?php echo $NA3; ?>,],
    }],
    },
    options: options
});
										</script>
										
										
                                    </div>
                                </div>
                            </div>
                        </div>
			  <!-- Pie Chart -->
                        
			   <div class="col-xl-6 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">MOBILIARIO</h6>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="">
										<div class="chartjs-size-monitor">
										<div class="chartjs-size-monitor-expand">
											
											</div>
											<div class="chartjs-size-monitor-shrink">
												
											</div>
										</div>
                                        <canvas id="chart4"  ></canvas><?php
	
	
$sqlM = mysqli_query($conectar,"SELECT COUNT(id_stock) FROM stock WHERE codigo LIKE '___01%' and activo=1 "); // Consulta SQL
list( $inno4 ) = mysqli_fetch_row( $sqlM );

$sql1M = mysqli_query($conectar,"SELECT COUNT(id_stock) FROM stock WHERE codigo LIKE '___02%' and activo=1 "); // Consulta SQL
list( $sol4) = mysqli_fetch_row( $sql1M );

$sql2M = mysqli_query($conectar,"SELECT COUNT(id_stock) FROM stock WHERE codigo LIKE '___03%' and activo=1 "); // Consulta SQL
list( $beex4 ) = mysqli_fetch_row( $sql2M );

$sql3M = mysqli_query($conectar,"SELECT COUNT(id_stock) FROM stock WHERE codigo LIKE '___0M%' and activo=1 "); // Consulta SQL
list( $NA4 ) = mysqli_fetch_row( $sql3M );
	
	
	?>
										<script >
												
									
										// Bar Chart Example
										
			var ctx4 = document.getElementById("chart4");


var chart4 = new Chart(ctx4, {
    type: 'bar',
    data:  {
    labels: ["INNOVET", "SOLGISTIKA", "BE EX EN","Sin asignar"],
    datasets: [{
      label: "Mobiliario",
      backgroundColor: "#858796",
      hoverBackgroundColor: "#2c3036",
      borderColor: "#858796",
      data: [<?php echo $inno4; ?>, <?php echo $sol4; ?>,<?php echo $beex4; ?>,<?php echo $NA4; ?>,],
    }],
    },
    options: options
});
										</script>
										
										
                                    </div>
                                </div>
                            </div>
                        </div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script> 
<script src="../js/scripts.js"></script> 


<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> 
<script src="../js/datatables-simple-demo.js"></script> 

<!-- Bootstrap core JavaScript--> 
<script src="../vendor/jquery/jquery.min.js"></script> 
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 

<!-- Core plugin JavaScript--> 
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script> 

<!-- Custom scripts for all pages--> 
<script src="../js/sb-admin-2.min.js"></script> 



</body>
</html>