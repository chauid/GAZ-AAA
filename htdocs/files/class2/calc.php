<?php
$money=$_GET["money"];
$rentpay=$_GET["rentpay"];
$input_money_type=gettype($money);
$total=$money+($rentpay*100);
echo "귀하의 환산보증금은 $total 입니다.";
?>