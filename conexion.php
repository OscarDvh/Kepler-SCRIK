<?php


		$mysqli = new MySQLi("localhost", "kepler","K3pl3r.2023","u520523721_kepler");
		if ($mysqli -> connect_errno) {
			die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
				. ") " . $mysqli -> mysqli_connect_error());
		}
		else
			//echo "Conexión exitossa!";

//	$link =mysqli_connect("localhost","root","T3rm0Form4d0");
//	if($link){
//		mysqli_select_db($link,"academ");
//	}
?>
<?php 
$bd="u520523721_kepler";
	class conectar{
		public function conexion(){
			$conexion=mysqli_connect('localhost','kepler','K3pl3r.2023','u520523721_kepler');
			return $conexion;
		}
	}


 ?>