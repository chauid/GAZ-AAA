<html lang="ko">
   <head>
      <meta charset="UTF-8">
      <title>구구단 출력</title>
      <style>
         pre {
            margin: 5px;
            padding: 10px;
            width: fit-content;
            background-color: #E6F2FE;
            color: #7559AF;
            font-weight: 700;
            animation: backcolor 3s infinite;
         }
         @keyframes backcolor {
            from {
               background-color: #E6F2FE;
               color: #7559AF;
            }
            50% {
               background-color: #B8C1CB;
               color: #2E2346;
            }
            to {
               background-color: #E6F2FE;
               color: #7559AF;
            }
         }
      </style>
   </head>
</html>
<?PHP
// gugudan.php
// 구구단 출력
echo "<font size=5>구구단 프로그램</font><br>";
echo "<pre>";
for ($Row = 1; $Row <= 9; $Row++) {
   $Col = 2;
   While ($Col <= 9) {
      if ($Col == 2) printf("%d * %d = %2d", $Col, $Row, $Col * $Row);
      else printf("%3d * %d = %2d", $Col, $Row, $Col * $Row);
      $Col = $Col + 1;
   }
   echo "<Br>";
}
echo "</pre>"; 
?>

