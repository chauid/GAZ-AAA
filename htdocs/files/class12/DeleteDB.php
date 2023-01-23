<?php
$jcode=trim($_POST["c_code"]);
$connect=mysqli_connect("localhost","root","");
mysqli_select_db($connect,"sample");

//mysqli_query('set names utf8');

$deldata="delete from goods  where jcode='$jcode'";
$info=mysqli_query($connect,$deldata);
if(!$info)
   die(" 삭제실패");
echo("삭제되었습니다.");
mysqli_close($connect);
?>