<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="col">
        <h3>Form Tambah Buku</h3>
        <form action="/buku/simpan" method="POST" class="mt-4" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="form-group row mb-3">
                <label for="inputJudul" class="col-sm-2 col-form-label">Judul</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>"
                        name="judul" autofocus value="<?= old('judul'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('judul'); ?>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="inputPengarang" class="col-sm-2 col-form-label">Pengarang</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" value="<?= old('pengarang'); ?>" name="pengarang">
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="inputPenerbit" class="col-sm-2 col-form-label">Penerbit</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" value="<?= old('penerbit'); ?>" name="penerbit">
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="inputTahun" class="col-sm-2 col-form-label">Tahun Terbit</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" value="<?= old('tahun'); ?>" name="tahun">
                </div>
            </div>
            <div class="form-group row mb-3">
                <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                <div class="col-sm-4">
                    <input type="file" class="<?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?>"
                        name="sampul">
                    <div class="invalid-feedback">
                        <?= $validation->getError('sampul'); ?>
                    </div>
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