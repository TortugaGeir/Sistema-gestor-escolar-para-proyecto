<?php
$id_estudiantes = $_GET ['id'];
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
 */

// Include the main TCPDF library (search for installation path).
require_once('../../app/config.php');

require_once('../../public/TCPDF-main/tcpdf.php');
require_once('../../app/controllers/configuraciones/instituciones/listado_instituciones.php');
require_once('../../app/controllers/estudiantes/datos_estudiante.php');

  foreach($instituciones as $instituciones){
$nombre_institucion = $instituciones['nombre_institucion'];
$email_institucion = $instituciones['email'];
$tipo_institucion = $instituciones['tipo_institucion'];
$telefono_institucion = $instituciones['telefono'];
$rif_institucion = $instituciones['rif'];
$codigo_dea = $instituciones['cog_dea'];
$direccion_institucion = $instituciones['direccion'];
$logo = $instituciones['logo'];
$fyh_create = $instituciones['fyh_create'];
$estado = $instituciones['estado'];
  }

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor(APP_NAME);
$pdf->SetTitle(APP_NAME);
$pdf->SetSubject(APP_NAME);
$pdf->SetKeywords(APP_NAME);

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(left: 15, top:10, right:15);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->setPrintHeader(false);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

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
$pdf->SetFont('times', '', 11, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

$style = array(
'border'=>0,
'vpadding'=>3,
'fgcolor'=>array(0,0,0),
'bgcolor'=>false,
'module_width'=>1,
'module_heigth'=>1
);
$QR ='Este contrato es verificado por el sistema de gestion de la Unidad Educativa '.$nombre_institucion.  ', por el Señor(a)'.$nombres_representante .$apellidos_representante. 'con C.I N°' .$ci_representante. 'Habil por derecho en' .$fecha_actual;

$pdf->write2DBarcode($QR,'QRCODE,L', x:165, y:10,w:30,h:30);

// set text shadow effect
//$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

// Set some content to print
$html = <<<EOD
<table border='1'>
  <tr>

    <td style="text-aling:center"> <br><br><br><h3><b>CONTRATO DE INSCRIPCIÓN ESTUDIANTIL</b></h3></td>
    <td><img width="150px" style="text-aling:center" src="APP_URL."/public/images/configuraciones/".$logo" alt=""></td>
  </tr>
  <tr>
  <br>
    <td style="text-aling:center">
    <b>$nombre_institucion</b> <br>
    <small>
    $direccion_institucion
    </small>
    </td>
  </tr>
  <br>
  <tr>
    <td style="text-aling:center">
    <small>.$telefono_institucion.$email_institucion</small>
    </td>
  </tr>
  <tr>
    <td style="text-aling:center">
    RIF:$rif_institucion</td> 
    <hr style="color:dark blue">
  </tr>

</table>
<p style="margin-top: 30px; text-aling: justify">

<p><b>Entre:</b><p>
La Institución Educativa $nombre_institucion, debidamente registrada ante el Ministerio del Poder Popular para la Educación (MPPE), en adelante denominada “LA INSTITUCIÓN”, representada por ________________________________, titular de la Cédula de Identidad Nº ________________, y por la otra parte, el/la representante legal del estudiante, ciudadano(a) <b>$apellidos_representante.$nombres_representante</b>, titular de la Cédula de Identidad Nº <b>$ci_representante</b>, en adelante “EL REPRESENTANTE”, se celebra el presente CONTRATO DE INSCRIPCIÓN ESTUDIANTIL, regido por las cláusulas que siguen:

<p>
<b>PRIMERA: OBJETO DEL CONTRATO</b> 
<br>

El presente contrato tiene por objeto formalizar la inscripción del estudiante <b>$apellidos_estudiantes.$nombres_estudiantes</b>, C.I. Nº <b>$ci</b>, en el año/curso $ano_actual, bajo el régimen académico y administrativo establecido por LA INSTITUCIÓN y en conformidad con las disposiciones generales del MPPE.</p>

<p>
<b>SEGUNDA: OBLIGACIONES DE LA INSTITUCIÓN</b>
<br>
LA INSTITUCIÓN se compromete a:
<ul>
<li>Garantizar el derecho a la educación conforme a la Ley Orgánica de Educación.
</li>

<li>Proporcionar los servicios académicos y pedagógicos correspondientes al nivel educativo inscrito.</li>

<li>Mantener un ambiente seguro, inclusivo y adecuado para el proceso formativo del estudiante.</li>

<li>Cumplir el calendario escolar establecido por el MPPE.</li>

<li>Notificar oportunamente cambios en horarios, jornadas, actividades o normativas internas.</li>
</ul>
</p>
<b>TERCERA: OBLIGACIONES DEL REPRESENTANTE</b>
<br>
EL REPRESENTANTE se compromete a:
<ul>
<li>Cumplir con los pagos correspondientes a matrícula, mensualidades y demás obligaciones económicas según el cuadro tarifario vigente de LA INSTITUCIÓN.</li>

<li>Velar por la asistencia, puntualidad, conducta y cumplimiento de deberes del estudiante.</li>

<li>Aportar los documentos requeridos para la inscripción y actualización de expediente.</li>

<li>Participar en reuniones, actividades formativas y procesos de evaluación integral convocados por LA INSTITUCIÓN.</li>

<li>Respetar el Reglamento Interno y demás normativas administrativas establecidas.</li>
</ul>

<p>
<b>CUARTA: OBLIGACIONES DEL ESTUDIANTE</b>
<br>
El estudiante deberá:
<ul>
<li>Asistir con regularidad a las actividades académicas.</li>

<li>Mantener un comportamiento respetuoso hacia docentes, compañeros y personal institucional.</li>

<li>Cuidar el patrimonio escolar y cumplir con las normas de convivencia.</li>

<li>Participar activamente en el proceso educativo conforme a su nivel de desarrollo.</li>
</ul>
</p>
<p>
<b>QUINTA: DURACIÓN DEL CONTRATO</b>
<br>
El presente contrato tiene validez durante el año escolar $periodo, iniciando el día $fecha_actual y culminando el día _______, salvo causas de fuerza mayor o disposiciones del MPPE que modifiquen el calendario escolar.
</p>

<b>SEXTA: RETIRO DEL ESTUDIANTE</b>
<br>
EL REPRESENTANTE podrá solicitar el retiro del estudiante en cualquier momento, debiendo:
<ul>
<li>Presentar la solicitud por escrito.</li>

<li>Estar solvente con las obligaciones económicas (opcional) hasta la fecha de retiro.</li>

<li>Recibir los documentos correspondientes según normativa del MPPE.</li>
</ul>
<b>SÉPTIMA: RESPONSABILIDAD Y CONVIVENCIA</b>
<br>
Ambas partes acuerdan respetar el Reglamento Interno de Convivencia Escolar de LA INSTITUCIÓN, en coherencia con la Ley Orgánica de Educación y orientaciones del MPPE.
<p>
<b>OCTAVA: MODIFICACIONES DEL CONTRATO</b>
<br>
Toda modificación deberá formalizarse mediante anexo firmado por ambas partes.</p>
<p>
NOVENA: ACEPTACIÓN
<br>
Leído el presente contrato, ambas partes manifiestan su conformidad y lo firman por duplicado a los $dia_actual días del mes de $mes_actual del año $ano_actual.
<br><br>
Por LA INSTITUCIÓN:
<br>
Nombre: _______________________________________ <br>
Cargo: __________________________________________ <br>
Firma: __________________________________________ <br>
<br>
Por EL REPRESENTANTE:
<br>
Nombre: _______________________________________<br>
C.I.: ___________________________________________<br>
Firma: __________________________________________<br>
</p>
</p>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+