<?php
$pw1=$_POST["pw"];
$pw2=$_POST["repw"];
if(strcmp($pw1,$pw2)!= 0)
   printf("비밀번호 %s 와 비밀번호확인 %s 이 일치하지 않습니다.",$pw1,$pw2);
else
   echo "비밀번호가 정확히 인증되었습니다.";
?>
