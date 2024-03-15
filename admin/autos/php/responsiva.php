<?php 
session_start();
if (@!$_SESSION['email']) {
	echo '<script>alert("Inicie sesion para acceder")</script> ';
			echo "<script>location.href='/scrik/index.html '</script>";
	die();
}
require('../../../fpdf/fpdf.php');
require_once "../../../conexion.php";
date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, "spanish");
$DateDay = strftime(" %d ");  
$DateMon = strftime(" %m");  
$DateYear = strftime(" %Y ");  
                    $obj = new conectar();
                    $conexion = $obj->conexion();
$ideditar = $_GET[ 'id_data' ];
$sql = "SELECT autos.*,
CONCAT(personal.nombre,' ',personal.a_paterno,' ',personal.a_materno) AS nombre,
id_depar, id_depa,empresa_id_empresa AS no_empresa,
departamentos.nombre  AS departamentos,
				case empresa_id_empresa when 1 then 'INNOVET' 
					when 2 then 'SOLGISTIKA'  
						when 3 then 'BE EX EN' 
								END AS empresa_nombre
FROM `autos` 
left join personal on personal_id_personal = id_personal 
left join departamentos	on id_depar = id_depa
where id_autos=$ideditar  ";
mysqli_select_db( $conexion, $bd );
$query = mysqli_query( $conexion, $sql );
$resultado = mysqli_fetch_array( $query );
$no_vehiculo=$resultado['codigo'];
$nombre_empresa = $resultado ['empresa_nombre'];
$id_personal=$resultado['personal_id_personal'];
$empresa_query = mysqli_query($conexion, 'SELECT empresa_id_empresa FROM personal left join departamentos on id_depar = id_depa ' );
if ($empresa_query) {
    list($dep) = mysqli_fetch_row($empresa_query);
    switch ($dep) {
        case 1:
            $empresa = "KEPLER UI";
            break;
        case 2:
            $empresa = "KEPLER LAB";
            break;
        case 3:
            $empresa = "ACE ENGINEERING.";
            break;
        case 4:
            $empresa = "ENERGY TRAINING CENTER.";
            break;
        case 5:
            $empresa = "SOFTOIL.";
            break;
        case 6:
            $empresa = "PROYECTOS.";
            break;
        case 7:
            $empresa = "GRUPO KEPLER.";
            break;
          
        default:
            $empresa = "Empresa no encontrada";
            break;
    }
} else {
    $empresa = "Error al obtener la empresa";
}


$pdf = new FPDF();

$pdf->AddPage();

class pdf extends FPDF
{
   //Cabecera de página
   public function header()
   {
	   
 $this->SetFont('Arial','B',12);
       $this->Image('../../../img/abforti (2).jpg' ,10,1,30);
	   $this->Image('../../../img/SOLGISTIKA_Logotipo-01.jpg' ,215,1,17);
   $this->Image('../../../img/INNOVET_Logotipo-01.jpg' ,232,1,17);
   $this->Image('../../../img/Logo BE-ExEn.png' ,250,3,11);
}
	
}


$pdf = new pdf('L', 'mm', 'Letter');
$pdf->SetMargins(15, 12 );
$pdf->AddPage();
$pdf->SetAutoPageBreak(true,10); 
		  


$pdf->SetFont('Arial','B',15);
$pdf->SetFillColor(255, 255, 255);
$pdf->MultiCell(0,6,utf8_decode('Carta Responsiva - Asignación de Vehículo'),0,'C');

$pdf->Ln(0);
$pdf->Cell(190);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(15,10,utf8_decode('FECHA'),0,0,'C');
$pdf->Cell(2);
$pdf->Cell(13,5,utf8_decode($DateDay),0,0,'C');
$pdf->Cell(13,5,utf8_decode($DateMon),0,0,'C');
$pdf->Cell(13,5,utf8_decode($DateYear),0,0,'C');

$pdf->Ln(5);
$pdf->SetFont('Arial','',8);
$pdf->Cell(207);

$pdf->SetFillColor(190,204,213);
$pdf->Cell(13,5,utf8_decode('DÍA'),0,0,'C',1);
$pdf->Cell(13,5,utf8_decode('MES'),0,0,'C',1);
$pdf->Cell(13,5,utf8_decode('AÑO'),0,0,'C',1);

$pdf->Ln(10);
$pdf->Line(248,19,248,28);
$pdf->Line(222,19,222,28);
$pdf->Line(235,19,235,28);

