<?php
require('../fpdf/fpdf.php');

$pageWidth = 435;
$pageHeight = 297; 
$pdf = new FPDF('L', 'mm', array($pageWidth, $pageHeight)); // 'L' for landscape orientation

$pdf->AddPage();


$imagePath = '../image/images.jpeg'; 
$imageWidth = 118.5; 
$imageHeight = 92.9; 
$x = ($pageWidth - $imageWidth) / 2; 
$y = 0; 
$pdf->Image($imagePath, $x, $y, $imageWidth, $imageHeight);


$customHeaderNames = array(
    'u_resources' => 'RESOURCE',
    'descriptions' => 'DESCRIPTION',
    'quantity' => 'QUANTITY',
    'allocation' => 'ALLOCATION',
    'statuss' => 'STATUS',
);

$con = mysqli_connect('localhost', 'root', '', 'cementcraft');
$sql = mysqli_query($con, "SELECT u_resources, descriptions, quantity, allocation, statuss FROM `myresourcesx   `");
$tableName = "ALL PRODUCTION REPORT";


$pdf->SetFont('Arial', 'B', 16);
$pdf->Ln($imageHeight + 10); 
$pdf->Cell(0, 10, $tableName, 0, 1, 'C');

if ($sql->num_rows > 0) {
    
    $pdf->Ln(10); 
    $pdf->SetFont('Arial', 'B', 12);
    $header = array(); 
    while ($fieldInfo = $sql->fetch_field()) {
        $header[] = $fieldInfo->name;
        $customName = isset($customHeaderNames[$fieldInfo->name]) ? $customHeaderNames[$fieldInfo->name] : $fieldInfo->name;
        $cellWidth = 70; 
        $pdf->Cell($cellWidth, 10, $customName, 1);
    }
    $pdf->Ln(); 
    while ($row = $sql->fetch_assoc()) {
        foreach ($header as $col) {
            $cellWidth = 70; 
            $pdf->Cell($cellWidth, 10, $row[$col], 1);
        }
        $pdf->Ln(); 
    }
    $pdf->Output();
}
?>
