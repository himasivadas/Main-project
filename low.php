<?php
session_start();
include('include/config.php');
"SELECT * FROM product WHERE productPriceBeforeDiscount <= 3 AND status = 1";
?>