<?php
$FileName="addr.txt";
$File=file_exists($FileName);
if(!$File) echo "addr.txt 파일이 없음.";
else
{
    $FileOpen=fopen($FileName, "r");
    while(!feof($FileOpen))
    {
        $str=fgets($FileOpen);
        print $str . "<br>";
    }
    fclose($FileOpen);
}
?>