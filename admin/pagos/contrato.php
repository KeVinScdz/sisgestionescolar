<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 * @group header
 * @group footer
 * @group page
 * @group pdf
 */

// Include the main TCPDF library (search for installation path).

$id_estudiante = $_GET['id'];
include('../../app/config.php');
require_once('../../public/TCPDF-main/tcpdf.php');

include('../../app/controllers/configuraciones/institucion/listado_de_instituciones.php');
include('../../app/controllers/estudiantes/datos_del_estudiante.php');

//////////////////////////////Datos de la institucion

foreach ($instituciones as $institucione){
    $nombre_institucion = $institucione['nombre_institucion'];
    $direccion = $institucione['direccion'];
    $telefono = $institucione['telefono'];
    $celular = $institucione['celular'];
    $correo = $institucione['correo'];
    $logo = $institucione['logo'];
}

//////////////////////////////Datos de la institucion



// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(216,280), true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor(APP_NAME);
$pdf->setTitle(APP_NAME);
$pdf->setSubject(APP_NAME);
$pdf->setKeywords(APP_NAME);

// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(10, 3, 10);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

$pdf->setPrintHeader(false);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->setFont('Times', '', 11);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
//$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));


$style = array(
    'border' => 0,
    'vpadding' => '3',
    'hpadding' => '3',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);

$QR ='Este contrato es verificado por el sistema de inscripcion de la Unidad Eduactiva '.$nombre_institucion.',
por El/la señor(a) '.$nombres_apellidos_ppff.' con C.I.: Nro '.$ci_ppf.' habil por derecho en '.$fechaHora.'';
$pdf->write2DBarcode($QR, 'QRCODE,L', 175, 10, 30, 30, $style);


// Set some content to print
$html = '

<table border="0">
<tr>
    <td width="150px" style="text-align: center"><img src="../../public/images/configuracion/'.$logo.'" width="100px" alt=""></td>
    <td width="400px"></td>
</tr>
<tr>
    <td style="text-align: center">
        <b>'.$nombre_institucion.'</b> <br>
        <small>'.$direccion.'</small> <br>
        <small>'.$telefono.' '.$celular.'</small>
    </td>
        <td style="text-align: center"><h2><b><u>CONTRATO DE MATRÍCULA ESCOLAR PARA ESTUDIANTE DE '.$nivel.'</u></b></h2></td>

</tr>


</table>

<p style="text-align: justify">

<b>Partes Contratantes:</b> 

Institucion '.$nombre_institucion.', en adelante denominado "La Institución Educativa", representado por <b style="color: blue">Lic.rector_colegio</b>,
con domicilio en Avenida del rector. Padres/Tutores legales del estudiante <b style="color: blue">'.$apellidos.' '.$nombres.'</b>, 
en adelante denominado "El Estudiante",
representados por <b style="color: blue">'.$nombres_apellidos_ppff.'</b>, con domicilio en <b style="color: blue">'.$direccion.'</b>.
<br><br>
<b>Términos y Condiciones:</b>

Matrícula: Los Padres/Tutores legales matriculan al Estudiante en La Institución Educativa para el año escolar <b style="color: blue">'.$curso.'</b>.

<br><br>

<b>Compromisos del Estudiante:</b> El Estudiante se compromete a asistir puntualmente a clases, participar activamente en las actividades escolares y seguir las normas y reglamentos
establecidos por La Institución Educativa.
<br><br>
<b>Compromisos de los Padres/Tutores:</b> Los Padres/Tutores se comprometen a apoyar activamente la educación del Estudiante, mantener una comunicación regular con los maestros
y cumplir con las obligaciones financieras relacionadas con la matrícula y las tarifas escolares.
<br><br>
<b>Duración del Contrato:</b> Este contrato tiene una duración de un año escolar y se renovará automáticamente para cada año escolar subsiguiente,
a menos que cualquiera de las partes notifique lo contrario con al menos 10 días de antelación al inicio del nuevo año escolar.
<br><br>
<b>Terminación del Contrato:</b> La Institución Educativa se reserva el derecho de rescindir este contrato si el Estudiante o los Padres/Tutores no cumplen 
con las normas y reglamentos internos.
<br><br>
<br><br>
<br><br>
<b>Firmas:</b>
<br><br>

<table border="0">
<tr>
    <td style="text-align: center">
      __________________________<br>
      <b>La Institución Educativa</b> <br>
Lic.rector_colegio
    </td>
    <td style="text-align: center">
      __________________________<br>
      <b>Padres/Tutores</b> <br>
    '.$nombres_apellidos_ppff.'
    </td>
</tr>
</table>
<br><br><br><br><br><br>
  
  
Fecha: '.$dia_actual.' de '.$mes_actual.' de '.$ano_actual.'
</p>
';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
