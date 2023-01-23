<?PHP
$s=$_GET["s"];
mt_srand ((double) microtime () * 1000000);
$random = mt_rand (0, 2);
switch ($random)
{
    case 0: $c = "가위"; break;
    case 1: $c = "바위"; break;
    case 2: $c = "보"; break;
}
print "컴퓨터는 ".$c."를 선택했습니다. ";
if ($s == $c)
    print "=> 비겼습니다.";
else if (($s == "가위" && $c == "보") || 
    ($s == "바위" && $c == "가위") || 
    ($s == "보" && $c == "바위")) print "=> 이겼습니다.";
else print "=> 졌습니다.";
?>