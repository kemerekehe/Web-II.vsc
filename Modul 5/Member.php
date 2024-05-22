<?php
require_once 'model.php';

$members = getData($koneksi, 'member', 'id_member');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['hapus'])) {
    $id = $_POST['id'];
    deleteData($koneksi, 'member', 'id_member', $id);
    header('Location: Member.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Member</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styleslists.css">
</head>
<body>
    <h1>Daftar Member</h1>
    <a href="FormMember.php">Tambah Member</a>

        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Nomor</th>
                <th>Alamat</th>
                <th>Tanggal Daftar</th>
                <th>Transaksi Terakhir</th>
                <th>Aksi</th>
            </tr>
            <?php if (count($members) > 0): ?>
            <?php foreach ($members as $row): ?>
                <tr>
                    <td><?= htmlspecialchars($row->id_member) ?></td>
                    <td><?= htmlspecialchars($row->nama_member) ?></td>
                    <td><?= htmlspecialchars($row->nomor_member) ?></td>
                    <td><?= htmlspecialchars($row->alamat) ?></td>
                    <td><?= htmlspecialchars($row->tgl_mendaftar) ?></td>
                    <td><?= htmlspecialchars($row->tgl_terakhir_bayar) ?></td>
                    <td>
                    <form action="FormMember.php" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($row->id_member) ?>">
                            <button type="submit" name="Edit">Edit</button>
                        </form>
                        <form method="post">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($row->id_member) ?>">
                            <button type="submit" name="hapus" class="button edit-button">Hapus</button>
                        </form>
                    </td>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="6">Tidak ada member yang terdaftar</td></tr>
            <?php endif; ?>
        </table>
</body>
</html>
