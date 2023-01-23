<?php
    session_start();
    if($_SESSION['ID'] != "admin") echo "<script>alert('접근 권한이 없습니다.'); history.back();</script>";
    
?>