<?php
require('fpdf.php');
require('fpdi.php');
header('Content-Type: text/pdf; charset=UTF-8');

$dni = $_POST["tbDni"];
$nombre = $_POST["tbNombre"];;
$fecha = (new DateTime())->format("dd/mm/YY");
$pdf = new FPDI();

$pdf->AddPage();

$pdf->setSourceFile("diploma-plantilla.pdf");
// import page 1
$tplIdx = $pdf->importPage(1);
// use the imported page and place it at point 10,10 with a width of 100 mm
$pdf->useTemplate($tplIdx, 0, 0, 0, 0, true);

$pdf->SetFont('Helvetica',"",12);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(30, 80);
$pdf->write(0,utf8_decode("La Universidad de La Rioja otorga el siguiente diploma a"));

$pdf->SetFont('Helvetica',"",20);
$pdf->SetTextColor(255, 10, 10);
$pdf->SetXY(30, 90);
$pdf->write(0,utf8_decode(utf8_encode($nombre)));

$pdf->SetFont('Helvetica',"",12);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(30, 100);
$pdf->write(0,utf8_decode("Con dni: " . $dni . " ha superado con éxito el programa formativo,"));

$pdf->SetFont('Helvetica',"",25);
$pdf->SetTextColor(255, 30, 30);
$pdf->SetXY(30, 110);
$pdf->write(0,utf8_decode("CURSO DE MANIPULACIÓN DE PDF"));

$pdf->SetFont('Helvetica',"",12);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetXY(30, 120);
$pdf->write(0,utf8_decode("Celebrado desde el día 19 de junio hasta el 30 de Diciembre de 2015"));
$pdf->SetXY(30, 130);
$pdf->write(0,utf8_decode("con una duración de 200 horas"));

$pdf->Output();

?>
