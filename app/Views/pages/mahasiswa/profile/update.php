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
                        
                        <form action="<?= base_url("mahasiswa/profile/edit/action") ?>" method="POST">
                            <?= csrf_field(); ?>
                                <table class="table table-borderless">
                                    
                                    <tr>
                                        <td style="width: 20% !important;">Nama Lengkap</td>
                                        <td style="width: 5% !important;">:</td>
                                        <td style="width: 75% !important;">
                                            <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nama" name="nama" value="<?= $profilMahasiswa['nama'] ?>" autocomplete="off" required>
                                            <div class="invalid-feedback">
                                        <?= $validation->getError('nama') ?>
                                            </div>
                                        </td>
                                    </tr>
                                <tr>
                                    <td style=" width: 20% !important;">Tanggal Lahir
                                    </td>
                                    <td style="width: 5% !important;">:</td>
                                    <td style="width: 75% !important;">
                                        <input type="date" class="form-control <?= ($validation->hasError('tanggal_lahir')) ? 'is-invalid' : ''; ?>" id="tanggal_lahir" name="tanggal_lahir" value="<?= $profilMahasiswa['tanggal_lahir'] ?>" autocomplete="off" required>
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
                                        <input type="date" class="form-control <?= ($validation->hasError('tanggal_masuk')) ? 'is-invalid' : ''; ?>" id="tanggal_masuk" name="tanggal_masuk" value="<?= $profilMahasiswa['tanggal_masuk'] ?>" autocomplete="off" required>
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
                                        <input type="number" class="form-control <?= ($validation->hasError('semester')) ? 'is-invalid' : ''; ?>" id="semester" name="semester" value="<?= $profilMahasiswa['semester'] ?>" autocomplete="off"">
                                        <div class="invalid-feedback">
                                    <?= $validation->getError('semester') ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style=" width: 20% !important;">Dosen Pembimbing Akademik</td>
                                    <td style="width: 5% !important;">:</td>
                                    <td style="width: 75% !important;">
                                    <select class="choices form-select <?= ($validation->hasError('dosen_pembimbing_akademik')) ? 'is-invalid' : ''; ?>" name="dosen_pembimbing_akademik" id="dosen_pembimbing_akademik">
                                        <?php foreach ($dosen as $item) : ?>
                                        <option value="<?= $item['id_user'] ?>" <?= ($profilMahasiswa['dosen_pembimbing_akademik']==$item['id_user'])? 'selected' : ''  ?> ><?= $item['nama'] ?> [ <?= $item['username'] ?> ]</option>
                                    <?php endforeach; ?>
                                </select>
                                <tr>
                                    <td style=" width: 20% !important;">Jenis Kelamin</td>
                                    <td style="width: 5% !important;">:</td>
                                    <td style="width: 75% !important;">
                                    <select class="form-control" name="jenis_kelamin">
                                        <!-- <option selected> -Pilih Jenis Kelamin- </option> -->
                                        <option <?= ($profilMahasiswa['jenis_kelamin']=="Laki-Laki")? 'selected' : '' ?> value="Laki-Laki">Laki-laki</option>
                                        <option <?= ($profilMahasiswa['jenis_kelamin']=="Perempuan")? 'selected' : '' ?> value="Perempuan">Perempuan</option>
                                        
                                    </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style=" width: 20% !important;">Status Mahasiswa</td>
                                    <td style="width: 5% !important;">:</td>
                                    <td style="width: 75% !important;">
                                    <select class="form-select <?= ($validation->hasError('status_mahasiswa')) ? 'is-invalid' : ''; ?>" name="status_mahasiswa">
                                        <!-- <option selected> -Pilih Jenis Kelamin- </option> -->
                                        <!-- option status mahasiswa -->
                                        <option value="Aktif" <?= ($profilMahasiswa['status_mahasiswa']=="Aktif")? 'selected' : '' ?> >Aktif</option>
                                        <option value="Tidak Aktif" <?= ($profilMahasiswa['status_mahasiswa']=="Tidak Aktif")? 'selected' : '' ?> >Tidak Aktif</option>
                                        <option value="Lulus" <?= ($profilMahasiswa['status_mahasiswa']=="Lulus")? 'selected' : '' ?> >Lulus</option>
                                        <option value="Cuti" <?= ($profilMahasiswa['status_mahasiswa']=="Cuti")? 'selected' : '' ?> >Cuti</option>
                                        <option value="Keluar" <?= ($profilMahasiswa['status_mahasiswa']=="Keluar")? 'selected' : '' ?> >Keluar</option>

                                    </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 20% !important;">Alamat</td>
                                    <td style="width: 5% !important;">:</td>
                                    <td style="width: 75% !important;">
                                        <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" value="<?= $profilMahasiswa['alamat'] ?>" autocomplete="off" required>
                                        <div class="invalid-feedback">
                                    <?= $validation->getError('alamat') ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 20% !important;">E-mail</td>
                                    <td style="width: 5% !important;">:</td>
                                    <td style="width: 75% !important;">
                                        <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= $profilMahasiswa['email'] ?>" autocomplete="off" required>
                                        <div class="invalid-feedback">
                                    <?= $validation->getError('email') ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 20% !important;">Nomor Telepon</td>
                                    <td style="width: 5% !important;">:</td>
                                    <td style="width: 75% !important;">
                                        <input type="text" class="form-control <?= ($validation->hasError('no_telepon')) ? 'is-invalid' : ''; ?>" id="no_telepon" name="no_telepon" value="<?= $profilMahasiswa['no_telepon'] ?>" autocomplete="off" required>
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