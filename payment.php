<?php
        $apiKey="rzp_test_M7f7m6OtdE40Q1";
        include('includes/config.php');

        session_start();
        $total=$_SESSION['tp'];
        echo $total;
                                   
       
?>
<form action="py.php" method="post">
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $apiKey; ?>" // Enter the Test API Key ID generated from Dashboard → Settings → API Keys
    data-amount="<?php echo $total * 100; ?>" // Amount is in currency subunits. Hence, 29935 refers to 29935 paise or ₹299.35.
    data-currency="INR"// You can accept international payments by changing the currency code. Contact our Support Team to enable International for your account
    data-order_id="<?php rand(100000, 999999);?>"// Replace with the order_id generated by you in the backend.
    data-buttontext="Pay"
    data-name="Dush 2 Shine"
    data-description="Add more colors to your day"
    data-image=""
    data-prefill.name=""
    data-prefill.email=""
    data-theme.color="#F37254"
></script>
<input type="hidden" custom="Hidden Element" name="hidden">
</form>

<!--style>
.razorpay-payment-button { display:none; }
</style>


<script type="text/javascript">
  $(document).ready(function(){
    $('.razorpay-payment-button').click();

});
</script-->