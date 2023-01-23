<?php
$sum=0;
$loop=1;
do
{
    $loop++;
    $sum=$sum+$loop;
}
while($loop <= 100);
echo "1부터 100까지 합 : ".$sum;
?>