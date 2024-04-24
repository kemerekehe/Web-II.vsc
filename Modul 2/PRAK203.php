<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php 
function konversiSuhu($suhu, $dari, $ke) {
    // Faktor konversi antara berbagai jenis suhu
    if ($dari == $ke) {
        return $suhu;
    }
    $konversi = array(
        'celsius' => array('fahrenheit' => function($suhu) { return ($suhu * 9/5) + 32; }, 'reamur' => function($suhu) { return $suhu * 4/5; }, 'kelvin' => function($suhu) { return $suhu + 273.15; }),
        'fahrenheit' => array('celsius' => function($suhu) { return ($suhu - 32) * 5/9; }, 'reamur' => function($suhu) { return ($suhu - 32) * 4/9; }, 'kelvin' => function($suhu) { return ($suhu + 459.67) * 5/9; }),
        'reamur' => array('celsius' => function($suhu) { return $suhu * 5/4; }, 'fahrenheit' => function($suhu) { return ($suhu * 9/4) + 32; }, 'kelvin' => function($suhu) { return ($suhu * 5/4) + 273.15; }),
        'kelvin' => array('celsius' => function($suhu) { return $suhu - 273.15; }, 'fahrenheit' => function($suhu) { return ($suhu * 9/5) - 459.67; }, 'reamur' => function($suhu) { return ($suhu - 273.15) * 4/5; })
    );

    // Lakukan konversi
    return $konversi[$dari][$ke]($suhu);
}    
?>
<form method="get" autocomplete="off">
    Nilai : <input type="text" name="input" id="input" value="<?php if(isset($_GET['input'])) echo $_GET['input']; ?>"> <br>
    Dari: <br>
    <input type="radio" name="dari" id="dari-celsius" value="celsius" <?php if(isset($_GET['dari']) && $_GET['dari'] == 'celsius') echo 'checked'; ?>><label for="dari-celsius">Celsius</label> <br>
    <input type="radio" name="dari" id="dari-fahrenheit" value="fahrenheit" <?php if(isset($_GET['dari']) && $_GET['dari'] == 'fahrenheit') echo 'checked'; ?>><label for="dari-fahrenheit">Fahrenheit</label> <br>
    <input type="radio" name="dari" id="dari-reamur" value="reamur" <?php if(isset($_GET['dari']) && $_GET['dari'] == 'reamur') echo 'checked'; ?>><label for="dari-reamur">Reamur</label> <br>
    <input type="radio" name="dari" id="dari-kelvin" value="kelvin" <?php if(isset($_GET['dari']) && $_GET['dari'] == 'kelvin') echo 'checked'; ?>><label for="dari-kelvin">Kelvin</label> <br>
    Ke : <br>
    <input type="radio" name="ke" id="ke-celsius" value="celsius" <?php if(isset($_GET['ke']) && $_GET['ke'] == 'celsius') echo 'checked'; ?>><label for="ke-celsius">Celsius</label> <br>
    <input type="radio" name="ke" id="ke-fahrenheit" value="fahrenheit" <?php if(isset($_GET['ke']) && $_GET['ke'] == 'fahrenheit') echo 'checked'; ?>><label for="ke-fahrenheit">Fahrenheit</label> <br>
    <input type="radio" name="ke" id="ke-reamur" value="reamur" <?php if(isset($_GET['ke']) && $_GET['ke'] == 'reamur') echo 'checked'; ?>><label for="ke-reamur">Reamur</label> <br>
    <input type="radio" name="ke" id="ke-kelvin" value="kelvin" <?php if(isset($_GET['ke']) && $_GET['ke'] == 'kelvin') echo 'checked'; ?>><label for="ke-kelvin">Kelvin</label> <br>
    <input type="submit" name="konversi" value="Konversi">
</form>
<?php
    // Memeriksa apakah formulir telah disubmit dan input tidak kosong
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["konversi"]) && isset($_GET["dari"]) && isset($_GET["ke"]) && isset($_GET["input"]) && !empty($_GET["input"])) {
    $input = $_GET["input"];
    $dari = $_GET["dari"];
    $ke = $_GET["ke"];
    $hasil = konversiSuhu($input, $dari, $ke);
    echo "<h2>Hasil konversi: " . $hasil . " " . $ke . " <h2>";
}
?>
</body>
</html>
