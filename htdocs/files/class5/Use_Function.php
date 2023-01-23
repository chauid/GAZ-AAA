<?php
$a=$_GET["start"];
$b=$_GET["end"];
$c=calc_tot($a,$b);
if($c>5050) echo "허용범위초과";
else echo "$c 는 허용범위에 해당";
function calc_tot($st,$et)
{
    $tot=0;
    for($i=$st;$i<=$et;$i++)
    $tot+=$i;
    return $tot;
}
?>
