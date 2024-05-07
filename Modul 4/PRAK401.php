<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form method="post">
        Panjang : <input type="number" name="panjang" id="panjang" value="<?php echo $_POST["panjang"] ? : 0 ?>"><br>
        Lebar : <input type="number" name="lebar" id="lebar" value="<?php echo $_POST["lebar"] ? : 0 ?>"><br>
        Nilai : <input type="text" name="nilai" id="nilai" value="<?php echo $_POST["nilai"] ? : "" ?>"><br>
        <input type="submit" value="Cetak" name="Cetak"> <br>
    </form>
    
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Cetak"])) {
            $array = explode(" ", $_POST['nilai']);
            $count = count($array);
            if($count !== $_POST['panjang']*$_POST['lebar']){
                echo "Panjang nilai tidak sesuai dengan ukuran matriks";
            } else {
                $matriks = [];
                for ($i = 0; $i < $_POST['panjang']; $i++) {
                    $row = [];
                    for ($j = 0; $j < $_POST['lebar']; $j++) {
                        $row[] = array_shift($array);
                    }
                    $matriks[] = $row;
                }
                echo "<table border='1' style='border-collapse: collapse;'>";
                foreach ($matriks as $row) {
                    echo "<tr>";
                    foreach ($row as $value) {
                        echo "<td  style='padding: 8px;'>$value</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }
        }
    ?>
</body>
</html>