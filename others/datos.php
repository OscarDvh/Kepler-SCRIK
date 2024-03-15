<?php

require_once "../conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();
$elegido= $_POST["elegido"];
$html = "";
if ($_POST["elegido"]==0) {
	$html = '
	  <option name="empresa" id="empresa" value="">Seleccione una empresa</option>
	  
	';	
}if ($_POST["elegido"]>=1) {
	
	$sql="SELECT `id_depa`, `nombre`, `empresa_id_empresa` FROM `departamentos` where empresa_id_empresa = $elegido
";
$result=mysqli_query($conexion,$sql);
					  
					  while ($mostrar=mysqli_fetch_array($result)) {
				
				print '
                                                                                
                                             <option  name="departamento" id="departamento" value="'.$mostrar["id_depa"].'">'.$mostrar["nombre"].'</option>
                                ';
		}
}

echo $html;	
?>

    