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
<?PHP
function compute_score($student) // 계산
{
    $maxCols=4; // 4과목
    $maxRows=count($student); // 학생 수
    for($i=0;$i<$maxRows;$i++) $student[$i][$maxCols] = 0; // 과목 합계
    for($i=0;$i<$maxRows;$i++) $student[$i][$maxCols+1] = 0; // 과목 평균
    for($i=0;$i<$maxCols+2;$i++) $student[$maxRows][$i] = 0; // 학생 합계
    for($i=0;$i<$maxCols+2;$i++) $student[$maxRows+1][$i] = 0; // 학생 평균
    for($i=0;$i<$maxRows;$i++) // 과목별 계산
    {
        for($j=0;$j<$maxCols;$j++) $student[$i][$maxCols] += $student[$i][$j];
        $student[$i][$maxCols+1] = $student[$i][$maxCols] / $maxCols;
    }
    for($i=0;$i<$maxCols+2;$i++) // 학생별 계산
    {
        for($j=0;$j<$maxRows;$j++) $student[$maxRows][$i] += $student[$j][$i];
        $student[$maxRows+1][$i] = $student[$maxRows][$i] / $maxRows;
    }
    return $student;
}
function print_score($student) // 출력
{
    $maxCols=6; // 4과목+합계+평균
    $maxRows=count($student);
    for($i=0;$i<$maxRows;$i++)
    {
        for($j=0;$j<$maxCols;$j++)
        {
            if($i == $maxRows-1 || $j == $maxCols-1) printf("%8.2f", $student[$i][$j]);
            else printf("%8d", $student[$i][$j]);
        }
        echo "<br>";
    }
}
$student = array(
    array(100, 91, 90, 69), 
    array(99, 89, 81, 60), 
    array(80, 79, 70, 59)
);
$student = compute_score($student);
echo "<pre>";
print_score($student);
echo "</pre>";
?>