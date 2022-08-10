<?php
session_start();
include('includes/config.php');

$sqi=mysqli_query($con,"UPDATE `orders` SET `p_action` = 'paid' WHERE `id` = '$'");
echo"<script> alert('payment Successfull');window.location.href='my-cart.php';</script>";
?>