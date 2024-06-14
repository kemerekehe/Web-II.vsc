<?php
    require 'model.php'; 
    
    $id_peminjaman = isset($_POST['id']) ? $_POST['id'] : null;
    $data = null;
    
    if ($id_peminjaman) {
        $data = getById($koneksi, 'peminjaman', 'id_peminjaman', $id_peminjaman);
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $arr_data = [
            'id_member' => $_POST['id_member'],
            'id_buku' => $_POST['id_buku'],
            'tgl_pinjam' => $_POST['tgl_pinjam'],
            'tgl_kembali' => $_POST['tgl_kembali']
        ];
        
        $whereColumn = 'id_peminjaman';
        $whereValue = $_POST['id_peminjaman'];

        if (isExist($koneksi, 'id_member', $_POST['id_member'], 'member') && isExist($koneksi, 'id_buku', $_POST['id_buku'], 'buku')) {
            if (isExist($koneksi, 'id_peminjaman', $_POST['id_peminjaman'], 'peminjaman')) {
                updateData($koneksi, 'peminjaman', $arr_data, $whereColumn, $whereValue);
            } else {
                insertData($koneksi, 'peminjaman', $arr_data);
            }   
            header('Location: Peminjaman.php');
            exit();    
        } else {
            echo "Id Member atau Id Buku tidak terdaftar";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Peminjaman</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Form Peminjaman</h1>
    <form method="post">
        <input type="hidden"  name="id_peminjaman" value="<?= $data ? htmlspecialchars($data->id_peminjaman) : '' ?>">
        <label for="id_member">ID Member</label>
        <input type="text" name="id_member" id="id_member" value="<?= $data ? htmlspecialchars($data->id_member) : '' ?>" required><br>
        <label for="id_buku">ID Buku</label>
        <input type="text" name="id_buku" id="id_buku" value="<?= $data ? htmlspecialchars($data->id_buku) : '' ?>" required><br>
        <label for="tgl_pinjam">Tanggal Pinjam</label>
        <input type="date" name="tgl_pinjam" id="tgl_pinjam" value="<?= $data ? htmlspecialchars($data->tgl_pinjam) : '' ?>" required><br>
        <label for="tgl_kembali">Tanggal Kembali</label>
        <input type="date" name="tgl_kembali" id="tgl_kembali" value="<?= $data ? htmlspecialchars($data->tgl_kembali) : '' ?>" required><br>
        <button type="submit" name="submit">Simpan</button>
    </form>
</body>
</html>
