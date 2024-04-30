<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form method="get">
        Batas Bawah : <input type="number" name="bawah" id="bawah" value="<?php echo htmlspecialchars($_GET['bawah'] ?? ''); ?>"><br>
        Batas Atas : <input type="number" name="atas" id="atas" value="<?php echo htmlspecialchars($_GET['atas'] ?? ''); ?>"><br>
        <input type="submit" value="Cetak" name="Cetak"><br>
    </form>
    <?php 
        $bawah = $_GET['bawah'] ?? '';
        $atas = $_GET['atas'] ?? '';
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["Cetak"])) {
            do {
                $display = ($bawah + 7) % 5 == 0 ? '<img src="starimg.png" width="15" height="15">' : $bawah;
                echo "$display ";
                $bawah += 1;
            } while ($bawah <= $atas);
        }
    ?>
</body>
</html>
