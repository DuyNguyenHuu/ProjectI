<?php
    require_once "database.php";
    require_once "session.php";

    error_reporting(E_ERROR | E_PARSE);

    $sql_addchapter = "INSERT INTO chuong(MACHUONG, TENCHUONG, MAMH) 
                        VALUES ('".$_POST['machuong']."','".$_POST['tenchuong']."','".$_POST['subjects']."')";       
    $mysqli -> query($sql_addchapter);
    echo "<script>alert('Cập nhật thành công');window.location.href = 'add_chuong.php';</script>";
?>