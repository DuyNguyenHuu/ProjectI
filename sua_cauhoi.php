<?php
    require_once "database.php";
    require_once "session.php";

    error_reporting(E_ERROR | E_PARSE);

    $sql = "SELECT * FROM `cauhoi` natural join `cauhoi-dapan` natural join `dapan` WHERE `MADA` = '".$_GET['MADA']."' order by `MACAUHOI`";
    $result = $mysqli->query($sql);
    $cauhoi = mysqli_fetch_assoc($result);
    
?>
<html>
    <head>
        <link rel="stylesheet" href="Css/style.css" />
        <script src="element.js"></script>
    </head>
    <body>
    <form method = "POST" >

        <label>Mã chương </label>
        <input type ="text" name = "machuong" value="<?php echo $cauhoi['MACHUONG']; ?>"disabled>

        <label>Mã câu hỏi </label>
        <input type ="text" name = "macauhoi" value="<?php echo $cauhoi['MACAUHOI']; ?>" disabled>

        <label>Nội dung câu hỏi </label>
        <input type ="text" name = "noidungcauhoi" value="<?php echo $cauhoi['NOIDUNGCAUHOI']; ?>" disabled>

        <label>Mức độ </label>
        <input type ="text" name = "mucdo" value="<?php echo $cauhoi['MUCDO']; ?>" disabled>

        <label>Mã đáp án </label>
        <input type ="text" name = "mada" value="<?php echo $_GET['MADA']; ?>" disabled>

        <label>Nội dung đáp án </label>
        <input type ="text" name = "noidungdapan" value="<?php echo $cauhoi['NOIDUNGDAPAN']; ?>">

        <label>Trạng thái </label>
        <input type ="text" name = "trangthai" value="<?php echo $cauhoi['TRANGTHAI']; ?>">

        <button type = "submit" name = "sua">Submit</button></a><br/>
        </form>
</html>

<?php
    if (isset($_POST['sua'])) {
        $sql_suacauhoi = "UPDATE `cauhoi` SET `NOIDUNGCAUHOI`='".$_POST['noidungcauhoi']."',`MUCDO`='".$_POST['mucdo']."'
                        WHERE `MADA`='".$_GET['MADA']."';";
        $mysqli -> query($sql_suacauhoi);

        $sql_suadapan = "UPDATE `dapan` SET `NOIDUNGDAPAN`='".$_POST['noidungdapan']."',`TRANGTHAI`='".$_POST['trangthai']."'
                        WHERE `MADA`='".$_GET['MADA']."';";
        $mysqli -> query($sql_suadapan);
        echo "<script>alert('Cập nhật thành công');window.location.href = 'add_cauhoi.php';</script>";
    }
?>