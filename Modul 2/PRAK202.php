<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        .required {
            color: red;
        }
    </style>
</head>
<body>
<?php 
    // Inisialisasi variabel required
    $required_nama = false;
    $required_nim = false;
    $required_option = false;
    
    // Variabel untuk menyimpan nilai dari formulir
    $nama = '';
    $nim = '';
    $option = '';
    
    // Memeriksa apakah formulir telah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["submit"])) {
        // Memeriksa apakah nama sudah diisi
        if(empty($_GET['nama'])) {
            $required_nama = true;
        } else {
            $nama = $_GET['nama']; // Menyimpan nilai nama dari formulir
        }
        
        // Memeriksa apakah nim sudah diisi
        if(empty($_GET['nim'])) {
            $required_nim = true;
        } else {
            $nim = $_GET['nim']; // Menyimpan nilai nim dari formulir
        }
        
        // Memeriksa apakah jenis kelamin sudah dipilih
        if(empty($_GET['option'])) {
            $required_option = true;
        } else {
            $option = $_GET['option']; // Menyimpan nilai jenis kelamin dari formulir
        }
    }
?>
<form method="get" autocomplete="off">
    Nama: <input type="text" name="nama" id="nama" value="<?php echo htmlspecialchars($nama); ?>">
    <span class="required">*<?php if($required_nama) echo "Nama tidak boleh kosong"; ?></span> <br>
    Nim: <input type="text" name="nim" id="nim" value="<?php echo htmlspecialchars($nim); ?>">
    <span class="required">*<?php if($required_nim) echo "NIM tidak boleh kosong"; ?></span> <br>
    Jenis Kelamin: <span class="required">*<?php if($required_option) echo "Jenis kelamin tidak boleh kosong"; ?></span> <br>
    <input type="radio" name="option" id="laki" value="Laki-laki" <?php if($option == 'Laki-laki') echo 'checked'; ?>>
    <label for="laki">Laki-laki</label> <br>
    <input type="radio" name="option" id="perempuan" value="Perempuan" <?php if($option == 'Perempuan') echo 'checked'; ?>>
    <label for="perempuan">Perempuan</label> <br>
    <input type="submit" name="submit" value="Submit"> <br>
</form>
    <?php
        if ($nama != '' && $nim != '' && $option != '') {
            echo "<h2>Output:</h2>";
            echo $nama . "<br>" . $nim . "<br>" . $option . "<br>";
        }
    ?>
</body>
</html>
