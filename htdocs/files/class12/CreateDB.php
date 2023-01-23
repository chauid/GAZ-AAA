<?php
$connect=mysqli_connect("localhost","root","");
if(!$connect) echo("db connect error". mysqli_error());
mysqli_select_db($connect, "sample");
$str="create table goods(jcode char(5) not null, irum varchar(20) not null, que int(4), price int (8), primary key(jcode))";
$query=mysqli_query($connect, $str);
if(!$query) echo("테이블 작성 오류<br>");
else echo("테이블 작성 성공<br>");
$insert_query="insert into goods values('제품코드', '제품명', '입고량', '입고단가')";
$insert_result=mysqli_query($connect, $insert_query);
if(!$insert_result) die("등록실패.<br>");
else echo "등록성공";
mysqli_close($connect);
?>
