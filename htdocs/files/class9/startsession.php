<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
        session_start();
        echo "세션 시작<br>";
        $_SESSION['userid']="ocella";
        $_SESSION['username']="홍길동";
        echo "세션 등록 완료!<br>";
        echo $_SESSION['userid'] . "<br>";
        echo $_SESSION['username'] . "<br>";
        ?>
    </body>
</html>