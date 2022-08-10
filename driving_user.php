<?php
session_start();
include('includes/config.php');

if(isset($_SESSION['id']))
    $feg=$_SESSION['id'];

$result=mysqli_query($con,"SELECT userld,productld,quantity,orderDate,total FROM `orders` where id=$feg ") or die(mysqli_error($con));
if(mysqli_num_rows($result)==0){
  echo"<script type='text/javascript'>
  alert('Not generated yet');
  location='py.php';
  </script>";
}

include('pdf_mc_table.php');
$pdf = new PDF_MC_TABLE();
$pdf->AddPage();
$pdf->SetFont('Arial','B',15);	
$pdf->Cell(176, 5, 'UNION OF INDIA DRIVING LICENSE ', 0, 0, 'C');
  $pdf->Ln();
  $pdf->Ln();
  $pdf->Ln();	
$row=mysqli_fetch_array($result);
$pdf->SetFont('Arial','',12);	

$pdf->Cell(0,12,'Authorization to Drive : '. $row['license_type'],0,1);
// $image1 = "img/*.jpg";
// // $this->Cell( 40, 40, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 33.78), 0, 0, 'L', false );
// $pdf-> Image('img/'.$image1,100,15,35,35);
$pdf->Cell(0,12,'Date of Issue : '. $row['date_of_issue'],0,1);
$pdf->Cell(0,12,'License No : KL05 202200000'. $row['driving_id'],0,1);
$pdf->Ln();	

$pdf->Cell(0,12,'Valid upto : '. $row['expiriry_date'],0,1);

$pdf -> Line(12, 70, 180,71);

$pdf->Cell(0,12,'Name : '. $row['first_name']." ".$row['last_name'],0,1);
$pdf->Cell(0,12,'Age : '. $row['age'],0,1);
$pdf->Cell(0,12,'Gender : '. $row['gender'],0,1);
$pdf->Cell(0,12,'Blood : '. $row['blood'],0,1);
$pdf->Cell(0,12,'S/W/D : '. $row['parent_name'],0,1);
$pdf->Cell(0,12,'Permanent Address : '. $row['house_name']." ".$row['state']." ".$row['district'],0,1);
$pdf->Cell(0,12,'Communication Address : '. $row['house_name']." ".$row['state']." ".$row['district'],0,1);



$pdf->Output();
?>