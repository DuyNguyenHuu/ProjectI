<?php
    require_once "database.php";
    require_once "session.php";

    error_reporting(E_ERROR | E_PARSE);
?>
<html>
    <head>
        <title>Thêm/Sửa môn học</title>
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
    
    <body>
        <form method = "POST" action = "add_subject.php">
            <label>Tên môn học: </label>
            <input type ="text" name = "tenmonhoc">

            <label>Mã môn học: </label>
            <input type ="text" name = "mamonhoc">

            <label>Số tín: </label>
            <input type ="number" name = "sotin">

            <label>Số tiết: </label>
            <input type ="number" name = "sotiet">

            <label>Ảnh môn: </label>
            <input type ="text" name = "anhmon">

            <button type = "submit">Thêm</button></a><br/>
        </form>

        <div>
            <style>
            table, th, td {border:1px solid black;}
            </style>
            <table style="width:100%">
                <tr>
                    <th>Mã môn học</th>
                    <th>Tên môn học</th>
                    <th>Số tín</th>
                    <th>Số tiết</th></br>
                    <th>Ảnh môn</th>
                    <th>Thao tác</th>
                </tr>
                <?php   
                    $sql = "SELECT * FROM `monhoc`";
                    $result = $mysqli->query($sql);
                    if (mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                                echo "<td>".$row[MAMH]."</td>";
                                echo "<td>".$row[TENMONHOC]."</td>";
                                echo "<td>".$row[SOTIN]."</td>";
                                echo "<td>".$row[SOTIET]."</td>";
                                echo "<td>".$row[ANHMON]."</td>";
                                echo "<td><a href='sua_monhoc.php?MAMH=".$row[MAMH]."'><button type = 'submit'>Sửa</button></a></td>";
                            echo "</tr>";
                            }
                        }
                    ?>
            </table>
        </div>
    </body>
</html>