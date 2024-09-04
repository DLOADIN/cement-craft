<?php
require('../fpdf/fpdf.php');

$pageWidth = 435; // Custom page width (in mm)
$pageHeight = 297; // Custom page height (in mm)
$pdf = new FPDF('L', 'mm', array($pageWidth, $pageHeight)); // 'L' for landscape orientation

$pdf->AddPage();

// Path to the image
$imagePath = '../image/images.jpeg'; // Update this path as needed

// Dimensions for the image
$imageWidth = 118.5; // 450px converted to mm
$imageHeight = 92.9; // 350px converted to mm

// Positioning the image in the center above the table
$x = ($pageWidth - $imageWidth) / 2; // Center horizontally
$y = 0; // Distance from the top margin; adjust as needed

// Add the image to the PDF
$pdf->Image($imagePath, $x, $y, $imageWidth, $imageHeight);

// Define custom header names
$customHeaderNames = array(
    'ID' => 'ID',
    'equipment' => 'EQUIPMENT',
    'maintenance_task' => 'MAINTENANCE TASK',
    'frequency' => 'FREQUENCY',
    'first_maintenance' => 'FIRST MAINTENANCE',
    'last_maintenance' => 'LAST MAINTENANCE',
    'status' => 'STATUS'
);

$con = mysqli_connect('localhost', 'root', '', 'cementcraft');
$sql = mysqli_query($con, "SELECT equipment, maintenance_task, frequency, first_maintenance, last_maintenance, status FROM `equipments`");
$tableName = "EQUIPMENT MAINTENANCE REPORT";

// Set font for the table title
$pdf->SetFont('Arial', 'B', 16);
$pdf->Ln($imageHeight + 10); // Move down after the image; adjust spacing as needed
$pdf->Cell(0, 10, $tableName, 0, 1, 'C'); // Center the table title

if ($sql->num_rows > 0) {
    // Display table headers
    $pdf->Ln(10); // Add a new line with spacing
    $pdf->SetFont('Arial', 'B', 12);
    $header = array(); // Initialize header array
    while ($fieldInfo = $sql->fetch_field()) {
        $header[] = $fieldInfo->name;
        // Adjust the width of the cell based on the column name
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
