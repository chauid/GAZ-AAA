<?php
date_default_timezone_set('Asia/Seoul');
$info=getdate();
printf("현재 년도 %d <br>", $info['year']);
printf("현재 월 %d <br>", $info['mon']);
printf("현재 일 %d <br>", $info['mday']);
echo "<br>";
$hours=gmdate("h");
$min=gmdate("m");
printf("현재시간 %d시 %d분<br>", $info['hours'], $info['minutes']);
printf("표준시간 %d시 %d분<br>", $hours, $min);
?>