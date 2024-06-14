<?php
require 'Model.php';

$id_member = isset($_POST['id']) ? $_POST['id'] : null;
$data = null;

if ($id_member) {
    $data = getById($koneksi, 'member', 'id_member', $id_member);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $arr_data = [
        'nama_member' => $_POST['nama'],
        'nomor_member' => $_POST['nomor'],
        'alamat' => $_POST['alamat'],
        'tgl_mendaftar' => date('Y-m-d H:i:s'),
        'tgl_terakhir_bayar' => $_POST['tgl_terakhir']
    ];
    $whereColumn = 'id_member';
    $whereValue = $_POST['id_member'];
    if (isExist($koneksi, 'id_member', $_POST['id_member'], 'member')) {
        updateData($koneksi, 'member', $arr_data, $whereColumn, $whereValue);
    } else {
        insertData($koneksi, 'member', $arr_data);
    }   

    header('Location: Member.php');
    exit(); 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Member</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Member</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Form Member</h1>
    <form method="post">
        <input type="hidden" name="id_member" value="<?= $data ? htmlspecialchars($data->id_member) : '' ?>"><br>
        <Label for="nama">Nama</Label>
        <input type="text" name="nama" id="nama" max=250 required value="<?= $data ? htmlspecialchars($data->nama_member) : '' ?>"><br>
        <Label for="nomor">Nomor Telepon</Label>
        <input type="num" name="nomor" id="nomor" max=15 required value="<?= $data ? htmlspecialchars($data->nomor_member) : '' ?>"><br>
        <Label for="alamat">Alamat</Label>
        <input type="text" name="alamat" id="alamat" max=500 required value="<?= $data ? htmlspecialchars($data->alamat) : '' ?>"> <br>
        <Label for="alamat">Tanggal Terakhir Transaksi</Label>
        <input type="date" name="tgl_terakhir" id="tgl_terakhir" max=500 required value="<?= $data ? htmlspecialchars($data->tgl_terakhir_bayar) : '' ?>"> <br>
        <button type="submit" name="submit">Simpan</button>
    </form>
</body>
</html>
