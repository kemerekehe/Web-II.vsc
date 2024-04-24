<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php 
function bacaNilai($nilai) {
    if ($nilai == 0) {
        return "Nol";
    } elseif ($nilai < 0 || $nilai > 999) {
        return "Anda Meginput Melebihi Limit";
    } elseif ($nilai > 0 && $nilai <= 9) {
        return "Satuan";
    } elseif ($nilai >= 11 && $nilai <= 19) {
        return "Belasan";
    } elseif ($nilai == 10 || ($nilai >= 20 && $nilai <= 99)) {
        return "Puluhan";
    } elseif ($nilai > 99 && $nilai < 1000) {
        return "Ratusan";
    }
}    
?>
<form method="get" autocomplete="off">
    Nilai : <input type="text" name="input" id="input" value="<?php if(isset($_GET['input'])) echo $_GET['input']; ?>"> <br>
    <input type="submit" name="konversi" value="Konversi">
</form>
<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["konversi"]) && isset($_GET["input"])) {
        echo "<h2>Hasil : " . bacaNilai($_GET["input"]) . " <h2>";
    }
?>
</body>
</html>