$pdf->Ln(1);
$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(100,6,utf8_decode('RESPONSABLE DEL VEHÍCULO'),0,0,'C');
$pdf->Ln(5);
$pdf->SetFont('Arial','',8);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(50,6,'NOMBRE',0,0,'C',1);
$pdf->Cell(50,6,'DEPARTAMENTO',0,1,'C',1);
$pdf->SetFont('Arial','',7);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(50,6,utf8_decode($resultado['nombre']),0,0,'C');
$pdf->Cell(50,6,utf8_decode($resultado['departamentos']),0,1,'C');

$pdf->Ln(5);
$pdf->Line(68,39,68,51);

$pdf->Ln(1);
$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(100,6,utf8_decode('DATOS DEL VEHÍCULO'),0,0,'C');

$pdf->Ln(5);
$pdf->SetFont('Arial','',8);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(33,6,'MARCA',0,0,'C',1);
$pdf->Cell(33,6,'TIPO',0,0,'C',1);
$pdf->Cell(34,6,'MODELO',0,1,'C',1);
$pdf->SetFont('Arial','',7);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(33,6,utf8_decode($resultado['marca']),0,0,'C');
$pdf->Cell(33,6,utf8_decode($resultado['tipo']),0,0,'C');
$pdf->Cell(34,6,utf8_decode($resultado['modelo']),0,1,'C');

$pdf->SetFont('Arial','',8);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(33,6,'COLOR',0,0,'C',1);
$pdf->Cell(32,6,'PLACAS',0,0,'C',1);
$pdf->Cell(35,6,'NO.SERIE',0,1,'C',1);
$pdf->SetFont('Arial','',7);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(33,6,utf8_decode($resultado['color']),0,0,'C');
$pdf->Cell(32,6,utf8_decode($resultado['placas']),0,0,'C');
$pdf->Cell(35,6,utf8_decode($resultado['vin']),0,1,'C');

$pdf->Ln(5);


$pdf->Ln(1);
$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(100,6,utf8_decode('DOCUMENTACIÓN DEL RESPONSABLE'),0,0,'C');

$pdf->Ln(5);
$pdf->SetFont('Arial','',8);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(40,6,'INE',0,0,'R',1);
$pdf->Cell(30,6,'O SI',0,0,'C',1);
$pdf->Cell(30,6,'O NO',0,1,'C',1);
$pdf->SetFillColor(255, 255, 255);

$pdf->Cell(40,6,'LICENCIA DE CONDUCIR',0,0,'R',1);
$pdf->Cell(30,6,'O SI',0,0,'C',1);
$pdf->Cell(30,6,'O NO',0,1,'C',1);

$pdf->Ln(5);
$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(100,6,utf8_decode('DOCUMENTACIÓN ENTREGADA AL RESPONSABLE'),0,0,'C');

$pdf->Ln(5);
$pdf->SetFont('Arial','',8);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(40,6,'CARTA RESPONSIVA',0,0,'R',1);
$pdf->Cell(30,6,'O SI',0,0,'C',1);
$pdf->Cell(30,6,'O NO',0,1,'C',1);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(40,6,'POLITICAS DE USO',0,0,'R',1);
$pdf->Cell(30,6,'O SI',0,0,'C',1);
$pdf->Cell(30,6,'O NO',0,1,'C',1);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(40,6,'POLIZA DE SEGURO',0,0,'R',1);
$pdf->Cell(30,6,'O SI',0,0,'C',1);
$pdf->Cell(30,6,'O NO',0,1,'C',1);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(40,6,utf8_decode('TARJETA DE CIRCULACIÓN'),0,0,'R',1);
$pdf->Cell(30,6,'O SI',0,0,'C',1);
$pdf->Cell(30,6,'O NO',0,1,'C',1);

$pdf->Ln(5);
$pdf->Line(85,119,85,143);

$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(100,6,utf8_decode('ESTADO DE PINTURA DEL VEHÍCULO'),0,0,'C');

$pdf->Ln(5);
$pdf->SetFont('Arial','',8);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(25,6,'O',0,0,'C',1);
$pdf->Cell(25,6,'O',0,0,'C',1);
$pdf->Cell(25,6,'O',0,0,'C',1);
$pdf->Cell(25,6,'O',0,1,'C',1);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(25,6,'NUEVO',0,0,'C',1);
$pdf->Cell(25,6,'BUENO',0,0,'C',1);
$pdf->Cell(25,6,'REGULAR',0,0,'C',1);
$pdf->Cell(25,6,'MALO',0,1,'C',1);

