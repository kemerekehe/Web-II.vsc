<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form method="get">
        Batas Bawah : <input type="number" name="bawah" id="bawah" value="<?php echo htmlspecialchars($_GET['bawah'] ?? 0); ?>"><br>
        Batas Atas : <input type="number" name="atas" id="atas" value="<?php echo htmlspecialchars($_GET['atas'] ?? 0); ?>"><br>
        <input type="submit" value="Cetak" name="Cetak"><br>
    </form>
    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["Cetak"])) {
            $bawah = $_GET['bawah'] ?? 0;
            $atas = $_GET['atas'] ?? 0;
            while ($bawah <= $atas) {
                $display = ($bawah + 7) % 5 == 0 ? '<img src="starimg.png" width="15" height="15">' : $bawah;
                echo "$display ";
                $bawah += 1;
            }
        }
    ?>
</body>
</html>
