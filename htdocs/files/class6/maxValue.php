<?php
function maxTwo($i, $j)
{
    if ($i > $j) return $i;
    else return $j;
}
function maxThree($x, $y, $z)
{
    return maxTwo(maxTwo($x, $y), maxTwo($y, $z));
}
$a = 10;
$b = 5;
$c = 7;
$max_num = maxThree($a, $b, $c);
echo "$a, $b, $c 중 가장 큰 수 : $max_num";
?>