$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(100,6,utf8_decode('ESTADO DE LA CARROCERIA DEL VEHÍCULO'),0,0,'C');
$pdf->Ln(5);
$pdf->SetFont('Arial','',8);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(25,6,'O',0,0,'C',1);
$pdf->Cell(25,6,'O',0,0,'C',1);
$pdf->Cell(25,6,'O',0,0,'C',1);
$pdf->Cell(25,6,'O',0,1,'C',1);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(25,6,'NUEVO',0,0,'C',1);
$pdf->Cell(25,6,'BUENO',0,0,'C',1);
$pdf->Cell(25,6,'REGULAR',0,0,'C',1);
$pdf->Cell(25,6,'MALO',0,1,'C',1);

$pdf->SetFont('Arial','B',8);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(100,6,utf8_decode('ESTADO GENERAL DEL VEHÍCULO'),0,0,'C');
$pdf->Ln(5);
$pdf->SetFont('Arial','',8);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(25,6,'O',0,0,'C',1);
$pdf->Cell(25,6,'O',0,0,'C',1);
$pdf->Cell(25,6,'O',0,0,'C',1);
$pdf->Cell(25,6,'O',0,1,'C',1);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(25,6,'NUEVO',0,0,'C',1);
$pdf->Cell(25,6,'BUENO',0,0,'C',1);
$pdf->Cell(25,6,'REGULAR',0,0,'C',1);
$pdf->Cell(25,6,'MALO',0,1,'C',1);

$pdf->SetXY(170, 40);

$pdf->SetFont('Arial','B',10);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(40,6,utf8_decode('Kilometraje de salida'),0,0,'C');
$pdf->Cell(45,6,'',1,1,'C');

$pdf->Ln(2);
$pdf->SetX(130);
$pdf->Cell(0,6,utf8_decode('INVENTARIO DEL AUTOMOVIL'),0,0,'C');

$pdf->Ln(8);
$pdf->SetX(125);
$pdf->SetFont('Arial','',5);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(26,3,'',0,0,'C',1);
$pdf->Cell(14,3,'EXTERIORES',0,1,'C',1);

$pdf->SetX(125);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(26,3,'',0,0,'C',1);
$pdf->Cell(7,3,'SI',0,0,'C',1);
$pdf->Cell(7,3,'NO',0,1,'C',1);

