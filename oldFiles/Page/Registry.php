<!DOCTYPE html>
<html lang="ko-KR">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../StyleSheet/Master.css">
        <link rel="stylesheet" href="../StyleSheet/Registry.css">
        <title>회원가입 - 가즈-아(GAZ-AAA)</title>
        <?php
            session_start();
            if(!empty($_SESSION['ID'])) { echo "<script>alert('회원가입은 로그아웃을 하고 시도해 보세요.'); history.back();</script>"; exit(); }
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
                        if($_SESSION['ID'] != NULL) echo "";
                        else echo "<a class=\"HeaderLink\" href=\"Registry.php\">회원가입</a>";
                    ?>
                </div>
            </div>
        </div>
        <div class="Registry_Window">
            <div class="InputForm">
                <div id="Registry"><h2>회원가입</h2></div>
                <form action="RegistryUser.php" method="POST">
                    <div class="Registry">
                        <label for="UserID">아이디*</label>
                        <input type="text" name="UserID" placeholder="아이디 입력(영문/숫자)" minlength="3" maxlength="15" pattern="^[a-zA-Z0-9]+$" required>
                        <br>
                        <label for="UserName">이름*</label>
                        <input type="text" name="UserName" placeholder="이름 입력" maxlength="15" required>
                        <br>
                        <label for="UserName">별칭(닉네임)*</label>
                        <input type="text" name="UserNickName" placeholder="별칭 입력" maxlength="15" required>
                        <br>
                        <label for="UserPhone">휴대전화 번호*</label>
                        <input type="text" name="UserPhone" placeholder="휴대전화 번호 '-'없이" pattern="[0-9]+" minlength="11" maxlength="11" required>
                        <br>
                        <label for="UserPW">비밀번호*</label>
                        <input type="password" name="UserPW" placeholder="비밀번호 입력" minlength="8" maxlength="20" required>
                        <br>
                        <label for="UserPWChk">비밀번호 확인*</label>
                        <input type="password" name="UserPWChk" placeholder="비밀번호 재입력" minlength="8" maxlength="20" required>
                    </div>
                    <input id="RegistryButton" type="submit" value="가입하기">
                </form>
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
    </body>
</html>
