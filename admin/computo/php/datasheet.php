<?php
 
session_start();
if (@!$_SESSION['email']) {
	echo '<script>alert("Inicie sesion para acceder")</script> ';
			echo "<script>location.href='/scrik/index.html '</script>";
	die();
}
require('../../../fpdf/force_justify.php');
require_once "../../../conexion.php";
date_default_timezone_set('America/Mexico_City');
setlocale(LC_TIME, "spanish");
$DateAndTime = strftime("%d de %B del %Y");  
                    $obj = new conectar();
                    $conexion = $obj->conexion();
$ideditar = $_GET[ 'id_data' ];
$sql = "SELECT computadora.*,CONCAT(personal.nombre,' ',personal.a_paterno,' ',personal.a_materno) AS nombre,
propietarios.nombre AS propietario,case tipo when 1 then 'Escritorio' when 2 then 'Laptop'  when 3 then 'Otro' END AS tipol,
case estado when 1 then 'Nuevo' when 2 then 'Usado' when 3 then 'Con fallas' when 4 then 'Inservible' END AS est
FROM `computadora` 
left join personal on personal_id = id_personal 
left join propietarios on computadora.id_propietario = propietarios.id_propietario 
where id_compu=$ideditar  ";
mysqli_select_db( $conexion, $bd );
$query = mysqli_query( $conexion, $sql );
$resultado = mysqli_fetch_array( $query );

$id_personal=$resultado['personal_id'];
$empresa = mysqli_query( $conexion, "SELECT `empresa_id_empresa` FROM personal left join departamentos on id_depar = id_depa where id_personal=$id_personal" );
    list( $dep ) = mysqli_fetch_row( $empresa );

  switch ( $dep  ) {
        case 1:
            $emp="INNOVACION EN TERMOFORMADO S.A. DE C.V.";
            break;
        case 2:
          $emp="SOLGISTIKA S.A. DE C.V.";
            break;
        case 3:
            $emp="BE EXCELLENT ENERGY S.A. DE C.V.";
            break;
       
    }

$pdf = new FPDF('P', 'mm', 'Letter');
$pdf->SetMargins(30, 25 , 30);
$pdf->AddPage('PORTRAIT','letter');
$pdf->SetAutoPageBreak(true,25); 
class doc extends FPDF
{
   //Cabecera de página
   public function header()
   {
	   
      $this->Image('../../../img/LOGOS_byn/AB FORTI_Logotipo-15.jpg',10,-15,62);
	   $this->SetFont('Arial','B',12);
}
	function Footer()
   {
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
   $this->Image('../../../img/LOGOS_byn/INNOVET_Logotipo-09.jpg' ,118,270,25);
   $this->Image('../../../img/LOGOS_byn/SOLGISTIKA_Logotipo-09.jpg' ,140,270,25);
   $this->Image('../../../img/LOGOS_byn/BE-EX-EN.jpg' ,165,274,15);
   }
	protected $B = 0;
protected $I = 0;
protected $U = 0;
protected $HREF = '';

function WriteHTML($html)
{
    // Intérprete de HTML
    $html = str_replace("\n",' ',$html);
    $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            // Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            else
                $this->Write(5,$e,'FJ');
        }
        else
        {
            // Etiqueta
            if($e[0]=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                // Extraer atributos
                $a2 = explode(' ',$e);
                $tag = strtoupper(array_shift($a2));
                $attr = array();
                foreach($a2 as $v)
                {
                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                        $attr[strtoupper($a3[1])] = $a3[2];
                }
                $this->OpenTag($tag,$attr);
            }
        }
    }
}

function OpenTag($tag, $attr)
{
    // Etiqueta de apertura
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,true);
    if($tag=='A')
        $this->HREF = $attr['HREF'];
    if($tag=='BR')
        $this->Ln(5);
}

function CloseTag($tag)
{
    // Etiqueta de cierre
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF = '';
}

function SetStyle($tag, $enable)
{
    // Modificar estilo y escoger la fuente correspondiente
    $this->$tag += ($enable ? 1 : -1);
    $style = '';
    foreach(array('B', 'I', 'U') as $s)
    {
        if($this->$s>0)
            $style .= $s;
    }
    $this->SetFont('',$style);
}

function PutLink($URL, $txt)
{
    // Escribir un hiper-enlace
    $this->SetTextColor(0,0,255);
    $this->SetStyle('U',true);
    $this->Write(5,$txt,$URL);
    $this->SetStyle('U',false);
    $this->SetTextColor(0);
}

}

$pdf = new doc();
$pdf->AddPage();

$pdf->Ln(3);
$pdf->Cell(100);

$pdf->Cell(40,10,utf8_decode('RECEPCIÓN Y RESPONSIVA DE EQUIPO DE CÓMPUTO'),0,1,'C');
$pdf->Cell(116);
$pdf->SetFont('Arial','',11);
$pdf->Cell(40,10,utf8_decode($DateAndTime.', el Marqués, Querétaro.'),0,1,'C');
$pdf->SetX(24);

