<html>
    <head>
        <meta charset="UTF-8">
        <title>데이터베이스 실습</title>
        <!-- 데이터 베이스 연동 -->
        <?php
            $Connect= mysqli_connect("localhost", "root", "", "ebiz_db");
            if($Connect == false) echo "데이터 베이스 연결 실패<br>";
            else echo "데이터 베이스 연결 성공<br>";
        ?>
    </head>
    <body>
        <?php
            $TableName = "customer";
            if($Connect == true)
            {
                $desc = "DESC $TableName";
                $desc_result = $Connect->query($desc);
                $desc_list = $desc_result->fetch_array(MYSQLI_ASSOC);
                printf("%s 테이블 구조<br>", $TableName);
                var_dump($desc_list);
                echo "<br><br>";
                $Tablequery="SELECT * FROM $TableName";
                $result=mysqli_query($Connect, $Tablequery);
                $board=mysqli_fetch_array($result);
                if($board == "") echo "현재 테이블이 비어있음.<br>";
                else printf("query=%s", $board);
            }
        ?>
    </body>
</html>