<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        img {
            width: 25px; /* Atur lebar sesuai kebutuhan Anda */
            height: auto; /* Biarkan ketinggian mengikuti proporsi asli */
        }
    </style>
</head>
<body>
    <form method="get">
        Tinggi : <input type="number" name="tinggi" id="tinggi"> <br>
        Alamat Gambar : <input type="text" name="gambar" id="gambar"> <br>
        <input type="submit" value="Cetak" name="Submit"> <br>
    </form>
    <?php
        $tinggi = $_GET['tinggi'] ?? 0;
        $gambar = $_GET['gambar'] ?? '';
        
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $koson = 0;
            while ($koson <= $tinggi) {
                $baris = $tinggi - $koson;
                $kosong = $koson;
                while ($kosong > 0) {
                    echo '<img src="' . $gambar . '" style="opacity:0">';
                    $kosong--;
                }
                while ($baris > 0) {
                    echo '<img src="' . $gambar .'">';
                    $baris--;
                }
                echo '<br>';
                $koson++;
            }
        }
    ?>
</body>
</html>
