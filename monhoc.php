<?php
    require_once "database.php";
    require_once "session.php";

    error_reporting(E_ERROR | E_PARSE);
?>
<html>
    <head>
        <link rel="stylesheet" href="Css/style.css" />
        <script src="element.js"></script>
    </head>
    <body>
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
                                echo "<td><button type = 'submit'>Sửa</button> <button type = 'submit'>Xóa</button></td>";
                            echo "</tr>";
                            }
                        }
                    ?>
            </table>
        </div>
    </body>
</html>