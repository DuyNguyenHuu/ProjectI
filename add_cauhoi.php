<?php
    require_once "database.php";
    require_once "session.php";

    error_reporting(E_ERROR | E_PARSE);

    $sql = "SELECT * FROM `monhoc` NATURAL JOIN `chuong` order by `MAMH`";
    $result = $mysqli->query($sql);
    $result1 = $mysqli->query($sql);
?>
<html>
    <head>
        <title>Thêm/Sửa câu hỏi</title>
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
    
    <body onload="displayChuongSelect();">
    <form method = "POST" action ="add_question.php">
        <div>
            <label>Môn học: </label>
            <select id="subjects" name="subjects" onchange="displayChuongSelect();">
            <?php 
                if (mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        if ($row["TENMONHOC"] != $prev){
                            echo "<option value='".$row["MAMH"]."'>".$row["TENMONHOC"]."</option>";
                            $prev = $row["TENMONHOC"];
                        }
                    }
                }
            ?>
            </select>
        </div>
        

        <div>
            <label>Chương: </label>
            <select id="chapters" name="chapters" onchange="">
                <option>Chọn chương</option>
            <?php 
                if (mysqli_num_rows($result1) > 0){
                    $stt = 1;
                    while($row = mysqli_fetch_assoc($result1)){
                        if ($row["TENMONHOC"] != $prev){
                            echo "<option id='CHUONG".$stt."' class='".$row["MAMH"]."' value='".$row['MACHUONG']."'>".$row['TENCHUONG']."</option>";
                            $prev = $row["TENCHUONG"];
                            $stt++;
                        }
                    }
                }
            ?>
            </select>
            <p style="display:none" id="soluongchuong"><?php echo $stt; ?></p>
        </div>

        <label>Mã câu hỏi: </label>
        <input type ="text" name = "macauhoi">

        <label>Nội dung câu hỏi: </label>
        <input type ="text" name = "noidungcauhoi">

        <label>Mức độ: </label>
        <input type ="text" name = "mucdo">

        <label>Số lượng đáp án: </label>
        <input type ="number" name = "soluongdapan">
        
		<button type = "submit">Thêm</button></a><br/>
    </form>
    <div>
            <style>
            table, th, td {border:1px solid black;}
            </style>
            <table style="width:100%">
                <tr>
                    <th>Mã chương</th>
                    <th>Mã câu hỏi</th>
                    <th>Nội dung câu hỏi</th>
                    <th>Mức độ</th>
                    <th>Mã đáp án</th>
                    <th>Nội dung đáp án</th>
                    <th>Trạng thái</th><br>
                    <th>Thao tác</th>
                </tr>
                <?php   
                    $sql2 = "SELECT * FROM `cauhoi` natural join `cauhoi-dapan` natural join `dapan` order by `MACHUONG`";
                    $result2 = $mysqli->query($sql2);
                    if (mysqli_num_rows($result2) > 0){
                        while($row = mysqli_fetch_assoc($result2)){
                            echo "<tr>";
                                echo "<td>".$row[MACHUONG]."</td>";
                                echo "<td>".$row[MACAUHOI]."</td>";
                                echo "<td>".$row[NOIDUNGCAUHOI]."</td>";
                                echo "<td>".$row[MUCDO]."</td>";
                                echo "<td>".$row[MADA]."</td>";
                                echo "<td>".$row[NOIDUNGDAPAN]."</td>";
                                echo "<td>".$row[TRANGTHAI]."</td>";
                                echo "<td><a href='sua_cauhoi.php?MADA=".$row[MADA]."'><button type = 'submit'>Sửa</button></a></td>";
                            echo "</tr>";
                            }
                        }
                    ?>
            </table>
        </div>
    <body>
</html>