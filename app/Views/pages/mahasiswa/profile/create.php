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
                    <div class="table-responsive">
                        
                        <form action="/mahasiswa/profile/create" method="POST">
                        <?= csrf_field(); ?>
                        <table class="table table-borderless">
                            
                            <tr>
                                <td style=" width: 20% !important;">Tanggal Lahir
                                </td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                    <input type="date" class="form-control <?= ($validation->hasError('tanggal_lahir')) ? 'is-invalid' : ''; ?>" id="tanggal_lahir" name="tanggal_lahir" value="<?= set_value('tanggal_lahir'); ?>" autocomplete="off"">
                                    <div class="invalid-feedback">
                                <?= $validation->getError('tanggal_lahir') ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style=" width: 20% !important;">Tahun Masuk
                                </td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                    <input type="date" class="form-control <?= ($validation->hasError('tanggal_masuk')) ? 'is-invalid' : ''; ?>" id="tanggal_masuk" name="tanggal_masuk" value="<?= set_value('tanggal_masuk'); ?>" autocomplete="off"">
                                    <div class="invalid-feedback">
                                <?= $validation->getError('tanggal_masuk') ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style=" width: 20% !important;">Semester
                                </td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                    <input type="number" class="form-control <?= ($validation->hasError('semester')) ? 'is-invalid' : ''; ?>" id="semester" name="semester" value="<?= set_value('semester'); ?>" autocomplete="off"">
                                    <div class="invalid-feedback">
                                <?= $validation->getError('semester') ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style=" width: 20% !important;">Jenis Kelamin</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                <select class="form-control" name="jenis_kelamin">
                                    <!-- <option selected> -Pilih Jenis Kelamin- </option> -->
                                    <option selected value="Laki-Laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                    <div class="invalid-feedback">
                                <?= $validation->getError('jenis_kelamin') ?>
                                    </div>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Alamat</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                    <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" value="<?= set_value('alamat'); ?>" autocomplete="off"">
                                    <div class="invalid-feedback">
                                <?= $validation->getError('alamat') ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 20% !important;">E-mail</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                    <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= set_value('email'); ?>" autocomplete="off"">
                                    <div class="invalid-feedback">
                                <?= $validation->getError('email') ?>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Nomor Telepon</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                    <input type="text" class="form-control <?= ($validation->hasError('no_telepon')) ? 'is-invalid' : ''; ?>" id="no_telepon" name="no_telepon" value="<?= set_value('no_telepon'); ?>" autocomplete="off"">
                                    <div class="invalid-feedback">
                                <?= $validation->getError('no_telepon') ?>
                                    </div>
                                </td>
                            </tr>
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