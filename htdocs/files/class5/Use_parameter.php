<?php
function add_fcn_3(&$su)
{
    $su = $su + 10;
    echo "함수정의\$su = ".$su."<Br>";
    return $su;
}
$num = 10;
echo "함수호출 전\$num = ".$num."<Br>";

$result_3 = add_fcn_3($num);
printf("Result_call_3 = %s<Br>", $result_3);

echo "함수호출 후\$num = ".$num;
?>