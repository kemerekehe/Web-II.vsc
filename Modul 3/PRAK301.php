<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form method="get">
        Jumlah Peserta : <input type="number" name="num" id="num" value="<?php echo htmlspecialchars($_GET['num'] ?? 0); ?>"><br>
        <input type="submit" value="Cetak" name="Cetak"><br>
    </form>
    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["Cetak"])) {
            $num = $_GET['num'] ?? 0;
            $loop = 0;
            while ($num > $loop) {
                $loop += 1;
                $color = $loop % 2 == 0 ? 'red' : 'green';
                echo "<h2 style='color: $color;'>Peserta ke-$loop</h2>";
            }
        }
    ?>
</body>
</html>
