<?php


require ('lib/fpdf.php');
include ('lib/database.php');

$select = "SELECT * FROM utilisateur ";
$result = $db->query($select);
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(10, 10, 'id', 1);
$pdf->Cell(30, 10, 'prenom', 1);
$pdf->Cell(30, 10, 'nom', 1);
$pdf->Cell(90, 10, 'email', 1);
$pdf->Cell(20, 10, 'promo', 1);
$pdf->Cell( 20,10 ,'admin', 1);
while ($content = $result->fetch()) {
    $pdf->Cell(10, 10, $content['id_GES'], 1);
    $pdf->Cell(30, 10, $content['prenom'], 1);
    $pdf->Cell(30, 10, $content['nom'], 1);
    $pdf->Cell(90, 10, $content['email'], 1);
    $pdf->Cell(20, 10, $content['promotion'], 1);
    $pdf->Cell( 20,10 ,$content['admin'], 1);
    $pdf->Ln();
}
$pdf->Output();

?>