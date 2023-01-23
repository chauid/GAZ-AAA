<?php
$jcode=$_POST['jcode'];
$irum=$_POST['irum'];
$que=$_POST['que'];
$price=$_POST['price'];
$connect=mysqli_connect("localhost","root","");
mysqli_select_db($connect,"sample");
//mysqli_query('set names utf8');
$inrec="insert into goods values('$jcode','$irum','$que','$price')";
$info=mysqli_query($connect,$inrec);

if(!$info) die("테이블 등록실패_키값 중복 확인");
else echo "등록성공하였습니다.";
Mysqli_close($connect);
?>
