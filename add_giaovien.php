<?php
    require_once "database.php";
    require_once "session.php";

    error_reporting(E_ERROR | E_PARSE);
    $sql = "SELECT * FROM `monhoc`";
    $result = $mysqli->query($sql);
?>
<html>
    <head>
        <title>Thêm/Sửa giáo viên</title>
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
    <form method = "POST" action ="add_teacher.php">
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

        <label>Tên giáo viên: </label>
        <input type ="text" name = "tengv">

        <label>Mã giáo viên: </label>
        <input type ="text" name = "magv">

        <label>Ảnh thẻ: </label>
        <input type ="text" name = "anhthe">

        <label>Email: </label>
        <input type ="text" name = "email">

        <label>Quê quán: </label>
        <input type ="text" name = "quequan">

        <label>SĐT: </label>
        <input type ="text" name = "sdt">

        <label>Trình độ: </label>
        <input type ="text" name = "trinhdo">

        <button type = "submit">Thêm</button></a><br/>
        </form>
        <div>
            <style>
            table, th, td {border:1px solid black;}
            </style>
            <table style="width:100%">
                <tr>
                    <th>Mã giáo viên</th>
                    <th>Tên giáo viên</th>
                    <th>Email</th>
                    <th>Quê quán</th>
                    <th>SĐT</th>
                    <th>Trình độ</th><br>
                </tr>
                <?php   
                    $sql1 = "SELECT * FROM `giaovien`";
                    $result1 = $mysqli->query($sql1);
                    if (mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result1)){
                            echo "<tr>";
                                echo "<td>".$row[MAGV]."</td>";
                                echo "<td>".$row[TENGV]."</td>";
                                echo "<td>".$row[EMAIL]."</td>";
                                echo "<td>".$row[QUEQUAN]."</td>";
                                echo "<td>".$row[SDT]."</td>";
                                echo "<td>".$row[TRINHDO]."</td>";
                                echo "<td><a href='sua_giaovien.php?MAGV=".$row[MAGV]."'><button type = 'submit'>Sửa</button></a></td>";
                            echo "</tr>";
                            }
                        }
                    ?>
            </table>
        </div>
    </body>
</html>