<?php
$a=$_GET["birth"];
switch($a % 12) {
    case  0:  echo '원숭이 띠 입니다.';   break;
    case  1:  echo '닭 띠 입니다.' ;   break;
    case  2:  echo '개 띠 입니다.';    break;
    case  3:  echo '돼지 띠 입니다.';   break;
    case  4:  echo '쥐 띠 입니다.';   break;
    case  5:  echo '소 띠 입니다.';    break;
    case  6:  echo '호랑이 띠 입니다.';  break;
    case  7:  echo '토끼 띠 입니다.';  break;
    case  8:  echo '용 띠 입니다.';  break;
    case  9:  echo '뱀 띠 입니다.'; break;
    case 10:  echo '말 띠 입니다.'; break;
    case 11: echo '양 띠 입니다.';
}
?>
