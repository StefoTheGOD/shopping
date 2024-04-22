<?php 
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['login']) == 0) {   
    header('location:login.php');
} else {
    if(isset($_POST['submit'])) {
        $paymentMethod = $_POST['paymethod'];

        if($paymentMethod == "paypal") {
            // Пренасочване към страницата за PayPal плащания
            header('location: paypal_payment.php');
            exit();
        } else {
            mysqli_query($con,"update orders set paymentMethod='".$paymentMethod."' where userId='".$_SESSION['id']."' and paymentMethod is null ");
            unset($_SESSION['cart']);
            header('location:order-history.php');
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">
    <title>FixIt | Начин на плащане</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Останалите CSS файлове -->
</head>
<body class="cnt-home">
    <header class="header-style-1">
        <!-- Включване на хедъра -->
    </header>
    <div class="breadcrumb">
        <!-- Навигационни бутони -->
    </div>
    <div class="body-content outer-top-bd">
        <div class="container">
            <div class="checkout-box faq-page inner-bottom-sm">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Избери начин на плащане</h2>
                        <div class="panel-group checkout-steps" id="accordion">
                            <!-- Формата за плащане -->
                            <div class="panel panel-default checkout-step-01">
                                <div class="panel-heading">
                                    <h4 class="unicase-checkout-title">
                                        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
                                            Изберете вашия начин на плащане
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <form name="payment" method="post">
                                            <input type="radio" name="paymethod" value="COD" checked="checked"> Плащане при доставка
                                            <br /><br />
                                            <input type="radio" name="paymethod" value="paypal"> PayPal
                                            <br /><br />
                                            <input type="submit" value="Изпрати" name="submit" class="btn btn-primary">
                                        </form>     
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Брандове -->
        </div>
    </div>
    <!-- Футър -->
    <script src="assets/js/jquery-1.11.1.min.js"></script>
    <!-- Останалите скриптове -->
</body>
</html>
