
<?php 
session_start();
error_reporting(0);
include('includes/config.php');
$query=mysqli_query($con,"select * from users where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
?>
<!DOCTYPE html>

					<html>
						<head>
							<meta charset="UTF-8">
							<title>Horti Shop</title>

							<link rel="stylesheet" href="css/bootstrap.min.css"/>
							<script src="js/jquery2.js"></script>
							<script src="js/bootstrap.min.js"></script>
							<script src="main.js"></script>
							<style>
								table tr td {padding:10px;}
							</style>
						</head>
					<body>
						<div class="navbar navbar-inverse navbar-fixed-top">
							<div class="container-fluid">	
								<div class="navbar-header">
									<a href="index.php" class="navbar-brand">Horti Shop</a>


					
								</div>

								
								</ul>
							</div>
						</div>
						<a href="bill.php">
									<i class="menu-icon icon-signout"></i>
									Bill
								</a>
								
							</li>
						<p><br/></p>
						<p><br/></p>
						<p><br/></p>

						<div class="container-fluid">
						
							<div class="row">
								<div class="col-md-2"></div>
								<div class="col-md-8">
									<div class="panel panel-default">
										<div class="panel-heading"></div>
										<div class="panel-body">
											<h1>Thankyou </h1>
											<hr/>
											
											<p>Hello <b>
										<?php echo ($_SESSION['username']);?>,</b>
										Your payment process is 
											successfully completed  <b></b><br/>
											you can continue your Shopping <br/></p>
											<a href="my-cart.php" class="btn btn-success btn-lg">Continue Shopping</a>
										</div>
										<div class="panel-footer"></div>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
						</div>
					<?php } ?>
					</body>
					</html>
				
