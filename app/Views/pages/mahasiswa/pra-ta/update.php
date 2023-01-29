<?= $this->extend('templates/sidebar') ?>
<?= $this->section('content') ?>

<div class="page-heading">
    <h3>Registrasi Pra-tugas Akhir</h3>
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
                    <form action="/mahasiswa/prata/edit/action" method="POST" enctype="multipart/form-data">
                        <?php csrf_field(); ?>
                        <div class="form-floating mb-3">
                            <input require type="text" class="form-control <?= ($validation->hasError('judul_prata')) ? 'is-invalid' : ''; ?> ms-1" autocomplete="off" id="judul_prata" name="judul_prata" value="<?= $prata['judul_prata']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('judul_prata') ?>
                            </div>
                            <label for="judul_prata">Judul/Topik Pra-tugas Akhir</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input require type="month" class="form-control <?= ($validation->hasError('periode_seminar_prata')) ? 'is-invalid' : ''; ?> ms-1" autocomplete="off" id="month" name="periode_seminar_prata" value="<?= $prata['periode_seminar_prata']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('periode_seminar_prata') ?>
                            </div>
                            <label for="periode">Periode Seminar Pra-tugas Akhir</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input require type="text" class="form-control <?= ($validation->hasError('dosen_pembimbing_akademik')) ? 'is-invalid' : ''; ?> ms-1" autocomplete="off" id="dosen_pembimbing_akademik" name="dosen_pembimbing_akademik" value="<?= $prata['dosen_pembimbing_akademik']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('dosen_pembimbing_akademik') ?>
                            </div>
                            <label for="dosen_pembimbing_akademik">Dosen Pembimbing Akademik</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input require type="number" class="form-control <?= ($validation->hasError('nip_pembimbing_akademik')) ? 'is-invalid' : ''; ?> ms-1" autocomplete="off" id="nip_pembimbing_akademik" name="nip_pembimbing_akademik" value="<?= $prata['nip_pembimbing_akademik']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nip_pembimbing_akademik') ?>
                            </div>
                            <label for="nip_pembimbing_akademik">NIP Dosen Pembimbing Akademik</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input require type="text" class="form-control <?= ($validation->hasError('dosen_pembimbing_prata')) ? 'is-invalid' : ''; ?> ms-1" autocomplete="off" id="dosen_pembimbing_prata" name="dosen_pembimbing_prata" value="<?= $prata['dosen_pembimbing_prata']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('dosen_pembimbing_prata') ?>
                            </div>
                            <label for="dosen_pembimbing_prata">Dosen Pembimbing Pra-tugas Akhir</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input require type="number" class="form-control <?= ($validation->hasError('nip_pembimbing_prata')) ? 'is-invalid' : ''; ?> ms-1" autocomplete="off" id="nip_pembimbing_prata" name="nip_pembimbing_prata" value="<?= $prata['nip_pembimbing_prata']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nip_pembimbing_prata') ?>
                            </div>
                            <label for="nip_pembimbing_prata">NIP Dosen Pembimbing Pra-Tugas Akhir</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input require type="number" class="form-control <?= ($validation->hasError('sks')) ? 'is-invalid' : ''; ?> ms-1" autocomplete="off" id="sks" name="sks" value="<?= $prata['sks']; ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('sks') ?>
                            </div>
                            <label for="sks">SKS</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input require type="number" max="4" step="0.01" class="form-control <?= ($validation->hasError('ipk')) ? 'is-invalid' : ''; ?> ms-1" autocomplete="off" id="ipk" name="ipk" value="<?= $prata['ipk']; ?>">
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