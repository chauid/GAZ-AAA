<?PHP
$year = gmdate ("Y"); $mon = gmdate ("m"); $day = gmdate ("d");
$hour = gmdate ("g"); $min = gmdate ("i"); $sec = gmdate ("s");
$seconds = mktime ($hour, $min, $sec, $mon, $day, $year);

$seoul = getdate(mktime($hour+9, $min, $sec, $mon, $day, $year));
echo "서울 시간: " . 
$seoul["year"] . "년 " . $seoul["mon"] . "월 " . $seoul["mday"] . "일 " . 
$seoul["hours"] . "시 " . $seoul["minutes"] . "분 " . 
$seoul["seconds"]. "초<br>";

$newyork = getdate (mktime ($hour-5, $min, $sec, $mon, $day, $year));
echo "뉴욕 시간: " .
$newyork["year"] . "년 " . $newyork["mon"] . "월 " . $newyork["mday"] . "일 " . 
$newyork["hours"] . "시 " . $newyork["minutes"] . "분 " . 
$newyork["seconds"]. "초<br>";

$paris = getdate (mktime ($hour+1, $min, $sec, $mon, $day, $year));
echo "파리 시간: " .
$paris["year"] . "년 " . $paris["mon"] . "월 " . $paris["mday"] . "일 " . 
$paris["hours"] . "시 " . $paris["minutes"] . "분 " . 
$paris["seconds"]. "초<br>";
?>