$pdf->SetX(125);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(26,3,'UNIDAD DE LUCES',0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(125);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(26,3,utf8_decode('¼ LUCES'),0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(125);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(26,3,'ANTENA',0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(125);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(26,3,utf8_decode('ESPEJO LATERAL'),0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(125);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(26,3,'CRISTALES',0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(125);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(26,3,utf8_decode('EMBLEMA'),0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(125);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(26,3,'LLANTAS (4)',0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(125);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(26,3,utf8_decode('TAPON DE RUEDAS (4)'),0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(125);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(26,3,'MOLDURAS COMPLETAS',0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(125);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(26,3,utf8_decode('TAPON DE GASOLINA'),0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(125);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(26,3,'CARROCERIA SIN GOLPES',0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(125);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(26,3,utf8_decode('BOCINAS DE CLAXON'),0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(125);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(26,3,'LIMPIADORES',0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->Line(158,59,158,101);

$pdf->Ln(5);
$pdf->SetXY(165,56);

$pdf->SetFont('Arial','',5);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(26,3,'',0,0,'C',1);
$pdf->Cell(14,3,'COMPONENTES MECANICOS',0,1,'C',1);

$pdf->SetX(171);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(26,3,'',0,0,'C',1);
$pdf->Cell(7,3,'SI',0,0,'C',1);
$pdf->Cell(7,3,'NO',0,1,'C',1);

$pdf->SetX(171);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(26,3,'CLAXON',0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(171);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(26,3,utf8_decode('TAPON DE ACEITE'),0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(171);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(26,3,'TAPON DE RADIADOR',0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(171);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(26,3,utf8_decode('VARILLA DE ACEITE'),0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(171);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(26,3,'FILTRO DE AIRE',0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);
$pdf->SetX(171);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(26,3,utf8_decode('BATERIA (MCA)'),0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetXY(171,85);

$pdf->SetFont('Arial','',5);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(26,3,'',0,0,'C',1);
$pdf->Cell(14,3,'ACCESORIOS',0,1,'C',1);

$pdf->SetX(171);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(26,3,'',0,0,'C',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(171);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(26,3,'GATO',0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(171);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(26,3,utf8_decode('MANERAL DE GATO'),0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(171);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(26,3,'LLAVE DE RUEDAS/DE CRUZ',0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(171);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(26,3,utf8_decode('ESTUCHE DE HERRAMIENTAS'),0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(171);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(26,3,'TRIANGULO DE SEGURIDAD',0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(171);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(26,3,utf8_decode('LLANTA DE REFACCIÓN'),0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->Line(204,59,204,80);
$pdf->Line(204,88,204,109);

$pdf->Ln(5);
$pdf->SetXY(215,56);

$pdf->SetFont('Arial','',5);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(30,3,'',0,0,'C',1);
$pdf->Cell(14,3,'INTERIORES',0,1,'C',1);

$pdf->SetX(215);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(30,3,'',0,0,'C',1);
$pdf->Cell(7,3,'SI',0,0,'C',1);
$pdf->Cell(7,3,'NO',0,1,'C',1);

$pdf->SetX(215);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(30,3,'INSTRUMENTOS DE TABLERO',0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);


$pdf->SetX(215);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(30,3,utf8_decode('CALEFACCIÓN'),0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(215);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(30,3,'RADIO/TIPO',0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);


$pdf->SetX(215);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(30,3,utf8_decode('BOCINAS'),0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(215);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(30,3,'ENCENDEDOR',0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(215);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(30,3,utf8_decode('RETROVISOR'),0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(215);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(30,3,'CENICEROS',0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(215);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(30,3,utf8_decode('CINTURONES'),0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(215);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(26,3,'BOTONES DE INTERIORES',0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(215);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(30,3,utf8_decode('MANIJAS DE INTERIORES'),0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(215);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(30,3,utf8_decode('TAPETES'),0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(215);
$pdf->SetFillColor(190,204,213);
$pdf->Cell(30,3,'VESTIDURAS',0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->SetX(215);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(30,3,utf8_decode('GUANTERA'),0,0,'L',1);
$pdf->Cell(14,3,'',0,1,'C',1);

$pdf->Line(252,59,252,100);

$pdf->Ln(5);
$pdf->SetXY(120, 112);
$pdf->SetFont('Arial','',7);


$pdf->MultiCell(140,3,utf8_decode('Por medio de la presente se hace constar que el usuario recibe de '.$empresa.' ('.$resultado['empresa_nombre'].') como parte del equipo de trabajo el vehículo descrito en la presente carta responsiva por medio de la cual se obliga a devolver dicho vehículo cuando lo solicite ('.$resultado['empresa_nombre'].') o cuando termine la relación laboral. El vehículo, así como el equipo, accesorios, documentos e instructivos, fueron entregados de acuerdo con el presente inventario del vehículo.
El usuario se responsabiliza de su buen uso, y está enterado y de acuerdo que el vehículo es primordialmente para las funciones propias del empleo, cuya regulación queda establecida en el documento "Políticas y Condiciones para Uso de Vehículos Utilitarios", el cual también ha firmado de conformidad y se anexa a éste.
La dirección que se indica en este documento es el lugar donde se guardará el vehículo, y el usuario confirma que dicho domicilio cumple con la seguridad necesaria para el resguardo de la unidad, así mismo se compromete a informar de manera inmediata en caso de existir algún cambio de domicilio del lugar de resguardo.
'),0,'J');

$pdf->Ln(5);
$pdf->SetXY(120, 152);

$pdf->SetFont('Arial','B',7);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(30,3,utf8_decode('OBSERVACIONES:'),0,1,'L',1);
$pdf->Ln(1);
$pdf->SetX(120);
$pdf->SetFillColor(190,204,213);
$pdf->MultiCell(55,4,utf8_decode('El usuario acepta de manera voluntaria la responsabilidad del resguardo del vehículo'),0,'C',1);
$pdf->SetXY(175,156);
$pdf->Cell(42,8,'SI',0,0,'C',1);
$pdf->Cell(42,8,'NO',0,1,'C',1);

$pdf->SetXY(120, 190);
$pdf->SetFont('Arial','',5);
$pdf->SetFillColor(255, 255, 255);
$pdf->Cell(47,3,utf8_decode('USUARIO NOMBRE Y FIRMA'),0,0,'C',1);
$pdf->Cell(47,3,utf8_decode('JOSE ANGEL JIMENEZ PINEDA'),0,0,'C',1);
$pdf->Cell(47,3,utf8_decode('DEPARTAMENTO DE CONTROL'),0,1,'C',1);

$pdf->SetX(120);
$pdf->Cell(47,3,utf8_decode(''),0,0,'C',1);
$pdf->Cell(47,3,utf8_decode('DIRECTOR GENERAL'),0,0,'C',1);
$pdf->Cell(47,3,utf8_decode('RESPONSABLE DE ASIGNACIÓN DE VEHÍCULOS'),0,1,'C',1);

$pdf->Line(125,190,162,190);
$pdf->Line(172,190,207,190);
$pdf->Line(215,190,260,190);

$nombrepdf="Responsiva_".$no_vehiculo.".pdf";
// output file
$pdf->Output('', $nombrepdf);
?>














































