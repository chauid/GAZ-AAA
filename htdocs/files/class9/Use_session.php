<?php
    session_start();
    unset($_SESSION['username']);
?>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <ul>
            <li><?= "userid 세션" . $_SESSION['userid'] . "<br>"?></li>
            <li><?= "username 세션" . $_SESSION['username'] . "<br>"?></li>
            <li><?= "username 세션이 삭제되었습니다."?></li>
        </ul>
    </body>
</html>