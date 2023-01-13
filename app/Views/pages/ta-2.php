<?= $this->extend('templates/header') ?>
<?= $this->section('content') ?>

<div class="page-heading">
    <h3>Registrasi Tugas Akhir 2</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card p-3">
                    <div class="col-12 d-flex justify-content-end">
                    </div>
                    <div class="form-floating mb-3">
                        <input require type="month" class="form-control ms-1" id="month" name="month" value="">
                        <label for="periode">Periode Seminar</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input require type="text" class="form-control ms-1" id="judul" name="judul" value="">
                        <label for="name">Judul Tugas Akhir</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input require type="text" class="form-control ms-1" id="pbb1" name="pbb1" value="">
                        <label for="pbb1">Dosen Pembimbing Akademik</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input require type="number" class="form-control ms-1" id="nimpa" name="nimpa" value="">
                        <label for="nimpa">NIM Dosen Pembimbing Akademik</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input require type="text" class="form-control ms-1" id="pbb1" name="pbb1" value="">
                        <label for="pbb1">Dosen Pembimbing 1</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input require type="number" class="form-control ms-1" id="nimpbb1" name="nimpbb1" value="">
                        <label for="nimpbb1">NIM Dosen Pembimbing 1</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input require type="text" class="form-control ms-1" id="pbb2" name="pbb2" value="">
                        <label for="pbb2">Dosen Pembimbing 2</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input require type="number" class="form-control ms-1" id="nimpbb2" name="nimpbb2" value="">
                        <label for="nimpbb2">NIM Dosen Pembimbing 2</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input require type="text" class="form-control ms-1" id="penguji" name="penguji" value="">
                        <label for="penguji">Dosen Penguji</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input require type="number" class="form-control ms-1" id="nimpbhs" name="nimpbhs" value="">
                        <label for="nimpbhs">NIM Dosen Pembahas</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input require type="number" class="form-control ms-1" id="sks" name="sks" value="">
                        <label for="sks">SKS</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input require type="number" class="form-control ms-1" id="ipk" name="ipk" value="">
                        <label for="ipk">IPK</label>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Berkas Kelengkapan</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-1 mb-1">Kirim</button>
                    </div>
                </div>
            </div>
        </div>
</div>

<?= $this->endSection() ?>