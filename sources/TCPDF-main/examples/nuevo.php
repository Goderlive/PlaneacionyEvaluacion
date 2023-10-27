<?php
require_once('tcpdf_include.php');
require('barcodes/tcpdf_barcodes_2d_include.php');

// Crear una instancia de TCPDF
$pdf = new TCPDF();

// Agregar una página
$pdf->AddPage();

// Crear una tabla
$pdf->SetFillColor(255, 255, 255);
$pdf->SetXY(10, 50); // Establecer la posición de la tabla
$pdf->SetFont('helvetica', '', 12);
$pdf->Cell(80, 10, 'Celda 1', 1, 0, 'C', 1);
$pdf->Cell(80, 10, 'Celda 2', 1, 1, 'C', 1);

// Cargar la biblioteca TCPDF2DBarcode

// Generar el código QR
$qrText = 'https://www.ejemplo.com'; // Texto o URL para el código QR
$qrCode = new TCPDF2DBarcode($qrText, 'QRCODE,H');

// Obtener la imagen del código QR
$qrImage = $qrCode->getBarcodePNG(3, 3, array(0,0,0));

// Agregar la imagen del código QR a la celda izquierda de la tabla
$pdf->Image('@' . $qrImage, 15, 50, 20, 20, 'PNG');

// Salida del PDF
$pdf->Output('ejemplo.pdf', 'I');
?>
