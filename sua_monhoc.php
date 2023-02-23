<?php
    require_once "database.php";
    require_once "session.php";

    error_reporting(E_ERROR | E_PARSE);

    $sql = "SELECT * FROM `monhoc` WHERE MAMH = '".$_GET['MAMH']."'";
    $result = $mysqli->query($sql);
    $monhoc = mysqli_fetch_assoc($result);
    
?>
<html>
    <head>
        <link rel="stylesheet" href="Css/style.css" />
        <script src="element.js"></script>
    </head>
    <body>
        <form method = "POST">
            <label>Tên môn học: </label>
            <input type ="text" name = "tenmonhoc" value="<?php echo $monhoc['TENMONHOC']; ?>">

            <label>Mã môn học: </label>
            <input type ="text" name = "mamonhoc" value="<?php echo $_GET['MAMH']; ?>" disabled>

            <label>Số tín: </label>
            <input type ="number" name = "sotin" value="<?php echo $monhoc['SOTIN']; ?>">

            <label>Số tiết: </label>
            <input type ="number" name = "sotiet" value="<?php echo $monhoc['SOTIET']; ?>">

            <label>Ảnh môn: </label>
            <input type ="text" name = "anhmon" value="<?php echo $monhoc['ANHMON']; ?>">

            <button type = "submit" name = "sua">Sửa</button></a><br/>
        </form>

    </body>
</html>

<?php
    if (isset($_POST['sua'])) {
        $sql_suamonhoc = "UPDATE `monhoc` SET `TENMONHOC`='".$_POST['tenmonhoc']."',`SOTIN`='".$_POST['sotin']."',`SOTIET`='".$_POST['sotiet']."',`ANHMON`='".$_POST['anhmon']."' 
                        WHERE `MAMH`='".$_GET['MAMH']."';";
        $mysqli -> query($sql_suamonhoc);
        echo "<script>alert('Cập nhật thành công');window.location.href = 'add_monhoc.php';</script>";
    }
?>