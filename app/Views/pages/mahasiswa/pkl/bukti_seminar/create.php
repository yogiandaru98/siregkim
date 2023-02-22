<?= $this->extend('templates/sidebar') ?>
<?= $this->section('content') ?>

<div class="page-heading">
    <h3>Unggah Bukti Seminar</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                </div>
            </div>
        </div>
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form Bukti Seminar</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <!-- validasi form -->
                                
                                
                                <form class="form" action="<?= base_url('/mahasiswa/pkl/buktiSeminar/create/action') ?>" method="POST" enctype="multipart/form-data">
                                    <?php csrf_field(); ?>
                                    <div class="row">
                                    <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nilai_seminar_angka">Nilai Seminar Angka</label>
                                                <input type="number" placeholder="Nilai Seminar Angka" id="nilai_seminar_angka" name="nilai_seminar_angka" class="form-control <?= ($validation->hasError('nilai_seminar_angka')) ? 'is-invalid' : ''; ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nilai_seminar_angka') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nilai_seminar_huruf">Nilai Seminar Huruf</label>
                                                <input type="text" placeholder="Nilai Seminar huruf" id="nilai_seminar_huruf" name="nilai_seminar_huruf" class="form-control <?= ($validation->hasError('nilai_seminar_huruf')) ? 'is-invalid' : ''; ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nilai_seminar_huruf') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nilai_pkl_angka">Nilai PKL Angka</label>
                                                <input type="number" placeholder="Nilai Pkl Angka" id="nilai_pkl_angka" name="nilai_pkl_angka" class="form-control <?= ($validation->hasError('nilai_pkl_angka')) ? 'is-invalid' : ''; ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nilai_pkl_angka') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nilai_pkl_huruf">Nilai PKL Huruf</label>
                                                <input type="text" placeholder="Nilai Pkl huruf" id="nilai_pkl_huruf" name="nilai_pkl_huruf" class="form-control <?= ($validation->hasError('nilai_pkl_huruf')) ? 'is-invalid' : ''; ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nilai_pkl_huruf') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="bukti_seminar">Bukti Seminar</label><br>
                                                <i>Jadikan satu dalam format pdf</i>
                                                <i>ukuran file max 1 mb</i>
                                                <input type="file" accept=".pdf" placeholder="Bukti Seminar" id="bukti_seminar" name="bukti_seminar" class="form-control <?= ($validation->hasError('bukti_seminar')) ? 'is-invalid' : ''; ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('bukti_seminar') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="laporan_pkl">Laporan PKL</label><br>
                                                <i>Jadikan satu dalam format pdf</i>
                                                <i>ukuran file max 1 mb</i>
                                                <input type="file" accept=".pdf" placeholder="Laporan PKL" id="laporan_pkl" name="laporan_pkl" class="form-control <?= ($validation->hasError('laporan_pkl')) ? 'is-invalid' : ''; ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('laporan_pkl') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="tanggal">Tanggal</label>
                                                <input type="date" placeholder="Tanggal" id="tanggal" name="tanggal_seminar" class="form-control <?= ($validation->hasError('tanggal_seminar')) ? 'is-invalid' : ''; ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('tanggal_seminar') ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">
                                                Submit
                                            </button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                Reset
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</div>

<?= $this->endSection() ?>