<!DOCTYPE html>
<html lang="ko-KR">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="../StyleSheet/Master.css">
        <link rel="stylesheet" href="../StyleSheet/Manage.css">
        <title>회원관리(관리자 전용) - 가즈-아(GAZ-AAA) 연습용 가상화폐 거래소</title>
        <?php
            ini_set('display_errors', '0');
            session_start();
	        if($_SESSION['ID'] != "admin") { echo "<script>alert('접근 권한이 없습니다.'); history.back();</script>"; exit(); }
            $Connect = mysqli_connect("localhost", "root", "");
            mysqli_query($Connect,'SET names utf8');
            date_default_timezone_set('Asia/Seoul');
            $Query; $Result; $Users = 0;
            $UserID = array(); $UserName = array(); $UserNickName = array(); $UserRegistryDate = array();
            $UserAsset = array(); $UserTag = array(); $UserPhone = array(); $UserBirth = array(); $UserHomeTown = array();
            mysqli_select_db($Connect, "user");
            $Query = "SELECT * FROM userlist";
            $Result = mysqli_query($Connect, $Query);
            while($Rows = mysqli_fetch_array($Result))
            {
                $UserID[$Users] = $Rows['ID']; $UserName[$Users] = $Rows['UserName']; $UserNickName[$Users] = $Rows['NickName'];
                $UserRegistryDate[$Users] = $Rows['RegistryDate']; $UserAsset[$Users] = $Rows['Asset'];
                $UserTag[$Users] = $Rows['UserTag']; $UserPhone[$Users] = $Rows['Phone'];
                $UserBirth[$Users] = $Rows['Birth']; $UserHomeTown[$Users] = $Rows['HomeTown'];
                $Users++;
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
            <div class="UserTableBox">
                <h2>회원 목록</h2>
                <div class="UserTable">
                    <table>
                        <tr>
                            <th>회원 ID</th>
                            <th>회원 이름</th>
                            <th>회원 별칭(닉네임)</th>
                            <th>회원 가입일자</th>
                            <th>회원 자산</th>
                            <th>회원 태그</th>
                            <th>회원 휴대전화 번호</th>
                            <th>회원 생년월일</th>
                            <th>회원 고향(출생지)</th>
                        </tr>
                        <?php
                            for($i=0;$i<$Users;$i++)
                            {
                                if($UserID[$i] == "admin") continue;
                                printf("<tr class='tables'onclick='location.href=`ManageDetail.php?User=%s`'>", $UserID[$i]);
                                printf("<td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td>", $UserID[$i], $UserName[$i], $UserNickName[$i], $UserRegistryDate[$i], number_format($UserAsset[$i]), $UserTag[$i], $UserPhone[$i], $UserBirth[$i], $UserHomeTown[$i]);
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
        <?php mysqli_close($Connect); ?>
    </body>
</html>
