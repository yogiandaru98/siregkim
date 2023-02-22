<?= $this->extend('templates/sidebar') ?>
<?= $this->section('content') ?>

<div class="page-heading">
    <h3>Profil</h3>
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
                        <a class="btn btn-primary" href="<?= site_url('/mahasiswa/profile/edit') ?>"  >Edit
                            Profil</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tr>
                                <td style="width: 20% !important;">Nama Lengkap</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $profilMahasiswa['nama'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 20% !important;">NPM</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $profilMahasiswa['username'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Tanggal Lahir</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?=date_format(new DateTime($profilMahasiswa['tanggal_lahir']),"d F Y") ?></td>
                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Tanggal Masuk</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= date_format(new DateTime($profilMahasiswa['tanggal_masuk']),"d F Y") ?></td>
                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Status</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $profilMahasiswa['status_mahasiswa'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Nama Dosen Pembimbing Akademik</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $profilMahasiswa['nama_dosen_pembimbing_akademik'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 20% !important;">NIP Dosen Pembimbing Akademik</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $profilMahasiswa['nip_dosen_pembimbing_akademik'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Semester</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $profilMahasiswa['semester'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Tahun Masuk</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $profilMahasiswa['angkatan'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Jenis Kelamin</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $profilMahasiswa['jenis_kelamin'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Alamat</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $profilMahasiswa['alamat'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 20% !important;">E-mail</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $profilMahasiswa['email'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Nomor Telepon</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $profilMahasiswa['no_telepon'] ?></td>
                            </tr>
                            </tbody>
                        </table>
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