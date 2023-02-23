<?php
    require_once "database.php";
    require_once "session.php";

    $sql = "SELECT * FROM `monhoc` NATURAL JOIN `chuong` NATURAL JOIN `gv-mh` NATURAL JOIN `giaovien`  order by MAMH";
    $result = $mysqli->query($sql); 
    $result1 = $mysqli->query($sql);
    $result2 = $mysqli->query($sql);
?>
<html>
    <head>
        <title>Tạo đề thi</title>
        <link rel="stylesheet" href="Css/style.css" />
        <script src="element.js"></script> 
    </head>

    <style>
            #info {
                display: flex;
                padding: 1em;
                border: 1px solid red;
                border-radius: 1em;
                margin-bottom: 1em;
            }

            img {
                max-height: 100px;
            }

            #inner-info {
                padding: 1em !important;
            }
</style>

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

    <div id='menu-bar'>
        <a href = 'index.php'><button class="nut-bam"> Trang chủ </button></a><br/>
        <a href = 'teacher.php'><button class="nut-bam"> Giáo viên </button></a><br/>
        <a href = 'Subject.php'><button class="nut-bam"> Môn học </button></a><br/>
        <a href = 'create.php'><button class="nut-bam"> Tạo đề thi </button></a><br/>
        <a href = 'add_monhoc.php'><button class="nut-bam"> Thêm môn học</button></a><br/>
        <a href = 'add_giaovien.php'><button class="nut-bam"> Thêm giáo viên</button></a><br/>
        <a href = 'add_chuong.php'><button class="nut-bam"> Thêm chương</button></a><br/>
        <a href = 'add_cauhoi.php'><button class="nut-bam"> Thêm câu hỏi</button></a><br/>
        <a ><button id='welcome' class="nut-bam">Xin chào, <?php echo $_SESSION['email']; ?></button></a>
        <a href = 'logout.php'><button id ='welcome' class="nut-bam"> Đăng xuất </button></a><br/>
    </div>

    <body onload="displayGiaoVien();displayChuong();">
    <form method = "POST" action ="exam.php">
    <div>
        <label>Môn học: </label>
        <select id="subjects" name="subjects" onchange="displayGiaoVien();displayChuong();">
        <?php 
            if (mysqli_num_rows($result2) > 0){
                while($row = mysqli_fetch_assoc($result2)){
                    if ($row["TENMONHOC"] != $prev){
                        echo "<option value='".$row["MAMH"]."'>".$row["TENMONHOC"]."</option>";
                        $prev = $row["TENMONHOC"];
                    }
                }
            }
        ?>
        </select>
    </div>

    <label>Thời gian: </label>
    <input type="number" name = "time" placeholder="Số lượng"/><br>

    <label>Ngày: </label>
    <input type="date" name = "date" placeholder="Số lượng"/><br>

    <div>
        <label>Giáo viên: </label>
        <select id="teachers" name="teachers">
            <option value="">Chọn giáo viên</option>
        <?php 
            if (mysqli_num_rows($result) > 0){
                $stt=1;
                while($row = mysqli_fetch_assoc($result)){
                    if ($row["MAGV"] != $prev || $stt == 1){
                        echo "<option class='".$row["MAMH"]."' id='GV".$stt."' value='".$row["MAGV"]."'>".$row["MAGV"]."</option>";
                        $prev = $row["MAGV"];
                        $stt++;
                    }
                }
            }
        ?>
        </select>
    </div>
    <p style="display:none" id="soluonggv"><?php echo $stt; ?></p>
    <div>
        <label>Chương: </label>
        <?php 
            if (mysqli_num_rows($result1) > 0){
                $stt=1;
                while($row = mysqli_fetch_assoc($result1)){
                    echo "<div id='CHUONG".$stt."' class='".$row['MAMH']."'><input style='width: auto !important;' type='checkbox' id = '".$row["MACHUONG"]."' name ='".$row["MACHUONG"]."'>";
                    echo "<label style='font-size: inherit;display: contents;' for='".$row["MACHUONG"]."'>".$row["TENCHUONG"]."</label><br></div>";
                    $stt++;
                    }
                }
        ?>
        <p style="display:none" id="soluongchuong"><?php echo $stt; ?></p>

    </div>

    <label>Mã đề thi: </label>
    <input type ="text" name = "madethi"/><br>

    <button type = "submit">Submit</button></a><br/>
    </form>
    </body>
</html>