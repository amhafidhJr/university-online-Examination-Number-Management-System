
<?php

require_once('connection.php');
require('../fpdf.php');

    $query ="SELECT teacher_fullname, teacher_department, assigned_class, assigned_time FROM teacher_table INNER JOIN teacher_assigned_details USING (teacher_id)";
     $Statement=$conn->prepare($query);
     $Statement->execute();
     $res=$Statement->fetchAll(PDO::FETCH_ASSOC);

    





/*A4 width : 219mm*/

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();
/*output the result*/

/*set font to arial, bold, 14pt*/
$pdf->SetFont('Arial','I',14);

$pdf->SetFont('Arial','B',10);
/*Heading Of the table*/
// $pdf->Cell(10 ,6,'Sl',1,0,'C');
// $pdf->Cell(80 ,6,'Description',1,0,'C');
$pdf->Cell(49 ,6,'Fullname',1,0,'C');
$pdf->Cell(49 ,6,'Depertment',1,0,'C');
$pdf->Cell(49 ,6,'Assigned class',1,0,'C');
$pdf->Cell(49 ,6,'Assigned Time',1,1,'C');/*end of line*/
/*Heading Of the table end*/
$pdf->SetFont('Arial','',8,0,'C');
foreach($res as $row) {

$pdf->Ln();

foreach($row as $column){
    $pdf->Cell(49,8,$column,1,0,'C');
}

}
$pdf->Output();


?>
 