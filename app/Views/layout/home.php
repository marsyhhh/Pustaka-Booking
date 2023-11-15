<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <h1 class="mt-2">Selamat Datang di Pustaka Booking</h1>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat, quae magnam! Voluptas, repellendus?
            Alias libero corporis quidem voluptatem illum expedita excepturi obcaecati, sunt cum aperiam neque
            molestiae. Ipsa, quo deleniti?</p>
        <div class="mt-3 mb-3 text-center">
        </div>
        <?php
            foreach ($buku as $b) : 
        ?>
        <div class="col-md-3 mb-3">
            <div class="card" style="width: 14rem;">
                <img src="/img/<?= $b['sampul']; ?>" height="280px" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $b['judul']; ?></h5>
                    <a href="/buku/<?= $b['id_buku']; ?>" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
        <?php endforeach ?>
    </div>
</div>
<?= $this->endSection(); ?>