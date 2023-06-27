<!DOCTYPE html>
<html lang="ko-KR">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
        <meta http-equiv='refresh' content="600"> <!--10분마다 새로고침 -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script type="text/javascript" src="DrawChart.js"></script>
        <script>
            let Unit = 0;
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(function (){ drawChart() });
        </script>
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../StyleSheet/Master.css">
        <link rel="stylesheet" href="../StyleSheet/Exchange.css">
        <title>거래소 - 가즈-아(GAZ-AAA) 연습용 가상화폐 거래소</title>
        <?php
            ini_set('display_errors', '0');
            session_start();
            $Connect = mysqli_connect("localhost", "root", "");
            mysqli_query($Connect,'SET names utf8');
            date_default_timezone_set('Asia/Seoul');
            $SelectCoin = ""; $SelectCoinName = "";
            $CoinNews = array(); $CoinNewsContinuous = array();
            if(!empty($_GET['Coin'])) $SelectCoin = $_GET['Coin'];
            if(!empty($_GET['CoinName'])) $SelectCoinName = $_GET['CoinName'];
            else {$SelectCoin = "BTC"; $SelectCoinName = "비투코인"; }
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
            <div class="item1">
                <div id="CoinTitle">
                    <?php
                        $YesterdayPrices = array(); $TodayPrices = array(); $Fluctuation = array(); $CoinName = array(); $CoinInitial = array();
                        $CoinDelisting = array();
                        $i = 0; $CoinCounter = 0; $FluctuationValue = array();
                        $YesterdayDB = date('Ymd_H_', strtotime("-1 day")) . (int)(date('i') / 10) . "Coins";
                        $TodayDB = date('Ymd_H_') . (int)(date('i') / 10) . "Coins";
                        mysqli_select_db($Connect, "coinsdb");
                        $Query = "SHOW TABLES LIKE '$YesterdayDB'";
                        //printf("%s", $Query);
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
                                $Query = "SELECT * FROM $TodayDB";
                                $Result = mysqli_query($Connect, $Query);
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
                            $CoinDelisting[$i] = $Rows['Delisting'];
                            $CoinNews[$i] = $Rows['News'];
                            $CoinNewsContinuous[$i] = $Rows['NewsContinuous'];
                            $CoinInitial[$i] = $Rows['InitialName'];
                            $TodayPrices[$i] = $Rows['Price'];
                            $i++; $CoinCounter++;
                        }
                        for($i=0;$i<$CoinCounter;$i++)
                        {
                            $FluctuationValue[$i] = $TodayPrices[$i] - $YesterdayPrices[$i];
                            if($TodayPrices[$i] == 0 || ($YesterdayPrices[$i] / 100) == 0) $Fluctuation[$i] = 0;
                            else $Fluctuation[$i] = $TodayPrices[$i] / ($YesterdayPrices[$i] / 100) - 100;
                        }
                        for($i=0;$i<$CoinCounter;$i++) if($CoinName[$i] == $SelectCoinName) break;
                        printf("<strong>%s</strong>", $CoinName[$i]);
                        printf("<span style='color: #848484;'> %s/KRW</span><br><hr>", $SelectCoin);
                        if($Fluctuation[$i] > 0)
                        {
                            printf("<strong style='color: red;'>%s</strong>", number_format($TodayPrices[$i]));
                            printf("<span style='color: red;'>KRW</span><br>");
                            printf("<p style='margin: 0px 0px 10px 20px; font-weight: 600; color: red;'>전일 대비 +%.2f%%</p>", $Fluctuation[$i]);
                            printf("<p style='margin: 0px 0px 10px 20px; font-weight: 600; color: red;'>+%s</p>", number_format($FluctuationValue[$i]));
                        }
                        else
                        {
                            printf("<strong style='color: blue;'>%s</strong>", number_format($TodayPrices[$i]));
                            printf("<span style='color: blue;'>KRW</span><br>");
                            printf("<p style='margin: 0px 0px 10px 20px; font-weight: 600; color: blue;'>전일 대비 %.2f%%</p>", $Fluctuation[$i]);
                            printf("<p style='margin: 0px 0px 10px 20px; font-weight: 600; color: blue;'>%s</p>", number_format($FluctuationValue[$i]));
                        }
                        printf("<p id='CurrentPrice' style='display: none;'>%d</p>", $TodayPrices[$i]);
                        if($CoinDelisting[$i] == 1) printf("<p style='margin: 0px 0px 10px 20px; font-weight: 600; color:#C13D3D;'>이 코인은 거래가 중단되었습니다.</p>");
                    ?>
                </div>
            </div>
            <div class="item2">
                <div id="CoinChart">
                    <div style="padding: 15px; padding-bottom: 30px;">
                        <span>단위 : </span><button onclick="LoadUnit(0)">10분</button>&nbsp;<button onclick="LoadUnit(1)">1시간</button>&nbsp;<button onclick="LoadUnit(2)">1일</button>
                        <div style="padding-top: 5px;">
                            <span id="ShowInfo1" class="ShowInfo"></span>
                            <span id="ShowInfo2" class="ShowInfo"></span>
                        </div>
                        <div style="padding-top: 5px;">
                            <span id="ShowInfo3" class="ShowInfo"></span>
                            <span id="ShowInfo4" class="ShowInfo"></span>
                        </div>
                        <div id="Time"></div>
                    </div>
                    <?php
                        printf("<script>var OpeningPrice0 = [];</script>"); // 10분 
                        printf("<script>var ClosingPrice0 = [];</script>");
                        printf("<script>var LowPrice0 = [];</script>");
                        printf("<script>var HighPrice0 = [];</script>");
                        printf("<script>var TimeSet0 = [];</script>");
                        printf("<script>var OpeningPrice1 = [];</script>"); // 1시간 
                        printf("<script>var ClosingPrice1 = [];</script>");
                        printf("<script>var LowPrice1 = [];</script>");
                        printf("<script>var HighPrice1 = [];</script>");
                        printf("<script>var TimeSet1 = [];</script>");
                        printf("<script>var OpeningPrice2 = [];</script>"); // 1일 
                        printf("<script>var ClosingPrice2 = [];</script>");
                        printf("<script>var LowPrice2 = [];</script>");
                        printf("<script>var HighPrice2 = [];</script>");
                        printf("<script>var TimeSet2 = [];</script>");
                        $year = (int)date("Y"); $month = (int)date("m"); $day = (int)date("d");
                        $hour = (int)date("H"); $minute = (int)(date("i") / 10); $LoadDBName;
                        mysqli_select_db($Connect, "coinsdb");
                        for($k=0;$k<40;$k++) // 10분 계산 
                        {
                            printf("<script>TimeSet0[%d] = '%02d:%d0';</script>", $k, $hour, $minute);
                            $LoadTableName = sprintf("%d%02d%02d_%02d_%dCoins", $year, $month, $day, $hour, $minute);
                            $Query = "SHOW TABLES LIKE '$LoadTableName'";
                            $Result = mysqli_query($Connect, $Query);
                            while($Rows = mysqli_fetch_array($Result))
                            {
                                $Query = "SELECT * FROM $LoadTableName WHERE CoinName='$SelectCoinName'";
                                $Result = mysqli_query($Connect, $Query);
                                if(!$Result) continue;
                                $Rows = mysqli_fetch_array($Result);
                                printf("<script>OpeningPrice0[%d] = %d</script>", $k, $Rows['Price']);
                                printf("<script>ClosingPrice0[%d] = %d</script>", $k, $Rows['ClosingPrice']);
                                printf("<script>LowPrice0[%d] = %d</script>", $k, $Rows['LowPrice']);
                                printf("<script>HighPrice0[%d] = %d</script>", $k, $Rows['HighPrice']);
                                //printf("%d %d %d %d<br>", $Rows['Price'], $Rows['ClosingPrice'], $Rows['LowPrice'], $Rows['HighPrice']);
                            }
                            $minute -= 1;
                            if($minute < 0)
                            {
                                $minute = 5; $hour -= 1;
                                if($hour < 0)
                                {
                                    $hour = 23; $day -= 1;
                                    if($day < 1)
                                    {
                                        $month -= 1;
                                        if($month < 1) { $month = 12; $year -= 1; }
                                        if($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8 || $month == 10 || $month == 12) $day = 31;
                                        else if($month == 2) $day = 28;
                                        else $day = 30;
                                    }
                                }
                            }
                        }
                        $year = (int)date("Y"); $month = (int)date("m"); $day = (int)date("d");
                        $hour = (int)date("H"); $minute = (int)(date("i") / 10);
                        mysqli_select_db($Connect, "coinsdb_hour");
                        for($k=0;$k<40;$k++) // 1시간 계산 
                        {
                            printf("<script>TimeSet1[%d] = '%02d:00';</script>", $k, $hour);
                            $LoadTableName = sprintf("%d%02d%02d_%02dCoins", $year, $month, $day, $hour);
                            $Query = "SHOW TABLES LIKE '$LoadTableName'";
                            $Result = mysqli_query($Connect, $Query);
                            while($Rows = mysqli_fetch_array($Result))
                            {
                                $Query = "SELECT * FROM $LoadTableName WHERE CoinName='$SelectCoinName'";
                                $Result = mysqli_query($Connect, $Query);
                                if(!$Result) continue;
                                $Rows = mysqli_fetch_array($Result);
                                printf("<script>OpeningPrice1[%d] = %d</script>", $k, $Rows['Price']);
                                printf("<script>ClosingPrice1[%d] = %d</script>", $k, $Rows['ClosingPrice']);
                                printf("<script>LowPrice1[%d] = %d</script>", $k, $Rows['LowPrice']);
                                printf("<script>HighPrice1[%d] = %d</script>", $k, $Rows['HighPrice']);
                                //printf("%d %d %d %d<br>", $Rows['Price'], $Rows['ClosingPrice'], $Rows['LowPrice'], $Rows['HighPrice']);
                            }
                            $hour -= 1;
                            if($hour < 0)
                            {
                                $hour = 23; $day -= 1;
                                if($day < 1)
                                {
                                    $month -= 1;
                                    if($month < 1) { $month = 12; $year -= 1; }
                                    if($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8 || $month == 10 || $month == 12) $day = 31;
                                    else if($month == 2) $day = 28;
                                    else $day = 30;
                                }
                            }
                        }
                        $year = (int)date("Y"); $month = (int)date("m"); $day = (int)date("d");
                        $hour = (int)date("H"); $minute = (int)(date("i") / 10);
                        for($k=0;$k<40;$k++) // 1일 계산 
                        {
                            $DayOpeningPrice; $DayClosingPrice; $DayLowPrice; $DayHighPrice; $firstvalue = true; $IsExist = false;
                            printf("<script>TimeSet2[%d] = '%02d.%02d';</script>", $k, $month, $day);
                            for($j=1;$j<=24;$j++)
                            {
                                if($j == 24) $LoadTableName = sprintf("%d%02d%02d_00Coins", $year, $month, $day + 1);
                                else $LoadTableName = sprintf("%d%02d%02d_%02dCoins", $year, $month, $day, $j);
                                $Query = "SHOW TABLES LIKE '$LoadTableName'";
                                $Result = mysqli_query($Connect, $Query);
                                while($Rows = mysqli_fetch_array($Result))
                                {
                                    $IsExist = true;
                                    $Query = "SELECT * FROM $LoadTableName WHERE CoinName='$SelectCoinName'";
                                    $Result = mysqli_query($Connect, $Query);
                                    $Rows = mysqli_fetch_array($Result);
                                    if($firstvalue)
                                    {
                                        $DayOpeningPrice = $Rows['Price']; $DayLowPrice = $Rows['LowPrice'];
                                        $DayHighPrice = $Rows['HighPrice']; $DayClosingPrice = $Rows['ClosingPrice'];
                                        $firstvalue = false;
                                    }
                                    else
                                    {
                                        if($Rows['LowPrice'] < $DayLowPrice) $DayLowPrice = $Rows['LowPrice'];
                                        if($Rows['HighPrice'] > $DayHighPrice) $DayHighPrice = $Rows['HighPrice'];
                                        $DayClosingPrice = $Rows['ClosingPrice'];
                                    }
                                }
                            }
                            if($IsExist)
                            {
                                printf("<script>OpeningPrice2[%d] = %d</script>", $k, $DayOpeningPrice);
                                printf("<script>ClosingPrice2[%d] = %d</script>", $k, $DayClosingPrice);
                                printf("<script>LowPrice2[%d] = %d</script>", $k, $DayLowPrice);
                                printf("<script>HighPrice2[%d] = %d</script>", $k, $DayHighPrice);
                                //printf("%d %d %d %d %d<br>", $DayOpeningPrice, $DayClosingPrice, $DayLowPrice, $DayHighPrice, $k);
                            }
                            $day -= 1;
                            if($day < 1)
                            {
                                $month -= 1;
                                if($month < 1) { $month = 12; $year -= 1; }
                                if($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8 || $month == 10 || $month == 12) $day = 31;
                                else if($month == 2) $day = 28;
                                else $day = 30;
                            }
                        }
                    ?>
                    <div id="Chart"></div>
                </div>
            </div>
            <div class="item3">
                <div id="CoinNews" >
                    <div class="CoinNews">
                        <div class="News">
                            <h4>코인 관련 뉴스</h4>
                            <?php
                                for($i=0;$i<$CoinCounter;$i++) if($CoinName[$i] == $SelectCoinName) break;
                                printf("<p style='padding-left: 20px; padding-right: 20px;'>%s</p>", $CoinNews[$i]);
                            ?>
                        </div>
                        <div class="Comment">
                            <?php
                                printf("<a class='Comments' href='CoinComment.php?CoinName=%s'><button class='CommentWindow'>코인 댓글창 보기</button></a>", $SelectCoinName);
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="item4">
                <div id="CoinExchange">
                    <?php printf("<form action='Exchanging.php?Coin=%s&CoinName=%s' method='POST'>", $SelectCoin, $SelectCoinName); ?>
                        <div class="Order">
                            <?php
                                $UserAsset; $HoldCoins = 0; $HoldCoinPrice = 0; $CurrentCoinFluctuation = 0;
                                if(!empty($_SESSION['ID']))
                                {
                                    mysqli_select_db($Connect, "user");
                                    $Query = "SELECT Asset FROM userlist WHERE ID='" . $_SESSION['ID'] . "'";
                                    $Result = mysqli_query($Connect, $Query);
                                    $Rows = mysqli_fetch_row($Result);
                                    $UserAsset = $Rows[0];
                                    mysqli_select_db($Connect, "user_holdcoins");
                                    $Query = "SELECT HoldCount, AveragePrice FROM " . $_SESSION['ID'] . " WHERE CoinName='" . $SelectCoinName . "'";
                                    $Result = mysqli_query($Connect, $Query);
                                    $Rows = mysqli_fetch_array($Result);
                                    $HoldCoins = $Rows['HoldCount']; $HoldCoinPrice = $Rows['AveragePrice'];
                                }
                                else $UserAsset = 0;
                                if($TodayPrices[$i] == 0 || ($HoldCoinPrice / 100) == 0) $CurrentCoinFluctuation = 0;
                                else $CurrentCoinFluctuation = $TodayPrices[$i] / ($HoldCoinPrice / 100) - 100;
                                printf("<div style='border-bottom: 2px solid #BFBFBF;'>");
                                printf("<div class='ExchangeMoney'>");
                                printf("<span>보유 수량</span>");
                                printf("<span><span>%s</span><span style='font-size: 12px;'>%s</span></span>", number_format($HoldCoins), $SelectCoin);
                                printf("</div>");
                                printf("<div class='ExchangeMoney'>");
                                printf("<span>평균 단가</span>");
                                printf("<span><span>%s</span><span style='font-size: 12px;'>KRW</span></span>", number_format($HoldCoinPrice));
                                printf("</div>");
                                printf("<div class='ExchangeMoney'>");
                                printf("<span><b>총 금액</b></span>");
                                printf("<span><span id='TotalPrice'>%s", number_format($TodayPrices[$i] * $HoldCoins));
                                if($CurrentCoinFluctuation == 0) printf("");
                                else if($CurrentCoinFluctuation > 0) printf("<span style='color: red;'>(+%.2f%%)</span>", $CurrentCoinFluctuation);
                                else printf("<span style='color: blue;'>(%.2f%%)</span>", $CurrentCoinFluctuation);
                                printf("</span><span style='font-size: 12px;'>KRW</span></span>");
                                printf("</div>");
                                printf("</div>");
                                printf("<div class='ExchangeMoney'>");
                                printf("<span>주문 가능 금액</span>");
                                printf("<span><span>%s</span><span style='font-size: 12px;'>KRW</span></span>", number_format($UserAsset));
                                printf("</div>");
                                printf("<div class='ExchangeMoney'>");
                                printf("<span><span>주문 수량</span><span style='color: #848484; font-size: 14px;'>(%s)</span></span>", $SelectCoin);
                                printf("<input id='ExCoinCount' style='height: 30px; font-size: 17px;' type='number' name='Count' value='0' min='1'>");
                                printf("</div>");
                                printf("<div class='ExchangeMoney'>");
                                printf("<span>총 주문 금액</span>");
                                printf("<span><span id='TotalMoney'>0</span><span style='font-size: 12px;'>KRW</span></span>");
                                printf("</div>");
                                printf("<input style='display: none;' type='text' name='CurrentPrice' value='%s'>", $TodayPrices[$i]);
                                printf("<input style='display: none;' type='text' name='ExCoinName' value='%s'>", $SelectCoinName);
                                ?>
                        </div>
                        <div class="Submit">
                            <?php
                                if(!empty($_SESSION['ID']))
                                {
                                    if($CoinDelisting[$i] == 1)
                                    {
                                        printf("<input class='button' type='submit' name='buy' style='background-color: #848484;' value='매도불가' disabled>");
                                        printf("<input class='button' type='submit' name='buy' style='background-color: #848484;' value='매수불가' disabled>");
                                    }
                                    else
                                    {
                                        printf("<input class='button' type='submit' name='buy' style='background-color: #5178BF;' value='매도'>");
                                        printf("<input class='button' type='submit' name='buy' style='background-color: #EB3232;' value='매수'>");
                                    }
                                }
                                else
                                {
                                    printf("<button type='button' onclick='location.href=`Registry.php`' class='button' style='background-color: #12374C;' >회원가입</button>");
                                    printf("<button type='button' onclick='location.href=`Login.php`' class='button' style='background-color: #196BA0;' >로그인</button>");
                                }
                            ?>
                        </div>
                    </form>
                </div>
            </div>
            <div class="item5">
                <div id="CoinList">
                    <table>
                        <tr style="background-color: #F5DCD2;">
                            <th>코인명</th>
                            <th>현재가</th>
                            <th style="text-align: right;">전일 대비(24H)</th>
                        </tr>
                        <?php
                            for($i=0;$i<$CoinCounter;$i++)
                            {
                                if($SelectCoinName == $CoinName[$i]) printf("<tr onclick='location.href=`Exchange.php?Coin=%s&CoinName=%s`' style='cursor: pointer; background-color: #E7E7E7;'>", $CoinInitial[$i], $CoinName[$i]);
                                else printf("<tr onclick='location.href=`Exchange.php?Coin=%s&CoinName=%s`' style='cursor: pointer;'>", $CoinInitial[$i], $CoinName[$i]);
                                if($Fluctuation[$i] > 0) printf("<td style='text-align: left;'>%s<span style='color: #848484; font-size: 12px;'>%s/KRW</span></td><td style='text-align: right;'>%s</td><td style='text-align: right; color: red;'>+%.2f%%</td>", $CoinName[$i], $CoinInitial[$i], number_format($TodayPrices[$i]), $Fluctuation[$i]);
                                else printf("<td style='text-align: left;'>%s<span style='color: #848484; font-size: 12px;'>%s/KRW</span></td><td style='text-align: right;'>%s</td><td style='text-align: right; color: blue;'>%.2f%%</td>", $CoinName[$i], $CoinInitial[$i], number_format($TodayPrices[$i]), $Fluctuation[$i]);
                                echo "</tr>";
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
        <script src="Exchange.js"></script>
        <?php mysqli_close($Connect); ?>
    </body>
</html>
