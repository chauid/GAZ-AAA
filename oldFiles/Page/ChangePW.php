<?php
    session_start();
    if(!empty($_SESSION['ID'])) // 사용자 로그인 상태
    {
        $UserID = $_SESSION['ID'];
        $UserID = strtolower($UserID);
        $PWLegacy = $_POST['UserLegacyPW'];
        if(empty($PWLegacy)) { echo "<script>alert('잘못된 접근입니다.'); history.back();</script>"; exit(); }
        $PWLegacy_hash = hash("SHA256", $PWLegacy . $UserID);
        $Connect = mysqli_connect("localhost", "root", "");
        mysqli_query($Connect,'SET names utf8');
        mysqli_select_db($Connect, "user");
        $Query = "SELECT * FROM userlist WHERE ID='$UserID' AND PW='$PWLegacy_hash'";
        $Result = mysqli_query($Connect, $Query);
        $AuthID = "";
        while($Rows = mysqli_fetch_array($Result)) $AuthID = $Rows['ID'];
        if($AuthID == "") { mysqli_close($Connect); echo "<script>alert('기존 비밀번호가 일치하지 않습니다.'); history.back();</script>"; exit(); }
    }
    else // 사용자 비로그인
    {
        $UserID = $_POST['UserID'];
        $UserID = strtolower($UserID);
        $Connect = mysqli_connect("localhost", "root", "");
        mysqli_query($Connect,'SET names utf8');
        mysqli_select_db($Connect, "user");
    }
    $UserPW = $_POST['UserPW'];
    $UserPWChk = $_POST['UserPWChk'];
    if($UserPW != $UserPWChk) { echo "<script>alert('새 비밀번호가 일치하지 않습니다.'); history.back();</script>"; exit(); }
    $PW_hash = hash("SHA256", $UserPW . $UserID);
    $Query = "UPDATE userlist SET PW='$PW_hash' WHERE ID='$UserID'";
    mysqli_query($Connect, $Query);
    mysqli_close($Connect);
    echo "<script>alert('비밀번호를 변경하였습니다.');</script>";
    if(!empty($_SESSION['ID'])) printf("<meta http-equiv='refresh' content='0; url=Profile.php'>");
    else printf("<meta http-equiv='refresh' content='0; url=Login.php'>");
?>