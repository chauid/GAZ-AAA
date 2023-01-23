<?php
    session_start();
    $UserID = $_SESSION['ID'];
    $UserBirth = $_POST['UserBirth'];
    $UserHomeTown = $_POST['UserHomeTown'];
    if(empty($UserID) || empty($UserBirth)) { echo "<script>alert('잘못된 접근입니다.'); history.back();</script>"; exit(); }
    $Connect = mysqli_connect("localhost", "root", "");
    mysqli_query($Connect,'SET names utf8');
    mysqli_select_db($Connect, "user");
    $Query = "UPDATE userlist SET Birth='$UserBirth', HomeTown='$UserHomeTown' WHERE ID='$UserID'";
    mysqli_query($Connect, $Query);
?>
<meta http-equiv='refresh' content='0; url=Profile.php'>