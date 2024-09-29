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

$id_pago = $_GET['id'];
$id_estudiante = $_GET['id_estudiante'];
    
include('../../app/config.php');
require_once('../../public/TCPDF-main/tcpdf.php');

include('../../app/controllers/configuraciones/institucion/listado_de_instituciones.php');
include('../../app/controllers/estudiantes/datos_del_estudiante.php');
include('../../app/controllers/pagos/datos_pago_estudiante.php');

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

/////////////////////////////Datos del pago del estudiante
foreach($pagos as $pago){
    $mes_pagado = $pago['mes_pagado'];
    $monto_pagado = $pago['monto_pagado'];
    $fecha_pagado = $pago['fecha_pagado'];
}



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
$pdf->setPrintFooter(false);

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

$QR ='Este recibo de caja es verificado por el sistema de pago de la Unidad Eduactiva '.$nombre_institucion.',
por el pago del mes de '.$mes_pagado.' por la suma de '.$monto_pagado.' en '.$fechaHora.'';
$pdf->write2DBarcode($QR, 'QRCODE,L', 175, 40, 30, 30, $style);

$QR2 ='Este recibo de caja es verificado por el sistema de pago de la Unidad Eduactiva '.$nombre_institucion.',
por el pago del mes de '.$mes_pagado.' por la suma de '.$monto_pagado.' en '.$fechaHora.'';
$pdf->write2DBarcode($QR2, 'QRCODE,L', 175, 175, 30, 30, $style);


// Set some content to print
$html = '

<table border="0">
<tr>
    <td width="150px" style="text-align: center"><img src="../../public/images/configuracion/'.$logo.'" width="100px" alt=""></td>
    <td width="400px"></td>
    <td width="160px">
    <p>
        <b>Nro: </b>'.$id_pago.'<br>
        <b>Fecha:</b> '.$fecha_pagado.'
    </p>
    </td>
</tr>
<tr>
    <td style="text-align: center">
        <b>'.$nombre_institucion.'</b> <br>
        <small>'.$direccion.'</small> <br>
        <small>'.$telefono.' '.$celular.'</small>
    </td>
        <td style="text-align: center"><h2><b><u>RECIBO DE CAJA</u></b></h2></td>
    <td style="text-align: center"><b>ORIGINAL</b></td>    

</tr>

</table>

<br><br>

<table border="0">

<tr>
    <td width="170px"><b>Estudiante: </b></td>
    <td>'.$apellidos.' '.$nombres.'</td>
</tr>
<tr>
    <td width="170px"><b>Carnet de identidad: </b></td>
    <td>'.$ci.'</td>
</tr>
<tr>
    <td width="170px"><b>Nivel: </b></td>
    <td>'.$nivel.' - '.$turno.'</td>
</tr>
<tr>
    <td width="170px"><b>Curso: </b></td>
    <td>'.$curso.' | Paralelo '.$paralelo.'</td>
</tr>
<tr>
    <td width="170px"><b>Mes cancelado: </b></td>
    <td>'.$mes_pagado.'</td>
</tr>
<tr>
    <td width="170px"><b>Monto pagado: </b></td>
    <td>Col '.$monto_pagado.'</td>
</tr>


</table>

<br><br><br><br><br>

<table border="0">
<tr>
    <td style="text-align: center">
      __________________________<br>
      <b>Recibi conforme</b> <br>

    </td>
    <td style="text-align: center">
      __________________________<br>
      <b>Caja</b> <br>
    </td>
</tr>
</table>
<br>

Fecha: '.$dia_actual.' de '.$mes_actual.' de '.$ano_actual.'


<p>------------------------------------------------------------------------------------------------------------------------------------------------------</p>

<table border="0">
<tr>
    <td width="150px" style="text-align: center"><img src="../../public/images/configuracion/'.$logo.'" width="100px" alt=""></td>
    <td width="400px"></td>
    <td width="160px">
    <p>
        <b>Nro: </b>'.$id_pago.'<br>
        <b>Fecha:</b> '.$fecha_pagado.'
    </p>
    </td>
</tr>
<tr>
    <td style="text-align: center">
        <b>'.$nombre_institucion.'</b> <br>
        <small>'.$direccion.'</small> <br>
        <small>'.$telefono.' '.$celular.'</small>
    </td>
        <td style="text-align: center"><h2><b><u>RECIBO DE CAJA</u></b></h2></td>
    <td style="text-align: center"><b>COPIA</b></td>    

</tr>

</table>

<br><br>

<table border="0">

<tr>
    <td width="170px"><b>Estudiante: </b></td>
    <td>'.$apellidos.' '.$nombres.'</td>
</tr>
<tr>
    <td width="170px"><b>Carnet de identidad: </b></td>
    <td>'.$ci.'</td>
</tr>
<tr>
    <td width="170px"><b>Nivel: </b></td>
    <td>'.$nivel.' - '.$turno.'</td>
</tr>
<tr>
    <td width="170px"><b>Curso: </b></td>
    <td>'.$curso.' | Paralelo '.$paralelo.'</td>
</tr>
<tr>
    <td width="170px"><b>Mes cancelado: </b></td>
    <td>'.$mes_pagado.'</td>
</tr>
<tr>
    <td width="170px"><b>Monto pagado: </b></td>
    <td>Col '.$monto_pagado.'</td>
</tr>


</table>

<br><br><br><br><br>

<table border="0">
<tr>
    <td style="text-align: center">
      __________________________<br>
      <b>Recibi conforme</b> <br>

    </td>
    <td style="text-align: center">
      __________________________<br>
      <b>Caja</b> <br>
    </td>
</tr>
</table>
<br>

Fecha: '.$dia_actual.' de '.$mes_actual.' de '.$ano_actual.'


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
