<!DOCTYPE html>
<html lang="ko-KR">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../StyleSheet/Master.css">
        <link rel="stylesheet" href="../StyleSheet/Home.css">
        <title>가즈-아(GAZ-AAA) 연습용 가상화폐 거래소</title>
        <?php
            ini_set('display_errors', '0');
            session_start();
            $Connect = mysqli_connect("localhost", "root", "");
            mysqli_query($Connect,'SET names utf8');
            date_default_timezone_set('Asia/Seoul');
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
                        if(!empty($_SESSION['ID'])) printf("<span class=\"HeaderLogin\">%s님 환영합니다.</span><a class=\"HeaderLink\" href=\"Logout.php\">로그아웃</a>", $_SESSION['NickName']);
                        else echo "<a class=\"HeaderLink\" href=\"Login.php\">로그인</a>";
                    ?>
                </div>
                <div class="HeaderLoginBox">
                    <?php
                        if(empty($_SESSION['ID'])) echo "<a class=\"HeaderLink\" href=\"Registry.php\">회원가입</a>";
                        else if($_SESSION['ID'] == "admin") echo "<a class=\"HeaderLink\" href=\"Manage.php\">회원관리</a>";
                    ?>
                </div>
            </div>
        </div>
        <div class="Contents">
            <div id="UpCoins">
                <div class="CointableTitle"><h2>실시간 급상승 코인</h2></div>
                <table>
                    <tr>
                        <th>코인명</th>
                        <th>현재가(KRW)</th>
                        <th>전일대비(24H)</th>
                    </tr>
                    <?php
                        $YesterdayPrices = array(); $TodayPrices = array(); $Fluctuation = array(); $CoinName = array(); $CoinInitial = array();
                        $i = 0; $CoinCounter = 0;
                        $YesterdayDB = date('Ymd_H_', strtotime("-1 day")) . (int)(date('i') / 10) . "Coins";
                        $TodayDB = date('Ymd_H_') . (int)(date('i') / 10) . "Coins";
                        mysqli_select_db($Connect, "coinsdb");
                        $Query = "SHOW TABLES LIKE '$YesterdayDB'";
                        $Result = mysqli_query($Connect, $Query);
                        $Rows = mysqli_fetch_array($Result);
                        if(empty($Rows)) // 어제 DB가 없을 경우 
                        {
                            $Query = "SELECT * FROM $TodayDB";
                            $Result = mysqli_query($Connect, $Query);
                            $Rows = mysqli_fetch_array($Result);
                            if(empty($Rows)) // 오늘 DB도 없을 경우 
                            {
                                printf("서버와 연결이 원활하기 않습니다. 나중에 다시 시도해주세요.");
                                exit();
                            }
                            else
                            {
                                while($Rows = mysqli_fetch_array($Result))
                                {
                                    $YesterdayPrices[$i] = $Rows['Price'];
                                    $i++;
                                }
                            }
                        }
                        else
                        {
                            $Query = "SELECT * FROM $YesterdayDB";
                            $Result = mysqli_query($Connect, $Query);
                            while($Rows = mysqli_fetch_array($Result))
                            {
                                $YesterdayPrices[$i] = $Rows['Price'];
                                $i++;
                            }
                        }
                        $i = 0;
                        mysqli_select_db($Connect, "coins");
                        $Query = "SELECT * FROM coinlist";
                        $Result = mysqli_query($Connect, $Query);
                        while($Rows = mysqli_fetch_array($Result))
                        {
                            $CoinName[$i] = $Rows['CoinName'];
                            $CoinInitial[$i] = $Rows['InitialName'];
                            $TodayPrices[$i] = $Rows['Price'];
                            $i++; $CoinCounter++;
                        }
                        for($i=0;$i<$CoinCounter;$i++)
                        {
                            if($TodayPrices[$i] == 0 || ($YesterdayPrices[$i] / 100) == 0) $Fluctuation[$i] = 0;
                            else $Fluctuation[$i] = $TodayPrices[$i] / ($YesterdayPrices[$i] / 100) - 100;
                        }
                        for($i=0;$i<$CoinCounter;$i++) if($Fluctuation[$i] > 8)
                        {
                            printf("<tr class='tables' onclick='location.href=`Exchange.php?Coin=%s&CoinName=%s`' style='cursor: pointer;'>", $CoinInitial[$i], $CoinName[$i]);
                            printf("<td style='text-align: left;'>%s</td><td style='text-align: right;'>%s</td><td style='text-align: right; color: red;'>+%.2f%%</td>", $CoinName[$i], number_format($TodayPrices[$i]), $Fluctuation[$i]);
                            echo "</tr>";
                        }
                    ?>
                </table>
            </div>
            <div id="DownCoins">
            <div class="CointableTitle"><h2>실시간 급하락 코인</h2></div>
            <table>
                    <tr>
                        <th>코인명</th>
                        <th>현재가(KRW)</th>
                        <th>전일대비(24H)</th>
                    </tr>
                <?php
                    for($i=0;$i<$CoinCounter;$i++) if($Fluctuation[$i] < -8)
                    {
                        printf("<tr class='tables' onclick='location.href=`Exchange.php?Coin=%s&CoinName=%s`' style='cursor: pointer;'>", $CoinInitial[$i], $CoinName[$i]);
                        printf("<td style='text-align: left;'>%s</td><td style='text-align: right;'>%s</td><td style='text-align: right; color: blue;'>%.2f%%</td>", $CoinName[$i], number_format($TodayPrices[$i]), $Fluctuation[$i]);
                        echo "</tr>";
                    }
                ?>
            </table>
            </div>
            <div class="Manual">
                <div class="ManualContents">
                    <a href="HowtoExchange.php" style="display: block; height:fit-content;"><p>매수/매도 하는 방법</p></a>
                    <a href="HoneyTip.php"><p>투자 꿀팁!</p></a>
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
        <?php
            if(isset($_COOKIE['close'])) echo "<div class='background'>";
            else echo "<div class='background show'>";
        ?>
        <div class="window">
            <div class="popup">
                <div style="padding: 20px;">
                    <h2>가상화폐 모의 투자 사이트에 오신것을 환영합니다.</h2>
                    <p>이 사이트(이하 가즈-아)는 모의로 진행하는 투자 사이트이며 투자 시 실제 비용이 들지 않습니다.</p>
                    <p>처음 회원가입 시 가상의 돈이 입급되며 보안을 위해 '내 정보'에 방문하여 개인 정보를 확인하시기 바랍니다.</p>
                    <p style="font-weight: bold; font-size: larger;">회원가입 시 200,000원(KRW) 즉시 지급!</p>
                </div>
                <img id="close_box" src="../img/CheckBox.png" alt="CheckBox">
                <span id="close_again">하루 동안 보지 않기</span>
                <img id="close" title="닫기" src="../img/Close.png" alt="X">
            </div>
        </div>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="Home.js"></script>
        <?php mysqli_close($Connect); ?>
    </body>
</html>