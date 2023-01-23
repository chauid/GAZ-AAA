<?php
    session_start();
    if(empty($_POST['buy'])) { echo "<script>alert('잘못된 접근입니다.'); history.back();</script>"; exit(); }
    $ExchangePrice = $_POST['CurrentPrice'];
    if($ExchangePrice == 0) { echo "<script>alert('아니 거래 중단됐다고...\\n이런 시도는 곤란해;;'); history.back();</script>"; exit(); }
    $Submit = $_POST['buy'];
    $ExchangeCount = $_POST['Count'];
    $ExchangeCoinName = $_POST['ExCoinName'];
    $CoinName = $_GET['CoinName'];
    $Coin = $_GET['Coin'];
    $Connect = mysqli_connect("localhost", "root", "");
    mysqli_query($Connect,'SET names utf8');
    mysqli_select_db($Connect, "user");
    $Query = "SELECT Asset, Income FROM userlist WHERE ID='" . $_SESSION['ID']. "'";
    $Result = mysqli_query($Connect, $Query);
    $Rows = mysqli_fetch_array($Result);
    $ApplyAsset = $Rows['Asset']; $ApplyIncome = $Rows['Income'];
    mysqli_select_db($Connect, "user_holdcoins");
    $Query = "SELECT HoldCount, AveragePrice FROM " . $_SESSION['ID'] . " WHERE CoinName='$ExchangeCoinName';";
    $Result = mysqli_query($Connect, $Query);
    $Rows = mysqli_fetch_array($Result);
    if($Submit == "매수")
    {
        $CalcAverage = ($Rows['HoldCount'] * $Rows['AveragePrice'] + $ExchangeCount * $ExchangePrice) / ($Rows['HoldCount'] + $ExchangeCount);
        $CalcHoldCount = $Rows['HoldCount'] + $ExchangeCount;
        if($ApplyAsset < ($ExchangeCount * $ExchangePrice))
        {
            echo "<script>alert('잔액이 부족합니다. 확인 좀..;;\\n거래가 취소되었습니다.');</script>";
            printf("<meta http-equiv='refresh' content='0; url=Exchange.php?Coin=$Coin&CoinName=$CoinName'>");
            exit();
        }
        else $ApplyAsset -= $ExchangeCount * $ExchangePrice;
    }
    else // 매도
    {
        if($ExchangeCount > $Rows['HoldCount'])
        {
            echo "<script>alert('그만큼 안 가졌잖아요...\\n거래가 취소되었습니다.');</script>";
            printf("<meta http-equiv='refresh' content='0; url=Exchange.php?Coin=$Coin&CoinName=$CoinName'>");
            exit();
        }
        else
        {
            $CalcAverage = $Rows['AveragePrice'];
            $CalcHoldCount = $Rows['HoldCount'] - $ExchangeCount;
            if($CalcHoldCount == 0) $CalcAverage = 0;
            $ApplyAsset += $ExchangeCount * $ExchangePrice;
            $ApplyIncome += $ExchangeCount * ($ExchangePrice - $Rows['AveragePrice']);
        }
    }
    $Query = "UPDATE ". $_SESSION['ID'] . " SET HoldCount=$CalcHoldCount, AveragePrice=$CalcAverage WHERE CoinName='$ExchangeCoinName';";
    mysqli_query($Connect, $Query);
    mysqli_select_db($Connect, "user_exchangedb");
    date_default_timezone_set('Asia/Seoul');
    $CurrentTime = date('Y-m-d H:i:s'); $Query = "";
    if($Submit == "매수") $Query = "INSERT INTO " . $_SESSION['ID'] . " VALUES ('$CurrentTime', '$ExchangeCoinName', '$ExchangeCount', '$ExchangePrice', NULL);";
    else $Query = "INSERT INTO " . $_SESSION['ID'] . " VALUES ('$CurrentTime', '$ExchangeCoinName', '$ExchangeCount', NULL, '$ExchangePrice');";
    mysqli_query($Connect, $Query);
    mysqli_select_db($Connect, "user");
    $Query = "UPDATE userlist SET Asset='$ApplyAsset', Income='$ApplyIncome' WHERE ID='" . $_SESSION['ID'] . "'";
    mysqli_query($Connect, $Query);
    mysqli_close($Connect);
    printf("<meta http-equiv='refresh' content='0; url=Exchange.php?Coin=$Coin&CoinName=$CoinName'>");
?>