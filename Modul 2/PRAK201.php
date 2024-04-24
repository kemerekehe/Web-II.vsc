<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form method="get" autocomplete="off">
        Nama: 1 <input type="text" name="first" id="first"> <br>
        Nama: 2 <input type="text" name="second" id="second"> <br>
        Nama: 3 <input type="text" name="third" id="third"> <br>
        <input type="submit" value="Urutkan" name="Urutkan">
    </form>
</body>
</html>
<?php
    //cek nilai
    function urutkan($first, $second, $third) {
        // Menggunakan bubble sort untuk mengurutkan nilai variabel
        if ($first > $second) {
            $temp = $first;
            $first = $second;
            $second = $temp;
        }
        else if ($second > $third) {
            $temp = $second;
            $second = $third;
            $third = $temp;
        }
        else if ($first > $third) {
            $temp = $first;
            $first = $second;
            $second = $temp;
        }
        return array($first, $second, $third);
    }
    if (isset($_GET['Urutkan'])) {
        $first = $_GET['first'];
        $second = $_GET['second'];
        $third = $_GET['third'];
        $terurut = urutkan($first, $second, $third);
        foreach ($terurut as $a) {
            echo $a . "<br>";
        }}
?>