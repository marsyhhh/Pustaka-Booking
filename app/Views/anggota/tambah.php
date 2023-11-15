<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="col">
        <h3>Form Tambah Anggota</h3>
        <form action="/anggota/simpan" method="POST" class="mt-4" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="form-group row mb-3">
                <label for="inputNama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>"
                        name="nama" autofocus value="<?= old('nama'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('nama'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="inputTelp" class="col-sm-2 col-form-label">No Telp</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" value="<?= old('telp'); ?>" name="telp">
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" value="<?= old('alamat'); ?>" name="alamat">
                </div>
            </div>
            <div class="form-group row mb-3">
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>