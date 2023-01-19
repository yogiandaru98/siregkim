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
                        <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fas fa-user-edit text-sm" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Edit Profil" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>Edit
                            Profil</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tr>
                                <td style="width: 20% !important;">Nama Lengkap</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $profilMahasiswa['nama_lengkap'] ?></td>
                            </tr>
                            <tr>
                                <td style="width: 20% !important;">NPM</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $profilMahasiswa['npm'] ?></td>
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