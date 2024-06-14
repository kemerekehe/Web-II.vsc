<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<h1>Form Buku</h1>
<form method="post" action="<?= base_url('/FormBuku/store') ?>">
    <?php if (session()->getFlashdata('errors')) : ?>
        <div class="alert alert-danger">
            <?php foreach (session()->getFlashdata('errors') as $error) : ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <input type="hidden" name="id_buku" value="<?= isset($buku['id_buku']) ? htmlspecialchars($buku['id_buku']) : '' ?>">
    <label for="judul">Judul</label>
    <input type="text" name="judul" id="judul" max="500" required value="<?= isset($buku['judul_buku']) ? htmlspecialchars($buku['judul_buku']) : '' ?>"><br>
    <label for="penulis">Penulis</label>
    <input type="text" name="penulis" id="penulis" max="500" required value="<?= isset($buku['penulis']) ? htmlspecialchars($buku['penulis']) : '' ?>"><br>
    <label for="penerbit">Penerbit</label>
    <input type="text" name="penerbit" id="penerbit" max="250" required value="<?= isset($buku['penerbit']) ? htmlspecialchars($buku['penerbit']) : '' ?>"><br>
    <label for="tahun">Tahun Terbit</label>
    <input type="number" name="tahun" id="tahun" required value="<?= isset($buku['tahun_terbit']) ? htmlspecialchars($buku['tahun_terbit']) : '' ?>"><br>
    <button type="submit" name="submit">Simpan</button>
</form>
<?= $this->endSection() ?>