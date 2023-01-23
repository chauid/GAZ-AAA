<!DOCTYPE html>
<html lang="ko-KR">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../StyleSheet/Master.css">
        <link rel="stylesheet" href="../StyleSheet/Investments.css">
        <title>내 투자 내역 - 가즈-아(GAZ-AAA) 연습용 가상화폐 거래소</title>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script>
            setInterval(function() {
                $("#MyInvestments").load(location.href+" #MyInvestments");
            }, 1000);
        </script>
        <?php
            //ini_set('display_errors', '0');
            session_start();
            $Connect = mysqli_connect("localhost", "root", "");
            mysqli_query($Connect,'SET names utf8');
            date_default_timezone_set('Asia/Seoul');
            $Query; $Result; $ExCount = 0; $ExchangeTime = array(); $CoinName = array();
            $Count = array(); $Buying = array(); $Sell = array(); $Gain = 0; $Loss = 0;
            $UserNickName; $UserAsset; $UserIncome; $UserTag;
            if(!empty($_SESSION['ID']))
            {
                mysqli_select_db($Connect, "user_exchangedb");
                $Query = "SELECT * FROM " . $_SESSION['ID'];
                $Result = mysqli_query($Connect, $Query);
                while($Rows = mysqli_fetch_array($Result))
                {
                    $ExchangeTime[$ExCount] = $Rows['ExchangeTime']; $CoinName[$ExCount] = $Rows['CoinName'];
                    $Count[$ExCount] = $Rows['Count']; $Buying[$ExCount] = $Rows['Buying']; $Sell[$ExCount] = $Rows['Sell'];
                    $Gain += $Rows['Sell']; $Loss += $Rows['Buying'];
                    $ExCount++;
                }
                mysqli_select_db($Connect, "user");
                $Query = "SELECT NickName, Asset, Income, UserTag FROM userlist WHERE ID='" . $_SESSION['ID'] . "'";
                $Result = mysqli_query($Connect, $Query);
                $Rows = mysqli_fetch_array($Result);
                $UserNickName = $Rows['NickName']; $UserAsset = $Rows['Asset']; $UserIncome = $Rows['Income']; $UserTag = $Rows['UserTag'];
            }
            else
            {
                echo "<script>alert('로그인 후 이용가능합니다.');</script>";
                echo "<meta http-equiv='refresh' content='0; url=Login.php'>";
                exit();
            }
        ?>
    </head>
    <body>
        <div class="Header">
            <div class="HeaderNav">
                <a class="Logo" href="Home.php"><img class="Logo" src="../img/Logo.png" alt="GAZ-AAA"></a>
                <p class="HeaderContents"><a class="HeaderLink" href="Exchange.php">거래소</a></p>
                <p class="HeaderContents"><a class="HeaderLink" href="Investments.php">투자내역</a></p>
                <p class="HeaderContents"><a class="HeaderLink" href="Profile.php">내 정보</a></p>
            </div>
            <div class="HeaderLogin">
                <div class="HeaderLoginBox">
                    <?php
                        if($_SESSION['ID'] != NULL) printf("<span class=\"HeaderLogin\">%s님 환영합니다.</span><a class=\"HeaderLink\" href=\"Logout.php\">로그아웃</a>", $_SESSION['NickName']);
                        else echo "<a class=\"HeaderLink\" href=\"Login.php\">로그인</a>";
                    ?>
                </div>
                <div class="HeaderLoginBox">
                    <?php
                        if($_SESSION['ID'] == "admin") echo "<a class=\"HeaderLink\" href=\"Manage.php\">회원관리</a>";
                        else if($_SESSION['ID'] != NULL) echo "";
                        else echo "<a class=\"HeaderLink\" href=\"Registry.php\">회원가입</a>";
                    ?>
                </div>
            </div>
        </div>
        <div class="Contents">
            <div class="MyInvestments">
                <div id="MyInvestments">
                    <h2>내 투자 내역</h2>
                    <?php
                        $TotalPrice = 0; $CurrentTotalPrice = 0; $TotalFluctuation = 0; $TotalPriceFluctuation = 0;
                        $CoinNameList = array(); $CoinInitialList = array(); $AverPrice = array(); $HoldCount = array(); 
                        $Fluctuation = array(); $CurrentPrice = array();
                        mysqli_select_db($Connect, "user_holdcoins");
                        $Query = "SELECT * FROM " . $_SESSION['ID'];
                        $Result = mysqli_query($Connect, $Query);
                        $i = 0;
                        while($Rows = mysqli_fetch_array($Result))
                        {
                            $CoinNameList[$i] = $Rows['CoinName']; $AverPrice[$i] = $Rows['AveragePrice']; $HoldCount[$i] = $Rows['HoldCount'];
                            $TotalPrice += $Rows['AveragePrice'] * $Rows['HoldCount'];
                            $i++;
                        }
                        mysqli_select_db($Connect, "coins");
                        $Query = "SELECT * FROM coinlist";
                        $Result = mysqli_query($Connect, $Query);
                        $i = 0; $k = 0;
                        while($Rows = mysqli_fetch_array($Result))
                        {
                            if($Rows['CoinName'] == $CoinNameList[$k]) $CoinInitialList[$k++] = $Rows['InitialName'];
                            $CurrentPrice[$i] = $Rows['Price'];
                            if($Rows['Price'] == 0 || ($AverPrice[$i] / 100) == 0) $Fluctuation[$i] = 0;
                            else $Fluctuation[$i] = $Rows['Price'] / ($AverPrice[$i] / 100) - 100;
                            $CurrentTotalPrice += $Rows['Price'] * $HoldCount[$i];
                            $i++;
                        }
                        if($TotalPrice == 0 || ($CurrentTotalPrice / 100) == 0) $TotalFluctuation = 0;
                        else $TotalPriceFluctuation = $CurrentTotalPrice / ($TotalPrice / 100) - 100;
                        printf("<p class='Asset'>%s님의 현재 총 자산(거래 가능 금액 + 보유 코인) : %s<span style='color: #848484; font-size: 15px; font-weight: 500;'>KRW</span></p>", $UserNickName, number_format($UserAsset + $CurrentTotalPrice));
                        printf("<p class='Asset' style='margin-top: -30px; margin-bottom: 30px;'>현재 보유 자산(거래 가능 금액) : %s<span style='color: #848484; font-size: 15px; font-weight: 500;'>KRW</span></p>", number_format($UserAsset));
                        if($TotalPrice == 0) printf("<p>아직 보유 코인이 없습니다.</p><br><br>");
                        else
                        {
                            if($UserIncome == 0)printf("<p class='Asset' style='margin-top:10px; margin-bottom: 20px;'>순 이익 : %s<span style='color: #848484; font-size: 15px; font-weight: 500;'>KRW</span></p>",number_format($UserIncome));
                            else if($UserIncome > 0) printf("<p class='Asset' style='margin-top:10px; margin-bottom: 20px;'>순 이익 : <span style='color: #F02020;'>%s</span><span style='color: #848484; font-size: 15px; font-weight: 500;'>KRW</span></p>",number_format($UserIncome));
                            else printf("<p class='Asset' style='margin-top:10px; margin-bottom: 20px;'>적자 : <span style='color: #2020F0;'>%s</span><span style='color: #848484; font-size: 15px; font-weight: 500;'>KRW</span> ㅠㅠ...</p>",number_format($UserIncome));
                            printf("<p class='Asset' style='margin-top:10px; margin-bottom: 20px;'>코인에 쏟아부은 돈 : %s<span style='color: #848484; font-size: 15px; font-weight: 500;'>KRW</span></p>", number_format($TotalPrice));
                            if($TotalPriceFluctuation > 0) printf("<p class='Asset' style='margin-top: -10px; margin-bottom: 30px;'>현재 보유 코인 : %s<span style='color: red;'>(%.2f%%)</span><span style='color: #848484; font-size: 15px; font-weight: 500;'>KRW</span></p>", number_format($CurrentTotalPrice), $TotalPriceFluctuation);
                            else
                            {
                                if($TotalPriceFluctuation < -25)printf("<p class='Asset' style='margin-top: -10px; margin-bottom: 30px;'>현재 보유 코인 : %s<span style='color: blue;'>(%.2f%%)</span><span style='color: #848484; font-size: 15px; font-weight: 500;'>KRW</span><span> ㅠㅠ...</sapn></p>", number_format($CurrentTotalPrice), $TotalPriceFluctuation);
                                else printf("<p class='Asset' style='margin-top: -10px; margin-bottom: 30px;'>현재 보유 코인 : %s<span style='color: blue;'>(%.2f%%)</span><span style='color: #848484; font-size: 15px; font-weight: 500;'>KRW</span></p>", number_format($CurrentTotalPrice), $TotalPriceFluctuation);
                            }
                            printf("<table class='CurrentCoin'>");
                            print("<tr>");
                            printf("<th>코인명</th><th>보유 수량</th><th>내 평균 단가(KRW)</th><th>현재 단가(KRW)</th><th>총 금액(KRW)</th>");
                            print("</tr>");
                            $Result = mysqli_query($Connect, $Query);
                            $i = 0;
                            while($Rows = mysqli_fetch_array($Result))
                            {
                                if($HoldCount[$i] > 0)
                                {
                                    printf("<tr class='holdcoin' onclick='location.href=`Exchange.php?Coin=%s&CoinName=%s`' style='cursor: pointer;'>", $CoinInitialList[$i], $CoinNameList[$i]);
                                    if($Fluctuation[$i] == 0)printf("<td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s(%.2f%%)</td>", $CoinNameList[$i], number_format($HoldCount[$i]), number_format($AverPrice[$i]), number_format($CurrentPrice[$i]), number_format($CurrentPrice[$i] * $HoldCount[$i]), $Fluctuation[$i]);
                                    else if($Fluctuation[$i] > 0) printf("<td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s<span style='color: red;'>(+%.2f%%)</span></td>", $CoinNameList[$i], number_format($HoldCount[$i]), number_format($AverPrice[$i]), number_format($CurrentPrice[$i]), number_format($CurrentPrice[$i] * $HoldCount[$i]), $Fluctuation[$i]);
                                    else printf("<td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s<span style='color: blue;'>(%.2f%%)</span></td>", $CoinNameList[$i], number_format($HoldCount[$i]), number_format($AverPrice[$i]), number_format($CurrentPrice[$i]), number_format($CurrentPrice[$i] * $HoldCount[$i]), $Fluctuation[$i]);
                                    printf("</tr>");
                                }
                                $i++;
                            }
                            printf("</table>");
                        }
                    ?>
                    <h3>거래 내역</h3>
                    <table>
                        <tr>
                            <?php
                                if($ExCount == 0) printf("<p>아직 투자 내역이 없습니다.</p><br><br>");
                                else
                                {
                                    printf("<th>거래 시각</th>");
                                    printf("<th>코인명</th>");
                                    printf("<th>거래량</th>");
                                    printf("<th>매수/매도</th>");
                                    printf("<th>평균 단가(KRW)</th>");
                                    printf("<th>거래 금액(KRW)</th>");
                                }
                            ?>
                        </tr>
                        <?php
                            if($ExCount > 0)
                            {

                                for($i=$ExCount-1;$i>=0;$i--)
                                {
                                    printf("<tr>");
                                    printf("<td>%s</td><td>%s</td><td>%s</td>", $ExchangeTime[$i], $CoinName[$i], number_format($Count[$i]));
                                    if($Buying[$i] > 0) printf("<td>매수</td><td>-%s</td><td>-%s</td>", number_format($Buying[$i]), number_format($Buying[$i] * $Count[$i]));
                                    else printf("<td>매도</td><td>+%s</td><td>+%s</td>", number_format($Sell[$i]), number_format($Sell[$i] * $Count[$i]));
                                    printf("</tr>");
                                }
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div class="Footer">
            <div class="SiteInfo">
                <p style="margin-top: 20px">고객 센터 | 010-007빵-빵야빵야 | 서울시 미추홀구 보람동215-2 | 고객 지원 안 합니다. 고객이 없어요!</p>
                <p>본 가상자산은 저위험 상품으로써 수익금의 전부 또는 일부 손실을 초래 할 수 있습니다.</p>
            </div>
            <div class="FooterContents">
                <a class="Logo" href="Home.php"><img class="FooterLogo" src="../img/Logo.png" alt="GAZ-AAA"></a>
                <p>Designed by 누구게?</p>
            </div>
        </div>
        <?php mysqli_close($Connect); ?>
    </body>
</html>