<html>
    <head>
        <meta charset="UTF-8">
        <style>
            #a1{width:350px;border-bottom:1px dashed #cc9900;height:28px;margin:30px;padding:5px;font-size:1.2em}
            #b1{margin-left:30px;font-size:1.2em}
            textarea{margin-left:30px;color:#ddaa99;font-size:1.1em}
            input{color:#ddaa99;font-size:1.1em}
            a{text-decoration:none;font-size:1.3em}
            a:hover{color:#ddaa88}
        </style>
    </head>
    <body>
        <?php
        $title=$_GET['title'];
        $connect=mysqli_connect("localhost","root","");
        $res=mysqli_query($connect,'SET names utf8');
        mysqli_select_db($connect, "sample");
        $selrec="select * from board where title='$title'";
        $info=mysqli_query($connect,$selrec);
        if(!$info) die("조회결과 없습니다.");
        $data=mysqli_fetch_array($info);
        ?>
        <form>
        <div id='a1'>작성자<input type="text" value="<?=$data['irum']?>"></div>
        <div id='a1'>글제목<input type="text" value="<?=$data['title']?>"></div>
        <div id='b1'>글 내용</div>
        <textarea cols=70 rows=15><?=$data['contents']?></textarea>
        </form>
        <?php
        $uprec="update board set hits=hits+1 where no=$data[no]";
        $info2=mysqli_query($connect,$uprec);
        mysqli_close($connect);
        ?>
        <p><a href="javascript:history.back()">목록으로 이동</a></p>
    </body>
</html>
