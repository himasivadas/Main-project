<?php
session_start();
include('includes/config.php');

if(isset($_SESSION['id']))
    $feg=$_SESSION['id']; 

$result=mysqli_query($con,"SELECT orders.quantity,orders.orderDate,orders.total, products.productName,products.shippingCharge ,products.productPrice,users.name FROM orders INNER JOIN products ON orders.productId = products.id  JOIN users ON orders.userId=$feg; ") or die(mysqli_error($con));
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
$pdf->Cell(176, 5, 'Efarm Horticulture ', 0, 0, 'C');
  $pdf->Ln();
  $pdf->Ln();
  $pdf->Ln();	
$row=mysqli_fetch_array($result);
$pdf->SetFont('Arial','',12);	

//$pdf->Cell(0,12,'Authorization to Drive : '. $row['license_type'],0,1);
// $image1 = "img/*.jpg";
// // $this->Cell( 40, 40, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 33.78), 0, 0, 'L', false );
// $pdf-> Image('img/'.$image1,100,15,35,35);
//$pdf->Cell(0,12,'License No : KL05 202200000'. $row['userld'],0,1);
$pdf->Ln();	
$pdf->Cell(0,12,'Client Name     : '. $row['name'],0,1);
$pdf->Cell(0,12,'Product Name    : '. $row['productName'],0,1);
$pdf->Cell(0,12,'Order Date      : '. $row['orderDate'],0,1);
$pdf->Cell(0,12,'Quantity        : '. $row['quantity'],0,1);
$pdf->Cell(0,12,'Shipping charge : '. $row['shippingCharge'],0,1);
$pdf->Cell(0,12,'Product Price   : '. $row['productPrice'],0,1);
$pdf->Cell(0,12,'Grant Total     : '. $row['total'],0,1);
$pdf->Cell(176, 5, 'Your Payment is Successfully Completed ', 0, 0, 'C');


//$pdf->Cell(0,12,'Name : '. $row['orderDate']." ".$row['total'],0,1);
//$pdf->Cell(0,12,'Age : '. $row['age'],0,1);
//$pdf->Cell(0,12,'Blood : '. $row['blood'],0,1);
//$pdf->Cell(0,12,'Permanent Address : '. $row['house_name']." ".$row['state']." ".$row['district'],0,1);
//$pdf->Cell(0,12,'Communication Address : '. $row['house_name']." ".$row['state']." ".$row['district'],0,1);



$pdf->Output();
?>