<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
        $globalnum = $_POST['num'] ?? '';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if(isset($_POST["Submit"])) {
                switch($_POST["Submit"]) {
                    case "Tambah":
                        $globalnum++;
                        break;
                    case "Kurang":
                        $globalnum--;
                        break;
                }
            }
        }
    ?>
    <form method="POST">
        <div class="div" style="display: <?php echo ($globalnum !== '') ? 'none' : 'block';?>">
            Jumlah Bintang <input type="number" name="num" id="num" value="<?php echo htmlspecialchars($globalnum); ?>"><br>
            <input type="submit" value="Submit" name="Submit"><br><br>
        </div>
        <?php 
            if($globalnum > 0) {
                echo 'Jumlah bintang ' . $globalnum .  '<br><br><br>';
                for ($i = 0; $i < $globalnum; $i++) {
                    echo '<img src="starimg.png" width="75" height="75">';
                }
                echo '<br><input type="submit" value="Tambah" name="Submit"><input type="submit" value="Kurang" name="Submit">';
            }
        ?>
    </form>
</body>
</html>
