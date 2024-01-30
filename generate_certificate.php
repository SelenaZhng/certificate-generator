<?php
/*
//BJ 4/16/2021
/*Font Help.
https://www.youtube.com/watch?v=MTI5x_imVxM
https://java.wekeepcoding.com/article/22781525/How+to+implement+custom+fonts+in+TCPDF

*/


if (isset($_POST['title'])) {
	$title = $_POST['title'];
	$recipient = $_POST['recipient'];
	$award = $_POST['award'];
	$description = $_POST['description'];
	$signature = $_POST['signame'];
	$date = $_POST['date'];
	$style = $_POST['style'];
}
require_once 'tcpdf/tcpdf.php';
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->AddPage('L'); //use empty or AddPage('P') for Portrait;

//BJ 4/16/2021
//$pdf->AddTTFfont('tcpdf/fonts/Righteous/Righteous-Regular.ttf','TrueTypeUnicode', '', 32);
//$pdf->SetFont('tcpdf/fonts/Righteous/Righteous-Regular.ttf','',10);
//$fontname= TCPDF_FONTS::addTTFfont('tcpdf/fonts/Righteous/Righteous-Regular.ttf', 'TrueTypeUnicode', '', 96);
// use the font

$html = '<br><div style="width:100%;text-align:center;font-size:50px;font-weight:bold;"><span style="color:#000;">' . $title . '</span></div><br>';

$html2 = '<div style="width:100%;text-align:center;font-size:25px;">This certifies that</div>';

$html3 = '<div style="width:100%;text-align:center;font-size:28px">' . $recipient . '</div>';

$html4 = '<div style="width:100%;text-align:center;font-size:25px;">' . $award . '</div>
<div style="width:100%;text-align:center;font-size:18px;">' . $description . '</div>';


// set background image
$x = rand(1, 3);
//$img_file = 'fcert'.$x.'.png';
if ($style == 'cute') {
	$img_file = 'ccert' . $x . '.png';
} else {
	$img_file = 'fcert' . $x . '.png';
}


//$pdf->setImageScale(1.53);
$pdf->SetAutoPageBreak(false, 0);
//
//$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->Image($img_file, 0, 0, 793, 612, '', '', '', false, 300, '', false, false, 0);

$fontname= TCPDF_FONTS::addTTFfont('tcpdf/fonts/Jost/Jost-SemiBold.ttf', 'TrueTypeUnicode', '', 96);
$pdf->SetFont($fontname, '', 18, '', false);
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$fontname2= TCPDF_FONTS::addTTFfont('tcpdf/fonts/Allura/Allura-Regular.ttf', 'TrueTypeUnicode', '', 96);
$pdf->SetFont($fontname2, '', 18, '', false);
$pdf->writeHTMLCell(0, 0, '', '', $html2, 0, 1, 0, true, '', true);

$fontname3= TCPDF_FONTS::addTTFfont('tcpdf/fonts/Jost/Jost-Regular.ttf', 'TrueTypeUnicode', '', 96);
$pdf->SetFont($fontname3, '', 18, '', false);
$pdf->writeHTMLCell(0, 0, '', '', $html3, 0, 1, 0, true, '', true);

$fontname4= TCPDF_FONTS::addTTFfont('tcpdf/fonts/Allura/Allura-Regular.ttf', 'TrueTypeUnicode', '', 96);
$pdf->SetFont($fontname4, '', 18, '', false);
$pdf->writeHTMLCell(0, 0, '', '', $html4, 0, 1, 0, true, '', true);

//footer: date and signature
$pdf->Cell(350, 180, $date, 0, false, 'C', 0, '', 0, false, 'T', 'M');
$pdf->Cell(370, 220, $signature, 0, false, 'C', 0, '', 0, false, 'T', 'M');

//line:
$style7 = array('width' => 1, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));

$pdf->Line(635, 460, 480, 460, $style7);

$pdf->Output('testcertificate2.pdf', 'I');
