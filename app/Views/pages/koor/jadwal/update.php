<?= $this->extend('templates/sidebar') ?>
<?= $this->section('content') ?>

<div class="page-heading">
    <h3><?= $title ?></h3>
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
                    <!-- pesan error -->
                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('error'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <!-- pesan sukses -->
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('success'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <div class="table-responsive">
                        <form action="/jadwal/update/<?= $jadwal['id_jadwal_seminar_pkl'] ?>/action" method="POST">
                        <?= csrf_field(); ?>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td style=" width: 20% !important;">Lokasi
                                    </td>
                                    <td style="width: 5% !important;">:</td>
                                    <td style="width: 75% !important;">
                                    <select required class="form-select <?= ($validation->hasError('id_lokasi_seminar')) ? 'is-invalid' : ''; ?>" name="id_lokasi_seminar" id="basicSelect"; ?>">
                                    <?php foreach ($lokasi as $item) : ?>
                                        <option value="<?= $item['id_lokasi_seminar'] ?>" <?= $jadwal['id_lokasi_seminar']==$item['id_lokasi_seminar']? 'selected' : '' ?> ><?= $item['nama_gedung'] ?> - <?= $item['nama_ruangan'] ?></option>
                                    <?php endforeach; ?>
                                    </select>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('password_lama') ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style=" width: 20% !important;">Tanggal Seminar
                                    </td>
                                    <td style="width: 5% !important;">:</td>
                                    <td style="width: 75% !important;">
                                        <input required type="date" class="form-control <?= ($validation->hasError('tanggal')) ? 'is-invalid' : ''; ?>" id="tanggal" name="tanggal" value="<?= $jadwal['tanggal']; ?>" autocomplete="off">
                                        <div class="invalid-feedback">
                                    <?= $validation->getError('tanggal') ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style=" width: 20% !important;">Jam Mulai Seminar
                                    </td>
                                    <td style="width: 5% !important;">:</td>
                                    <td style="width: 75% !important;">
                                        <input required type="time" class="form-control <?= ($validation->hasError('jam_mulai')) ? 'is-invalid' : ''; ?>" id="jam_mulai" name="jam_mulai" value="<?= $jadwal['jam_mulai']; ?>" autocomplete="off">
                                        <div class="invalid-feedback">
                                    <?= $validation->getError('jam_mulai') ?>
                                        </div>
                                    </td>
                                <tr>
                                <tr>
                                    <td style=" width: 20% !important;">Jam Selesai Seminar
                                    </td>
                                    <td style="width: 5% !important;">:</td>
                                    <td style="width: 75% !important;">
                                        <input required type="time" class="form-control <?= ($validation->hasError('jam_selesai')) ? 'is-invalid' : ''; ?>" id="jam_selesai" name="jam_selesai" value="<?= $jadwal['jam_selesai']; ?>" autocomplete="off">
                                        <div class="invalid-feedback">
                                    <?= $validation->getError('jam_selesai') ?>
                                        </div>
                                    </td>
                                <tr>
                                <tr>
                                    <td style=" width: 20% !important;">Pesan
                                    </td>
                                    <td style="width: 5% !important;">:</td>
                                    <td style="width: 75% !important;">
                                        <input type="text" class="form-control <?= ($validation->hasError('pesan_koor')) ? 'is-invalid' : ''; ?>" id="pesan_koor" name="pesan_koor" value="<?= !empty($jadwal['pesan_koor']) ? $jadwal['pesan_koor'] : ''; ?>" autocomplete="off">
                                        <div class="invalid-feedback">
                                    <?= $validation->getError('pesan_koor') ?>
                                        </div>
                                    </td>
                                <tr>
                                    
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <button style="width: 75% !important;" type="submit" class="btn btn-primary mr-0">Simpan</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>

<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>2023 &copy; Jurusan Kimia Fakultas Matematika dan Ilmu Pengetahuan Alam</p>
        </div>
    </div>
</footer>

<?= $this->endSection() ?>