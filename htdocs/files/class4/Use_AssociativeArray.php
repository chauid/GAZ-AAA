<?php
$person['name']="홍길동";
$person['email']="baba99@intizen.com";
$person['age']="99";
echo "이름 $person[name]<br>";
echo "이메일 $person[email]<br>";
echo "나이 $person[age]<br><br>";
extract($person); //배열 키값=>변수이름
echo "이름 $name<br>";
echo "이메일 $email<br>";
echo "나이 $age<br>";
?>