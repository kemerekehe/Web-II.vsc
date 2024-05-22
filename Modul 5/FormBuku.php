<?php

require 'Model.php';

    $id_buku = isset($_POST['id']) ? $_POST['id'] : null;
    $data = null;

    // Jika id_peminjaman tersedia, ambil data peminjaman dari database
    if ($id_buku) {
        echo $id_buku;
        $data = getById($koneksi, 'buku', 'id_buku', $id_buku);
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $arr_data = [
            'judul_buku' => $_POST['judul'],
            'penulis' => $_POST['penulis'],
            'penerbit' => $_POST['penerbit'],
            'tahun_terbit' => $_POST['tahun']
        ]; 

        $whereColumn = 'id_buku';
        $whereValue = $_POST['id_buku'];
        if (isExist($koneksi, 'id_buku', $_POST['id_buku'], 'buku')) {
            updateData($koneksi, 'buku', $arr_data, $whereColumn, $whereValue);
        } else {
            insertData($koneksi, 'buku', $arr_data);
        }   
            // Redirect ke halaman Peminjaman setelah operasi berhasil
        header('Location: Buku.php');
        exit(); 
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Buku</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Form Buku</h1>
    <form method="post">
    <input type="hidden"  name="id_buku" value="<?= $data ? htmlspecialchars($data->id_buku) : '' ?>">
        <Label for="judul">Judul</Label>
        <input type="text" name="judul" id="judul" max=500 required value="<?= $data ? htmlspecialchars($data->judul_buku) : '' ?>"><br>
        <Label for="penulis">Penulis</Label>
        <input type="text" name="penulis" id="penulis" max=500 required value="<?= $data ? htmlspecialchars($data->penulis) : '' ?>"><br>
        <Label for="penerbit">Penerbit</Label>
        <input type="text" name="penerbit" id="penerbit" max=250 required value="<?= $data ? htmlspecialchars($data->penerbit) : '' ?>"> <br>
        <Label for="tahun">Tahun Terbit</Label>
        <input type="num" name="tahun" id="tahun" required value="<?= $data ? htmlspecialchars($data->tahun_terbit) : '' ?>"> <br>
        <button type="submit" name="submit">Simpan</button>
    </form>
</body>
</html>
