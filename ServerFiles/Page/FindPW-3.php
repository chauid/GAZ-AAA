<!DOCTYPE html>
<html lang="ko-KR">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../StyleSheet/Master.css">
        <link rel="stylesheet" href="../StyleSheet/FindID.css">
        <title>비밀번호 변경 - 가즈-아(GAZ-AAA)</title>
        <?php
            session_start();
            $Connect = mysqli_connect("localhost", "root", "");
            mysqli_query($Connect,'SET names utf8');
            date_default_timezone_set('Asia/Seoul');
            $UserBirth = $_POST['UserBirth'];
            if(empty($UserBirth)) { echo "<script>alert('잘못된 접근입니다.'); history.back();</script>"; exit(); }
            $UserHomeTown = $_POST['UserHomeTown'];
            mysqli_select_db($Connect, "user");
            $Query = "SELECT * FROM userlist WHERE Birth='$UserBirth' and HomeTown='$UserHomeTown'";
            $Result = mysqli_query($Connect, $Query);
            $UserID = "";
            while($Rows = mysqli_fetch_array($Result)) $UserID = $Rows['ID'];
            if($UserID == "") echo "<script>alert('회원 정보가 일치하지 않습니다.'); location.href='FindPW.php';</script>";
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
        <div class="FindID_Window">
            <div class="InputForm">
                <div id="FindID"><h2>비밀번호 변경</h2></div>
                <form action="ChangePW.php" method="POST">
                    <div class="FindID">
                        <?php printf("<input type='hidden' name='UserID' value='%s'>", $UserID); ?>
                        <label for="UserPW">새 비밀번호*</label>
                        <input type="password" name="UserPW" placeholder="새 비밀번호 입력" minlength="8" maxlength="20" required>
                        <br>
                        <label for="UserPWChk">비밀번호 확인*</label>
                        <input type="password" name="UserPWChk" placeholder="비밀번호 재입력" minlength="8" maxlength="20" required>
                    </div>
                    <input id="FindIDButton" type="submit" value="다음">
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
        <script>
            document.getElementById('Birth').max= new Date().toISOString().substring(0, 10);
        </script>
        <?php mysqli_close($Connect); ?>
    </body>
</html>