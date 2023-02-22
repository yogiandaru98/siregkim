<?= $this->extend('templates/sidebar') ?>
<?= $this->section('content') ?>

<div class="page-heading">
    <h3>Registrasi Praktik Kerja Lapangan</h3>
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
                    <form action="/mahasiswa/pkl/create/action" method="POST" enctype="multipart/form-data">
                        <?php csrf_field(); ?>
                        <div class="form-floating mb-3">
                            <input require type="text" class="form-control <?= ($validation->hasError('judul_pkl')) ? 'is-invalid' : ''; ?> ms-1" autocomplete="off" id="judul_pkl" name="judul_pkl" value="<?= set_value('judul_pkl'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('judul_pkl') ?>
                            </div>
                            <label for="judul_pkl">Judul/Topik PKL</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input require type="month" class="form-control <?= ($validation->hasError('periode_seminar_pkl')) ? 'is-invalid' : ''; ?> ms-1" autocomplete="off" id="month" name="periode_seminar_pkl" value="<?= set_value('periode_seminar_pkl'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('periode_seminar_pkl') ?>
                            </div>
                            <label for="periode">Periode Seminar</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input require type="text" class="form-control <?= ($validation->hasError('lokasi_pkl')) ? 'is-invalid' : ''; ?> ms-1" autocomplete="off" id="lokasi_pkl" name="lokasi_pkl" value="<?= set_value('lokasi_pkl'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('lokasi_pkl') ?>
                            </div>
                            <label for="lokasi_pkl">Lokasi PKL</label>
                        </div>
                        <div class="form-floating mb-3">

                            <div class="form-group">
                                <label for="dosen_pembimbing_akademik">Dosen Pembimbing Akademik</label>
                            <select class="choices form-select" name="dosen_pembimbing_akademik" id="dosen_pa">
                                <?php foreach ($dosen as $item) : ?>
                                    <option value="<?= $item['id_user'] ?>"><?= $item['nama'] ?> -- <?= $item['username'] ?></option>
                                <?php endforeach; ?>
                            </select>
                                    </div>
                            <!-- <input require type="text" class="form-control <?= ($validation->hasError('dosen_pembimbing_akademik')) ? 'is-invalid' : ''; ?> ms-1" autocomplete="off" id="dosen_pembimbing_akademik" name="dosen_pembimbing_akademik" value="<?= set_value('dosen_pembimbing_akademik'); ?>"> -->
                            <div class="invalid-feedback">
                                <?= $validation->getError('dosen_pembimbing_akademik') ?>
                            </div>
                        </div>
                        <div class="form-floating mb-3">

                            <div class="form-group">
                                <label for="dosen_pembimbing_pkl">Dosen Pembimbing PKL</label>
                            <select class="choices form-select" name="dosen_pembimbing_pkl" id="dosen_pa">
                                <?php foreach ($dosen as $item) : ?>
                                    <option value="<?= $item['id_user'] ?>"><?= $item['nama'] ?> -- <?= $item['username'] ?></option>
                                <?php endforeach; ?>
                            </select>
                                    </div>
                            <!-- <input require type="text" class="form-control <?= ($validation->hasError('dosen_pembimbing_pkl')) ? 'is-invalid' : ''; ?> ms-1" autocomplete="off" id="dosen_pembimbing_pkl" name="dosen_pembimbing_pkl" value="<?= set_value('dosen_pembimbing_pkl'); ?>"> -->
                            <div class="invalid-feedback">
                                <?= $validation->getError('dosen_pembimbing_pkl') ?>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input require type="text" class="form-control <?= ($validation->hasError('pembimbing_lapangan')) ? 'is-invalid' : ''; ?> ms-1" autocomplete="off" id="pembimbing_lapangan" name="pembimbing_lapangan" value="<?= set_value('pembimbing_lapangan'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('pembimbing_lapangan') ?>
                            </div>
                            <label for="pembimbing_lapangan">Pembimbing Lapangan</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input require type="number" class="form-control <?= ($validation->hasError('no_pembimbing_lapangan')) ? 'is-invalid' : ''; ?> ms-1" autocomplete="off" id="no_pembimbing_lapangan" name="no_pembimbing_lapangan" value="<?= set_value('no_pembimbing_lapangan'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('no_pembimbing_lapangan') ?>
                            </div>
                            <label for="no_pembimbing_lapangan">NIP/NO_KARYAWAN Pembimbing Lapangan</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input require type="number" class="form-control <?= ($validation->hasError('sks')) ? 'is-invalid' : ''; ?> ms-1" autocomplete="off" id="sks" name="sks" value="<?= set_value('sks'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('sks') ?>
                            </div>
                            <label for="sks">SKS</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input require type="number" max="4" step="0.01" class="form-control <?= ($validation->hasError('ipk')) ? 'is-invalid' : ''; ?> ms-1" autocomplete="off" id="ipk" name="ipk" value="<?= set_value('ipk'); ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('ipk') ?>
                            </div>
                            <label for="ipk">IPK</label>
                        </div>
                        <div class="mb-3">
                            <label for="berkas_kelengkapan" class="form-label">Berkas Kelengkapan</label>
                            <input class="form-control <?= ($validation->hasError('berkas_kelengkapan')) ? 'is-invalid' : ''; ?> ms-1" autocomplete="off" type="file" name="berkas_kelengkapan" accept=".pdf" id="berkas_kelengkapan">
                            <div class="invalid-feedback">
                                <?= $validation->getError('berkas_kelengkapan') ?>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>

<?= $this->endSection() ?>