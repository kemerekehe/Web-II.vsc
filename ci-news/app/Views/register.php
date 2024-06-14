<?= $this->extend('layouts/main.php') ?>

<?= $this->section('content') ?>
<div class="row justify-content-center">
    <div class="col-md-6">
        <h4 class="text-center" style="font-weight: bold;">REGISTER</h4>
        <hr>
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="alert alert-danger">
                <?php foreach (session()->getFlashdata('error') as $error) : ?>
                    <p><?= esc($error) ?></p>
                <?php endforeach ?>
            </div>
        <?php endif; ?>

        <?= validation_list_errors() ?>

        <?= form_open('register'); ?>
        <div class="form-group">
            <label for="username">Nama Pengguna</label>
            <input type="text" name="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="form-group">
                <label for="password_confirm">Konfirmasi Password</label>
                <input type="password" name="password_confirm" class="form-control" id="password_confirm" required>
            </div>
        <div class="form-group text-center">
            <button class="btn btn-primary">Register</button>
        </div>
        <?= form_close(); ?>
    </div>
</div>

<?php if (session()->getFlashdata('success')) : ?>
<script>
    alert('<?= session()->getFlashdata('success') ?>');
    window.location.href = '<?= base_url('/login') ?>';
</script>
<?php endif; ?>

<?= $this->endSection() ?>