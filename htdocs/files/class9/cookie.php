<?php
$cook1=setcookie("cookie1", "apm", time()+30);
$cook2=setcookie("cookie2", "che", time()+15);

echo "쿠키를 생성하는 setcookie() 함수 사용 <br>";
echo "=========================================<br>";
if($cook1 && $cook2)
{
    echo "두 개의 쿠기가 생성되었습니다.<br>";
    echo "1. 쿠키이름 : <b>cookie1</b> | 쿠키 값 : apm <br>";
    echo "2. 쿠키이름 : <b>cookie2</b> | 쿠키 값 : che <br>";
    echo "쿠키는 30/15초간 지속됩니다.<br>";
}
else
{
    echo "쿠키가 생성되지 않았습니다.<br>";
}
?>