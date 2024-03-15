   <?php
session_start();
require( "conexion.php" );
date_default_timezone_set('America/Mexico_City');
$DateAndTime = date('m-d-Y h:i:s a', time());  
$username = $_POST[ 'username' ];
$pass = $_POST[ 'passwor' ];

$sql = mysqli_query( $mysqli, "SELECT * FROM usuarios WHERE email='$username' and password='$pass' " );
if ( $validar = mysqli_fetch_assoc( $sql ) ) {
    $_SESSION[ 'id' ] = $validar[ 'id_usuarios' ];
    $_SESSION[ 'user' ] = $validar[ 'nombre' ];
    $_SESSION[ 'email' ] = $validar[ 'email' ];
    $_SESSION[ 'rol' ] = $validar[ 'tipo' ];
    $name=$validar[ 'nombre' ];
 mysqli_query($mysqli,"INSERT INTO `login`(`id_login`, `user`, `date`) VALUES (null,'$name','$DateAndTime');");
    $tipo = $validar[ 'tipo' ];
    switch ( $tipo ) {
        case 1:
            echo "<script>location.href='admin/'</script>";
            break;
        case 2:
            echo "<script>location.href='usuario2/'</script>";
            break;
        case 3:
            echo "<script>location.href='usuario3/'</script>";
            break;
        case 4:
            echo "<script>location.href='usuario4/'</script>";
            break;
    }
} else {
    echo '<script>alert("Error usuario o contraseña incorrectos")</script> ';
    echo "<script>window.history.go(-1)</script>";
}
?>