$pdf->SetFont('Arial','',11);
$pdf->SetRightMargin(20);
$pdf->SetLeftMargin(24);

$pdf->MultiCell(163,5,utf8_decode('Por medio de la presente, el Área de Informática y Comunicaciones perteneciente a la persona moral '.$emp.', hace entrega de un equipo de cómputo como concepto de "Herramienta de Trabajo" a efecto de que el(la) trabajador(a) que suscribe pueda desempeñar correctamente todas y cada una de las actividades laborales que le corresponden al puesto contratado, cuyas características se describen a continuación:'),0,'J');
/*
$pdf->SetFont('Arial','',11);
$pdf->MultiCell(163,5,utf8_decode('Por medio de la presente, el Área de Informática y Comunicaciones perteneciente a la persona moral INNOVACION EN TERMOFORMADO S.A. DE C.V., hace entrega de un equipo de cómputo como concepto de "Herramienta de Trabajo" a efecto de que el(la) trabajador(a) que suscribe pueda desempeñar correctamente todas y cada una de las actividades laborales que le corresponden al puesto contratado, cuyas características se describen a continuación:'), 0,'J');*/

$pdf->Ln(10);

$pdf->SetY(65);$pdf->SetX(25);
$pdf->SetFont('Arial','',8);
$pdf->SetFillColor(190, 204, 213);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(32,6,'TIPO DE EQUIPO',1,0,'C',1);
$pdf->Cell(32,6,'MARCA',1,0,'C',1);
$pdf->Cell(32,6,'MODELO',1,0,'C',1);
$pdf->Cell(32,6,'RAM',1,0,'C',1);
$pdf->Cell(32,6,'DISCO DURO',1,0,'C',1);
$pdf->Ln(6);
$pdf->SetX(25);
$pdf->Cell(32,6,utf8_decode($resultado['tipol']),1,0,'C');
$pdf->Cell(32,6,utf8_decode($resultado['marca']),1,0,'C');
$pdf->Cell(32,6,utf8_decode($resultado['modelo']),1,0,'C');
$pdf->Cell(32,6,utf8_decode($resultado['ram']),1,0,'C');
$pdf->Cell(32,6,utf8_decode($resultado['almacenamiento']),1,0,'C');

$pdf->Ln(6);
$pdf->SetX(25);
$pdf->SetFont('Arial','',8);
$pdf->SetFillColor(190, 204, 213);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(32,6,'PROCESADOR',1,0,'C',1);
$pdf->Cell(32,6,'COLOR',1,0,'C',1);
$pdf->Cell(32,6,'NUMERO DE SERIE',1,0,'C',1);
$pdf->Cell(32,6,'CARGADOR',1,0,'C',1);
$pdf->Cell(32,6,'ESTADO',1,0,'C',1);
$pdf->Ln(6);
$pdf->SetX(25);
$pdf->Cell(32,6,utf8_decode($resultado['cpu']),1,0,'C');
$pdf->Cell(32,6,utf8_decode($resultado['color']),1,0,'C');
$pdf->Cell(32,6,utf8_decode($resultado['no_serie']),1,0,'C');
$pdf->Cell(32,6,utf8_decode($resultado['cargador']),1,0,'C');
$pdf->Cell(32,6,utf8_decode($resultado['est']),1,0,'C');

$pdf->Ln(6);
$pdf->SetX(25);
$pdf->SetFont('Arial','',8);
$pdf->SetFillColor(190, 204, 213);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(32,6,'OFFICE',1,0,'C',1);
$pdf->Cell(32,6,'ANTIVIRUS',1,0,'C',1);
$pdf->Cell(32,6,'SISTEMA OPERATIVO',1,0,'C',1);
$pdf->Cell(64,6,'SOFTWARE ADICIONAL',1,0,'C',1);

 $so= mysqli_query( $conexion,"SELECT id_licencias,nombre_licencias FROM licencias LEFT JOIN computadora_has_licencias ON id_licencias = licencias_id_licencias LEFT JOIN computadora ON computadora_id_compu = id_compu where computadora_has_licencias.computadora_id_compu = $ideditar and licencias.tipo =3" );
					  $sistema = mysqli_fetch_array( $so );
					  
					   if(empty($sistema)){
						  $sistema['nombre_licencias']="";
					  }
  $anti= mysqli_query( $conexion,"SELECT nombre_licencias FROM licencias LEFT JOIN computadora_has_licencias ON id_licencias = licencias_id_licencias LEFT JOIN computadora ON computadora_id_compu = id_compu where computadora_has_licencias.computadora_id_compu = $ideditar and licencias.tipo =1" );
					  $antiviruz = mysqli_fetch_array( $anti );
					   if(empty($antiviruz)){
						  $antiviruz['nombre_licencias']="";
					  }

