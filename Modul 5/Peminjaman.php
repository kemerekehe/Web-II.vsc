<?php
require_once 'model.php';

$lends = getData($koneksi, 'peminjaman', 'id_peminjaman');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['hapus'])) {
    $id = $_POST['id'];
    deleteData($koneksi, 'peminjaman', 'id_peminjaman', $id);
    header('Location: Peminjaman.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Peminjaman</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styleslists.css">
</head>
<body>
    <h1>Daftar Peminjaman</h1>
    <a href="FormPeminjaman.php">Tambah Peminjaman</a>

        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Aksi</th>
            </tr>
            <?php if (count($lends) > 0): ?>
            <?php foreach ($lends as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row->id_peminjaman) ?></td>
                    <td><?= htmlspecialchars($row->nama_member) ?></td>
                    <td><?= htmlspecialchars($row->judul_buku) ?></td>
                    <td><?= htmlspecialchars($row->tgl_pinjam) ?></td>
                    <td><?= htmlspecialchars($row->tgl_kembali) ?></td>
                    <td>
                        <form action="FormPeminjaman.php" method="post">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($row->id_peminjaman) ?>">
                            <button type="submit" name="Edit">Edit</button>
                        </form>
                        <br>
                        <form method="post">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($row->id_peminjaman) ?>">
                            <button type="submit" name="hapus" class="button edit-button">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6">Tidak ada peminjaman yang terdaftar</td></tr>
            <?php endif; ?>
        </table>
</body>
</html>
