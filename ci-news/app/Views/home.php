<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="jumbotron text-center" style="height:100vh">
    <h1 class="mt-5">PERPUSTAKAAN ATLANTIS</h1>
    <p class="lead text-muted">
        Wujudkan Kota Impian penuh Keajaiban dari Seluruh Dunia dan Dimensi di Kota Atlantis 
        Pusat Portal Tata Surya
    </p>
    <a href="<?php echo base_url('login'); ?>" class="btn btn-outline-primary my-2">Login</a>
    <a href="<?php echo base_url('register'); ?>" class="btn btn-success my-2">Register</a> <br>
    <img srcset="https://cdn.pixabay.com/photo/2016/12/22/13/42/bunny-1925500_960_720.png 1x, https://cdn.pixabay.com/photo/2016/12/22/13/42/bunny-1925500_1280.png 2x" src="https://cdn.pixabay.com/photo/2016/12/22/13/42/bunny-1925500_1280.png" alt="Bunny, Cartoon, Logo, School, Bagpack" style="height:50vh;">
</section>

<?= $this->endSection() ?>