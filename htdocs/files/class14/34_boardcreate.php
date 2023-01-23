<?php
$connect=mysqli_connect('localhost','root','', 'sample');
if(!$connect)
    die("DB connect error");
mysqli_select_db($connect,"sample");
$str="create table board(no int not null auto_increment,irum varchar(10) not null,pwd varchar(5) not null,title varchar(50) not null, content text not null,regdate date, hits int, primary key(no))";

$qury=mysqli_query($connect,$str);
if(!$qury)
   die("테이블 작성 오류");
else
   echo("테이블 작성 성공");
mysqli_close($connect);
?>
