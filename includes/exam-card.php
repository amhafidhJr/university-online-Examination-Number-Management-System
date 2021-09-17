<?php
   
date_default_timezone_set('Africa/Dar_es_Salaam');

// Include the main TCPDF library (search for installation path).
require_once('../TCPDF/tcpdf.php');

require_once('connection.php');

$id = $_GET['id'];
$query ="SELECT * FROM examination_number_table ex,student_table st where ex.student_reg_no=st.student_reg_no and ex.student_id=?";
$Statement=$conn->prepare($query);
$Statement->execute(array($id));
$res=$Statement->fetchAll(PDO::FETCH_ASSOC);
                              
                              
    foreach ($res as $photo) 
        
        $exam_no = $photo["exam_no"];
        $student_fullname = $photo["student_fullname"];
        $student_course = $photo["student_course"];
        $student_reg_no = $photo["student_reg_no"];

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {
    // Page footer
	    public function Header() {
       
        
    }

    public function Footer() {
        // Position at 1.5 cm from bottom
   $this->SetY(-15);
  //  Arial italic 8
   $this->SetFont('helvetica','I',8);
 
      }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// ---------------------------------------------------------

// set font
  $pdf->SetFont('Times','B',12);
  
// add a page
$pdf->AddPage();


	// set style for barcode
$style = array(
    'border' => true,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);

//verify barcode

$pdf->write2DBarcode("Student Name  ".$student_fullname." , Student Registration  ".$student_reg_no.", Student Course  ".$student_course, 'PDF417', 30, 2, 0, 50, $style, 'N');

$pdf->Cell(120,10,'Examination Number:  '.$exam_no,0,1,'C');


// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output();

//============================================================+
// END OF FILE
//============================================================+

?>