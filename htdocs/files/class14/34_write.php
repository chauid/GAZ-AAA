<?php
$irum=$_POST['irum'];
$pwd=$_POST['pwd'];
$title=$_POST['title'];
$content=$_POST['content'];
$regdate=date('y-m-d');
$connect=mysqli_connect("localhost","root","","sample");
mysqli_query($connect, 'SET names utf8');
$inrec="insert into board(irum,pwd,title,contents,regdate,hits)values('$irum','$pwd','$title','$content','$regdate',0)";
$info=mysqli_query($connect,$inrec);
if(!$info)
    die("글 등록실패");
echo "작성하신 글이 등록되었습니다.<br>";
mysqli_close($connect);
?>
<a href="34_board.php">글목록으로</a>