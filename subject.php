<?php
    require_once "database.php";
    require_once "session.php";

$sql = "SELECT * FROM `monhoc` NATURAL JOIN `chuong` order by MAMH";
$result = $mysqli->query($sql);

echo "<style>
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
</style>";

echo "<head>
    <title>Tạo đề thi</title>
    <link rel='stylesheet' href='Css/style.css' />
    <script src='element.js'></script> 
    </head>";

echo "<style>
    #menu-bar {
        width: 100%;
        padding: 1 em !important;
        display: flex;
        backgrond-color: rgb(202, 7, 7);
    }

    #menu-bar #welcome {
        background: rgb(219, 210, 200) !important;
    }
    </style>";

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

$prev = "";
echo "<title>Môn học</title>";
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $i = 1;
    while($row = mysqli_fetch_assoc($result)) {
        if ($row["MAMH"] != $prev) {
            echo "<div id = 'info'>";
                echo "<div><img src = ". $row["ANHMON"] ."></div>"."<br>";
                echo "<div id = 'inner-info'>Tên môn học : " . $row["TENMONHOC"]."<br>";
                echo "Mã môn học: " . $row["MAMH"]."<br>";
                echo "Số tín chỉ: " . $row["SOTIN"]."<br>";
                echo "Số tiết: " . $row["SOTIET"]."<br></div>";
                $prev = $row["MAMH"];
                $i = 1;
            }
        echo "</div>";
        echo "Chương " . $i . ": ". $row["TENCHUONG"]."<br>";
        $i++;
    }
} else {
    echo "0 results";
}

mysqli_close($mysqli);

?>