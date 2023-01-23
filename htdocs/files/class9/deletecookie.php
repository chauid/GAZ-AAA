<?php
    setcookie('test', 'This is a sample', time() + 3600);
    if(isset($_COOKIE['test'])) $cookieSet = 'The cookie is ' . $_COOKIE['test'];
    else $cookieSet = 'No cookie';
?>
<html>
<head><title>cookie</title></head>
    <body>
        <?php
            echo $cookieSet;
        ?>
    </body>
</html>
