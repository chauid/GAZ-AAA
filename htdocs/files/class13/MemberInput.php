<?php
    $irum=$_POST['irum'];
    $id=$_POST['id'];
    $nicname=$_POST['nicname'];
    $email=$_POST['email'];
    $pwd=$_POST['pwd'];
    $regdate=$_POST['regdate'];
    $connect=mysqli_connect("localhost","root","");
    mysqli_select_db($connect,"sample");
    mysqli_query($connect, 'set names utf8');
    $inrec="insert into userinfo values('$id', '$pwd', '$nicname','$irum', '$email','$regdate')";
    $info=mysqli_query($connect,$inrec);
    if(!$info)
    die("회원가입실패");
    echo "회원가입이 완료되었습니다.";
    mysqli_close($connect);
?>
<a href="Login.html">처음으로 이동</a>
