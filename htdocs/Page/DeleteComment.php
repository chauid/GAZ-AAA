<?php
    session_start();
    if(empty($_SESSION['ID'])) { echo "<script>alert('잘못된 접근입니다.'); history.back();</script>"; exit(); }
    $CommentNumber = $_GET['CommentNumber'];
    $CoinName = $_GET['CoinName'];
    $CommentWriter = $_GET['Writer'];
    $CurrentUser = $_SESSION['NickName'];
    if($CommentWriter == $CurrentUser || $_SESSION['ID'] == "admin") // (작성자 == 현재 사용자) or (ID == 관리자) => 삭제
    {
        $Connect = mysqli_connect("localhost", "root", "");
        mysqli_query($Connect,'SET names utf8');
        mysqli_select_db($Connect, "coinscomment");
        $Query = "DELETE FROM $CoinName WHERE UserName='$CommentWriter' AND Number='$CommentNumber'";
        mysqli_query($Connect, $Query);
        printf("<meta http-equiv='refresh' content='0; url=CoinComment.php?CoinName=%s'>", $CoinName);
    }
    else { echo "<script>alert('그런다고 삭제 안됩니다.'); history.back();</script>"; exit(); }
?>