<html>
 <head>
   <title>Clock Page</title>
 </head>

 <body>
    여러분 환영합니다.<br>
	귀하의 현재접속하신 일자는 
	<?php
	 echo date("y-m-d")."<p>";
	 echo "현재 시간은 :";
	 echo date("h:i:s");
	?>
	  접속하셨습니다.
	 
 </body>
</html>
