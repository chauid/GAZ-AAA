<!DOCTYPE html>
<html lang="ko-KR">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../StyleSheet/Master.css">
        <link rel="stylesheet" href="../StyleSheet/Profile.css">
        <title>꿀팁 - 가즈-아(GAZ-AAA) 연습용 가상화폐 거래소</title>
        <?php session_start(); ?>
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
        <div>

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
    </body>
</html>