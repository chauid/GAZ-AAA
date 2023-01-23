<?php
date_default_timezone_set('Asia/Seoul');
$y=1995;
$m=05;
$d=10;
$birth=mktime(0,0,0,$m,$d,$y);
$currnt=time();
echo $birth ."<br>";
echo $currnt."<br>";
$subdiff=$currnt-$birth;
$age=floor($subdiff/(365*24*60*60));
echo "당신의 나이는 $age 입니다.<br><br>";
$birthtime=mktime(0,0,0,$m,$d,$y);
echo "timestamp 결과 $birthtime";
?>
