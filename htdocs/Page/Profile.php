<!DOCTYPE html>
<html lang="ko-KR">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../StyleSheet/Master.css">
        <link rel="stylesheet" href="../StyleSheet/Profile.css">
        <title>내 정보 - 가즈-아(GAZ-AAA) 연습용 가상화폐 거래소</title>
        <?php
            session_start();
            $Connect = mysqli_connect("localhost", "root", "");
            mysqli_query($Connect,'SET names utf8');
            date_default_timezone_set('Asia/Seoul');
            $Query; $Result; $UserID; $UserName; $UserNickName; $UserRegistryDate; $UserTag; $UserPhone; $UserBirth; $UserHomeTown;
            if(!empty($_SESSION['ID']))
            {
                mysqli_select_db($Connect, "user");
                $Query = "SELECT * FROM userlist WHERE ID='" . $_SESSION['ID'] . "'";
                $Result = mysqli_query($Connect, $Query);
                $Rows = mysqli_fetch_array($Result);
                $UserID = $Rows['ID']; $UserName = $Rows['UserName']; $UserNickName = $Rows['NickName'];
                $UserRegistryDate = $Rows['RegistryDate']; $UserTag = $Rows['UserTag'];
                $UserPhone = $Rows['Phone']; $UserBirth = $Rows['Birth']; 
                $UserHomeTown = $Rows['HomeTown'];
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
            <div class="Myprofile">
                <h2>내 정보</h2>
                <div class="Inform">
                    <?php
                        if(!empty($_SESSION['ID']))
                        {
                            printf("<p class='Inform'>내 아이디 : %s</p>", $UserID);
                            printf("<p class='Inform'>내 이름 : %s</p>", $UserName);
                            printf("<p class='Inform'>내 별칭(닉네임) : %s</p>", $UserNickName);
                            printf("<p class='Inform'>가입일자 : %s</p>", $UserRegistryDate);
                            printf("<p class='Inform'>휴대전화 번호 : %s</p>", $UserPhone);
                            printf("<p class='Inform'>나의 투자 태그 : %s</p>", $UserTag);
                            printf("<br><p class='Inform' style='font-size: 14px; color: #E58989;'>이 밑에 정보는 비밀번호 분실 시 필요한 정보입니다. 기입을 권장합니다.</p>");
                            printf("<p class='Inform'>생년월일 : %s</p>", $UserBirth);
                            printf("<p class='Inform'>내 고향 : %s</p>", $UserHomeTown);
                        }
                    ?>
                </div>
                <div class="ButtonArray">
                    <a class="ButtonLink" href="ChangeUserInfo.php"><button style="background-color: #FFDA90;">회원 정보 수정</button></a>
                    <a class="ButtonLink" href="ChangeNewPW.php"><button style="background-color: #FFDA90;">비밀번호 바꾸기</button></a>
                    <?php
                        if(!empty($_SESSION['ID']))
                        {
                            if($_SESSION['ID'] == 'admin') echo "";
                            else echo "<a class='ButtonLink'; href='Withdrawal.php'><button style='background-color: #E50000; color: #FFFFFF;'>회원 탈퇴</button></a>";
                        }
                        
                    ?>
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