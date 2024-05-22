<?php
require_once 'model.php';

$books = getData($koneksi, 'buku', 'id_buku');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['hapus'])) {
    $id = $_POST['id'];
    deleteData($koneksi, 'buku', 'id_buku', $id);
    header('Location: Buku.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styleslists.css">
</head>
<body>
    <h1>Daftar Buku</h1>
    <a href="FormBuku.php">Tambah Buku</a>

        <table border="1">
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penerbit</th>
                <th>Penulis</th>
                <th>Tahun Terbit</th>
                <th>Aksi</th>
            </tr>
            <?php if (count($books) > 0): ?>
            <?php foreach ($books as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row->id_buku) ?></td>
                    <td><?= htmlspecialchars($row->judul_buku) ?></td>
                    <td><?= htmlspecialchars($row->penerbit) ?></td>
                    <td><?= htmlspecialchars($row->penulis) ?></td>
                    <td><?= htmlspecialchars($row->tahun_terbit) ?></td>
                    <td>
                    <form action="FormBuku.php" method="post">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($row->id_buku) ?>">
                            <button type="submit" name="Edit">Edit</button>
                        </form>
                        <form method="post">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($row->id_buku) ?>">
                            <button type="submit" name="hapus" class="button edit-button">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6">Tidak ada buku yang terdaftar</td></tr>
            <?php endif; ?>
        </table>
</body>
</html>
