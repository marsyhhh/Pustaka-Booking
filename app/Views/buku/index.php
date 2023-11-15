<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Daftar Buku</h1>
            <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>
            <?php endif; ?>
            <a href="/buku/tambah" type="button" class="btn btn-primary mb-2">Tambah Data Buku</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($buku as $b) : 
                    ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><img src="/img/<?= $b['sampul']; ?>" alt="" width="75"></td>
                        <td><?= $b['judul']; ?></td>
                        <td><a href="/buku/<?= $b['id_buku']; ?>" type="button" class="btn btn-success">Detail</a></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <?= $this->endSection(); ?>