$pdf->Ln(6);
$pdf->SetX(25);
$pdf->Cell(32,6,utf8_decode('OFFICE 365'),1,0,'C');
$pdf->SetFont('Arial','',7);
$pdf->Cell(32,6,utf8_decode( $antiviruz['nombre_licencias']),1,0,'C');
$pdf->SetFont('Arial','',8);
$pdf->Cell(32,6,utf8_decode($sistema['nombre_licencias']),1,0,'C');
$pdf->Cell(64,6,utf8_decode($resultado['adicional']),1,0,'C');


$pdf->Ln(6);
$pdf->SetX(25);
$pdf->SetFont('Arial','',8);
$pdf->SetFillColor(190, 204, 213);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(160,6,'OBSERVACIONES Y COMENTARIOS',1,0,'C',1);
$pdf->Ln(6);
$pdf->SetX(25);
$pdf->MultiCell(160,5,utf8_decode($resultado['observaciones']),1,'C');



$pdf->SetX(25);
$pdf->SetFont('Arial','',8);
$pdf->SetFillColor(190, 204, 213);
$pdf->SetTextColor(0, 0, 0);
$y=$pdf->GetY();
$pdf->MultiCell(80,4,utf8_decode('¿SE AUTORIZA LA SALIDA DEL EQUIPO DE CÓMPUTO FUERA DE LAS INSTALACIÓNES?'),1,'C',1);



$pdf->SetY($y);
$pdf->SetX(105);
$pdf->Cell(12,8,'',1,0,'C');
$pdf->SetFont('Arial','',4.5);
$pdf->SetFillColor(190, 204, 213);
$pdf->SetTextColor(0, 0, 0);
$pdf->MultiCell(68,4,utf8_decode('*EN CASO DE INDICAR "SI", EL(LA) COLABORADOR(A) PAGARÁ EL 50% DEL COSTO DE REPOSICIÓN EN CASO DE ROBO O EXTRAVÍO'),1,'C',1);

$pdf->Ln(6);
$pdf->SetFont('Arial','',11);
$y2=$pdf->GetY();
$pdf->MultiCell(163,5,utf8_decode('Herramienta que, desde el momento de la entrega, el(la) trabajador(a) ha inspeccionado y lo recibe en buen estado de funcionamiento y buen estado general, por lo que desde este momento se hace responsable del correcto uso que se haga del mismo, privilegiando el cumplimiento de sus responsabilidades en la empresa, así como de cualquier avería que sufra este dispositivo, a consecuencia de falta de notificación de su parte. De igual manera, será su responsabilidad el buen o mal uso que se haga con el mismo, autorizando que la empresa '.$emp.' realice el descuento correspondiente al daño por avería, extravío, por la comisión de delitos de abuso de confianza y/o fraude genérico, así como los derivados de cualquier mal uso que se efectúe.'),0,'J');

$pdf->Ln(5);
$pdf->SetFont('Arial','',11);
$pdf->SetY($y2+48);
$pdf->MultiCell(163,5,utf8_decode('Es del conocimiento y conformidad del(la) trabajador(a) que '.$emp.' podrá disponer del equipo de cómputo, así como de sus accesorios a que se refiere la presente en el momento que así convenga a sus intereses, ya sea para una nueva asignación, reasignación, baja del(la) trabajador(a) en la empresa o por el cambio de las funciones que el suscrito tiene que desarrollar y/o desempeñar.'),0,'J');

$pdf->Ln(3);
$pdf->SetFont('Arial','',11);
$y2=$pdf->GetY();
$pdf->MultiCell(163,5,utf8_decode('Habiendo leído y estando de acuerdo con el contenido y consecuencias legales de la presente carta responsiva de asignación del equipo de cómputo y sus accesorios, firma el(la) trabajador(a) la presente.'),0,'J');

$pdf->SetY($y2+18);
$pdf->SetFont('Arial','',10);
$y3=$y2+38;
$pdf->Cell(81,5,utf8_decode('RECIBE DE CONFORMIDAD'),0,0,'C');
$pdf->Cell(78,5,utf8_decode('ENTREGA'),0,0,'C');
$pdf->Line(35,$y3,95,$y3);
$pdf->Line(115,$y3,175,$y3);
$pdf->Ln(1);
$pdf->SetY($y2+40);
$pdf->Cell(81,5,utf8_decode($resultado['nombre']),0,0,'C');
$pdf->Cell(81,5,utf8_decode('DIEGO CAMACHO MARTINEZ'),0,0,'C');

$nombrepdf="RESPONSIVA_".utf8_decode($resultado['nombre'])."_".$resultado['codigo'].".pdf";
// output file
$pdf->Output('', $nombrepdf);
?>