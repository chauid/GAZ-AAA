<?php
$menu=array("아메리카노","에스프레소","카페모카","프라푸치노");
$choice=$_GET["menu"];
$cnt=count($menu);
$sw=0;
for($i=0; $i<$cnt; $i++)
{
    if($menu[$i]==$choice)
    {
        $sw=1;
        break;
    }
}
if($sw==1) echo "<h2>주문하신 $choice 는 10%할인대상입니다.</h2>";
else echo "주문하신 $choice 는 할인대상이 아닙니다.";
?>
