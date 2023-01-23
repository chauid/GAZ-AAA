<?php
    $ID = $_POST['UserID'];
    $ID = strtolower($ID);
    $PW = $_POST['UserPW'];
    $PW_hash = hash("SHA256", $PW . $ID);
    $Connect = mysqli_connect("localhost", "root", "");
    mysqli_query($Connect,'SET names utf8');
    mysqli_select_db($Connect, "user");
    $Query = "SELECT * FROM userlist WHERE ID='$ID' AND PW='$PW_hash'";
    $Result = mysqli_query($Connect, $Query);
    $UserID = "";
    while($Rows = mysqli_fetch_array($Result))
    {
        $UserID = $Rows['ID'];
        $UserName = $Rows['UserName'];
        $UserNickName = $Rows['NickName'];
        $UserTag = $Rows['UserTag'];
    }
    if($UserID == "") { mysqli_close($Connect); echo "<script>alert('로그인 정보가 일치하지 않습니다.'); history.back();</script>"; }
    else
    {
        session_start();
        $_SESSION['ID'] = $UserID;
        $_SESSION['UserName'] = $UserName;
        $_SESSION['NickName'] = $UserNickName;
        $_SESSION['UserTag'] = $UserTag;
        mysqli_close($Connect);
    }
?>
<meta http-equiv='refresh' content='0; url=Home.php'>