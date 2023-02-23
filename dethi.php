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
    
    echo "<form method = 'POST'>";
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
                        echo "<input type='checkbox'  name=".$row1[MADA].">";
                        echo chr($count);echo ". ";echo "<label for=".$row1[MADA].">".$row1[NOIDUNGDAPAN]."</label><br>";
                        $count ++;
                    }
                    echo "<br>";
                }


                $prev = $row1["MACAUHOI"];
                }
                $i++;
            }
            echo "<input type='hidden' name='madethi' value='".$_GET['madethi']."'>";
            echo "<button type = 'submit' name = 'nopbai'>Nộp bài</button>";
        } else {
            echo "0 results";
        }
    echo "</form>";
    if (isset($_POST['nopbai'])){
        $sql_dapan = "SELECT * FROM `dethi` 
                    natural join `cauhoi-dethi` 
                    natural join `cauhoi` 
                    natural join `cauhoi-dapan` 
                    natural join `dapan`  WHERE `MADT` = '".$_POST['madethi']."'";
        $result_dapan = $mysqli->query($sql_dapan);
        $sum = 0;  
        if (mysqli_num_rows($result) > 0) {
            while($row_dapan = mysqli_fetch_assoc($result_dapan)) {
                if ($_POST[$row_dapan[MADA]]) {
                    if($row_dapan["TRANGTHAI"] == 1){
                        $sum++;
                    }

                }
            }
        echo $sum;echo " Điểm";
        }
    }
?>