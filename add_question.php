<?php
    require_once "database.php";
    require_once "session.php";

    error_reporting(E_ERROR | E_PARSE);

    $sql_addquestion = "INSERT INTO `cauhoi`(`MACAUHOI`, `NOIDUNGCAUHOI`, `MUCDO`, `MACHUONG`) 
                        VALUES ('".$_POST['macauhoi']."','".$_POST['noidungcauhoi']."','".$_POST['mucdo']."','".$_POST['chapters']."')";
    $mysqli -> query($sql_addquestion);

    $i = 1;
    echo "<form method = 'POST' action = 'save_question.php'>";
    while ( $i <= $_POST["soluongdapan"]){
        echo "<label>Mã đáp án: </label>";
        echo "<input type ='text' name = 'madapan".$i."'>"."</br>";

		echo "<label>Nội dung đáp án: </label>";
		echo "<input type='text' name='noidungdapan".$i."'>"."</br>";

        echo "<label>Trạng thái: </label>";
		echo "<input type='number' name='trangthai".$i."'>"."</br>"."</br>"."</br>";

        $i = $i + 1;

    }
    echo "<input type='hidden' name='mach' value='".$_POST['macauhoi']."'>";
    echo "<input type='hidden' name='soluongdapan' value='".($i-1)."'>";
    echo "<input type='submit' value='Submit'>";
    echo "</form>";

?>