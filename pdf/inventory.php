<?php
require('../fpdf/fpdf.php');

$pageWidth = 435; // Example: A4 width is 210mm
$pageHeight = 297; // A4 height
$pdf = new FPDF('L', 'mm', array($pageWidth, $pageHeight)); // 'L' for landscape orientation

$pdf->AddPage();
$imagePath = '../image/images.jpeg'; // Update this path as needed

$imageWidth = 118.5; 
$imageHeight = 92.9; 


$x = ($pageWidth - $imageWidth) / 2; // Center horizontally
$y = 0; 

// Add the image to the PDF
$pdf->Image($imagePath, $x, $y, $imageWidth, $imageHeight); 

// Define custom header names
$customHeaderNames = array(
    'ID' => 'ID',
    'raw_material' => 'RAW MATERIAL',
    'current_stock' => 'CURRENT STOCK ',
    'reorder_point' => 'RE-ORDER POINT ',
    'supplier' => 'SUPPLIER',
    'lead_time' => 'LEAD TIME (Days)',
    'safety_stock' => 'SAFETY STOCK',
);

$con = mysqli_connect('localhost', 'root', '', 'cementcraft');
$sql = mysqli_query($con, "SELECT raw_material, current_stock, reorder_point, supplier, lead_time, safety_stock FROM `inventory`");
$tableName = "ALL PRODUCTION REPORT";

// Set font for the table title
$pdf->SetFont('Arial', 'B', 16);
$pdf->Ln($imageHeight + 10); // Move down after the image; adjust spacing as needed
$pdf->Cell(40, 10, '' . $tableName);

if ($sql->num_rows > 0) {
    // Display table headers
    $pdf->Ln(10); // Add a new line with spacing
    $pdf->SetFont('Arial', 'B', 12);
    $header = array(); // Initialize header array
    while ($fieldInfo = $sql->fetch_field()) {
        $header[] = $fieldInfo->name;
        // Adjust the width of the cell based on the column name
        $customName = isset($customHeaderNames[$fieldInfo->name]) ? $customHeaderNames[$fieldInfo->name] : $fieldInfo->name;
        $cellWidth = ($fieldInfo->name == 'u_toolname') ? 70 : 70;
        $pdf->Cell($cellWidth, 10, $customName, 1);
    }
    $pdf->Ln(); // Add extra spacing between headers and data

    while ($row = $sql->fetch_assoc()) {
        foreach ($header as $col) {
            // Adjust the width of the cell based on the column name
            $cellWidth = ($col == 'u_toolname') ? 70 : 70;
            $pdf->Cell($cellWidth, 10, $row[$col], 1);
        }
        $pdf->Ln(); // Move to the next line for the next row
    }
    $pdf->Output();
}
?>
