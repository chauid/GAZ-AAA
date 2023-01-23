<?php
$FileName="addr.txt";
$FileOpen=fopen($FileName,"a");
$newstr="인천광역시 강화군 강화읍 관청리100\n";
fwrite($FileOpen,$newstr);
echo "1건의 주소가 추가되었습니다.";
fclose($FileOpen);
echo "<br>==========================<br>". $FileName ."의 내용<br>";
$FileOpen=fopen($FileName, "r");
while(!feof($FileOpen))
{
    $str=fgets($FileOpen);
    print $str . "<br>";
}
fcloses($FileOpen);
?>