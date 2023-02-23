<?php
    require_once "database.php";
    require_once "session.php";

    error_reporting(E_ERROR | E_PARSE);

    $sql = "SELECT * FROM `giaovien` WHERE `MAGV` = '".$_GET['MAGV']."'";
    $result = $mysqli->query($sql);
    $giaovien = mysqli_fetch_assoc($result);
    
?>
<html>
    <head>
        <link rel="stylesheet" href="Css/style.css" />
        <script src="element.js"></script>
    </head>
    <body>
    <form method = "POST" >

        <label>Tên giáo viên: </label>
        <input type ="text" name = "tengv" value="<?php echo $giaovien['TENGV']; ?>"disabled>

        <label>Mã giáo viên: </label>
        <input type ="text" name = "magv" value="<?php echo $_GET['MAGV']; ?>" disabled>

        <label>Ảnh thẻ: </label>
        <input type ="text" name = "anhthe" value="<?php echo $giaovien['ANHTHE']; ?>">

        <label>Email: </label>
        <input type ="text" name = "email" value="<?php echo $giaovien['EMAIL']; ?>">

        <label>Quê quán: </label>
        <input type ="text" name = "quequan" value="<?php echo $giaovien['QUEQUAN']; ?>">

        <label>SĐT: </label>
        <input type ="text" name = "sdt" value="<?php echo $giaovien['SDT']; ?>">

        <label>Trình độ: </label>
        <input type ="text" name = "trinhdo" value="<?php echo $giaovien['TRINHDO']; ?>">

        <button type = "submit" name = "sua">Submit</button></a><br/>
        </form>
</html>

<?php
    if (isset($_POST['sua'])) {
        $sql_suagiaovien = "UPDATE `giaovien` SET `ANHTHE`='".$_POST['anhthe']."',`EMAIL`='".$_POST['email']."',`QUEQUAN`='".$_POST['quequan']."',`SDT`='".$_POST['sdt']."', `TRINHDO`='".$_POST['trinhdo']."'
                        WHERE `MAGV`='".$_GET['MAGV']."';";
        $mysqli -> query($sql_suagiaovien);
        echo "<script>alert('Cập nhật thành công');window.location.href = 'add_giaovien.php';</script>";

    }
?>