<?php
if(empty($_POST['UserID']) || empty($_POST['UserPW']) || empty($_POST['UserPhone']))
    {
        echo "<script>alert('잘못된 접근입니다.'); history.back();</script>";
        exit();
    }
    $UserID = $_POST['UserID'];
    $UserID = strtolower($UserID);
    $UserPhone = $_POST['UserPhone'];
    $UserPW = $_POST['UserPW'];
    $UserPWChk = $_POST['UserPWChk'];
    if($UserPW != $UserPWChk) echo "<script>alert('비밀번호가 일치하지 않습니다.'); history.back();</script>";
    $UserPW_hash = hash("SHA256", $UserPW . $UserID);
    $UserName = $_POST['UserName'];
    $UserNickName = $_POST['UserNickName'];
    $Connect = mysqli_connect("localhost", "root", "");
    mysqli_query($Connect,'SET names utf8');
    mysqli_select_db($Connect, "coins");
    $CoinNameList = array(); $Result; $CoinCount = 0;
    $Query = "SELECT CoinName FROM coinlist";
    $Result = mysqli_query($Connect, $Query);
    while($Rows = mysqli_fetch_array($Result)) $CoinNameList[$CoinCount++] = $Rows['CoinName'];
    mysqli_select_db($Connect, "user");
    $Duplicate = 1;
    $Query = "SELECT * FROM userlist WHERE ID='$UserID'";
    $Result = mysqli_query($Connect, $Query);
    while($Rows = mysqli_fetch_array($Result)) $Duplicate = $Rows['ID'];
    if($Duplicate != 1) { mysqli_close($Connect); echo "<script>alert('아이디가 중복됩니다.')</script>"; }
    else
    {
        date_default_timezone_set('Asia/Seoul');
        $Today = date('Y-m-d');
        $Query = "INSERT INTO userlist(ID, PW, UserName, NickName, RegistryDate, Asset, Phone) VALUES ('$UserID','$UserPW_hash','$UserName', '$UserNickName', '$Today', 200000, '$UserPhone')";
        mysqli_query($Connect, $Query);
        mysqli_select_db($Connect, "user_exchangedb");
        $Query = "CREATE TABLE " . $UserID . "(ExchangeTime DATETIME NOT NULL, CoinName VARCHAR(20) NOT NULL COLLATE 'euckr_korean_ci', Count INT(11) NOT NULL, Buying INT(11) UNSIGNED NULL DEFAULT NULL, Sell INT(11) UNSIGNED NULL DEFAULT NULL, PRIMARY KEY (`ExchangeTime`) USING BTREE) COLLATE='euckr_korean_ci' ENGINE=InnoDB;";
        mysqli_query($Connect, $Query);
        mysqli_select_db($Connect, "user_holdcoins");
        $Query = "CREATE TABLE " . $UserID . "(CoinName VARCHAR(20) NOT NULL COLLATE 'euckr_korean_ci', HoldCount INT(11) NOT NULL, AveragePrice INT(11) NOT NULL, PRIMARY KEY (CoinName) USING BTREE) COLLATE='euckr_korean_ci' ENGINE=InnoDB;";
        mysqli_query($Connect, $Query);
        for($i=0;$i<$CoinCount;$i++)
        {
            $Query = "INSERT INTO ". $UserID ." VALUES ('". $CoinNameList[$i] . "', 0, 0)";
            mysqli_query($Connect, $Query);
        }
        echo "<script>alert(`회원가입이 완료되었습니다.\n'내 정보'를 확인하세요.`);</script>";
        mysqli_close($Connect);
    }
?>
<meta http-equiv='refresh' content='0; url=Login.php'>
