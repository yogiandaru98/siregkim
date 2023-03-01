<?= $this->extend('templates/sidebar') ?>
<?= $this->section('content') ?>
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
                    <div class="table-responsive">
                        <table class="table table-borderless">

                            <tr>
                                <td style="width: 20% !important;">Judul/Topik PKL</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $pkl['judul_pkl'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Tahun Akademik</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $pkl['tahun_akademik'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Semester</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $pkl['semester'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Prodi</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $pkl['prodi'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Periode Seminar Pkl</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= date_indo2($pkl['periode_seminar_pkl']); ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Mitra Pkl</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $pkl['nama_mitra_pkl'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Domisili Pkl</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $pkl['domisili_pkl'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Dosen Pembimbing Akademik</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $pkl['nama_dosen_akademik'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">NIP Pembimbing Akademik</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $pkl['nip_dosen_akademik'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Dosen Pembimbing PKL</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $pkl['nama_dosen_pkl'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">NIP Pembimbing pkl</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $pkl['nip_dosen_pkl'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Pembimbing Lapangan</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $pkl['pembimbing_lapangan'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">NIP/NO Pembimbing Lapangan</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $pkl['no_pembimbing_lapangan'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">SKS</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $pkl['sks'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">TOEFL</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= ($pkl['sks']) ? $pkl['sks'] : 'Belum ada' ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">IPK</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><?= $pkl['ipk'] ?></td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Pesan Admin</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;">
                                    <?= ($pkl['pesan_admin']) ? $pkl['pesan_admin'] : 'Tidak Ada'  ?>

                                </td>

                            </tr>
                            <tr>
                                <td style="width: 20% !important;">Berkas Kelengkapan</td>
                                <td style="width: 5% !important;">:</td>
                                <td style="width: 75% !important;"><a href="/berkas/pkl/kelengkapan/<?= $pkl['berkas_kelengkapan'] ?>" target="_blank">Unduh Berkas</a></td>

                            </tr>

                            <form action="/validasi/pkl/<?= $pkl['id_pkl'] ?>/action" method="post">
                                <tr>
                                    <td style="width: 20% !important;">Status Registraasi Seminar PKL</td>
                                    <td style="width: 5% !important;">:</td>
                                    <td>
                                        <select name="status_pkl" id="status_pkl">
                                            <option value="Diproses" <?= ($pkl['status_pkl'] == 'Diproses') ? 'selected' : '' ?>>Diproses</option>
                                            <option value="Valid" <?= ($pkl['status_pkl'] == 'Valid') ? 'selected' : '' ?>>Valid</option>
                                            <option value="Invalid" <?= ($pkl['status_pkl'] == 'Invalid') ? 'selected' : '' ?>>Invalid</option>

                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 20% !important;">Pesan Admin</td>
                                    <td style="width: 5% !important;">:</td>
                                    <td>
                                        <textarea name="pesan_admin" class="form-control textrea" id="pesan_admin" cols="30" rows="10"><?= ($pkl['pesan_admin']) ? $pkl['pesan_admin'] : 'Tidak Ada'  ?></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 20% !important;"></td>
                                    <td style="width: 5% !important;"></td>
                                    <td style="width: 75% !important;">
                                    <td>
                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                            Submit
                                        </button>
                                    </td>
                                </tr>
                            </form>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
<?= $this->endSection() ?>