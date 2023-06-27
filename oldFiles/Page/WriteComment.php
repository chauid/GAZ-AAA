<?php
    ini_set('display_errors', '0');
    session_start();
    if(empty($_SESSION['ID'])) { echo "<script>alert('잘못된 접근입니다.'); history.back();</script>"; exit(); }
    $UserName = $_SESSION['NickName'];
    $UserTag = $_SESSION['UserTag'];
    $CoinName = $_POST['CoinName'];
    $CommentContents = $_POST['Comment'];
    if(empty($CommentContents))
    {
        printf("<script>alert('내용을 작성해 주세요.');</script>");
        printf("<meta http-equiv='refresh' content='0; url=CoinComment.php?CoinName=$CoinName'>");
        exit();
    }
    $Connect = mysqli_connect("localhost", "root", "");
    mysqli_query($Connect,'SET names utf8');
    mysqli_select_db($Connect, "coinscomment");
    date_default_timezone_set('Asia/Seoul');
    $CurrentTime = date('Y-m-d H:i:s');
    $Query = "INSERT INTO " . $CoinName . "(CommentTime, Comment, UserName, UserTag) VALUES('$CurrentTime', '$CommentContents', '$UserName', '$UserTag');";
    mysqli_query($Connect, $Query);
    mysqli_close($Connect);
    printf("<meta http-equiv='refresh' content='0; url=CoinComment.php?CoinName=$CoinName'>");
?>