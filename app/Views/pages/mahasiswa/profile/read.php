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
                                <td style="width: 75% !important;">Azka Yogi Karina</td>
                            </tr>
                            <tr>
                                <td style="width: 20% !important;">NPM</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">20170510</td>
                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Tanggal Lahir</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">12 Januari 2023</td>
                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Tahun Masuk</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">12 Januari 2023</td>
                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Jenis Kelamin</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">Perempuan</td>
                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Alamat</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">Bandar Lampung</td>
                            </tr>
                            <tr>
                                <td style="width: 20% !important;">E-mail</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">lalalala@gmail.com</td>
                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Nomor Telepon</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">082332889475</td>
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