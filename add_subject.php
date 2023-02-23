<?php
    require_once "database.php";
    require_once "session.php";

    error_reporting(E_ERROR | E_PARSE);

    $sql_addsubject = "INSERT INTO monhoc(MAMH, TENMONHOC, SOTIN, SOTIET, ANHMON) 
                        VALUES ('".$_POST['mamonhoc']."','".$_POST['tenmonhoc']."','".$_POST['sotin']."', '".$_POST['sotiet']."', '".$_POST['anhmon']."')";            
    $mysqli -> query($sql_addsubject);
?>