<?php
    $id=$_POST['id'];
    $pwd=$_POST['pwd'];
    $connect=mysqli_connect("localhost","root","");
    mysqli_select_db($connect,"sample");
    mysqli_query($connect,'set names utf8');
    $sqlrec="select * from userinfo where id='$id' and pw='$pwd'";
    $info=mysqli_query($connect, $sqlrec);
    if(!$info)
    {
        echo"<script>alert('아이디 또는 비밀번호가 존재하지 않습니다.');history.back();</script>";
        exit;
    }
    while($i=mysqli_fetch_array($info))
    {
        $b=$i['nickname'];
        $c=$i['regdate'];
    }
    session_start();
    $_SESSION['nicname']=$b;
    $_SESSION['regdate']=$c;
    printf("nic : %s, reg : %s", $b, $c);
?>
<meta http-equiv='refresh' content='0;url=LoginMsg.php'>
