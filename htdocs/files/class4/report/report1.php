<?php
$Array="ABCDE";
$Arraylength=mb_strlen("$Array", "UTF-8");
for($i=0;$i<$Arraylength;$i++)
{
    for($k=0;$k<=$i;$k++) printf("%s ", substr($Array, $k, 1));
    echo "<br>";
}
for($i=$Arraylength-1;$i>=0;$i--)
{
    for($k=0;$k<$i;$k++) printf("%s ", substr($Array, $k, 1));
    echo "<br>";
}
?>