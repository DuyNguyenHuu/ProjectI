<?php
    require_once "database.php";
    require_once "session.php";

    error_reporting(E_ERROR | E_PARSE);

    $sql_addteacher = "INSERT INTO giaovien(MAGV, TENGV, ANHTHE, EMAIL, QUEQUAN, SDT, TRINHDO) 
                        VALUES ('".$_POST['magv']."','".$_POST['tengv']."','".$_POST['anhthe']."','".$_POST['email']."','".$_POST['quequan']."','".$_POST['sdt']."','".$_POST['trinhdo']."')";                       
    $mysqli -> query($sql_addteacher);

    $sql_addteach = "INSERT INTO `gv-mh`(`MAGV`, `MAMH`) 
                    VALUES ('".$_POST['magv']."','".$_POST['subjects']."')";
    $mysqli -> query($sql_addteach);
    echo $sql_addteach;
    echo "<script>alert('Cập nhật thành công');window.location.href = 'add_giaovien.php';</script>";
?>