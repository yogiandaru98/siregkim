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
        <section id="multiple-column-form">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form Registrasi PKL</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form" action="/mahasiswa/pkl/create/action" method="POST" enctype="multipart/form-data">
                                    <?php csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="judul_pkl">Judul/Topik PKL</label>
                                                <input required type="text" id="judul_pkl" class="form-control <?= ($validation->hasError('judul_pkl')) ? 'is-invalid' : ''; ?>" placeholder="Judul" name="judul_pkl" value="<?= set_value('judul_pkl'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('judul_pkl') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="dosen_pembimbing_pkl">Dosen Pembimbing PKL</label>
                                                <select class="choices form-select" name="dosen_pembimbing_pkl">
                                                    <?php foreach ($dosen as $item) : ?>
                                                        <option value="<?= $item['id_user'] ?>"><?= $item['nama'] ?> -- <?= $item['username'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('dosen_pembimbing_pkl') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="semester">Semester</label>
                                                <select class="choices form-select" name="semester">
                                                    <option value="Genap">Genap</option>
                                                    <option value="Ganjil">Ganjil</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('semester') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="pembimbing_lapangan">Pembimbing Lapangan</label>
                                                <input required type="text" id="pembimbing_lapangan" class="form-control <?= ($validation->hasError('pembimbing_lapangan')) ? 'is-invalid' : ''; ?>" name="pembimbing_lapangan" placeholder="Pembimbing Lapangan" value="<?= set_value('pembimbing_lapangan'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('pembimbing_lapangan') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="tahun_akademik">Tahun Akademik</label>
                                                <select class="choices form-select" name="tahun_akademik">
                                                    <?php
                                                    for ($i = date("Y"); $i >= date("Y") - 5; $i--) {
                                                        echo "<option value='" . $i . " / " . ($i + 1) . "'>" . $i . " / " . ($i + 1) . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('tahun_akademik') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="no_pembimbing_lapangan">NIP / NO_KARYAWAN Pembimbing Lapangan</label>
                                                <input required type="number" id="no_pembimbing_lapangan" class="form-control <?= ($validation->hasError('no_pembimbing_lapangan')) ? 'is-invalid' : ''; ?>" name="no_pembimbing_lapangan" placeholder="NIP / NO_KARYAWAN Pembimbing Lapangan" value="<?= set_value('no_pembimbing_lapangan'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('no_pembimbing_lapangan') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="domisili_pkl">Domisili PKL</label>
                                                <select class="choices form-select" name="domisili_pkl">
                                                    <option value="Universitas Lampung">Universitas Lampung</option>
                                                    <option value="Dalam Lampung">Dalam Lampung</option>
                                                    <option value="Luar Lampung">Luar Lampung</option>
                                                </select>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('domisili_pkl') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="toefl">TOEFL <i>Kosongkan apabila belum memiliki</i></label>
                                                <input required type="number" id="toefl" class="form-control <?= ($validation->hasError('toefl')) ? 'is-invalid' : ''; ?>" name="toefl" placeholder="TOEFL" value="<?= set_value('toefl'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('toefl') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="nama_mitra_pkl">Nama Mitra PKL</label>
                                                <input required type="text" id="nama_mitra_pkl" class="form-control <?= ($validation->hasError('nama_mitra_pkl')) ? 'is-invalid' : ''; ?>" placeholder="Nama Mitra PKL" name="nama_mitra_pkl" value="<?= set_value('nama_mitra_pkl'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nama_mitra_pkl') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="sks">SKS</label>
                                                <input required type="number" id="sks" class="form-control <?= ($validation->hasError('sks')) ? 'is-invalid' : ''; ?>" name="sks" placeholder="SKS" value="<?= set_value('sks'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('sks') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="periode_seminar_pkl">Rencana Periode Seminar</label>
                                                <input required type="month" id="periode_seminar_pkl" class="form-control <?= ($validation->hasError('periode_seminar_pkl')) ? 'is-invalid' : ''; ?>" name="periode_seminar_pkl" placeholder="Rencana Periode Seminar" value="<?= set_value('periode_seminar_pkl'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('periode_seminar_pkl') ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="ipk">IPK</label>
                                                <input required type="number" max="4" step="0.01" id="ipk" class="form-control <?= ($validation->hasError('ipk')) ? 'is-invalid' : ''; ?>" name="ipk" placeholder="IPK" value="<?= set_value('ipk'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('ipk') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="berkas_kelengkapan">Berkas Kelengkapan</label>
                                                <a href="/berkas/kelengkapan/<?= $berkas_kelengkapan['isi_berkas'] ;?>">Lihat Persyaratan</a>
                                                <input required type="file" id="berkas_kelengkapan" class="form-control <?= ($validation->hasError('berkas_kelengkapan')) ? 'is-invalid' : ''; ?>" name="berkas_kelengkapan" placeholder="Berkas Kelengkapan" accept=".pdf">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('berkas_kelengkapan') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-check">
                                                <div class="checkbox mt-4">
                                                    <input required type="checkbox" name="persetujuan_seminar_pkl" value="Setuju" id="checkbox5" class="form-check-input">
                                                    <label for="checkbox5" class="">Saya dengan ini menyatakan bahwa dokumen kelengkapan berkas yang telah saya kirimkan semuanya adalah benar dan dapat saya pertanggung-jawabkan. Saya bersedia menerima sanksi bilamana saya terbukti melakukan pemalsuan dokumen (seperti tanda tangan, Bukti Bayar UKT, Transkrip/KRS, dlsb.), dengan ditunda seminar saya minimal 1 semester atau bahkan sanksi yang lebih berat hingga di-DO.</label>
                                                    <div class="invalid-feedback">
                                                        <?= $validation->getError('persetujuan_seminar_pkl') ?>
                                                    </div>
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