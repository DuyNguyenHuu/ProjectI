<?php
    require_once "database.php";
    require_once "session.php";

    error_reporting(E_ERROR | E_PARSE);

    $sql_adddethi = "INSERT INTO dethi (MADT, DATE, THOIGIAN, MAMH, MAGV)
    VALUES ('".$_POST["madethi"]."', '".$_POST["date"]."', '".$_POST["time"]."', '".$_POST["subjects"]."', '".$_POST["teachers"]."')";
    $mysqli -> query($sql_adddethi);

    $sql_getChuong = "SELECT * FROM `chuong`";
    $listChuong = $mysqli->query($sql_getChuong);
    $tongChuong = 1;
    
    
    if (isset($_POST['add_question'])) {
        for($i = 1; $i < $_POST['tongChuong']; $i++) {
            $sql = "(SELECT * FROM `cauhoi`
            WHERE `MACHUONG` = '".$_POST['chuong'.$i]."'
            AND MUCDO = 'Dễ' ORDER BY RAND() LIMIT ".$_POST['easy'.$i].")
            UNION
            (SELECT * FROM `cauhoi`
            WHERE  MACHUONG = '".$_POST['chuong'.$i]."'
            AND MUCDO = 'Trung bình' ORDER BY RAND() LIMIT ".$_POST['medium'.$i].")
            UNION
            (SELECT * FROM `cauhoi`
            WHERE  MACHUONG = '".$_POST['chuong'.$i]."'
            AND MUCDO = 'Khó' ORDER BY RAND() LIMIT ".$_POST['difficult'.$i].")
            ";
            $result = $mysqli->query($sql);

            if (mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                        echo "Câu hỏi "."(".$row[MACAUHOI].")".": ".$row[NOIDUNGCAUHOI];echo "<br>";
                        $sql1 = "SELECT * FROM `cauhoi-dapan` NATURAL JOIN `dapan` WHERE MACAUHOI = '".$row[MACAUHOI]."' ";
                        $sql_addcauhoidethi = "INSERT INTO `cauhoi-dethi`(`MADT`, `MACAUHOI`)
                            VALUES ('".$_POST["madethi"]."', '".$row[MACAUHOI]."')";
                        $mysqli -> query($sql_addcauhoidethi);
                        $result1 = $mysqli ->query($sql1);
                        while ($row1 = mysqli_fetch_assoc($result1)){
                            echo "<input type='checkbox' id = '".$row1[MADA]."' name ='".$row1[MADA]."' value='".$row1[TRANGTHAI]."'>";
                            echo "<label for='".$row1[MADA]."'>".$row1[NOIDUNGDAPAN]."</label><br>";
                        }  
                    }
                }

            $sql2 = "INSERT INTO `dethi-chuong`(`MADT`, `MACHUONG`, `DE`, `TRUNGBINH`, `KHO`) VALUES ('".$_POST["madethi"]."','".$_POST['chuong'.$i]."','".$_POST['easy'.$i]."','".$_POST['medium'.$i]."','".$_POST['difficult'.$i]."')";
            $mysqli->query($sql2);
    }
    } else {
        echo "<form method='POST'><input type='hidden' name='madethi' value='".$_POST["madethi"]."'>";
        while($chuong = mysqli_fetch_assoc($listChuong)){
                if ($_POST[$chuong['MACHUONG']]) {
                    
                    echo "<div style='margin-bottom:1em; border: 1px solid red;'>
                    <h4>".$chuong['TENCHUONG']."</h4>
                    <input type='hidden' name='chuong".$tongChuong."' value='".$chuong['MACHUONG']."'>

                    <label>Số câu hỏi dễ: </label>
                    <input type='number' name = 'easy".$tongChuong."' placeholder='Số lượng'/><br>
                
                    <label>Số câu hỏi trung bình: </label>
                    <input type='number' name = 'medium".$tongChuong."' placeholder='Số lượng'/><br>
                
                    <label>Số câu hỏi khó: </label>
                    <input type='number' name = 'difficult".$tongChuong."' placeholder='Số lượng'/><br></div>";

                    $tongChuong++;
                }
        }
    echo "<input type='hidden' name='tongChuong' value='".$tongChuong."'><button type = 'submit' name='add_question'>Submit</button></form>";

    }
?>
