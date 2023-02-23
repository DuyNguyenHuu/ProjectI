<?php
    require_once "database.php";
    require_once "session.php";

    error_reporting(E_ERROR | E_PARSE);

    $sql = "SELECT * FROM `cauhoi` natural join `cauhoi-dethi` WHERE `MADT` = '".$_GET['madethi']."' order by `MACAUHOI`";
    $result = $mysqli->query($sql);

    $sql0 = "SELECT * FROM `dethi`WHERE `MADT` = '".$_GET['madethi']."'";
    $result0 = $mysqli->query($sql0);
    if (mysqli_num_rows($result0) > 0){
        while($row0 = mysqli_fetch_assoc($result0)){
            echo "Mã môn học: " . $row0["MAMH"]."<br>";
            echo "Mã đề thi: " . $row0["MADT"]."<br>";
            echo "Ngày: " . $row0["DATE"]."<br>";
            echo "Thời gian: " . $row0["THOIGIAN"]."<br>";
            echo "Mã giáo viên: " . $row0["MAGV"]."<br>";
            echo "<br>";
        }
    }

    $prev = "";
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $i = 1;
    while($row = mysqli_fetch_assoc($result)) {
        if ($row["MACAUHOI"] != $prev) {
                echo "Câu hỏi ".$i.": " . $row["NOIDUNGCAUHOI"]."<br>";

                $sql1 = "SELECT * FROM `cauhoi` natural join `cauhoi-dapan` natural join `dapan` WHERE `MACAUHOI` = '".$row["MACAUHOI"]."'";
                $result1 = $mysqli->query($sql1);
                if (mysqli_num_rows($result1) > 0){
                        $count = 65;
                    while($row1 = mysqli_fetch_assoc($result1)){
                        echo chr($count);echo". ";echo $row1["NOIDUNGDAPAN"];echo "<br>";
                        $count ++;
                    }
                    echo "<br>";
                }


                $prev = $row1["MACAUHOI"];
            }
        $i++;
    }
} else {
    echo "0 results";
}
?>