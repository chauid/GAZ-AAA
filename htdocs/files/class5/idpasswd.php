<?php
$idchk=strtolower($_POST["id"]);
if(strlen($idchk)<6 or strlen($idchk)>13) echo "입력하신 $idchk 는 아이디 작성규칙에 어긋납니다.<br>";
else echo "$idchk 아이디 인증 성공";
?>