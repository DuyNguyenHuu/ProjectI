<?php
    require_once "database.php";
    require_once "session.php";

    error_reporting(E_ERROR | E_PARSE);
    $sql = "SELECT * FROM `monhoc`";
    $result = $mysqli->query($sql);
?>
<html>
    <head>
        <title>Thêm chương</title>
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
    <form method = "POST" action ="add_chapter.php">
        <div>
            <label>Môn học: </label>
            <select id="subjects" name="subjects" onchange="displayGiaoVien();displayChuong();">
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

        <label>Tên chương: </label>
        <input type ="text" name = "tenchuong">

        <label>Mã chương: </label>
        <input type ="text" name = "machuong">

        <button type = "submit">Submit</button></a><br/>
        </form>
    </body>
    <div>
            <style>
            table, th, td {border:1px solid black;}
            </style>
            <table style="width:100%">
                <tr>
                    <th>Mã chương</th>
                    <th>Tên chương</th>
                    <th>Mã môn học</th><br>
                </tr>
                <?php   
                    $sql1 = "SELECT * FROM `chuong` ORDER BY `MAMH`";
                    $result1 = $mysqli->query($sql1);
                    if (mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result1)){
                            echo "<tr>";
                                echo "<td>".$row[MACHUONG]."</td>";
                                echo "<td>".$row[TENCHUONG]."</td>";
                                echo "<td>".$row[MAMH]."</td>";
                                echo "</tr>";
                            }
                        }
                    ?>
            </table>
        </div>
</html>