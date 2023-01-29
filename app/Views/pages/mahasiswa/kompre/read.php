<?= $this->extend('templates/sidebar') ?>
<?= $this->section('content') ?>
<h1 class="page-title d-flex justify-content-center">Ujian Komprehensif</h1>
<div class="page-heading">
    <h3>Data Registrasi</h3>
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
                        <a class="btn btn-primary" href="<?= site_url('/mahasiswa/ta/edit') ?>">Edit
                            Data</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-borderless">

                            <tr>
                                <td style="width: 20% !important;">Judul/Topik Ujian Komprehensif</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $kompre['judul_kompre'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Prodi</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $kompre['prodi'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Periode Seminar Ujian Komprehensif</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $kompre['periode_seminar_ta'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Dosen Pembimbing Akademik</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $kompre['dosen_pembimbing_akademik'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">NIP Pembimbing Akademik</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $kompre['nip_pembimbing_akademik'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">SKS</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $kompre['sks'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">IPK</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $kompre['ipk'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Status Registrasi</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $kompre['status_kompre'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Pesan Admin</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                    <?php if ($kompre['pesan_admin']) : ?>
                                        <?= $kompre['pesan_admin'] ?>
                                    <?php else : ?>
                                        Tidak Ada
                                    <?php endif; ?>
                                </td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Berkas Kelengkapan</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><a href="/berkas/kompre/<?= $kompre['berkas_kelengkapan'] ?>" target="_blank">Unduh Berkas</a></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Berkas Persiapan Seminar</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                    <?php if ($kompre['status_kompre'] != "Valid") : ?>
                                        Data Anda Belum Di Validasi Oleh Admin
                                    <?php else : ?>
                                        <a href="/berkas/kompre/<?= $kompre['berkas_seminar_kompre'] ?>" target="_blank">Unduh</a>
                                </td>
                            <?php endif; ?>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="page-heading">
    <h3>Bukti Seminar</h3>
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
                        <a class="btn btn-primary" href="<?= site_url('/mahasiswa/profile/edit') ?>" data-bs-toggle="modal"
                                    data-bs-target="#inlineForm" >Unggah Bukti</a>
                                    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel33" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                        role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel33">Unggah Bukti Seminar</h4>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <form action="/mahasiswa/kompre/buktiSeminar" method="POST" enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    <label>Bukti Seminar</label>
                                                    <i>Jadikan 1 dalam satu kesatuan dokumen pdf</i>
                                                    <div class="form-group">
                                                        <input type="file" placeholder="Bukti Seminar" name="bukti_seminar"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light-secondary"
                                                        data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                    <button type="submit" class="btn btn-primary ml-1"
                                                        data-bs-dismiss="modal">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Unggah</span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tr>
                                <td style="width: 20% !important;">Bukti Seminar</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                <?php if ($kompre['bukti_seminar_kompre']) : ?>
                                <a href="/berkas/kompre/<?= $kompre['bukti_seminar_kompre'] ?>" target="_blank">Unduh</a>
                                <?php else : ?>
                                    <a href="" data-bs-toggle="modal"
                                    data-bs-target="#inlineForm">Unggah Berkas</a>
                                <?php endif; ?>

                            </td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Status Bukti</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                    <?php if ($kompre['bukti_seminar_kompre']) : ?>
                                        <?= $kompre['status_bukti_seminar_kompre'] ?>
                                    <?php else : ?>
                                        Anda Belum Mengunggah Bukti Seminar
                                    <?php endif; ?>
                                </td>

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