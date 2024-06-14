<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<a href="<?php echo base_url('FormBuku'); ?>" class="btn btn-outline-primary my-2">Tambah Buku</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Judul</th>
        <th>Penerbit</th>
        <th>Penulis</th>
        <th>Tahun Terbit</th>
        <th>Aksi</th>
    </tr>
    <?php if (!empty($buku) && is_array($buku)): ?>
        <?php foreach ($buku as $book): ?>
            <tr>
            <td><?= esc($book['id_buku']) ?></td>
                        <td><?= esc($book['judul_buku']) ?></td>
                        <td><?= esc($book['penulis']) ?></td>
                        <td><?= esc($book['penerbit']) ?></td>
                        <td><?= esc($book['tahun_terbit']) ?></td>
                <td>
                <a href="<?= base_url('/dashboard/edit/' . $book['id_buku']) ?>" class="btn btn-primary">Edit</a>
                <a href="<?= base_url('/dashboard/delete/' . $book['id_buku']) ?>" class="btn btn-primary">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else : ?>
        <tr>
            <td colspan="6">Tidak ada buku yang terdaftar</td>
        </tr>
    <?php endif; ?>
</table>
<?= $this->endSection() ?>