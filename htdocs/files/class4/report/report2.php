<html lang="ko">
   <head>
      <meta charset="UTF-8">
      <title>학생 N명 4과목 성적처리</title>
      <style>
         pre {
            margin: 20px;
            padding: 10px;
            width: fit-content;
            font-size: 15px;
         }
      </style>
   </head>
</html>
<?php
$student=array(
    array(100, 91, 90, 69),
    array(99, 89, 81, 60),
    array(80, 79, 70, 59)
);
foreach($student as $y => $arr)
{
    $sum=0;
    foreach($arr as $x => $value) $sum=$sum+$value;
    $student[$y][$x+1]=$sum; //1차원 배열의 다음 인덱스값 추가 가능
}
$maxY=count($student); //새로운 배열 행(2차원) 추가를 위한 2차원 배열 최댓값 구하기
$maxX=count($student[0]);
//새로운 배열 행 추가(배열의 자릿수를 미리 선언이 안 됨)
for($i=0;$i<$maxX;$i++) $student[$maxY][$i]=0;
for($i=0;$i<$maxX;$i++)
{
    $sum=0;
    foreach($student as $a => $b) $sum=$sum+$b[$i];
    $student[$maxY][$i]=$sum; //2차원 배열의 다음 인덱스값 추가 불가능
}
echo "<pre>";
foreach($student as $y => $arr)
{
    foreach($arr as $x) printf("%10d", $x);
    echo "<br>";
}
echo "</pre>";
?>