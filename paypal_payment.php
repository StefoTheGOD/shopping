

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta, CSS, и други необходими скриптове -->
    <title>PayPal Плащания</title>
</head>
<body>
    <!-- PayPal Форма за плащане -->
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="business" value="stefan.kokov2005@gmail.com">
        <input type="hidden" name="item_name" value="Your Product">
        <input type="hidden" name="currency_code" value="USD">
        <input type="hidden" name="amount" value="10.00">
        <!-- Други необходими скрити полета -->
        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
    </form>
    <!-- Край на PayPal Формата за плащане -->
</body>
</html>
