<?php
$FileName="addr.txt";
$content=file($FileName);
unset($content[0]); // 가장 첫번째 줄 삭제
$content=array_values($content);
file_put_contents($FileName,implode($content));
echo "1개의 레코드가 삭제 되었습니다.";
echo "<br>==========================<br>". $FileName ."의 내용<br>";
$FileOpen=fopen($FileName, "r");
while(!feof($FileOpen))
{
    $str=fgets($FileOpen);
    print $str . "<br>";
}
fclose($FileOpen);
?>
