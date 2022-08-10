   
<?php
session_start();
include('includes/config.php');
$iid = $_GET['id'];
if(isset($_SESSION['log_id']))
    $id=$_SESSION['log_id'];

$result=mysqli_query($con,"select * from request_tbl rq,reg_tbl re,mec_tbl m,assign_tbl a,completedtask_tbl ct where rq.req_id=a.req_id  and a.req_id=ct.req_id and re.log_id=a.log_id and a.mechanic=m.mec_id and rq.req_id='$iid'  AND rq.status='Completed' ORDER By ass_id desc") or die(mysqli_error($con));

mysqli_query($con,"select * from  orders userId,productId,quantity,total where userld = ) values('".$_SESSION['id']."','$qty','$val34','".$_SESSION['tp']."')");


include('pdf_mc_table.php');
$pdf = new PDF_MC_TABLE();
$pdf->AddPage();
$pdf->SetFont('Arial','B',15);	
$pdf->Cell(176, 5, 'Task Report', 0, 0, 'C');
  $pdf->Ln();
  $pdf->Ln();
  $pdf->Ln();	
$row=mysqli_fetch_array($result);
$pdf->SetFont('Arial','',12);	
$pdf->Multicell(80,10,  'Name                 :  '. $row['name']." ".$row['lname'],1);
$pdf->Multicell(80,10,  'Phone                :  '. $row['mphone'],1);
$pdf->Multicell(80,10,'Vehicle Model    :  '. $row['category'],1);
$pdf->Multicell(80,10,'Problem             :  '. $row['problem'],1);
$pdf->Multicell(80,10,'Date                   :  '. $row['date'],1);
$pdf->Multicell(80,10,'Location             :  '. $row['location'],1);
$pdf->Multicell(80,10,'Mechanic Name :  '. $row['mname']." ".$row['mlname'],1);
$pdf->Multicell(80,10,'Mechanic Number : '. $row['phone'],1);
$pdf->Multicell(80,10,'Real Problem     :  '. $row['mproblem'],1);
$pdf->Multicell(80,10,'Status                :  '. $row['status'],1);
$pdf->Multicell(80,10,'Service Charge  :  '. $row['charge'],1);
$pdf->Multicell(80,10,'Payment Status  :  '. $row['pstatus'],1);


$pdf->Output();
?>