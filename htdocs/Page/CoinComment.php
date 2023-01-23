<!DOCTYPE html>
<html lang="ko-KR">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../StyleSheet/Master.css">
        <link rel="stylesheet" href="../StyleSheet/CoinComment.css">
        <?php
            ini_set('display_errors', '0');
            session_start();
            $SelectCoin = ""; $SelectCoinName = "";
            if(!empty($_GET['Coin'])) $SelectCoin = $_GET['Coin'];
            if(!empty($_GET['CoinName'])) $SelectCoinName = $_GET['CoinName'];
            printf("<title>%s 댓글 - 가즈-아(GAZ-AAA) 연습용 가상화폐 거래소</title>", $SelectCoinName);
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
            <div class="Comments">
                <div class="CoinTitle">
                    <?php
                        printf("<div style='display: flex; align-items: center; height: 100px;'>");
                        printf("<a style='display: flex; width: 30px; height: 30px;' href='Exchange.php?Coin=%s&CoinName=%s'><img style='width:30px' src='../img/Back.png' alt='Back'></a>", $SelectCoin, $SelectCoinName);
                        printf("<h3 style='margin-left: 100px;'>%s 댓글</h3>", $SelectCoinName);
                        printf("</div>");
                    ?>
                </div>
                <div class="CommentList">
                    <form action="WriteComment.php" method="POST">
                        <?php
                            if(!empty($_SESSION['ID']))
                            {
                                printf("<input type='text' name='CoinName' value='%s' style='display: none;'>", $SelectCoinName);
                                printf("<textarea id='Comment' name='Comment' placeholder='댓글 작성하기.' rows: 10; require style='width: 100%%; height: 80px; resize: none; font-size: 16px;'></textarea>");
                                printf("<span id='Comment_cnt'>0/100</span>");
                                printf("<input type='submit' value='작성완료' style='margin-left: 10px;'>");
                            }
                            else
                            {
                                printf("<textarea name='Comment' placeholder='로그인 후 작성 가능합니다.' style='width: 100%%; height: 80px; resize: none; font-size: 16px;'></textarea>");
                                printf("<button type='button' onclick='location.href=`Login.php`' >로그인</button>");
                            }
                        ?>
                    </form>
                    <ul>
                        <?php
                            mysqli_select_db($Connect, "coinscomment");
                            $Query = "SELECT * FROM " . $SelectCoinName . " ORDER BY CommentTime DESC";
                            $Result = mysqli_query($Connect, $Query); $CommentCount = 0;
                            while($Rows = mysqli_fetch_array($Result))
                            {
                                printf("<li>");
                                printf("<p><span style='font-size: 20px;'>%s </span><span class='UserTag'>%s</span><span> %s </span>", $Rows['UserName'], $Rows['UserTag'], $Rows['CommentTime']);
                                if($_SESSION['NickName'] == $Rows['UserName'] || $_SESSION['ID'] == "admin") printf("<a class='DeleteComment' href='DeleteComment.php?CoinName=%s&CommentNumber=%s&Writer=%s'>삭제</a>", $SelectCoinName, $Rows['Number'], $Rows['UserName']);
                                printf("</p>");
                                printf("<p>%s</p>", $Rows['Comment']);
                                printf("</li>");
                                $CommentCount++;
                            }
                            if($CommentCount == 0) printf("<p>아직 댓글이 없습니다.</p>");
                        ?>
                    </ul>
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
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#Comment').on('keyup', function() {
                    $('#Comment_cnt').html("("+$(this).val().length+" / 200)");
                    if($(this).val().length > 200) {
                    $(this).val($(this).val().substring(0, 200));
                    $('#Comment_cnt').html("(200 / 200)");
                    }
                });
            });
        </script>
    </body>
</html>