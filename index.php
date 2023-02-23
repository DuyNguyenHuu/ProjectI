<?php
    require_once "session.php";
    require_once "database.php";

    error_reporting(E_ERROR | E_PARSE);
?>
<style>
    #menu-bar {
        width: 100%;
        padding: 1 em !important;
        display: flex;
        backgrond-color: rgb(202, 7, 7);
    }

    #menu-bar #welcome {
        background: rgb(219, 210, 200) !important;
    }
</style>
<html>
<head>
    <meta charset="UTF-8">
    <title>Demo đề thi</title>
    <link rel="stylesheet" href="Css/style.css" />
</head>
<body>
    <!-- <div style="background-image:url('https://cdnmedia.baotintuc.vn/Upload/gYJXHsn6VBCJnSv7rj8xYQ/files/2021/10/bachkhoa.jpg');min-height: -webkit-fill-available;width: -webkit-fill-available"> -->
    <?php 
        
        if (!isset($_SESSION["email"])) 
            echo "
            <div>
                <a href = 'login.php'><button class = \"nut-bam\">Đăng nhập</button></a>
                <a href = 'signup.php'><button class = \"nut-bam\">Đăng xuất</button></a>
            </div>";
        else{
            echo "
            <div id='menu-bar'>
                <a href = 'index.php'><button class=\"nut-bam\"> Trang chủ </button></a><br/>
                <a href = 'teacher.php'><button class=\"nut-bam\"> Giáo viên </button></a><br/>
                <a href = 'Subject.php'><button class=\"nut-bam\"> Môn học </button></a><br/>
                <a href = 'create.php'><button class=\"nut-bam\"> Tạo đề thi </button></a><br/>
                <a href = 'add_monhoc.php'><button class=\"nut-bam\"> Thêm môn học</button></a><br/>
                <a href = 'add_giaovien.php'><button class=\"nut-bam\"> Thêm giáo viên</button></a><br/>
                <a href = 'add_chuong.php'><button class=\"nut-bam\"> Thêm chương</button></a><br/>
                <a href = 'add_cauhoi.php'><button class=\"nut-bam\"> Thêm câu hỏi</button></a><br/>
                <a ><button id='welcome' class=\"nut-bam\">Xin chào, ".$_SESSION["email"]."</button></a>
                <a href = 'logout.php'><button id ='welcome' class=\"nut-bam\"> Đăng xuất </button></a><br/>
            </div>";

            $sql = "SELECT * FROM `dethi` order by MADT";
            $result = $mysqli->query($sql);
    
            if (mysqli_num_rows($result) > 0) {
                $prev = "";
                echo "<div style='display: flex; width: 1100px; flex-wrap: wrap;'>";
                while($row = mysqli_fetch_assoc($result)) {
                    if ($row["MADT"] != $prev ) {
                        echo "<div style='margin: 0.5em; border: 1px solid red; border-radius: 1em; padding-top: 0.5em;width: max-content;'><form method = 'GET' action = 'dethi.php'>";
                        echo "Mã môn học: " . $row["MAMH"]."<br>";
                        echo "Mã đề thi: " . $row["MADT"]."<br>";
                        echo "Ngày: " . $row["DATE"]."<br>";
                        echo "Thời gian: " . $row["THOIGIAN"]."<br>";
                        echo "Mã giáo viên: " . $row["MAGV"]."<br>";
                        echo "<input type = 'hidden' name = 'madethi' value = '".$row[MADT]."'>";
                        echo "<button type = 'submit'>Xem chi tiết</button>";
                        echo "<br>";
                        echo "</form></div>";
                        $prev = $row["MADT"];
                    }
                }
            echo "</div>";
            } else {
                echo "0 results";
            }
        }  
    ?>
</body>
</html>