<?php
    session_start();
    if(empty($_SESSION['ID']) || empty($_POST['UserPW'])) { echo "<script>alert('잘못된 접근입니다.'); history.back();</script>"; exit(); }
    $UserID = $_SESSION['ID'];
    $UserPW = $_POST['UserPW'];
    $Connect = mysqli_connect("localhost", "root", "");
    mysqli_query($Connect,'SET names utf8');
    mysqli_select_db($Connect, "user");
    $Query = "DELETE FROM userlist WHERE ID='$UserID'";
    mysqli_query($Connect, $Query);
    $Query = "DROP TABLE $UserID";
    mysqli_select_db($Connect, "user_exchangedb");
    mysqli_query($Connect, $Query);
    mysqli_select_db($Connect, "user_holdcoins");
    mysqli_query($Connect, $Query);
    echo "<script>alert('회원 탈퇴 처리되었습니다.');</script>";
?>
<meta http-equiv='refresh' content='0; url=Logout.php'>