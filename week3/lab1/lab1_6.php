<?php
    $prev_balance = $_GET['prev_balance'];
    $paid_amount = $_GET['paid_amount'];
    $day_payment_made = $_GET['day_payment_made'];
    $interest_rate = $_GET['interest_rate'];

    # Write code here
    $total_balance = $prev_balance * 31;
    $paid_balance = $paid_amount * (31 - $day_payment_made);
    $leftover = $total_balance - $paid_balance;
    $avg_daily_balance = $leftover / 31;
    $interest_charge = $avg_daily_balance * $interest_rate / 100;

    echo "Previous balance is $$prev_balance<br/>";
    echo "Payment of $$paid_amount was made on day $day_payment_made of the billing cycle<br/>";
    echo "Interest on outstanding amount is $$interest_charge";
    # End of code

?>