<?php
    require_once "database.php";
    require_once "session.php";

    error_reporting(E_ERROR | E_PARSE);
    
    $i = 1;
    while ($i <= $_POST['soluongdapan']){
        $sql_save = "INSERT INTO `dapan`(`MADA`, `NOIDUNGDAPAN`, `TRANGTHAI`) 
                VALUES ('".$_POST["madapan".$i]."', '".$_POST["noidungdapan".$i]."', '".$_POST["trangthai".$i]."')";
        $mysqli -> query($sql_save);

        $sql_saveqa = "INSERT INTO `cauhoi-dapan`(`MACAUHOI`, `MADA`) 
        VALUES ('".$_POST["mach"]."', '".$_POST["madapan".$i]."')";
        $mysqli -> query($sql_saveqa);
        $i++;
    }
    echo "<script>alert('Cập nhật thành công');window.location.href = 'add_cauhoi.php';</script>";
?>