<?php
$money=$_GET["money"];
$rentpay=$_GET["rentpay"];
$tot=$money+($rentpay*100);
echo "<h1>귀하의 환산보증금은 $tot 원입니다.</h1>";
if($tot > 240000000) {
    $rem=$tot-240000000;
    echo "소액임차기준 $rem 원이 초과되어 소액임차인 적용대상이 되지 않습니다.";
}
else {
    echo "소액임차인 적용대상이 됩니다. ";
    echo "전체금액의 30% 이내 즉,".$tot*0.3."정도 회수됩니다.<br>";
}
echo "상기임대차보호법과 관련한 자세한 내용은 질문으로 보내주세요.";
?>